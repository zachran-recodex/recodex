<?php

namespace App\Livewire;

use App\Models\Testimonial;
use App\WithNotification;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageTestimonials extends Component
{
    use WithNotification, WithPagination;

    // Form Properties
    public $testimonial_id;
    public $title;
    public $description;
    public $rating = 10;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:0|max:10',
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
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial) {
            $this->isEditing = true;
            $this->testimonial_id = $id;
            $this->title = $testimonial->title;
            $this->description = $testimonial->description;
            $this->rating = $testimonial->rating;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->testimonial_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $testimonial = Testimonial::findOrFail($this->testimonial_id);

        if ($testimonial) {
            $testimonial->delete();
            $this->notifySuccess('Testimonial deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['testimonial_id', 'title', 'description', 'rating']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $testimonial = Testimonial::findOrFail($this->testimonial_id);

                $testimonial->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'rating' => $this->rating,
                ]);
                $this->notifySuccess('Testimonial updated successfully');
            } else {
                Testimonial::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'rating' => $this->rating,
                ]);
                $this->notifySuccess('Testimonial created successfully');
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
        $testimonials = Testimonial::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-testimonials', [
            'testimonials' => $testimonials
        ]);
    }
}
