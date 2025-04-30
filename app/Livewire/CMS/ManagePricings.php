<?php

namespace App\Livewire\CMS;

use App\Models\Pricing;
use Livewire\Component;
use Livewire\WithPagination;

class ManagePricings extends Component
{
    use WithPagination;

    // Form properties
    public $pricingId;
    public $title;
    public $description;
    public $monthly_price;
    public $quarterly_price;
    public $semiannual_price;
    public $yearly_price;
    public $features = [];
    public $is_active = true;
    public $sort_order = 0;

    // UI state
    public $isOpen = false;
    public $confirmingPricingDeletion = false;
    public $pricingIdBeingDeleted;

    // Feature management
    public $new_feature = '';

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
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'monthly_price' => 'required|numeric|min:0',
        'quarterly_price' => 'required|numeric|min:0',
        'semiannual_price' => 'required|numeric|min:0',
        'yearly_price' => 'required|numeric|min:0',
        'features' => 'nullable|array',
        'is_active' => 'boolean',
        'sort_order' => 'integer|min:0',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->reset([
            'pricingId',
            'title',
            'description',
            'monthly_price',
            'quarterly_price',
            'semiannual_price',
            'yearly_price',
            'features',
            'is_active',
            'sort_order',
            'new_feature'
        ]);

        $this->is_active = true;
        $this->sort_order = Pricing::max('sort_order') + 1 ?? 0;
        $this->features = [];

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
        $pricing = Pricing::findOrFail($id);
        $this->pricingId = $id;
        $this->title = $pricing->title;
        $this->description = $pricing->description;
        $this->monthly_price = $pricing->monthly_price;
        $this->quarterly_price = $pricing->quarterly_price;
        $this->semiannual_price = $pricing->semiannual_price;
        $this->yearly_price = $pricing->yearly_price;
        $this->is_active = $pricing->is_active;
        $this->sort_order = $pricing->sort_order;

        // Handle features
        if (is_array($pricing->features)) {
            $this->features = $pricing->features;
        } else {
            $this->features = [];
        }

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'monthly_price' => $this->monthly_price,
            'quarterly_price' => $this->quarterly_price,
            'semiannual_price' => $this->semiannual_price,
            'yearly_price' => $this->yearly_price,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Process features
        if (!empty($this->features)) {
            $data['features'] = $this->features;
        } else {
            $data['features'] = null;
        }

        // Create or update pricing
        if ($this->pricingId) {
            $pricing = Pricing::findOrFail($this->pricingId);
            $pricing->update($data);
            session()->flash('message', 'Paket harga berhasil diperbarui.');
        } else {
            Pricing::create($data);
            session()->flash('message', 'Paket harga berhasil dibuat.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmPricingDeletion($id)
    {
        $this->confirmingPricingDeletion = true;
        $this->pricingIdBeingDeleted = $id;
    }

    public function deletePricing()
    {
        $pricing = Pricing::findOrFail($this->pricingIdBeingDeleted);
        $pricing->delete();
        $this->confirmingPricingDeletion = false;
        session()->flash('message', 'Paket harga berhasil dihapus.');
    }

    public function cancelDelete()
    {
        $this->confirmingPricingDeletion = false;
        $this->pricingIdBeingDeleted = null;
    }

    // Feature management
    public function addFeature()
    {
        if (empty($this->new_feature)) {
            return;
        }

        $this->features[] = $this->new_feature;
        $this->new_feature = '';
    }

    public function removeFeature($index)
    {
        unset($this->features[$index]);
        $this->features = array_values($this->features);
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
        $pricings = Pricing::query()
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.cms.manage-pricings', [
            'pricings' => $pricings
        ]);
    }
}
