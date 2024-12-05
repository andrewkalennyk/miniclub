<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\FastEvent;
use App\Models\FastEventUser;
use App\Models\Product;
use App\Models\Sticker;
use App\Models\Tree;
use Illuminate\Support\Facades\Request;
use Vis\Builder\TreeController;

class ShopController extends TreeController
{
    public function showCatalog()
    {
        $page = $this->node;

        $products = Product::active()->paginate(9);

        return view('shop.catalog', compact('page', 'products'));
    }

}
