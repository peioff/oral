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
    public function addServiceToDatabase(){
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            $validName = false;
            $name = $_POST['name'];
            $validSchedule = false;
            $schedule = $_POST['schedule'];
            $validContactInfos = false;
            $contactInfos = $_POST['contactInfos'];
            $validDescription = false;
            $description = $_POST['description'];
            $validFileName = false;
            $fileName = $_FILES['file']['name'];
            $validFileData = false;
            $fileData = file_get_contents($_FILES['file']['tmp_name']);

            if (!empty($name)){
                $validName = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidName'
                ];
            }
            if (!empty($schedule)){
                $validSchedule = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidSchedule'
                ];
            }
            if (!empty($contactInfos)){
                $validContactInfos = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidCOntactInfos'
                ];
            }
            if (!empty($description)){
                $validDescription = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidDescription'
                ];
            }
            if (preg_match('/^[\/\w\-. ]+$/', $fileName)){
                $validFileName = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Invalid FileName'
                ];
            }
            if (mime_content_type($_FILES['file']['tmp_name']) == 'image/jpeg'){
                $validFileData = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Invalid fileType'
                ];
            }

            if ($validName && $validSchedule && $validContactInfos && $validDescription && $validFileName && $validFileData){
                $bdd = new DatabaseManager();
                $lastInsertedId = $bdd->addImage($fileName,$fileData);

                $serviceToAdd = new ServiceModel();
                $serviceToAdd->setName($name);
                $serviceToAdd->setSchedule($schedule);
                $serviceToAdd->setContactInfo($contactInfos);
                $serviceToAdd->setDescription($description);
                $serviceToAdd->setImageId($lastInsertedId);
                $bdd->addServiceToDatabase($serviceToAdd);

                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'none'
                ];
            }


            echo json_encode($response);
        }








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
