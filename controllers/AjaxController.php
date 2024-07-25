<?php
declare(strict_types=1);

class AjaxController
{
    public function contactApproval()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            $response = array();
            $fieldsCompleted = false;
            $mailValid = false;
            $nickname = $_POST['nickname'];
            $title = $_POST['title'];
            $email = $_POST['email'];
            $content = $_POST['content'];

            if (empty($nickname) || empty($title) || empty($content) || empty($email)) {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'message' => 'Un champ est vide',
                    'error' => 'emptyField'
                ];
            } else {
                $fieldsCompleted = true;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'message' => 'Adresse mail invalide',
                    'error' => 'invalidEmail'
                ];
            } else {
                $mailValid = true;
            }

            if ($fieldsCompleted && $mailValid) {
                $contactController = new ContactController();
                $contact = new ContactModel();
                $contact->setDate(new DateTime());
                $contact->setNickname($_POST['nickname']);
                $contact->setTitle($_POST['title']);
                $contact->setEmail($_POST['email']);
                $contact->setContent($_POST['content']);
                $contact->setAnswered(0);
                $contactController->addContactToDatabase($contact);

                $response = [
                    'success' => 'Request received successfully.',
                    'code' => HTTP_OK,
                    'message' => 'Demande de contact envoyée!'
                ];
            }
            echo json_encode($response);


        } else {
            $response = [
                'success' => 'false',
                'message' => 'Test message'
            ];
            echo json_encode($response);
        }
    }

    public function animalOnClick()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            $bdd = new DatabaseManager();
            $animal = $bdd->getAnimalById(intval($_GET['animalId']));
            $bdd->incrementAnimalScore($animal);

            $reports = $bdd->getReports();
            $food = "";
            $foodQuantity = "";
            $feedingDate = "";
            $date = "";
            $health ="";
            $remark ="";

            foreach ($reports as $element) {
                if ($element->getAnimalId() == $animal->getId() ) {
                    $food = $element->getFood();
                    $foodQuantity = $element->getFoodQuantity();
                    $feedingDate = $element->getFeedingDate()->format('d-m-Y');
                    $date = $element->getDate()->format('d-m-Y');
                    $health = $element->getHealth();
                    $remark = $element->getRemark();
                }
            }


            $response = [
                'success' => 'Request received successfully.',
                'code' => HTTP_OK,
                'name' => $animal->getName(),
                'specie' => $animal->getSpecies(),
                'living' => $animal->getLiving(),
                'food' => $food,
                'foodQuantity' => $foodQuantity,
                'feedingDate' => $feedingDate,
                'date' => $date,
                'health' => $health,
                'remark' => $remark,
            ];
        } else {
            $response = [
                'success' => 'false',
                'message' => 'Request has failed'
            ];
        }
        echo json_encode($response);

    }


}

