<?php
declare(strict_types=1);

class DashboardLivingsController
{
    //Livings
    public function manageLivings()
    {

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

    public function addLivingToDatabase($params)
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $validName = false;
            $name = $_POST['name'];
            $validDescription = false;
            $description = $_POST['description'];
            $validFileName = false;
            $fileName = $_FILES['file']['name'];
            $validFileData = false;
            $fileData = file_get_contents($_FILES['file']['tmp_name']);

            if(!empty($name)){
                $validName = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidName'
                ];
            }
            if(!empty($description)){
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
                    'error' => 'Invalid FIleName'
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

            if ($validName && $validDescription && $validFileName && $validFileData){
                $bdd = new DatabaseManager();
                $lastInsertedId = $bdd->addImage($fileName,$fileData);
                $livingToAdd = new LivingModel();
                $livingToAdd->setName($name);
                $livingToAdd->setDescription($description);
                $livingToAdd->setImageId($lastInsertedId);
                $bdd->addLivingToDatabase($livingToAdd);

                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'none'
                ];
            }




            echo json_encode($response);
        }



////
////        $dashboardAnimalsView = new View();
////        $dashboardAnimalsView->redirect('dashboardLivings');


    }

    public function editLivingPage($params)
    {
        $id = $params['id'];
        $bdd = new DatabaseManager();
        $living = $bdd->getLivingById(intval($id));
        $addAnimalView = new View('editLiving');
        $addAnimalView->renderDashboard(array('living' => $living));
    }

    public function updateLiving($params)
    {

        $bdd = new DatabaseManager();

        $currentLiving = $bdd->getLivingById(intval($params['id']));

        $livingToUpdate = new LivingModel();

        $livingToUpdate->setId(intval($params['id']));
        $livingToUpdate->setName($_POST['name']);
        $livingToUpdate->setDescription($_POST['description']);

        if (!empty($_FILES['file']['name'])) {
            $image_name = $_FILES['file']['name'];
            $image_data = file_get_contents($_FILES['file']['tmp_name']);
            $lastInsertedId = $bdd->addImage($image_name, $image_data);
            $bdd->deleteImg($currentLiving->getImageId());
            $livingToUpdate->setImageId($lastInsertedId);
        } else {
            $livingToUpdate->setImageId($currentLiving->getImageId());
        }

        $bdd->updateLiving($livingToUpdate);

        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardLivings');
    }

    public function deleteLiving($params)
    {
        $bdd = new DatabaseManager();
        $bdd->deleteLiving(intval($params['id']));
        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardLivings');
    }
}