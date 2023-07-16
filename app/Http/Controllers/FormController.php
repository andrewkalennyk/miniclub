<?php

namespace App\Http\Controllers;

use App\Events\CreateOrderCartEvent;
use App\Events\RepeatOrderEvent;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProposeRequest;
use App\Http\Requests\UsePromoRequest;
use App\Models\NpArea;
use App\Models\NpCity;
use App\Models\NpStreet;
use App\Models\NpWareHouse;
use App\Models\Order;
use App\Models\Propose;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use DenizTezcan\LiqPay\LiqPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Vis\Builder\TreeController;

class FormController extends TreeController
{

    public function doPropose(ProposeRequest $request): array
    {
        return [
            'status' => (bool)Propose::create($request->all())
        ];
    }
}
