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


            $databaseManager = new DatabaseManager();
            $users = $databaseManager->getUsers();

            foreach ($users as $user) {
                if ($user->getUsername() == $_POST['username'] && $user->getPassword() == $_POST['password']) {
                    $authentifiedUser = $user;
                }
            }

        if (isset($authentifiedUser)) {

            switch ($authentifiedUser->getRole()) {
                case 'Admin':
                    echo 'Role : Admin';
                    session_start();
                    $_SESSION['username'] = $authentifiedUser->getUsername();
                    $_SESSION['role'] = $authentifiedUser->getRole();
                    $view = new View();
                    $view->redirect('dashboardAnimals');
                    break;
                case 'Employee':
                    echo 'Role : Employee';
                    session_start();
                    $_SESSION['username'] = $authentifiedUser->getUsername();
                    $_SESSION['role'] = $authentifiedUser->getRole();
                    $view = new View();
                    $view->redirect('dashboardFeedings');
                    break;
                case 'Veterinary':
                    echo 'Role : Veterinary';
                    session_start();
                    $_SESSION['username'] = $authentifiedUser->getUsername();
                    $_SESSION['role'] = $authentifiedUser->getRole();
                    $view = new View();
                    $view->redirect('dashboardVet');
                    break;
            }

        } else {
            $view = new View();
            $view->redirect('connect');
        }

    }

    public function disconnect()
    {
        session_start();
        $_SESSION['username'] = "Session non définie";
        $view = new View();
        $view->redirect('home');
    }


}
