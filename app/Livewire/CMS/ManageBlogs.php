<?php

namespace App\Livewire\CMS;

use App\Models\Blog;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManageBlogs extends Component
{
    use WithPagination;
    use WithNotification;
    use WithFileUploads;

    // Form Properties
    public $blog_id;
    public $title;
    public $description;
    public $image;
    public $existing_image;

    // Track active modal
    public $activeModal = null;

    /**
     * Define validation rules for blog form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->blog_id = null;
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->existing_image = null;
        $this->resetValidation();
    }

    /**
     * Unified modal control method
     *
     * @param string $modalName The name of the modal to show
     * @param bool $show Whether to show or hide the modal
     * @return void
     */
    public function toggleModal(string $modalName, bool $show = true)
    {
        if ($show) {
            $this->activeModal = $modalName;
            $this->modal($modalName)->show();
        } else {
            $this->activeModal = null;
            $this->modal($modalName)->close();
        }
    }

    /**
     * Initialize create blog form
     * Resets form fields and opens the form modal
     *
     * @return void
     */
    public function create()
    {
        $this->resetInputFields();
        $this->toggleModal('form');
    }

    /**
     * Load blog data for editing
     * Populates form fields with existing blog data
     *
     * @param int $id Blog ID to edit
     * @return void
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $this->blog_id = $id;
        $this->title = $blog->title;
        $this->description = $blog->description;
        $this->existing_image = $blog->image;

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the blog ID for deletion and opens confirmation modal
     *
     * @param int $id Blog ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->blog_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update blog data
     * Validates input and saves blog information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $data = [
                'title' => $this->title,
                'description' => $this->description,
            ];

            if ($this->image) {
                try {
                    // Delete old file if editing
                    if ($this->blog_id && $this->existing_image) {
                        Storage::delete('public/' . $this->existing_image);
                    }

                    $imagePath = $this->image->store('blogs', 'public');
                    $data['image'] = str_replace('public/', '', $imagePath);
                } catch (\Exception $e) {
                    $this->notifyError('Error uploading image: ' . $e->getMessage());
                    return;
                }
            }

            if ($this->blog_id) {
                // Update existing blog
                $blog = Blog::find($this->blog_id);
                $blog->update($data);
                $this->notifySuccess('Blog updated successfully.');
            } else {
                // Create new blog
                Blog::create($data);
                $this->notifySuccess('Blog created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete blog record
     * Removes blog and associated image file from storage
     *
     * @return void
     */
    public function deleteBlog()
    {
        try {
            $blog = Blog::find($this->blog_id);

            if ($blog) {
                // Delete image file if exists
                if ($blog->image) {
                    try {
                        Storage::delete('public/' . $blog->image);
                    } catch (\Exception $e) {
                        // Log error but continue with deletion
                        Log::error('Failed to delete blog image: ' . $e->getMessage());
                    }
                }

                $blog->delete();
                $this->notifySuccess('Blog deleted successfully.');
            }

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Fetches paginated blogs and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $blogs = Blog::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-blogs', compact('blogs'));
    }
}
