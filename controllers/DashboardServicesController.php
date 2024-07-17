<?php
declare(strict_types=1);

class DashboardServicesController
{
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
