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

    public function animalOnclick($id): void
    {
        $animalId = intval($id['id']);

//        //NoSql
//        $mongo = new NoSQLDbManager();
//        if (isset($animal)) {
//            $actualScore = $mongo->getAnimalScore($animalId);
//            $mongo->increaseAnimalSCore($animalId, $actualScore + 1);
//        }
//        else{
//            $mongo->addNewAnimal($animalId);
//        }

        //Sql
        $databaseManager = new DatabaseManager();
        $animal = $databaseManager->getAnimalById($animalId);
        $reports = $databaseManager->getReportById($animal->getScore());

        if (count($reports) > 1) {
            array_shift($reports);
        }

        $data = ['animal' => $animal, 'report' => $reports[0]];

        $view = new View('animalOnclick');
        $view->renderSinglePage($data);
    }




}




