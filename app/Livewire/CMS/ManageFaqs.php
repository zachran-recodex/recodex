<?php

namespace App\Livewire\CMS;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithPagination;

class ManageFaqs extends Component
{
    use WithPagination;

    // Form properties
    public $faqId;
    public $question;
    public $answer;
    public $is_active = true;
    public $sort_order = 0;

    // UI state
    public $isOpen = false;
    public $confirmingFaqDeletion = false;
    public $faqIdBeingDeleted;

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
        'question' => 'required|string',
        'answer' => 'required|string',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->reset([
            'faqId',
            'question',
            'answer',
        ]);

        $this->is_active = true;
        $this->sort_order = Faq::max('sort_order') + 1 ?? 0;

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
        $faq = Faq::findOrFail($id);
        $this->faqId = $id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->is_active = $faq->is_active;
        $this->sort_order = $faq->sort_order;

        $this->openModal();
    }


    public function store()
    {
        $this->validate();

        $data = [
            'question' => $this->question,
            'answer' => $this->answer,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];

        // Create or update faq
        if ($this->faqId) {
            $faq = Faq::findOrFail($this->faqId);
            $faq->update($data);
            session()->flash('message', 'FAQ updated successfully.');
        } else {
            Faq::create($data);
            session()->flash('message', 'FAQ created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate();

        if ($this->faqId) {
            $faq = Faq::findOrFail($this->faqId);
            $faq->update([
                'question' => $this->question,
                'answer' => $this->answer,
                'is_active' => $this->is_active,
                'sort_order' => $this->sort_order,
            ]);

            session()->flash('message', 'FAQ successfully updated.');

            $this->closeFormModal();
            $this->resetInputFields();
        }
    }

    public function confirmFaqDeletion($id)
    {
        $this->confirmingFaqDeletion = true;
        $this->faqIdBeingDeleted = $id;
    }

    public function deleteFaq()
    {
        $faq = Faq::findOrFail($this->faqIdBeingDeleted);

        $faq->delete();
        $this->confirmingFaqDeletion = false;
        session()->flash('message', 'FAQ deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingFaqDeletion = false;
        $this->faqIdBeingDeleted = null;
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
        $faqs = Faq::query()
            ->when($this->search, function($query) {
                return $query->where('question', 'like', '%' . $this->search . '%')
                    ->orWhere('answer', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.cms.manage-faqs', [
            'faqs' => $faqs
        ]);
    }
}
