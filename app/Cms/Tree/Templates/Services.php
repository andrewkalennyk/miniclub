<?php

namespace App\Cms\Tree\Templates;

use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, MultiImage, Text, Textarea};

use Vis\Builder\Definitions\ResourceTree;

class Services extends Node
{
    protected $titleDefinition = 'Сервіси';
    public $action = 'ServiceController@showPage';
}
