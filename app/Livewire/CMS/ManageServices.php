<?php

namespace App\Livewire\CMS;

use App\Models\Service;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class ManageServices extends Component
{
    use WithPagination, WithFileUploads, WithNotification;

    public $serviceId;
    public $icon;
    public $image;
    public $title;
    public $description;
    public $newImage;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'icon' => 'required|string|max:255',
            'image' => $this->isEditing ? 'nullable|string' : 'required|string',
            'newImage' => $this->isEditing ? 'nullable|image|max:1024' : 'required|image|max:1024',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
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
        $service = Service::findOrFail($id);

        if ($service) {
            $this->isEditing = true;
            $this->serviceId = $id;
            $this->icon = $service->icon;
            $this->image = $service->image;
            $this->title = $service->title;
            $this->description = $service->description;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->serviceId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $service = Service::findOrFail($this->serviceId);

        if ($service) {
            $service->delete();
            $this->notifySuccess('Service deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['serviceId', 'icon', 'image', 'newImage', 'title', 'description']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // Handle image upload
            if ($this->newImage) {
                $imagePath = $this->newImage->store('services', 'public');
            }

            if ($this->isEditing) {
                $service = Service::findOrFail($this->serviceId);
                $service->update([
                    'icon' => $this->icon,
                    'image' => $this->newImage ? $imagePath : $this->image,
                    'title' => $this->title,
                    'description' => $this->description,
                ]);

                $this->notifySuccess('Service updated successfully.');
            } else {
                Service::create([
                    'icon' => $this->icon,
                    'image' => $imagePath,
                    'title' => $this->title,
                    'description' => $this->description,
                ]);

                $this->notifySuccess('Service created successfully.');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

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
        $services = Service::when($this->searchTerm, function($query) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
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
