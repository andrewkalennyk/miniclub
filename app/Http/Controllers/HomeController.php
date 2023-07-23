<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\LocalClub;
use Vis\Builder\TreeController;

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

        return view('home.index', compact('page','events', 'clubs'));
    }
}
