<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Faq;
use App\Models\LocalClub;
use App\Models\Service;
use App\Models\Tree;
use Vis\Builder\TreeController;
use Carbon\Carbon;

class HomeController extends TreeController
{
    /*
     * show index page site
     */
    public function showPage()
    {
        $page = $this->node;

        $events = Event::active()->orderEventDate()->take(10)->get();
        $clubs = LocalClub::with('city')->active()->get();

        $allEventPage = Tree::where('template','events')->first();
        $allServicesPage = Tree::where('template','services')->first();

        $clubYears = (Carbon::now())->diffInYears(Carbon::create('2018'));

        preg_match_all('#(.*?) members, (.*?) online#', file_get_contents('https://t.me/miniclubua'), $matches);

        $members = (int) filter_var($matches[1][0], FILTER_SANITIZE_NUMBER_INT);

        $services = Service::active()->type(1)->take(4)->orderBy('mark', 'desc')->get();

        $faqItems = Faq::active()->take(10)->get();

        return view('home.index', compact(
            'page',
            'events',
            'clubs',
            'clubYears',
            'allEventPage',
            'allServicesPage',
            'services',
            'members',
            'faqItems'
        ));
    }
}
