<?php

namespace App\Livewire;

use App\WithNotification;
use Livewire\Component;
use App\Models\About;

class ManageAbout extends Component
{
    use WithNotification;

    public $aboutId;
    public $title;
    public $description;
    public $vision;
    public array $missions = [];

    protected $listeners = ['refreshAbout' => '$refresh'];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'missions' => 'required|array|min:1',
            'missions.*' => 'required|string',
        ];
    }

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
            $this->missions = $about->mission ?? [];
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        try {
            $about = About::updateOrCreate(
                ['id' => $this->aboutId],
                [
                    'title' => $this->title,
                    'description' => $this->description,
                    'vision' => $this->vision,
                    'mission' => $this->missions,
                ]
            );

            $this->aboutId = $about->id;
            $this->notifySuccess('About content successfully updated.');
        } catch (\Exception $e) {
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function addMission()
    {
        $this->missions[] = '';
    }

    public function removeMission($index)
    {
        unset($this->missions[$index]);
        $this->missions = array_values($this->missions);
    }

    public function render()
    {
        return view('livewire.manage-about');
    }
}
