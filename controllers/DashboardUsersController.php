<?php
declare(strict_types=1);

class DashboardUsersController
{
    public function manageUsers()
    {
        $bdd = new DatabaseManager();
        $data = $bdd->getUsers();

        $view = new View('dashboardUsers');
        $view->renderDashboard($data);
    }

    public function addUser(){
        $view = new View('addUser');
        $view->renderDashboard(array());
    }

    public function addUserToDatabase(){
        $bdd = new DatabaseManager();
        $user = new UserModel();
        $user->setUsername($_POST['username']);
        if ($_POST['password'] === $_POST['confirmPassword']) {
            $user->setPassword($_POST['password']);
        }
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setRole($_POST['role']);
        $user->setEmail($_POST['email']);

        $bdd->adduserToDatabase($user);

        $view = new View();
        $view->redirect('dashboardUsers');
    }

    public function editUser($params)
    {
        echo $params['username'];
        $bdd = new DatabaseManager();
        $data = $bdd->getUser($params['username']);

        $view = new View('editUser');
        $view->renderDashboard(array($data));

    }

    public function updateUser($params)
    {
        $bdd = new DatabaseManager();
        $user = $bdd->getUser($params['username']);
        $user->setUsername($params['username']);
        $user->setPassword($_POST['password']);
        $user->setRole($_POST['role']);
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);

//        echo '<pre>';print_r($user);echo '</pre>';
//        exit();

        $bdd->updateUser($user);

        $view = new View();
        $view->redirect('dashboardUsers');

    }

    public function deleteUser($params)
    {
        echo $params['username'];
        $bdd = new DatabaseManager();
        $bdd->deleteUser($params['username']);

        $view = new View();
        $view->redirect('dashboardUsers');
    }
}
