<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Tree;
use http\Url;
use Illuminate\Support\Facades\Request;
use Vis\Builder\TreeController;

class ServiceController extends TreeController
{
    /*
     * show index page site
     */
    public function showPage()
    {
        $page = $this->node;

        $types = ServiceType::active()->get();

        $services = Service::active()->with(['city', 'service_type'])->get();

        return view('service.catalog', compact('page','types', 'services'));
    }

    public function showService($slug, $id)
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