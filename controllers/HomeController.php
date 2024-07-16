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


        $allHomePageData = array($livings, $animals, $services,$comments);

        $homeView = new View('home');
        $homeView->render(array('allHomePageData' => $allHomePageData));
    }


    /**
     * This method is used in the to submit a comment
     * First, it ensures fields values are not blank
     * If blank, tell the user
     * Else, encode values to avoid SQL injection,
     * Check some parameters,
     * Insert in Database,
     * Tells the user comment is submitted
     * Finally, redirects user toward the homePage via the view object
    */
    public function submitComment(){
        //TODO : Check if values are empty, inform the user of the state

            $nickname =htmlspecialchars($_POST['nickname'], ENT_QUOTES, 'UTF-8');
            $content =htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
            $databaseManager = new DatabaseManager();
            $databaseManager->insertComment($nickname, $content);

            $homeView = new View();
            $homeView->redirect('home');


    }
}




