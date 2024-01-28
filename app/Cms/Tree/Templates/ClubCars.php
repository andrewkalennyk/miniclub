<?php

namespace App\Cms\Tree\Templates;

use Vis\Builder\Fields\{Checkbox, Froala, Id, Image, MultiImage, Text, Textarea};

use Vis\Builder\Definitions\ResourceTree;

class ClubCars extends Events
{
    protected $titleDefinition = 'Клубні тачки';
    public $action = 'ClubCarsController@showCars';

}
