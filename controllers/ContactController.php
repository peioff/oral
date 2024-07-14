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

        $contactInfos = [];
        $contactView = new View('contact');
        $contactView->render(array('contactInfos' => $contactInfos));

    }
}

