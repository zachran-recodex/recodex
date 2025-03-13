<?php

namespace App\Livewire;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use App\WithNotification;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManagePortfolios extends Component
{
    use WithNotification, WithFileUploads, WithPagination;

    // Form Properties
    public $portfolio_id;
    public $title;
    public $description;
    public $project_date;
    public $duration;
    public $cost;
    public $image;
    public $temp_image;
    public $imagePreview;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_date' => 'required|date',
            'duration' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'temp_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024|dimensions:min_width=100,min_height=100',
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
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio) {
            $this->isEditing = true;
            $this->portfolio_id = $id;
            $this->title = $portfolio->title;
            $this->description = $portfolio->description;
            $this->project_date = $portfolio->project_date->format('Y-m-d');
            $this->duration = $portfolio->duration;
            $this->cost = $portfolio->cost;
            $this->image = $portfolio->image;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->portfolio_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $portfolio = Portfolio::findOrFail($this->portfolio_id);

        if ($portfolio) {
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $portfolio->delete();
            $this->notifySuccess('Portfolio deleted successfully');

            $this->modal('delete')->close();
        }
    }

    public function updatedTempImage()
    {
        try {
            if ($this->temp_image) {
                $this->imagePreview = $this->temp_image->temporaryUrl();
            }
        } catch (\Exception $e) {
            // Handle the error if needed
        }
    }

    public function resetForm()
    {
        $this->reset(['portfolio_id', 'title', 'description', 'project_date', 'duration', 'cost', 'temp_image', 'imagePreview']);
        $this->resetValidation();
    }

    private function handleImageUpload()
    {
        if (!$this->temp_image) {
            return null;
        }

        return $this->temp_image->store('portfolios', 'public');
    }

    private function deleteOldImage($portfolio)
    {
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $imagePath = $this->handleImageUpload();

            if ($this->isEditing) {
                $portfolio = Portfolio::findOrFail($this->portfolio_id);

                if ($this->temp_image) {
                    $this->deleteOldImage($portfolio);
                }

                $portfolio->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'project_date' => $this->project_date,
                    'duration' => $this->duration,
                    'cost' => $this->cost,
                    'image' => $imagePath ?? $this->image,
                ]);
                $this->notifySuccess('Portfolio updated successfully');
            } else {
                Portfolio::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'project_date' => $this->project_date,
                    'duration' => $this->duration,
                    'cost' => $this->cost,
                    'image' => $imagePath,
                ]);
                $this->notifySuccess('Portfolio created successfully');
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
        $portfolios = Portfolio::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-portfolios', [
            'portfolios' => $portfolios
        ]);
    }
}