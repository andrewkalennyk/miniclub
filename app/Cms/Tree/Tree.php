<?php

namespace App\Cms\Tree;

use App\Cms\Tree\Templates\Events;
use App\Cms\Tree\Templates\Services;
use App\Cms\Tree\Templates\Node;
use Vis\Builder\Definitions\BaseTree;

class Tree extends BaseTree
{
    public function templates()
    {
        return [
            'main' => Node::class,
            'services' => Services::class,
            'events' => Events::class
        ];
    }
}
