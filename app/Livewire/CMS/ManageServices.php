<?php

namespace App\Livewire\CMS;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageServices extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Form properties
    public $serviceId;
    public $title;
    public $slug;
    public $subtitle;
    public $description;
    public $content;
    public $icon;
    public $image;
    public $content_image;
    public $current_image;
    public $current_content_image;
    public $feature_list = [];
    public $is_active = true;
    public $sort_order = 0;

    // UI state
    public $isOpen = false;
    public $confirmingServiceDeletion = false;
    public $serviceIdBeingDeleted;

    // Feature list management
    public $feature_categories = [];
    public $new_category_title = '';
    public $new_point = '';
    public $selected_category_index = null;

    // Search and filter
    public $search = '';
    public $sortField = 'sort_order';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'sort_order'],
        'sortDirection' => ['except' => 'asc'],
    ];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'slug' => 'nullable|max:255',
        'subtitle' => 'nullable|max:255',
        'description' => 'required',
        'content' => 'nullable',
        'icon' => 'nullable|max:255',
        'image' => 'nullable|image|max:1024',
        'content_image' => 'nullable|image|max:1024',
        'is_active' => 'boolean',
        'sort_order' => 'integer|min:0',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function resetInputFields()
    {
        $this->reset([
            'serviceId',
            'title',
            'slug',
            'subtitle',
            'description',
            'content',
            'icon',
            'image',
            'current_image',
            'content_image',
            'current_content_image',
            'feature_list',
            'is_active',
            'sort_order',
            'feature_categories',
            'new_category_title',
            'new_point',
            'selected_category_index'
        ]);

        $this->is_active = true;
        $this->sort_order = Service::max('sort_order') + 1 ?? 0;
        $this->feature_categories = [];

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $this->serviceId = $id;
        $this->title = $service->title;
        $this->slug = $service->slug;
        $this->subtitle = $service->subtitle;
        $this->description = $service->description;
        $this->content = $service->content;
        $this->icon = $service->icon;
        $this->current_image = $service->image_path;
        $this->current_content_image = $service->content_image_path;
        $this->is_active = $service->is_active;
        $this->sort_order = $service->sort_order;

        // Handle feature list
        if (is_array($service->feature_list)) {
            $this->feature_categories = $service->feature_list;
        } else {
            $this->feature_categories = [];
        }

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'slug' => $this->slug ?: Str::slug($this->title),
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'content' => $this->content,
            'icon' => $this->icon,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Handle image upload
        if ($this->image) {
            $imagePath = $this->image->store('services', 'public');
            $data['image_path'] = str_replace('public/', '', $imagePath);

            // Remove old image if exists
            if ($this->serviceId && $this->current_image) {
                Storage::delete('public/' . $this->current_image);
            }
        }

        // Handle content image upload
        if ($this->content_image) {
            $contentImagePath = $this->content_image->store('services', 'public');
            $data['content_image_path'] = str_replace('public/', '', $contentImagePath);

            // Remove old content image if exists
            if ($this->serviceId && $this->current_content_image) {
                Storage::delete('public/' . $this->current_content_image);
            }
        }

        // Process feature list
        if (!empty($this->feature_categories)) {
            $data['feature_list'] = $this->feature_categories;
        } else {
            $data['feature_list'] = null;
        }

        // Create or update service
        if ($this->serviceId) {
            $service = Service::findOrFail($this->serviceId);
            $service->update($data);
            session()->flash('message', 'Service updated successfully.');
        } else {
            Service::create($data);
            session()->flash('message', 'Service created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmServiceDeletion($id)
    {
        $this->confirmingServiceDeletion = true;
        $this->serviceIdBeingDeleted = $id;
    }

    public function deleteService()
    {
        $service = Service::findOrFail($this->serviceIdBeingDeleted);

        // Delete associated image if exists
        if ($service->image_path) {
            Storage::delete('public/' . $service->image_path);
        }

        // Delete associated content image if exists
        if ($service->content_image_path) {
            Storage::delete('public/' . $service->content_image_path);
        }

        $service->delete();
        $this->confirmingServiceDeletion = false;
        session()->flash('message', 'Service deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingServiceDeletion = false;
        $this->serviceIdBeingDeleted = null;
    }

    // Feature list management
    public function addCategory()
    {
        if (empty($this->new_category_title)) {
            return;
        }

        $this->feature_categories[] = [
            'title' => $this->new_category_title,
            'points' => []
        ];

        $this->new_category_title = '';
        $this->selected_category_index = count($this->feature_categories) - 1;
    }

    public function selectCategory($index)
    {
        $this->selected_category_index = $index;
    }

    public function removeCategory($index)
    {
        unset($this->feature_categories[$index]);
        $this->feature_categories = array_values($this->feature_categories);

        if ($this->selected_category_index === $index) {
            $this->selected_category_index = null;
        } elseif ($this->selected_category_index > $index) {
            $this->selected_category_index--;
        }
    }

    public function addPoint()
    {
        if ($this->selected_category_index === null || empty($this->new_point)) {
            return;
        }

        $this->feature_categories[$this->selected_category_index]['points'][] = $this->new_point;
        $this->new_point = '';
    }

    public function removePoint($categoryIndex, $pointIndex)
    {
        unset($this->feature_categories[$categoryIndex]['points'][$pointIndex]);
        $this->feature_categories[$categoryIndex]['points'] = array_values($this->feature_categories[$categoryIndex]['points']);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $services = Service::query()
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.cms.manage-services', [
            'services' => $services
        ]);
    }
}
