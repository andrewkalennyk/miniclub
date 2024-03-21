<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\FastEvent;
use App\Models\FastEventUser;
use App\Models\Tree;
use Illuminate\Support\Facades\Request;
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

        $treePage = Tree::where('template', 'events')->active()->first();

        $pictures = $page->getOtherImg()->chunk(3);

        return view('event.event', compact('page', 'pictures','treePage'));
    }

    public function showFastEvents()
    {
        $page = $this->node;

        $events = FastEvent::date()->orderBy('date', 'asc')->get();

        return view('event.fast_catalog', compact('page', 'events'));
    }

    public function showFastEvent($slug, $id)
    {
        $page = FastEvent::with('users')->slug($slug)->id($id)->firstOrFail();

        $treePage = Tree::where('template', 'fast-events')->active()->first();

        return view('event.fast_event', compact('page', 'treePage'));
    }
}
