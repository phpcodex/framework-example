<?php

namespace imleeds\core\exceptions;

use imleeds\core\traits\ExceptionTrait;
use \Exception;
use Throwable;

class BasicAuthFailedException extends Exception {
    use ExceptionTrait;

    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        header("HTTP/1.1 401 AUTH Failed");
        $message = '<b style="border: solid red 1px; background-color: #FFFF00; padding: 5px;">' . $this->getClass() . '</b> BASIC AUTH FAILED ON USER: <b>' . $message . '</b> check your credentials';
        echo $message;
        die();
    }
}


