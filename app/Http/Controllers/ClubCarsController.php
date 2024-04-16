<?php

namespace App\Http\Controllers;

use App\Models\ClubCar;
use App\Models\Tree;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;
use Vis\Builder\TreeController;

class ClubCarsController extends TreeController
{
    /*
     * show index page site
     */
    public function showPage(): View
    {
        $page = $this->node;

        $cars = ClubCar::active()
            ->get();

        return view('club-cars.catalog', compact('page','cars'));
    }

    public function showCarDetail($slug)
    {
        $treePage = Tree::slug(Request::segment(count(Request::segments())-1))->active()->first();

        $page = ClubCar::where('slug', $slug)/*->active()*/->firstOrFail();

        $additionalImages = $page->getAddImages();

        return view('club-cars.car', compact('page','treePage', 'additionalImages'));
    }
}
