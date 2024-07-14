<?php

/**
 * This file is the entry point of the application
 * First, it starts the autoLoad (see _config.php)
 * Then instantiate a Router Object that writes routes and dispatch it
*/

#Config
include_once("_config.php");

AutoLoad::start();

#request recovery after being filtered by .htaccess
$request = "/"; // request set as "/" because no request is being set at the very first launch
if (isset($_GET['r'])){
    $request = $_GET['r'];
}
$routeur = new Routeur($request);
$routeur->renderController();