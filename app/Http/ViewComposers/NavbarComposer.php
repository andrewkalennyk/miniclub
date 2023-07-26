<?php

namespace App\Http\ViewComposers;

use App\Models\Tree;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class NavbarComposer
{
    private $locales = [
        'ua' => 'Ua',
        'en' => 'En',
    ];
    public function compose(View $view)
    {
        $langs = $this->locales;
        $thisLang = $this->locales[App::getLocale()];

        $view->with(compact('langs', 'thisLang'));
    }
}
