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

    // Animals

    /**
     *This function is used to display the Animals Page in dashboard
     */

    public function manageAnimals(){
        $bdd = new DatabaseManager();
        $animalsToManage = $bdd->getAllAnimals();
        $animalsView = new View('dashboardAnimal');
        $animalsView->renderDashboard(array('animalsToManage' => $animalsToManage));
    }

    /**
     *This function is used to display the Add Animal Page in dashboard
     */
    public function addAnimalPage(){
        $addAnimalView = new View('addAnimal');
        $addAnimalView->renderDashboard(array());
    }
    /**
     *This function is used to display the Add Edit Animal Page in dashboard
     */
    public function editAnimalPage($params){
        $addAnimalView = new View('editAnimal');
        $id = $params['id'];
        $bdd = new DatabaseManager();
        $animal = $bdd->getAnimalById(intval($id));
        $addAnimalView->renderDashboard(array('animal' => $animal));
    }

    /**
     * This function is used to update an Animal values
    */
    public function updateAnimal($params){

        $bdd = new DatabaseManager();

        $currentAnimal = $bdd->getAnimalById(intval($params['id']));

        $animalToUpdate = new AnimalModel();

        $animalToUpdate->setId(intval($params['id']));
        $animalToUpdate->setName($_POST['name']);
        $animalToUpdate->setSpecies($_POST['species']);
        $animalToUpdate->setLiving($_POST['living']);

        if (!empty($_FILES['file']['name'])){
            $image_name = $_FILES['file']['name'];
            $image_data = file_get_contents($_FILES['file']['tmp_name']);
            $lastInsertedId = $bdd->addImage($image_name,$image_data);
            $bdd->deleteImg($currentAnimal->getImageId());
            $animalToUpdate->setImageId($lastInsertedId);
        } else {
            $animalToUpdate->setImageId($currentAnimal->getImageId());
        }

        $bdd->updateAnimal($animalToUpdate);

        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardAnimals');
    }

    /**
     *This function is used to add and Animal to database
     * and redirect user to the Animals page in dashboard
     */
    public function addAnimalToDatabase($params){

        $name = $_POST['name'];
        $species = $_POST['species'];
        $living = $_POST['living'];
        $image_name = $_FILES['file']['name'];

        $image_data = file_get_contents($_FILES['file']['tmp_name']);
        $bdd = new DatabaseManager();
        $lastInsertedId = $bdd->addImage($image_name,$image_data);
        $bdd->addAnimal($name, $species, $living, $lastInsertedId);


        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardAnimals');
    }

    public function deleteAnimal($params){
        $bdd = new DatabaseManager();
        $bdd->deleteAnimal(intval($params['id']));

        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardAnimals');
    }

    //Livings
    public function manageLivings(){

        $bdd = new DatabaseManager();
        $livingsToManage = $bdd->getLivings();
        $livingsView = new View('dashboardLivings');
        $livingsView->renderDashboard(array('livingsToManage' => $livingsToManage));
    }
    public function addLiving()
    {
        $addAnimalView = new View('addLiving');
        $addAnimalView->renderDashboard(array());
    }
    public function addLivingToDatabase($params){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image_name = $_FILES['file']['name'];
        $image_data = file_get_contents($_FILES['file']['tmp_name']);
        $bdd = new DatabaseManager();
        $lastInsertedId = $bdd->addImage($image_name,$image_data);
        $livingToAdd = new LivingModel();
        $livingToAdd->setName($name);
        $livingToAdd->setDescription($description);
        $livingToAdd->setImageId($lastInsertedId);
        $bdd->addLivingToDatabase($livingToAdd);

        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardLivings');


    }
    public function editLivingPage($params){
        $id = $params['id'];
        $bdd = new DatabaseManager();
        $living = $bdd->getLivingById(intval($id));
        $addAnimalView = new View('editLiving');
        $addAnimalView->renderDashboard(array('living' => $living));
    }
    public function updateLiving($params){

        $bdd = new DatabaseManager();

        $currentLiving = $bdd->getLivingById(intval($params['id']));

        $livingToUpdate = new LivingModel();

        $livingToUpdate->setId(intval($params['id']));
        $livingToUpdate->setName($_POST['name']);
        $livingToUpdate->setDescription($_POST['description']);

        if (!empty($_FILES['file']['name'])){
            $image_name = $_FILES['file']['name'];
            $image_data = file_get_contents($_FILES['file']['tmp_name']);
            $lastInsertedId = $bdd->addImage($image_name,$image_data);
            $bdd->deleteImg($currentLiving->getImageId());
            $livingToUpdate->setImageId($lastInsertedId);
        } else {
            $livingToUpdate->setImageId($currentLiving->getImageId());
        }

        $bdd->updateLiving($livingToUpdate);

        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardLivings');
    }
    public function deleteLiving($params){
        $bdd = new DatabaseManager();
        $bdd->deleteLiving(intval($params['id']));
        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardLivings');
    }

    //Services
    public function manageServices(){
        $bdd = new DatabaseManager();
        $servicesToManage = $bdd->getServices();
        $servicesView = new View('dashboardServices');
        $servicesView->renderDashboard(array('servicesToManage' => $servicesToManage));
    }
    public function addService()
    {
        $addAnimalView = new View('addService');
        $addAnimalView->renderDashboard(array());
    }
    public function addServiceToDatabase($params){
//        echo '<pre>'; print_r($_POST); echo '</pre>';
//        exit();
        $name = $_POST['name'];
        $schedule = $_POST['schedule'];
        $contactInfos = $_POST['contactInfos'];
        $description = $_POST['description'];
        $image_name = $_FILES['file']['name'];
        $image_data = file_get_contents($_FILES['file']['tmp_name']);

        $bdd = new DatabaseManager();
        $lastInsertedId = $bdd->addImage($image_name,$image_data);

        $serviceToAdd = new ServiceModel();
        $serviceToAdd->setName($name);
        $serviceToAdd->setSchedule($schedule);
        $serviceToAdd->setContactInfo($contactInfos);
        $serviceToAdd->setDescription($description);
        $serviceToAdd->setImageId($lastInsertedId);
        $bdd->addServiceToDatabase($serviceToAdd);

        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardServices');


    }
    public function editServicePage($params){
        $id = $params['id'];
        $bdd = new DatabaseManager();
        $service = $bdd->getServiceById(intval($id));
        $addServiceView = new View('editService');
        $addServiceView->renderDashboard(array('service' => $service));
    }
    public function updateService($params){

        $bdd = new DatabaseManager();

        $currentService = $bdd->getServiceById(intval($params['id']));

        $serviceToUpdate = new ServiceModel();

        $serviceToUpdate->setId(intval($params['id']));
        $serviceToUpdate->setName($_POST['name']);
        $serviceToUpdate->setSchedule($_POST['schedule']);
        $serviceToUpdate->setContactInfo($_POST['contactInfos']);
        $serviceToUpdate->setDescription($_POST['description']);

        if (!empty($_FILES['file']['name'])){
            $image_name = $_FILES['file']['name'];
            $image_data = file_get_contents($_FILES['file']['tmp_name']);
            $lastInsertedId = $bdd->addImage($image_name,$image_data);
            $bdd->deleteImg($currentService->getImageId());
            $serviceToUpdate->setImageId($lastInsertedId);
        } else {
            $serviceToUpdate->setImageId($currentService->getImageId());
        }

        $bdd->updateService($serviceToUpdate);

        $dashboardLivingsView = new View();
        $dashboardLivingsView->redirect('dashboardServices');
    }
    public function deleteService($params){
        $bdd = new DatabaseManager();
        $bdd->deleteService(intval($params['id']));
        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardServices');
    }



}
