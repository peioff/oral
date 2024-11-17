<?php
declare(strict_types=1);

class DashboardVetController
{
    public function manageReport()
    {
        $bdd = new DatabaseManager();
        $reports = $bdd->getReports();
        $animals = $bdd->getAllAnimals();

        $data = array('reports' => $reports, 'animals' => $animals);

        $view = new View('dashboardVet');
        $view->renderDashboard($data);
    }

    public function addReport()
    {
        $bdd = new DatabaseManager();
        $animals = $bdd->getAllAnimals();
        $feedings = $bdd->getFeedings();

        $data = array('animals' => $animals, 'feedings' => $feedings);

        $view = new View('addReport');
        $view->renderDashboard($data);

    }

    public function addReportToDatabase($params)
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $validAnimal = false;
            $animal = $_POST['animal'];
            $validDate = false;
            $date = $_POST['date'];
            $validHealth = false;
            $health = $_POST['health'];
            $remark = $_POST['remark'];

            if (!empty($animal)) {
                $validAnimal = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error'=> 'InvalidAnimal'
                ];
            }
            if (!empty($date)) {
                $validDate = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error'=> 'InvalidDate'
                ];
            }
            if (!empty($health)) {
                $validHealth = true;
            }
            else {
                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error'=> 'InvalidHealth'
                ];
            }
            if ($validAnimal && $validDate && $validHealth) {
                $bdd = new DatabaseManager();

                foreach ($bdd->getAllAnimals() as $animal) {
                    if ($animal->getName() == $_POST['animal']) {
                        $animalId = $animal->getId();
                    }
                }
                foreach ($bdd->getFeedings() as $feeding) {
                    if ($feeding->getAnimalId() == $animalId) {
                        $food = $feeding->getFood();
                        $foodQuantity = $feeding->getQuantity();
                        $feedingDate = $feeding->getDate();
                        $feedingDate = $feedingDate->format('d-m-Y');
                    }
                }
                $report = new ReportModel(0,new DateTime(),"Good","Na",0,new DateTime(),"Na",0);
                try {
                    $report->setDate(new DateTime($_POST['date']));
                } catch (Exception $e) {
                }
                $report->setHealth($_POST['health']);
                if (isset($food)) {
                    $report->setFood($food);
                    $report->setFoodQuantity($foodQuantity);
                    try {
                        $report->setFeedingDate(new DateTime($feedingDate));
                    } catch (Exception $e) {
                    }
                } else {
                    $report->setFood('Non renseigné');
                    $report->setFoodQuantity(0);
                    try {
                        $report->setFeedingDate(new DateTime('2000-01-01'));
                    } catch (Exception $e) {
                    }
                }
                $report->setRemark($_POST['remark']);
                $report->setAnimalId($animalId);

                $bdd->addReportToDatabase($report);

                $response = [
                    'success' => 'Request recieved successfully.',
                    'code' => HTTP_OK,
                    'error'=> 'none'
                ];
            }
            echo json_encode($response);
        }



    }

    public function feedingHistory($params)
    {


        $bdd = new DatabaseManager();
        $feedings = $bdd->getFeedings();
        $animals = $bdd->getAllAnimals();
        $data = array();
        foreach ($feedings as $feeding) {
            if ($feeding->getAnimalId() == intval($params['id'])) {
                $data[] = $feeding;
            }
        }
        $data = array('feedings' => $data, 'animals' => $animals);
        $view = new View('feedingHistory');
        $view->renderDashboard($data);

    }

    public function deleteReport($params)
    {
        $bdd = new DatabaseManager();
        $bdd->deleteReport(intval( $params['id']));

        $view = new View();
        $view->redirect('dashboardVet');
    }
}
