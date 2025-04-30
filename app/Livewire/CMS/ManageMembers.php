<?php

namespace App\Livewire\CMS;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageMembers extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Form properties
    public $memberId;
    public $name;
    public $slug;
    public $position;
    public $description;
    public $photo;
    public $current_photo;
    public $social_links = [
        'twitter' => '',
        'facebook' => '',
        'instagram' => '',
        'linkedin' => ''
    ];
    public $is_active = true;
    public $sort_order = 0;

    // UI state
    public $isOpen = false;
    public $confirmingMemberDeletion = false;
    public $memberIdBeingDeleted;

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
        'name' => 'required|string|max:255',
        'slug' => 'nullable|max:255',
        'position' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'photo' => 'nullable|image|max:1024',
        'social_links.twitter' => 'nullable|url',
        'social_links.facebook' => 'nullable|url',
        'social_links.instagram' => 'nullable|url',
        'social_links.linkedin' => 'nullable|url',
        'is_active' => 'boolean',
        'sort_order' => 'integer|min:0',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    private function resetInputFields()
    {
        $this->reset([
            'memberId',
            'name',
            'slug',
            'position',
            'description',
            'photo',
            'current_photo',
            'social_links',
            'is_active',
            'sort_order',
        ]);

        $this->social_links = [
            'twitter' => '',
            'facebook' => '',
            'instagram' => '',
            'linkedin' => ''
        ];
        $this->is_active = true;
        $this->sort_order = Member::max('sort_order') + 1 ?? 0;

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
        $member = Member::findOrFail($id);
        $this->memberId = $id;
        $this->name = $member->name;
        $this->slug = $member->slug;
        $this->position = $member->position;
        $this->description = $member->description;
        $this->current_photo = $member->photo_path;
        $this->social_links = $member->social_links ?: [
            'twitter' => '',
            'facebook' => '',
            'instagram' => '',
            'linkedin' => ''
        ];
        $this->is_active = $member->is_active;
        $this->sort_order = $member->sort_order;

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug ?: Str::slug($this->name),
            'position' => $this->position,
            'description' => $this->description,
            'social_links' => $this->social_links,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Handle photo upload
        if ($this->photo) {
            $photoPath = $this->photo->store('members', 'public');
            $data['photo_path'] = $photoPath;

            // Remove old photo if exists
            if ($this->memberId && $this->current_photo) {
                Storage::delete('public/' . $this->current_photo);
            }
        }

        // Create or update member
        if ($this->memberId) {
            $member = Member::findOrFail($this->memberId);
            $member->update($data);
            session()->flash('message', 'Team member updated successfully.');
        } else {
            Member::create($data);
            session()->flash('message', 'Team member created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmMemberDeletion($id)
    {
        $this->confirmingMemberDeletion = true;
        $this->memberIdBeingDeleted = $id;
    }

    public function deleteMember()
    {
        $member = Member::findOrFail($this->memberIdBeingDeleted);

        // Delete associated photo if exists
        if ($member->photo_path) {
            Storage::delete('public/' . $member->photo_path);
        }

        $member->delete();
        $this->confirmingMemberDeletion = false;
        session()->flash('message', 'Team member deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingMemberDeletion = false;
        $this->memberIdBeingDeleted = null;
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
        $members = Member::query()
            ->when($this->search, function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('position', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.cms.manage-members', [
            'members' => $members
        ]);
    }
}
