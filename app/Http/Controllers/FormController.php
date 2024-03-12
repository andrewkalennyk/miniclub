<?php

namespace App\Http\Controllers;

use App\Events\CreateOrderCartEvent;
use App\Events\RepeatOrderEvent;
use App\Http\Requests\AskRequest;
use App\Http\Requests\FastEventCheckinRequest;
use App\Http\Requests\FastEventRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProposeRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ShareServiceRequest;
use App\Http\Requests\UsePromoRequest;
use App\Models\AskForm;
use App\Models\FastEvent;
use App\Models\FastEventUser;
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

    public function showAskPage()
    {
        return view('forms.ask');
    }

    public function doAsk(AskRequest $request)
    {
        return [
            'status' => (new AskForm())->createApply($request->except('_token')),
            'success_message' => __t('Дякую друже! Нам важлива твоя думка!'),
            'error_message' => __t('От халепа! Щось пішло не так'),
        ];
    }

    public function addFastEvent(FastEventRequest $request)
    {
        $fastEvent = (new FastEvent())->createApply($request->except('_token'));
        return [
            'status' => (bool)$fastEvent,
            'url' => $fastEvent->getUrl(),
            'success_message' => __t('Створено!'),
            'error_message' => __t('От халепа! Щось пішло не так'),
        ];
    }

    public function addFastEventCheckIn(FastEventCheckinRequest $request)
    {
        $fastEventUser = (new FastEventUser)->createApply($request->all());
        $users = FastEventUser::where('fast_event_id', $request->get('fast_event_id'))
            ->get()
            ->map(function ($user) {
                $user->url = $user->getUrl();
                return $user;
        });

        return [
            'status' => (bool)$fastEventUser,
            'users' => $users->toArray(),
            'success_message' => __t('Додано!'),
            'error_message' => __t('От халепа! Щось пішло не так'),
        ];
    }
}
