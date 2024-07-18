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

            } else {
                echo "Wrong password";
            }
        } else {
            echo "User does not exist";
        }
    }

    public function disconnect(){
        //TODO Manage sessionUser
        echo 'disconnect called';
        session_destroy();
        session_start();
        $view = new View();
        $view->redirect('home');
    }
    /**
     * This function is called to redirect user with the appropriate role
     * to the manage animals page
    */








}
