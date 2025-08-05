<?php

use Illuminate\Database\Capsule\Manager as Capsule;

//error_reporting(0);

# We must begin to load our application from the beginning.
require_once("../lib/bootstrap.php");

//Now run our app.
//$app = imleeds\core::getInstance();

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

echo '<pre>';
print_r($capsule);
echo "DB!";
