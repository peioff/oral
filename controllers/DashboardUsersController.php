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

    public function addUser()
    {
        $view = new View('addUser');
        $view->renderDashboard(array());
    }

    public function addUserToDatabase()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $validUsername = false;
            $username = $_POST["username"];
            $validPassword = false;
            $password = $_POST["password"];
            $validConfirmPassword = false;
            $confirmPassword = $_POST["confirmPassword"];
            $validRole = false;
            $role = $_POST["role"];
            $validLastname = false;
            $lastName = $_POST["lastname"];
            $validFirstname = false;
            $firstName = $_POST["firstname"];
            $validEmail = false;
            $email = $_POST["email"];

            if (!empty($username)) {
                $validUsername = true;
            } else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Invalid Username'
                ];
            }
            if ($role !== 'Choose Role') {
                $validRole = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Invalid Role'
                ];
            }
            if (!empty($firstName) && !empty($lastName)) {
                $validFirstname = true;
                $validLastname = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Invalid First or Last name'
                ];
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validEmail = true;
            }
            else
            {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Invalid Email'
                ];
            }

            if ($password === $confirmPassword){
                $validConfirmPassword = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'MismatchPassword'
                ];
            }

            if ($this->checkPassword($password)) {
                $validPassword = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidPassword'
                ];
            }

            if ($validUsername && $validConfirmPassword && $validPassword && $validRole && $validLastname && $validFirstname && $validEmail) {


                $bdd = new DatabaseManager();
                $user = new UserModel();
                $user->setUsername($_POST['username']);
                $user->setPassword($_POST['password']);
                $user->setFirstname($_POST['firstname']);
                $user->setLastname($_POST['lastname']);
                $user->setRole($_POST['role']);
                $user->setEmail($_POST['email']);

                $bdd->adduserToDatabase($user);

                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'none'
                ];
            }
            echo json_encode($response);
        }

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

    private function checkPassword(string $password) : bool{
        $length = false;
        $number = false;
        $capital = false;
        $special = false;

        if (strlen($password) > 6) {
            $length = true;
        }
        if (preg_match("/[0-9]/", $password)) {
            $number = true;
        }
        if (preg_match("/[A-Z]/", $password)) {
            $capital = true;
        }
        if (preg_match("/[$@#&!?]/", $password)) {
            $special = true;
        }

        return $length && $capital && $number && $special ;
    }
}
