<?php
declare(strict_types=1);

/**
 * Class HomeController
 * Used to display the home page
 * Display is done with the display() method

 * The render() method requires an array as param
*/
class HomeController
{

    /**
     * This method retrieves data needed for homepage from DatabaseManager
     * Data are passed through a View Object (see classes/View.php)
     * The display is achieved with the View Object
    */
    public function display(){
        echo '<pre>';
        echo 'display from home controller called';
        echo '<pre>';

        $databaseManager = new DatabaseManager();
        $livings = $databaseManager->getLivings();
        $animals = $databaseManager->getAllAnimals();
        $services = $databaseManager->getServices();
        $comments = $databaseManager->getComments();
        $reports = $databaseManager->getReports();

        $allHomePageData = array($livings, $animals, $services,$comments,$reports);

        $homeView = new View('home');
        $homeView->render(array('allHomePageData' => $allHomePageData));
    }



}




