<?php

namespace App\Livewire\Administrator;

use Livewire\Component;
use App\WithNotification;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ManageSitemap extends Component
{
    use WithNotification;

    public $lastGenerated = null;
    public $sitemapUrl = null;

    public function mount()
    {
        $this->refreshSitemapInfo();
    }

    public function refreshSitemapInfo()
    {
        $sitemapPath = public_path('sitemap.xml');
        if (File::exists($sitemapPath)) {
            $this->lastGenerated = File::lastModified($sitemapPath);
            $this->sitemapUrl = url('sitemap.xml');
        }
    }

    public function generate()
    {
        try {
            Artisan::call('sitemap:generate');
            $this->refreshSitemapInfo();
            $this->notify('Sitemap berhasil di-generate!');
        } catch (\Exception $e) {
            $this->notify('Gagal men-generate sitemap: ' . $e->getMessage(), 'error');
        }
    }

    public function render()
    {
        return view('livewire.administrator.manage-sitemap');
    }
}
