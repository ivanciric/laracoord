<?php

namespace Laracoord;

use Illuminate\Support\Facades\Facade;

class LaracoordFacade extends Facade {

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'Laracoord';
    }

}
