<?php
declare(strict_types=1);

class DashboardLivingsController
{
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
}
