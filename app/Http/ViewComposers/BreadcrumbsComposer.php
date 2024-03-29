<?php

namespace App\Http\ViewComposers;

use App\Http\Breadcrumbs;
use App\Models\ClubCar;
use App\Models\Event;
use App\Models\FastEvent;
use App\Models\Service;
use App\Models\ServiceReview;
use App\Models\Tree;
use Illuminate\View\View;

class BreadcrumbsComposer
{
    public function compose(View $view)
    {
        if (! isset($view->getData()['page'])) {
            return 'Не передан параметр';
        }

        $page = $view->getData()['page'];

        switch (get_class($page)) {
            case Tree::class:
                $breadcrumbs = new Breadcrumbs($page);
                break;
            case Service::class:
            case ClubCar::class:
            case Event::class:
            case FastEvent::class:
                $breadcrumbs = new Breadcrumbs($view->getData()['treePage']);
                $breadcrumbs->add($page->getUrl(), $page->title);
                break;
            case ServiceReview::class:
                $breadcrumbs = new Breadcrumbs($view->getData()['treePage']);
                $breadcrumbs->add($page->service->getUrl(), $page->service->title);
                $breadcrumbs->add($page->getUrl(), $page->title);
                break;
            default:
                $node = $page->getNode();
                $breadcrumbs = new Breadcrumbs($node);
                $breadcrumbs->add($page->getUrl(), $page->title);
                break;
        }

        $view->with(compact('breadcrumbs','page'));
    }
}
