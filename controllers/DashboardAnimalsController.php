<?php
declare(strict_types=1);


class DashboardAnimalsController
{
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
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
            $validName = false;
            $name = $_POST['name'];
            $validSpecies = false;
            $species = $_POST['species'];
            $validLiving = false;
            $living = $_POST['living'];
            $validFileName = false;
            $imageName = $_FILES['file']['name'];
            $validData = false;
            $imageData = file_get_contents($_FILES['file']['tmp_name']);

            if (!empty($name)){
                $validName = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Nom animal invalide'
                ];
            }
            if (!empty($species)){
                $validSpecies = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Nom Espece invalide'
                ];
            }
            if (!empty($living)){
                $validLiving = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Nom Habitat invalide'
                ];
            }
            if (preg_match('/^[\/\w\-. ]+$/', $imageName)){
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
                $validData = true;
            }
            else {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'Invalid fileType'
                ];
            }

            if ($validName && $validSpecies && $validLiving && $validFileName && $validData){
                $bdd = new DatabaseManager();
                $lastInsertedId = $bdd->addImage($imageName, $imageData);
                $bdd->addAnimal($name, $species, $living, $lastInsertedId);
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'error' => 'none'
                ];
            }
            echo json_encode($response);
        }

    }

    public function deleteAnimal($params){
        $bdd = new DatabaseManager();
        $bdd->deleteAnimal(intval($params['id']));

        $dashboardAnimalsView = new View();
        $dashboardAnimalsView->redirect('dashboardAnimals');
    }

    public function scoreAndCheckout()
    {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {

            $bdd = new DatabaseManager();
            $animal = $bdd->getAnimalById(intval($_GET['animalId']));


             foreach ($bdd->getReports() as $element){
                 if($element->getAnimalId() == $animal->getId()){
                     $report = $element;
                 }
             }
             foreach ($bdd->getFeedings() as $element){
                 if($element->getAnimalId() == $animal->getId()){
                     $feeding = $element;
                 }
             }

             if (isset($report)){
                 $date = ($report->getDate())->format('d-m-Y');
                 $health = $report->getHealth();
                 $remarks = $report->getRemark();
             }
             else{
                 $date = $animal->getName() . ' n\'a pas encore été visité par le vétérinaire!';
                 $health = $animal->getName() . ' n\'a pas encore été visité par le vétérinaire!';
                 $remarks = $animal->getName() . ' n\'a pas encore été visité par le vétérinaire!';
             }
             if (isset($feeding)){
                 $food = $feeding->getFood();
                 $quantity = $feeding->getQuantity();
             }
             else {
                 $food = $animal->getName() . ' n\'a encore rien mangé!';
                 $quantity = '0';
             }



            $response = [
                'success' => 'Request received successfully.',
                'code' => HTTP_OK,
                'id' => $animal->getId(),
                'name' => $animal->getName(),
                'species' => $animal->getSpecies(),
                'living' => $animal->getLiving(),
                'food' => $food,
                'quantity' => $quantity,
                'date' => $date,
                'health' => $health,
                'remarks' => $remarks

                ];
            echo json_encode($response);
        }

    }

}