<?php

namespace imleeds\core\traits;

use \Throwable;
use \Exception;

trait ExceptionTrait {

    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        echo('<b style="border: solid red 1px; background-color: #FFFF00; padding: 5px;">' . $this->getClass() . '</b> BASIC AUTH FAILED ON USER: ' . $message . 'check your credentials');
        die();
        parent::__construct($message, $code, $previous);
    }

    public function getClass(){
        $name = array_reverse(explode('\\', __CLASS__));
        return $name[0];
    }
}


