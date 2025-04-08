<?php

namespace App\Console\Commands;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.';

    public function handle()
    {
        $this->info('Generating sitemap...');

        // Generate sitemap from crawler
        $sitemap = SitemapGenerator::create(config('app.url'))
            ->configureCrawler(function ($crawler) {
                $crawler->setMaximumDepth(5);
            })
            ->getSitemap();

        // Add Services
        Service::all()->each(function ($service) use ($sitemap) {
            $sitemap->add(
                Url::create(route('service.detail', $service))
                    ->setLastModificationDate(Carbon::parse($service->updated_at))
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.7)
            );
        });

        // Write sitemap to public directory
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
