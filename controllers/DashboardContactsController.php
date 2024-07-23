<?php
declare(strict_types=1);

class DashboardContactsController
{
    public function manageContacts()
    {
        $bdd = new DatabaseManager();
        $data = $bdd->getContacts();

        $view = new View('dashboardContacts');
        $view->renderDashboard(array('data' => $data));
    }
    public function answerContact($params){
           //TODO find a way send mail in order to answer
    }
    public function deleteContact($params){
        $bdd = new DatabaseManager();
        $bdd->deleteContact(intval($params['id']));
        $view = new View();
        $view->redirect('dashboardContacts');
    }
}