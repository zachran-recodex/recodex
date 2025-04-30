<?php

namespace App\Livewire\CMS;

use App\Models\WorkProcess;
use Livewire\Component;
use Livewire\WithPagination;

class ManageWorkProcesses extends Component
{
    use WithPagination;

    // Form properties
    public $processId;
    public $title;
    public $description;
    public $is_active = true;
    public $sort_order = 0;

    // UI state
    public $isOpen = false;
    public $confirmingProcessDeletion = false;
    public $processIdBeingDeleted;

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
        'description' => 'required|string',
        'is_active' => 'boolean',
        'sort_order' => 'integer|min:0',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->reset([
            'processId',
            'title',
            'description',
        ]);

        $this->is_active = true;
        $this->sort_order = WorkProcess::max('sort_order') + 1 ?? 0;

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
        $process = WorkProcess::findOrFail($id);
        $this->processId = $id;
        $this->title = $process->title;
        $this->description = $process->description;
        $this->is_active = $process->is_active;
        $this->sort_order = $process->sort_order;

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Create or update process
        if ($this->processId) {
            $process = WorkProcess::findOrFail($this->processId);
            $process->update($data);
            session()->flash('message', 'Work Process updated successfully.');
        } else {
            WorkProcess::create($data);
            session()->flash('message', 'Work Process created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmProcessDeletion($id)
    {
        $this->confirmingProcessDeletion = true;
        $this->processIdBeingDeleted = $id;
    }

    public function deleteProcess()
    {
        $process = WorkProcess::findOrFail($this->processIdBeingDeleted);

        $process->delete();
        $this->confirmingProcessDeletion = false;
        session()->flash('message', 'Work Process deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingProcessDeletion = false;
        $this->processIdBeingDeleted = null;
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
        $processes = WorkProcess::query()
            ->when($this->search, function($query) {
                return $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.cms.manage-work-processes', [
            'processes' => $processes
        ]);
    }
}
