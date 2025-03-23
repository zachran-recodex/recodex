<?php

namespace App\Livewire\CMS;

use App\Models\Hero;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class ManageHero extends Component
{
    use WithNotification, WithFileUploads;

    #[Validate('required|string|max:255')]
    public $title;
    #[Validate('required|string')]
    public $subtitle;
    #[Validate('required|string|max:255')]
    public $motto;
    #[Validate('required|string|max:255')]
    public $button_text;
    #[Validate('nullable|image|max:2048')]
    public $image;

    public $hero;
    public $currentImage;

    public function mount()
    {
        $this->hero = Hero::first();

        if ($this->hero) {
            $this->title = $this->hero->title;
            $this->subtitle = $this->hero->subtitle;
            $this->motto = $this->hero->motto;
            $this->button_text = $this->hero->button_text;
            $this->currentImage = $this->hero->image;
        }
    }

    public function save()
    {
        $this->validate();

        if (!$this->hero) {
            $this->hero = new Hero();
        }

        if ($this->image) {
            // Delete old image if exists
            if ($this->currentImage) {
                Storage::disk('public')->delete($this->currentImage);
            }

            // Store new image
            $imagePath = $this->image->store('heroes', 'public');
        }

        $this->hero->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'motto' => $this->motto,
            'button_text' => $this->button_text,
            'image' => $this->image ? $imagePath : $this->currentImage,
        ]);

        $this->currentImage = $this->hero->image;
        $this->image = null;

        $this->notifySuccess('Hero section has been updated.');
    }

    public function render()
    {
        return view('livewire.cms.manage-hero');
    }
}
