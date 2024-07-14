<?php
declare(strict_types=1);

/**
 * Classe HomeController
 * Used to diplay the home page
 * Display is done with a View Object
 * The View Object Method (render) requires an array as param
*/
class HomeController
{

    public function display(){

        $databaseManager = new DatabaseManager();
        $livings = $databaseManager->getLivings();
        $animals = $databaseManager->getAllAnimals();
        $services = $databaseManager->getServices();
        $comments = $databaseManager->getComments();
        $allHomePageData = array($livings, $animals, $services,$comments);

        $homeView = new View('home');
        $homeView->render(array('allHomePageData' => $allHomePageData));
    }
}




