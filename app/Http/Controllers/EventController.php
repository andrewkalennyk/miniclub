<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Vis\Builder\TreeController;

class EventController extends TreeController
{
    public function showEvents()
    {
        $page = $this->node;

        $events = Event::active()->orderEventDate()->paginate(9);

        return view('event.all', compact('page', 'events'));
    }

    /*
     * show index page site
     */
    public function showPage($slug, $id)
    {
        $page = Event::active()->slug($slug)->id($id)->firstOrFail();

        $pictures = $page->getOtherImg()->chunk(3);

        return view('event.event', compact('page', 'pictures'));
    }
}
