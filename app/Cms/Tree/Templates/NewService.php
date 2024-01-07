<?php

namespace App\Cms\Tree\Templates;

use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, MultiImage, Text, Textarea};

use Vis\Builder\Definitions\ResourceTree;

class NewService extends Node
{
    protected $titleDefinition = 'Новий сервіс';
    public $action = 'ServiceController@showAddService';

}
