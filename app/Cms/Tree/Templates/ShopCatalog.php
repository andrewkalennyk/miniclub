<?php

namespace App\Cms\Tree\Templates;

use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, MultiImage, Text, Textarea};

use Vis\Builder\Definitions\ResourceTree;

class ShopCatalog extends Events
{
    protected $titleDefinition = 'Клубний мерч';
    public $action = 'ShopController@showCatalog';

}
