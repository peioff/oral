<?php
declare(strict_types=1);

class AjaxController
{
    public function contactApproval(){
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ){

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

}

