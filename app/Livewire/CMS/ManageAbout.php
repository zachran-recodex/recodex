<?php

namespace App\Livewire\CMS;

use App\Models\About;
use Livewire\Component;

class ManageAbout extends Component
{
    // Form properties
    public $aboutId;
    public $title;
    public $description;
    public $vision;
    public $mission = [];

    // UI state
    public $isOpen = false;
    public $newMissionPoint = '';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'vision' => 'required|string',
        'mission' => 'required|array|min:1',
        'mission.*' => 'required|string',
    ];

    public function mount()
    {
        $this->loadAboutData();
    }

    private function loadAboutData()
    {
        $about = About::first();

        if ($about) {
            $this->aboutId = $about->id;
            $this->title = $about->title;
            $this->description = $about->description;
            $this->vision = $about->vision;
            $this->mission = $about->mission ?? [];
        }
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function addMissionPoint()
    {
        if (empty($this->newMissionPoint)) {
            return;
        }

        $this->mission[] = $this->newMissionPoint;
        $this->newMissionPoint = '';
    }

    public function removeMissionPoint($index)
    {
        unset($this->mission[$index]);
        $this->mission = array_values($this->mission);
    }

    public function update()
    {
        $this->validate();

        $about = About::firstOrNew();
        $about->title = $this->title;
        $about->description = $this->description;
        $about->vision = $this->vision;
        $about->mission = $this->mission;
        $about->save();

        session()->flash('message', 'About information updated successfully.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.cms.manage-about');
    }
}
