<?php
declare(strict_types=1);

/**
 * Class DashboardController
 * Used to display the connect page
 * Used to check User identity
 */
class DashboardController
{

    /**
     * This function is used to display the connectPage
    */
    public function display()
    {
        include(VIEWS . 'connect.php');
    }

    /**
     * This function is used to authenticate user and redirect him to the
     * Dashboard belonging to him
    */
    public function connection()
    {
        //TODO Manage rôles
        //TODO Manage wrong username or wrong password

        $user = $_POST['user'];
        $password = $_POST['password'];
        $databaseManager = new DatabaseManager();
        $animals = $databaseManager->getAllAnimals();
        $user = $databaseManager->getUser($user);

        if (isset($user)) { // Users exists
            if ($password == $user->getPassword()) { // Password matches - User authenticated
                $userView = new View('dashboardAnimal');
                $userAndAnimals = array($user, $animals);
                $userView->renderDashboard(array('userAndAnimals' => $userAndAnimals));
                session_start();
                $_SESSION["sessionUser"] = $user->getUsername();
                echo "User connected";
            } else {
                echo "Wrong password";
            }
        } else {
            echo "User does not exist";
        }
    }

    /**
     * This function is called to redirect user with the appropriate role
     * to the manage animals page
    */

    /////////////////////////////////////// Animals ///////////////////////////////////////
    public function manageAnimals(){
        $bdd = new DatabaseManager();
        $animalsToManage = $bdd->getAllAnimals();
        $animalsView = new View('dashboardAnimal');
        $animalsView->renderDashboard(array('animalsToManage' => $animalsToManage));
    }

    public function addAnimalPage(){
        $addAnimalView = new View('addAnimal');
        $addAnimalView->renderDashboard(array());
    }

    public function addAnimalToDatabase(){
        echo '<pre>'; print_r($_POST); echo '</pre>';
        echo '<pre>'; print_r($_FILES); echo '</pre>';

        $name = $_POST['name'];
        $species = $_POST['species'];
        $living = $_POST['living'];
        $image_name = $_FILES['file']['name'];

        $image_data = file_get_contents($_FILES['file']['tmp_name']);
        $bdd = new DatabaseManager();
        $bdd->addAnimal($name, $species, $living, $image_name);
        $bdd->addImage($image_name,$image_data);
    }
}
