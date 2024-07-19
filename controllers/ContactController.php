<?php
declare(strict_types=1);

/**
 * Classe ContactController
 * Used to diplay the contact page
 * Display is done with a View Object
 * The View Object Method (render) requires an array as param
 */

class ContactController
{
    public function display(){
        $view = new View('contact');
        $view->render();
    }

    public function addContactToDatabase(){

        $bdd = new DatabaseManager();

        $contact = new ContactModel();
        $contact->setDate(new DateTime());
        $contact->setNickname($_POST['nickname']);
        $contact->setTitle($_POST['title']);
        $contact->setEmail($_POST['email']);
        $contact->setContent($_POST['content']);
        $contact->setAnswered(0);

        $bdd->addContactToDatabase($contact);

        $view = new View();
        $view->redirect('home');


    }
}

