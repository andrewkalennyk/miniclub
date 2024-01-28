<?php

namespace App\Http\Controllers;

use App\Models\ClubCar;
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
}
