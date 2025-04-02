<?php

namespace App\Livewire\CMS;

use App\Models\Faq;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithPagination;

class ManageFaqs extends Component
{
    use WithPagination;
    use WithNotification;

    // Form Properties
    public $faq_id;
    public $question;
    public $answer;

    // Track active modal
    public $activeModal = null;

    /**
     * Define validation rules for faq form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ];
    }

    /**
     * Reset all form input fields and validation state
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->faq_id = null;
        $this->question = '';
        $this->answer = '';
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
     * Initialize create faq form
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
     * Load faq data for editing
     * Populates form fields with existing faq data
     *
     * @param int $id Faq ID to edit
     * @return void
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $this->faq_id = $id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;

        $this->toggleModal('form');
    }

    /**
     * Show delete confirmation modal
     * Sets the faq ID for deletion and opens confirmation modal
     *
     * @param int $id Faq ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->faq_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Store or update faq data
     * Validates input and saves faq information to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        try {
            $data = [
                'question' => $this->question,
                'answer' => $this->answer,
            ];

            if ($this->faq_id) {
                // Update existing faq
                $faq = Faq::find($this->faq_id);
                $faq->update($data);
                $this->notifySuccess('Faq updated successfully.');
            } else {
                // Create new faq
                Faq::create($data);
                $this->notifySuccess('Faq created successfully.');
            }

            $this->toggleModal('form', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete faq record
     *
     * @return void
     */
    public function deleteFaq()
    {
        try {
            $faq = Faq::find($this->faq_id);

            $faq->delete();
            $this->notifySuccess('Faq deleted successfully.');

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Delete operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Fetches paginated faqs and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $faqs = Faq::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-faqs', compact('faqs'));
    }
}
