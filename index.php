<?php

/**
 * This file is the entry point of the application
 * First, it starts the autoLoad (see _config.php)
 * Then instantiate a Router Object that writes routes and dispatch it
*/

#Config
include_once("_config.php");

AutoLoad::start();

echo '<pre>'; print_r($_SERVER); echo '<pre>';

echo '<pre>'; print_r($_GET); echo '<pre>'; echo '<pre>';

echo '<pre>'; print_r($_POST); echo '<pre>';

echo '<pre>'; echo 'host : ' . HOST; echo '<pre>';
echo '<pre>'; echo 'root : ' . ROOT; echo '<pre>';


#request recovery after being filtered by .htaccess
$request = "/"; // request set as "/" because no request is being set at the very first launch
if (isset($_GET['r'])){
    $request = $_GET['r'];
}

include_once(ROOT . 'classes/Routeur.php');

    $routeur = new Routeur('dfdfssdf');
    $routeur->renderController();
