<?php

namespace App\Livewire\CMS;

use App\Models\Hero;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageHero extends Component
{
    use WithNotification, WithFileUploads;

    public $heroId;
    public $title;
    public $subtitle;
    public $motto;
    public $button_text;
    public $image;
    public $hero;

    public function mount()
    {
        $this->hero = Hero::first();
        $this->image = null; // Initialize $image property
        if ($this->hero) {
            $this->heroId = $this->hero->id;
            $this->title = $this->hero->title;
            $this->subtitle = $this->hero->subtitle;
            $this->motto = $this->hero->motto;
            $this->button_text = $this->hero->button_text;
        }
    }

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'motto' => 'required|string',
            'button_text' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($this->image) {
            // Delete old image if exists
            if ($this->hero && $this->hero->image) {
                Storage::disk('public')->delete($this->hero->image);
            }

            $path = $this->image->store('images/hero', 'public');
            $validated['image'] = $path;
        }

        Hero::updateOrCreate(
            ['id' => $this->heroId],
            $validated
        );

        $this->notifySuccess('Hero section has been updated successfully.');
    }

    public function render()
    {
        return view('livewire.cms.manage-hero');
    }
}
