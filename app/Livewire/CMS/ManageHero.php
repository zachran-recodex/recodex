<?php

namespace App\Livewire\CMS;

use App\Models\Hero;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageHero extends Component
{
    use WithNotification;
    use WithFileUploads;

    // Form Properties
    public $hero_id;
    public $title;
    public $subtitle;
    public $motto;
    public $button_text;
    public $image;
    public $existing_image;

    /**
     * Define validation rules for hero form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'motto' => 'required|string',
            'button_text' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ];
    }

    /**
     * Initialize component state
     * Loads existing hero data if available
     *
     * @return void
     */
    public function mount()
    {
        // Load existing hero data if available
        $hero = Hero::first();

        if ($hero) {
            $this->hero_id = $hero->id;
            $this->title = $hero->title;
            $this->subtitle = $hero->subtitle;
            $this->motto = $hero->motto;
            $this->button_text = $hero->button_text;
            $this->existing_image = $hero->image;
        }
    }

    /**
     * Store or update hero page data
     * Validates input and saves information to database
     *
     * @return void
     */
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

            // Handle file upload if present
            if ($this->image) {
                try {
                    // Delete old file if editing
                    if ($this->hero_id && $this->existing_image) {
                        Storage::delete('public/' . $this->existing_image);
                    }

                    $imagePath = $this->image->store('heroes', 'public');
                    $data['image'] = str_replace('public/', '', $imagePath);
                } catch (\Exception $e) {
                    $this->notifyError('Error uploading image: ' . $e->getMessage());
                    return;
                }
            }

            if ($this->hero_id) {
                // Update existing hero
                $hero = Hero::find($this->hero_id);
                $hero->update($data);
                $this->notifySuccess('Hero updated successfully.');
            } else {
                // Create new hero
                Hero::create($data);
                $this->notifySuccess('Hero created successfully.');
            }
        } catch (\Exception $e) {
            $this->notifyError('Operation failed: ' . $e->getMessage());
        }
    }

    /**
     * Render component view
     * Renders the about page management template
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.cms.manage-hero');
    }
}
