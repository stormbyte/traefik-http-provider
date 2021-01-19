<?php

namespace Traefik\Middleware\Exception;

use \Exception;
use Throwable;

class Duplicate extends Exception
{
    /**
     * Duplicate constructor.
     * @param $middlewareName
     */
    public function __construct($middlewareName) {
        $message = sprintf( 'Middleware name already loaded ( %s ).', $middlewareName );
        parent::__construct($message);
    }

}
