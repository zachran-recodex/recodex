<?php

namespace App\Livewire;

use App\Models\Video;
use App\WithNotification;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ManageVideos extends Component
{
    use WithNotification, WithPagination;

    // Form Properties
    public $video_id;
    public $youtube_link;

    // UI State Properties
    public $isEditing = false;

    protected function rules()
    {
        return [
            'youtube_link' => 'required|url|regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->modal('form')->show();
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);

        if ($video) {
            $this->isEditing = true;
            $this->video_id = $id;
            $this->youtube_link = $video->youtube_link;

            $this->modal('form')->show();
        }
    }

    public function confirmDelete($id)
    {
        $this->video_id = $id;
        $this->modal('delete')->show();
    }

    public function delete()
    {
        $video = Video::findOrFail($this->video_id);

        if ($video) {
            $video->delete();
            $this->notifySuccess('Video deleted successfully');
            $this->modal('delete')->close();
        }
    }

    public function resetForm()
    {
        $this->reset(['video_id', 'youtube_link']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            if ($this->isEditing) {
                $video = Video::findOrFail($this->video_id);

                $video->update([
                    'youtube_link' => $this->youtube_link,
                ]);
                $this->notifySuccess('Video updated successfully');
            } else {
                Video::create([
                    'youtube_link' => $this->youtube_link,
                ]);
                $this->notifySuccess('Video created successfully');
            }

            DB::commit();
            $this->resetForm();
            $this->modal('form')->close();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $this->notifyError('Database error occurred: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            $this->notifyError('Something went wrong: ' . $e->getMessage());
        }
    }

    private function getYoutubeEmbedUrl($url)
    {
        $videoId = '';

        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }

        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }

    public function render()
    {
        $videos = Video::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-videos', [
            'videos' => $videos,
            'getYoutubeEmbedUrl' => function($url) {
                return $this->getYoutubeEmbedUrl($url);
            }
        ]);
    }
}
