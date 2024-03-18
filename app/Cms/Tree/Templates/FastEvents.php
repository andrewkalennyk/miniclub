<?php

namespace App\Cms\Tree\Templates;

use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, MultiImage, Text, Textarea};

use Vis\Builder\Definitions\ResourceTree;

class FastEvents extends Events
{
    protected $titleDefinition = 'Швидкі Зустрічі';
    public $action = 'EventController@showFastEvents';
}
