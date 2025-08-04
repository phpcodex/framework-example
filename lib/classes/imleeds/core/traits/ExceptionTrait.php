<?php

namespace imleeds\core\traits;

use \Throwable;
use \Exception;

trait ExceptionTrait
{
    public function getClass(){
        $name = array_reverse(explode('\\', __CLASS__));
        return $name[0];
    }
}


