<?php

namespace App\Livewire\CMS;

use App\Models\Service;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManageServices extends Component
{
    use WithPagination;
    use WithFileUploads;
    use WithNotification;

    // Form Properties
    public $service_id;
    public $icon;
    public $image;
    public $existing_image;
    public $title;
    public $description;

    // Track active modal
    public $activeModal = null;

    /**
     * Define validation rules for service form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->service_id = null;
        $this->icon = '';
        $this->image = null;
        $this->existing_image = null;
        $this->title = '';
        $this->description = '';
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
     * Initialize create service form
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
     * Load service data for editing
     * Populates form fields with existing service data
     *
     * @param int $id Service ID to edit
     * @return void
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $this->service_id = $id;
        $this->icon = $service->icon;
        $this->existing_image = $service->image;
        $this->title = $service->title;
        $this->description = $service->description;

        $this->toggleModal('form');
    }

    /**
     * Store or update service data
     * Validates input and saves service information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $data = [
                'icon' => $this->icon,
                'title' => $this->title,
                'description' => $this->description,
            ];

            // Handle file upload if present
            if ($this->image) {
                try {
                    // Delete old file if editing
                    if ($this->service_id && $this->existing_image) {
                        Storage::delete('public/' . $this->existing_image);
                    }

                    $imagePath = $this->image->store('services', 'public');
                    $data['image'] = str_replace('public/', '', $imagePath);
                } catch (\Exception $e) {
                    $this->notifyError('Error uploading image: ' . $e->getMessage());
                    return;
                }
            }

            if ($this->service_id) {
                // Update existing service
                $service = Service::find($this->service_id);
                $service->update($data);
                $this->notifySuccess('Service updated successfully.');
            } else {
                // Create new service
                Service::create($data);
                $this->notifySuccess('Service created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Show delete confirmation modal
     * Sets the service ID for deletion and opens confirmation modal
     *
     * @param int $id Service ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->service_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Delete service record
     * Removes service and associated logo file from storage
     *
     * @return void
     */
    public function deleteService()
    {
        try{
            $service = Service::find($this->service_id);

            if ($service) {
                // Delete image file if exists
                if ($service->image) {
                    try {
                        Storage::delete('public/' . $service->image);
                    } catch (\Exception $e) {
                        // Log error but continue with deletion
                        Log::error('Failed to delete service image: ' . $e->getMessage());
                    }
                }

                $service->delete();
                $this->notifySuccess('Service deleted successfully.');
            }

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Get available icon options from blade components
     * Scans the flux/icon directory for blade components and returns their names
     * Falls back to default icons if directory is inaccessible or on error
     *
     * @return array List of available icon names
     */
    public function getIconOptions()
    {
        try {
            // Define path to icon blade components
            $iconPath = resource_path('views/flux/icon/*.blade.php');
            $iconFiles = glob($iconPath);

            // If directory is not found or inaccessible
            if ($iconFiles === false) {
                return [
                    'user', 'home', 'settings', 'mail', 'bell',
                    'calendar', 'chart', 'document', 'folder', 'image'
                ]; // Default icons as fallback
            }

            // Process icon files:
            // 1. Map: Extract filename without extension
            // 2. Filter: Remove 'index' from the list
            // 3. Values: Reset array keys
            return collect($iconFiles)->map(function ($file) {
                return basename($file, '.blade.php');
            })->filter(function ($icon) {
                return $icon !== 'index';
            })->values()->all();
        } catch (\Exception $e) {
            // Log error for debugging purposes
            Log::error('Error loading icon options: ' . $e->getMessage());

            // Return default icons as fallback
            return [
                'user', 'home', 'settings', 'mail', 'bell',
                'calendar', 'chart', 'document', 'folder', 'image'
            ];
        }
    }

    /**
     * Render component view
     * Fetches paginated projects and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $services = Service::orderBy('created_at', 'desc')
            ->paginate(10);

        $iconOptions = $this->getIconOptions();

        return view('livewire.cms.manage-services', compact('services','iconOptions'));
    }
}
