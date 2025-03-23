<?php

namespace App\Livewire\CMS;

use App\Models\Blog;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ManageBlogs extends Component
{
    use WithPagination, WithNotification, WithFileUploads;

    public $blogId;
    public $title;
    public $description;
    public $image;
    public $newImage;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => $this->isEditing ? 'nullable|string' : 'required|string',
            'newImage' => $this->isEditing ? 'nullable|image|max:1024' : 'required|image|max:1024',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog) {
            $this->isEditing = true;
            $this->blogId = $id;
            $this->title = $blog->title;
            $this->description = $blog->description;
            $this->image = $blog->image;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->blogId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $blog = Blog::findOrFail($this->blogId);

        if ($blog) {
            $blog->delete();
            $this->notifySuccess('Blog deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['blogId', 'title', 'description', 'image', 'newImage']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->newImage) {
                $imagePath = $this->newImage->store('blogs', 'public');
            }

            if ($this->isEditing) {
                $blog = Blog::findOrFail($this->blogId);
                $blog->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $this->newImage ? $imagePath : $this->image,
                ]);

                $this->notifySuccess('Blog updated successfully.');
            } else {
                Blog::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath,
                ]);

                $this->notifySuccess('Blog created successfully.');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $blogs = Blog::when($this->searchTerm, function($query) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-blogs', [
            'blogs' => $blogs
        ]);
    }
}