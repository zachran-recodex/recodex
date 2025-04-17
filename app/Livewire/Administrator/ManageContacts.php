<?php

namespace App\Livewire\Administrator;

use Livewire\Component;
use App\Models\Contact;
use App\WithNotification;
use Livewire\WithPagination;

class ManageContacts extends Component
{
    use WithNotification;
    use WithPagination;

    public $contact_id;

    // Track active modal
    public $activeModal = null;

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
     * Show delete confirmation modal
     * Sets the contact ID for deletion and opens confirmation modal
     *
     * @param int $id Contact ID to delete
     * @return void
     */
    public function confirmDelete($id)
    {
        $this->contact_id = $id;
        $this->toggleModal('delete');
    }

    /**
     * Delete contact record
     *
     * @return void
     */
    public function delete()
    {
        try {
            $contact = Contact::find($this->contact_id);
            $contact->delete();
            $this->notifySuccess('Kontak berhasil dihapus!');

            $this->toggleModal('delete', false);
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->notifyError('Gagal menghapus: ' . $e->getMessage());
        }
    }

    /**
     * Mark contact as read
     *
     * @param int $id Contact ID to mark as read
     * @return void
     */
    public function markAsRead($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->update(['is_read' => true]);
            $this->notifySuccess('Kontak berhasil ditandai sebagai dibaca!');
        } catch (\Exception $e) {
            $this->notifyError('Gagal menandai kontak: ' . $e->getMessage());
        }
    }

    /**
     * Reset input fields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->contact_id = null;
    }

    /**
     * Render component view
     * Fetches paginated contacts and renders the component template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.administrator.manage-contacts', [
            'contacts' => Contact::latest()
                ->paginate(10)
        ]);
    }
}
