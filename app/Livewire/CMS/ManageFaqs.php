<?php

namespace App\Livewire\CMS;

use App\Models\Faq;
use App\WithNotification;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ManageFaqs extends Component
{
    use WithNotification, WithPagination;

    // Form Properties
    public $faq_id;
    public $question;
    public $answer;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'question' => 'required|string',
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
            $this->faq_id = $id;
            $this->question = $faq->question;
            $this->answer = $faq->answer;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->faq_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $faq = Faq::findOrFail($this->faq_id);

        if ($faq) {
            $faq->delete();
            $this->notifySuccess('FAQ deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['faq_id', 'question', 'answer']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $faq = Faq::findOrFail($this->faq_id);
                $faq->update([
                    'question' => $this->question,
                    'answer' => $this->answer,
                ]);
                $this->notifySuccess('FAQ updated successfully');
            } else {
                Faq::create([
                    'question' => $this->question,
                    'answer' => $this->answer,
                ]);
                $this->notifySuccess('FAQ created successfully');
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

    public function render()
    {
        $faqs = Faq::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-faqs', [
            'faqs' => $faqs
        ]);
    }
}
