<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

        return view('home.index', compact('page','events'));
    }
}
