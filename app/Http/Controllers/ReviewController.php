<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceReview;
use App\Models\ServiceType;
use App\Models\Tree;
use http\Url;
use Illuminate\Support\Facades\Request;
use Vis\Builder\TreeController;

class ReviewController extends TreeController
{
    public function showReview($slug, $id)
    {
        $treePage = Tree::slug(Request::segment(count(Request::segments())-2))->active()->first();

        $page = ServiceReview::with(['service'])
            ->id($id)
            ->serviceHas($slug)
            ->firstOrFail();

        return view('review.review', compact('page','treePage'));
    }
}
