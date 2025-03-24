<?php

namespace App\Livewire\CMS;

use App\Models\Hero;
use Livewire\Component;
use App\WithNotification;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
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
    public $temp_image;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'motto' => 'required|string',
            'button_text' => 'required|string|max:255',
            'temp_image' => $this->heroId ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ];
    }

    public function mount()
    {
        $hero = Hero::first();
        if ($hero) {
            $this->heroId = $hero->id;
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

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $data = [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'motto' => $this->motto,
                'button_text' => $this->button_text,
            ];

            if ($this->temp_image) {
                if ($this->image && Storage::exists($this->image)) {
                    Storage::delete($this->image);
                }
                $data['image'] = $this->temp_image->store('hero', 'public');
            }

            if ($this->heroId) {
                Hero::findOrFail($this->heroId)->update($data);
                $this->notifySuccess('Hero section updated successfully.');
            } else {
                $hero = Hero::create($data);
                $this->heroId = $hero->id;
                $this->notifySuccess('Hero section created successfully.');
            }

            DB::commit();
            $this->temp_image = null;

        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.cms.manage-hero');
    }
}