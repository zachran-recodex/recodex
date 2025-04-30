<?php

namespace App\Livewire\CMS;

use App\Models\Hero;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageHero extends Component
{
    use WithFileUploads;

    // Form properties
    public $heroId;
    public $title;
    public $subtitle;
    public $motto;
    public $button_text;
    public $image;
    public $current_image;

    // UI state
    public $isOpen = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string',
        'motto' => 'required|string|max:255',
        'button_text' => 'required|string|max:255',
        'image' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $this->loadHeroData();
    }

    private function loadHeroData()
    {
        $hero = Hero::first();

        if ($hero) {
            $this->heroId = $hero->id;
            $this->title = $hero->title;
            $this->subtitle = $hero->subtitle;
            $this->motto = $hero->motto;
            $this->button_text = $hero->button_text;
            $this->current_image = $hero->image_path;
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

    public function update()
    {
        $this->validate();

        $hero = Hero::firstOrNew();
        $hero->title = $this->title;
        $hero->subtitle = $this->subtitle;
        $hero->motto = $this->motto;
        $hero->button_text = $this->button_text;

        // Handle image upload
        if ($this->image) {
            $imagePath = $this->image->store('heroes', 'public');
            $hero->image_path = $imagePath;

            // Remove old image if exists
            if ($this->current_image) {
                Storage::delete('public/' . $this->current_image);
            }
        }

        $hero->save();

        session()->flash('message', 'Hero information updated successfully.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.cms.manage-hero');
    }
}
