<?php

namespace App\Http\Controllers;

use App\Events\CreateOrderCartEvent;
use App\Events\RepeatOrderEvent;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProposeRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ShareServiceRequest;
use App\Http\Requests\UsePromoRequest;
use App\Models\NpArea;
use App\Models\NpCity;
use App\Models\NpStreet;
use App\Models\NpWareHouse;
use App\Models\Order;
use App\Models\Propose;
use App\Models\Review;
use App\Models\ShareService;
use DenizTezcan\LiqPay\LiqPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Vis\Builder\TreeController;

class FormController extends TreeController
{
    public function doPropose(ProposeRequest $request): array
    {
        return [
            'status' => (bool)Propose::create($request->all())
        ];
    }

    public function doReview(ReviewRequest $request): array
    {
        return [
            'status' => (new Review())->createReview($request->except('_token')),
            'success_message' => __t('Дякую за ваш відгук'),
            'error_message' => __t('От халепа! Щось пішло не так'),
        ];
    }

    public function doShareService(ShareServiceRequest $request): array
    {
        return [
            'status' => (new ShareService())->createApply($request->except('_token')),
            'success_message' => __t('Дякую за ваш відгук'),
            'error_message' => __t('От халепа! Щось пішло не так'),
        ];
    }
}
