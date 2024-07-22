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

    public function addContactToDatabase(ContactModel $contact){
        $bdd = new DatabaseManager();
        $bdd->addContactToDatabase($contact);
    }
}

