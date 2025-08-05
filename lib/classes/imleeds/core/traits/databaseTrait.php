<?php

use Illuminate\Database\Capsule\Manager as Capsule;

trait databaseTrait
{

    public function __construct()
    {

        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => "mysql",
            "host" =>"127.0.0.1",
            "database" => "acl",
            "username" => "root",
            "password" => "root"
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}