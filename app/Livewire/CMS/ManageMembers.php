<?php

namespace App\Livewire\CMS;

use App\Models\Member;
use App\WithNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageMembers extends Component
{
    use WithNotification, WithFileUploads, WithPagination;

    // Form Properties
    public $member_id;
    public $name;
    public $position;
    public $qualification;
    public $attribute;
    public $skill;
    public $photo;
    public $temp_photo;
    public $photoPreview;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'attribute' => 'nullable|string',
            'skill' => 'nullable|string',
            'temp_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:min_width=100,min_height=100',
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
        $member = Member::findOrFail($id);

        if ($member) {
            $this->isEditing = true;
            $this->member_id = $id;
            $this->name = $member->name;
            $this->position = $member->position;
            $this->qualification = $member->qualification;
            $this->attribute = $member->attribute;
            $this->skill = $member->skill;
            $this->photo = $member->photo;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->member_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $member = Member::findOrFail($this->member_id);

        if ($member) {
            if ($member->photo && Storage::disk('public')->exists($member->photo)) {
                Storage::disk('public')->delete($member->photo);
            }

            $member->delete();
            $this->notifySuccess('Member deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function updatedTempPhoto()
    {
        try {
            if ($this->temp_photo) {
                $this->photoPreview = $this->temp_photo->temporaryUrl();
            }
        } catch (\Exception $e) {
            // Handle the error if needed
        }
    }

    public function resetForm()
    {
        $this->reset(['member_id', 'name', 'position', 'qualification', 'attribute', 'skill', 'temp_photo', 'photoPreview']);
        $this->resetValidation();
    }

    private function handlePhotoUpload()
    {
        if (!$this->temp_photo) {
            return null;
        }

        return $this->temp_photo->store('members', 'public');
    }

    private function deleteOldPhoto($member)
    {
        if ($member->photo && Storage::disk('public')->exists($member->photo)) {
            Storage::disk('public')->delete($member->photo);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $photoPath = $this->handlePhotoUpload();

            if ($this->isEditing) {
                $member = Member::findOrFail($this->member_id);

                if ($this->temp_photo) {
                    $this->deleteOldPhoto($member);
                }

                $member->update([
                    'name' => $this->name,
                    'position' => $this->position,
                    'qualification' => $this->qualification,
                    'attribute' => $this->attribute,
                    'skill' => $this->skill,
                    'photo' => $photoPath ?? $this->photo,
                ]);
                $this->notifySuccess('Member updated successfully');
            } else {
                Member::create([
                    'name' => $this->name,
                    'position' => $this->position,
                    'qualification' => $this->qualification,
                    'attribute' => $this->attribute,
                    'skill' => $this->skill,
                    'photo' => $photoPath,
                ]);
                $this->notifySuccess('Member created successfully');
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
        $members = Member::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cms.manage-members', [
            'members' => $members
        ]);
    }
}
