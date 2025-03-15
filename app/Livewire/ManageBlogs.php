<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManageBlogs extends Component
{
    use WithNotification, WithFileUploads, WithPagination;

    // Form Properties
    public $blog_id;
    public $title;
    public $description;
    public $image;
    public $temp_image;
    public $imagePreview;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'temp_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:min_width=100,min_height=100',
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
            $this->blog_id = $id;
            $this->title = $blog->title;
            $this->description = $blog->description;
            $this->image = $blog->image;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->blog_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $blog = Blog::findOrFail($this->blog_id);

        if ($blog) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->delete();
            $this->notifySuccess('Blog deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function updatedTempImage()
    {
        try {
            if ($this->temp_image) {
                $this->imagePreview = $this->temp_image->temporaryUrl();
            }
        } catch (\Exception $e) {
            // Handle the error if needed
        }
    }

    public function resetForm()
    {
        $this->reset(['blog_id', 'title', 'description', 'temp_image', 'imagePreview']);
        $this->resetValidation();
    }

    private function handleImageUpload()
    {
        if (!$this->temp_image) {
            return null;
        }

        return $this->temp_image->store('blogs', 'public');
    }

    private function deleteOldImage($blog)
    {
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $imagePath = $this->handleImageUpload();

            if ($this->isEditing) {
                $blog = Blog::findOrFail($this->blog_id);

                if ($this->temp_image) {
                    $this->deleteOldImage($blog);
                }

                $blog->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath ?? $this->image,
                ]);
                $this->notifySuccess('Blog updated successfully');
            } else {
                Blog::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath,
                ]);
                $this->notifySuccess('Blog created successfully');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $this->notifyError('Database error occurred: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $blogs = Blog::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-blogs', [
            'blogs' => $blogs
        ]);
    }
}
