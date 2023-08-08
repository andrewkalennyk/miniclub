<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\LocalClub;
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

        $events = Event::active()->orderEventDate()->take(5)->get();
        $clubs = LocalClub::with('city')->active()->get();

        $allEventPage = Tree::where('template','events')->first();

        $clubYears = (Carbon::now())->diffInYears(Carbon::create('2018'));

        return view('home.index', compact('page','events', 'clubs', 'clubYears', 'allEventPage'));
    }
}
