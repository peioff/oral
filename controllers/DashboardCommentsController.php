<?php
declare(strict_types=1);

class DashboardCommentsController
{
    public function manageComments()
    {
        $bdd = new DatabaseManager();
        $data = $bdd->getComments();

        $view = new View('dashboardComments');
        $view->renderDashboard($data);

    }
    /**
     * This method is used in the to submit a comment
     * First, it ensures fields values are not blank
     * If blank, tell the user
     * Else, encode values to avoid SQL injection,
     * Check some parameters,
     * Insert in Database,
     * Tells the user comment is submitted
     * Finally, redirects user toward the homePage via the view object
     */
    public function submitComment(){
        //TODO : Check if values are empty, inform the user of the state

        $nickname =htmlspecialchars($_POST['nickname'], ENT_QUOTES, 'UTF-8');
        $content =htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
        $databaseManager = new DatabaseManager();

        $databaseManager->insertComment($nickname, $content);

        $homeView = new View();
        $homeView->redirect('home');


    }
    public function switchVisibility($params){
        $bdd = new DatabaseManager();
        $bdd->changeCommentVisibility(intval($params['id']));

        $view = new View();
        $view->redirect('dashboardComments');
    }

    public function deleteComment($params){
        $bdd = new DatabaseManager();
        $bdd->deleteComment(intval($params['id']));
        $view = new View();
        $view->redirect('dashboardComments');
    }
}