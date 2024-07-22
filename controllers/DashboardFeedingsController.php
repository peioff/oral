<?php
declare(strict_types=1);

class DashboardFeedingsController
{
    public function manageFeeding(){
        $bdd = new DatabaseManager();
        $feedings = $bdd->getFeedings();
        $animals = $bdd->getAllAnimals();

        $data = array('feedings' => $feedings, 'animals' => $animals);

        $view = new View('dashboardFeedings');
        $view->renderDashboard(array('data' => $data));
    }
    public function addFeeding($params)
    {
        $bdd = new DatabaseManager();
        $animalToFeed = $bdd->getAnimalById(intval($params['id']));
        $view = new View('addFeeding');
        $view->renderDashboard(array('animalToFeed' => $animalToFeed));
    }
    public function addFeedingToDatabase($params){
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            $validDate = false;
            $date = $_POST["date"];
            $validFood = false;
            $food = $_POST["food"];
            $validQuantity = false;
            $quantity = $_POST["quantity"];
            $animalId = $_POST["animalId"];

            if (!empty($date)) {
                $validDate = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidDate'
                ];
            }
            if (!empty($food)) {
                $validFood = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidFood'
                ];
            }
            if (!empty($quantity)) {
                $validQuantity = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'InvalidQuantity'
                ];
            }

            if ($validDate && $validFood && $validQuantity) {
                $feedingToAdd = new FeedingModel();
                try {
                    $feedingToAdd->setDate(new DateTime($_POST['date']));
                } catch (Exception $e) {
                }
                $feedingToAdd->setFood($_POST['food']);
                $feedingToAdd->setQuantity(intval($_POST['quantity']) );
                $feedingToAdd->setAnimalId(intval($animalId));
                $bdd = new DatabaseManager();
                $bdd->addFeedingToDatabase($feedingToAdd);

                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error' => 'none'
                ];
            }







            echo json_encode($response);
        }


    }
    public function editFeedingPage($params){

        $bdd = new DatabaseManager();
        $id = $params['id'];
        $feeding = $bdd->getFeedingById(intval($id));
        $animal = $bdd->getAnimalById(intval($feeding->getAnimalId()));
        $data = array('feeding' => $feeding, 'animal' => $animal);

        $addServiceView = new View('editFeeding');
        $addServiceView->renderDashboard(array('data' => $data));
    }
    public function updateFeeding($params){
//        echo $params['id'];
//        echo '<pre>'; print_r($_POST); echo '</pre>';
//        exit();

        $feedingToUpdate = new FeedingModel();
        $feedingToUpdate->setId(intval($params['id']));
        try {
            $feedingToUpdate->setDate(new DateTime($_POST['date']));
        } catch (Exception $e) {
        }
        $feedingToUpdate->setFood($_POST['food']);
        $feedingToUpdate->setQuantity(intval($_POST['quantity']));
        $feedingToUpdate->setAnimalId(intval($_POST['animalId']));

        $bdd = new DatabaseManager();
        $bdd->updateFeeding($feedingToUpdate);

        $view = new View();
        $view->redirect('dashboardFeedings');
    }
    public function deleteFeeding($params)
    {
        $bdd = new DatabaseManager();
        $bdd->deleteFeeding(intval($params['id']));
        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardFeedings');
    }


}
