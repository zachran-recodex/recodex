<?php

namespace App\Livewire\CMS;

use App\Models\Faq;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageFaqs extends Component
{
    use WithPagination, WithNotification;

    public $faqId;
    public $question;
    public $answer;

    public $isEditing = false;
    public $searchTerm = '';

    protected function rules()
    {
        return [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
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
        $faq = Faq::findOrFail($id);

        if ($faq) {
            $this->isEditing = true;
            $this->faqId = $id;
            $this->question = $faq->question;
            $this->answer = $faq->answer;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->faqId = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $faq = Faq::findOrFail($this->faqId);

        if ($faq) {
            $faq->delete();
            $this->notifySuccess('FAQ deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['faqId', 'question', 'answer']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $faq = Faq::findOrFail($this->faqId);
                $faq->update([
                    'question' => $this->question,
                    'answer' => $this->answer,
                ]);

                $this->notifySuccess('FAQ updated successfully.');
            } else {
                Faq::create([
                    'question' => $this->question,
                    'answer' => $this->answer,
                ]);

                $this->notifySuccess('FAQ created successfully.');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $faqs = Faq::when($this->searchTerm, function($query) {
                $query->where('question', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('answer', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-faqs', [
            'faqs' => $faqs
        ]);
    }
}