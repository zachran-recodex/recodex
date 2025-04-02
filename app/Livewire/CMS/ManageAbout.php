<?php

namespace App\Livewire\CMS;

use App\Models\About;
use Livewire\Component;
use App\WithNotification;

class ManageAbout extends Component
{
    use WithNotification;

    // Form Properties
    public $about_id;
    public $title;
    public $description;
    public $vision;
    public $mission = [];

    // For mission items management
    public $missionItem = '';

    /**
     * Define validation rules for about form
     *
     * @return array Validation rules array
     */
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|array|min:1',
        ];
    }

    /**
     * Initialize component state
     * Loads existing about data if available
     *
     * @return void
     */
    public function mount()
    {
        // Load existing about data if available
        $about = About::first();

        if ($about) {
            $this->about_id = $about->id;
            $this->title = $about->title;
            $this->description = $about->description;
            $this->vision = $about->vision;
            $this->mission = $about->mission;
        }
    }

    /**
     * Add new mission item to the mission array
     * Validates that mission item is not empty
     *
     * @return void
     */
    public function addMissionItem()
    {
        if (empty($this->missionItem)) {
            $this->addError('missionItem', 'Mission item cannot be empty.');
            return;
        }

        $this->mission[] = $this->missionItem;
        $this->missionItem = '';
    }

    /**
     * Remove mission item from specified index
     * Re-indexes the array after removal
     *
     * @param int $index Index of mission item to remove
     * @return void
     */
    public function removeMissionItem($index)
    {
        unset($this->mission[$index]);
        $this->mission = array_values($this->mission); // Re-index array
    }

    /**
     * Store or update about page data
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
                'description' => $this->description,
                'vision' => $this->vision,
                'mission' => $this->mission,
            ];

            if ($this->about_id) {
                // Update existing about
                $about = About::find($this->about_id);
                $about->update($data);
                $this->notifySuccess('About page updated successfully.');
            } else {
                // Create new about
                $about = About::create($data);
                $this->notifySuccess('About page created successfully.');
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
        return view('livewire.cms.manage-about');
    }
}
