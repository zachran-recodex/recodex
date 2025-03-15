<?php

namespace App\Livewire;

use App\Models\Hero;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageHero extends Component
{
    use WithNotification, WithFileUploads;

    // Form Properties
    public $hero_id;
    public $title;
    public $subtitle;
    public $motto;
    public $button_text;
    public $image;
    public $temp_image;
    public $imagePreview;

    protected $listeners = ['refreshHero' => '$refresh'];

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
        $this->loadHeroData();
    }

    private function loadHeroData()
    {
        $hero = Hero::first();

        if ($hero) {
            $this->hero_id = $hero->id;
            $this->title = $hero->title;
            $this->subtitle = $hero->subtitle;
            $this->motto = $hero->motto;
            $this->button_text = $hero->button_text;
            $this->image = $hero->image;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

    private function handleImageUpload()
    {
        if (!$this->temp_image) {
            return null;
        }

        return $this->temp_image->store('heroes', 'public');
    }

    private function deleteOldImage($hero)
    {
        if ($hero->image && Storage::disk('public')->exists($hero->image)) {
            Storage::disk('public')->delete($hero->image);
        }
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

            // Jika ada upload gambar baru
            if ($this->temp_image) {
                // Ambil hero yang ada untuk menghapus gambar lama
                $existingHero = Hero::find($this->hero_id);
                if ($existingHero) {
                    $this->deleteOldImage($existingHero);
                }

                // Upload gambar baru
                $imagePath = $this->temp_image->store('heroes', 'public');
                $data['image'] = $imagePath;
            }

            $hero = Hero::updateOrCreate(
                ['id' => $this->hero_id],
                $data
            );

            $this->hero_id = $hero->id;
            $this->image = $hero->image; // Update image property setelah save
            $this->temp_image = null; // Reset temp_image
            $this->imagePreview = null; // Reset preview

            $this->notifySuccess('Hero successfully updated.');
        } catch (\Exception $e) {
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.manage-hero');
    }
}
