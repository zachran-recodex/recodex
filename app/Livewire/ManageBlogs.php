<?php

namespace App\Livewire;

use App\Models\Blog;
use App\WithNotification;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageBlogs extends Component
{
    use WithNotification, WithPagination;

    // Form Properties
    public $blog_id;
    public $title;
    public $description;
    public $author;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
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
            $this->author = $blog->author;

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
            $blog->delete();
            $this->notifySuccess('Blog deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['blog_id', 'title', 'description', 'author']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $blog = Blog::findOrFail($this->blog_id);

                $blog->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'author' => $this->author,
                ]);
                $this->notifySuccess('Blog updated successfully');
            } else {
                Blog::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'author' => $this->author,
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
