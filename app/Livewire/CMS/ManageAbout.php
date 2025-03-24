<?php

namespace App\Livewire\CMS;

use App\Models\About;
use Livewire\Component;
use App\WithNotification;
use Illuminate\Support\Facades\DB;

class ManageAbout extends Component
{
    use WithNotification;

    public $aboutId;
    public $title;
    public $description;
    public $vision;
    public $mission = [];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|array|min:1',
            'mission.*' => 'required|string',
        ];
    }

    public function mount()
    {
        $about = About::first();
        if ($about) {
            $this->aboutId = $about->id;
            $this->title = $about->title;
            $this->description = $about->description;
            $this->vision = $about->vision;
            $this->mission = $about->mission;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addMission()
    {
        $this->mission[] = '';
    }

    public function removeMission($index)
    {
        unset($this->mission[$index]);
        $this->mission = array_values($this->mission);
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $data = [
                'title' => $this->title,
                'description' => $this->description,
                'vision' => $this->vision,
                'mission' => array_values($this->mission),
            ];

            if ($this->aboutId) {
                About::findOrFail($this->aboutId)->update($data);
                $this->notifySuccess('About page updated successfully.');
            } else {
                $about = About::create($data);
                $this->aboutId = $about->id;
                $this->notifySuccess('About page created successfully.');
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.cms.manage-about');
    }
}
