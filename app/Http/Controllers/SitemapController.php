<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Tree;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    /*
     * show index page site
     */
    public function generateSitemap(): View
    {
        $sitemap = Sitemap::create();

        $tree = Tree::active()->orderBy('id', 'asc')->get();

        $services = Service::active()->get();

        foreach ($tree as $treePage) {
            $priority = $treePage->template == 'main' ? '1.0' : '0.8';
            $frequency = $treePage->template == 'main' ? Url::CHANGE_FREQUENCY_WEEKLY : Url::CHANGE_FREQUENCY_MONTHLY;
            $sitemap->add(Url::create($treePage->getUrl())
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency($frequency)
                ->setPriority($priority));
        }

        foreach ($services as $service) {
            $sitemap->add(Url::create($service->getUrl())
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        dd('generated');
    }
}
