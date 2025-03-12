<?php

namespace App\Livewire;

use App\WithNotification;
use Livewire\Component;
use App\Models\HeroSection;
use Livewire\WithFileUploads;

class ManageHeroSection extends Component
{
    use WithNotification;
    use WithFileUploads;

    public $heroSectionId;
    public $title;
    public $subtitle;
    public $motto;
    public $button_text;
    public $image;
    public $temp_image;

    protected $listeners = ['refreshHeroSection' => '$refresh'];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'motto' => 'required|string',
            'button_text' => 'required|string|max:255',
            'temp_image' => 'nullable|image|max:1024',
        ];
    }

    public function mount()
    {
        $this->loadHeroSectionData();
    }

    private function loadHeroSectionData()
    {
        $heroSection = HeroSection::first();

        if ($heroSection) {
            $this->heroSectionId = $heroSection->id;
            $this->title = $heroSection->title;
            $this->subtitle = $heroSection->subtitle;
            $this->motto = $heroSection->motto;
            $this->button_text = $heroSection->button_text;
            $this->image = $heroSection->image;
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
            $data = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'motto' => $this->motto,
                'button_text' => $this->button_text,
            ];

            if ($this->temp_image) {
                $imagePath = $this->temp_image->store('hero-sections', 'public');
                $data['image'] = $imagePath;
            }

            $heroSection = HeroSection::updateOrCreate(
                ['id' => $this->heroSectionId],
                $data
            );

            $this->heroSectionId = $heroSection->id;
            $this->notifySuccess('Hero section successfully updated.');
        } catch (\Exception $e) {
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.manage-hero-section');
    }
}
