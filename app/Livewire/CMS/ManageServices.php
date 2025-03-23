<?php

namespace App\Livewire\CMS;

use App\Models\Service;
use App\WithNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageServices extends Component
{
    use WithNotification, WithFileUploads, WithPagination;

    // Form Properties
    public $service_id;
    public $title;
    public $description;
    public $icon;
    public $image;
    public $temp_image;
    public $imagePreview;

    // UI State Properties
    public $isEditing = false;

    // Validation rules
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
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
        $this->modal('form')->close();
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        if ($service) {
            $this->isEditing = true;
            $this->service_id = $id;

            $this->title = $service->title;
            $this->description = $service->description;
            $this->icon = $service->icon;
            $this->image = $service->image;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->service_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $service = Service::findOrFail($this->service_id);

        if ($service) {
            // Delete the associated image
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $service->delete();
            $this->notifySuccess('Service deleted successfully');

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
        $this->reset(['service_id', 'title', 'description', 'icon', 'temp_image', 'imagePreview']);
        $this->resetValidation();
    }

    private function handleImageUpload()
    {
        if (!$this->temp_image) {
            return null;
        }

        return $this->temp_image->store('services', 'public');
    }

    private function deleteOldImage($service)
    {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }
    }

    public function save()
    {
        $this->validate();

        // Validasi tambahan untuk icon
        $iconOptions = $this->getIconOptions();
        if (!$this->isValidIcon($this->icon, $iconOptions)) {
            $this->addError('icon', 'Please select a valid icon');
            return;
        }

        try {
            DB::beginTransaction();

            $imagePath = $this->handleImageUpload();

            if ($this->isEditing) {
                $service = Service::findOrFail($this->service_id);

                if ($this->temp_image) {
                    $this->deleteOldImage($service);
                }

                $service->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'icon' => $this->icon,
                    'image' => $imagePath ?? $this->image,
                ]);
                $this->notifySuccess('Service updated successfully');
            } else {
                Service::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'icon' => $this->icon,
                    'image' => $imagePath,
                ]);
                $this->notifySuccess('Service created successfully');
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

    public function getIconOptions()
    {
        try {
            $iconPath = resource_path('views/flux/icon/*.blade.php');
            $iconFiles = glob($iconPath);

            // Jika direktori tidak ditemukan atau tidak bisa diakses
            if ($iconFiles === false) {
                return [
                    'user', 'home', 'settings', 'mail', 'bell',
                    'calendar', 'chart', 'document', 'folder', 'image'
                ]; // Default icons sebagai fallback
            }

            return collect($iconFiles)->map(function ($file) {
                return basename($file, '.blade.php');
            })->filter(function ($icon) {
                return $icon !== 'index';
            })->values()->all();
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error loading icon options: ' . $e->getMessage());

            // Return default icons sebagai fallback
            return [
                'user', 'home', 'settings', 'mail', 'bell',
                'calendar', 'chart', 'document', 'folder', 'image'
            ];
        }
    }

    // Fungsi untuk memvalidasi icon
    private function isValidIcon($icon, $validIcons)
    {
        // Cek apakah icon adalah string valid dan bukan path file
        if (!is_string($icon) || strpos($icon, '/') !== false || strpos($icon, '.') !== false) {
            return false;
        }

        return in_array($icon, $validIcons);
    }

    public function render()
    {
        $services = Service::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-services', [
            'services' => $services,
            'iconOptions' => $this->getIconOptions(),
            'getSafeIcon' => function($iconName) {
                // Validasi dan sanitasi nama icon
                $validIcons = $this->getIconOptions();
                if (!is_string($iconName) || strpos($iconName, '/') !== false ||
                    strpos($iconName, '.') !== false || !in_array($iconName, $validIcons)) {
                    return 'document'; // Icon fallback
                }
                return $iconName;
            }
        ]);
    }
}
