<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Tree;
use http\Url;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;
use Vis\Builder\TreeController;

class ServiceController extends TreeController
{
    /*
     * show index page site
     */
    public function showPage(): View
    {
        $page = $this->node;

        $types = ServiceType::active()->get();

        $services = Service::active()
            ->orderBy('mark','desc')
            ->with(['city', 'service_type', 'reviews'])
            ->get();

        $cities = $services->pluck('city', 'city.id');

        return view('service.catalog', compact('page','types', 'services', 'cities'));
    }

    public function showService($slug, $id): View
    {
        $treePage = Tree::slug(Request::segment(count(Request::segments())-1))->active()->first();

        $page = Service::with(['service_type', 'service_features', 'city', 'reviews.review_user'])
            ->active()
            ->slug($slug)
            ->id($id)
            ->firstOrFail();

        $otherServices = Service::active()->type($page->service_type_id)->get()->shuffle()->take(3);

        return view('service.service', compact('page','treePage', 'otherServices'));
    }
}
