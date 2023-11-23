<?php

namespace App\Http\Controllers;

use Vis\Builder\TreeController;

class SecretSantaController extends TreeController
{
    public function showPage()
    {
        return view('santa.index');
    }
}
