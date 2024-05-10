<?php

namespace App\Http\Controllers;

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


        foreach ($tree as $treePage) {
            $sitemap->add(Url::create($treePage->getUrl())
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        dd('generated');
    }
}
