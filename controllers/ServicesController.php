<?php
declare(strict_types=1);

/**
 * Classe HomeCOntroller
 * Used to diplay the home page
 * Display is done with a View Object
 * The View Object Method (render) requires an array as param
 */

class ServicesController
{
    public function display(){

        $databaseManager = new DatabaseManager();
        $services =  $databaseManager->getServices();

        $servicesView = new View('services');
        $servicesView->render(array('services' => $services));
    }
}

