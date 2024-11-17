<?php
declare(strict_types=1);

/**
 * Class Routeur
 * This class creates routes and bind it with dedicated controller
 * Rewrite urls in navigation bar
 */
class Routeur
{
    private string $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    # definition of an array of array where each element is an array where [0] is the name of the controller associated to the request
    # and [1] is the method called in the controller
    private $routes = [
        //Home
        ""                          => ["controller" => 'HomeController', "method" => 'display'],
        "/"                          => ["controller" => 'HomeController', "method" => 'display'],
        "home"                      => ["controller" => 'HomeController', "method" => 'display'],
        "animalOnclick"              => ["controller" => 'HomeController', "method" => 'animalOnclick'],
        //Livings
        "livings"                   => ["controller" => 'LivingsController', "method" => 'display'],
        //Services
        "services"                  => ["controller" => 'ServicesController', "method" => 'display'],
        //Contact
        "contact"                   => ["controller" => 'ContactController', "method" => 'display'],
        "addContactToDatabase"      => ["controller" => 'ContactController', "method" => 'addContactToDatabase'],

        //Dashboard
        "connect"                   => ["controller" => 'DashboardController', "method" => 'display'],
        "connection"                => ["controller" => 'DashboardController', "method" => 'connection'],
        "disconnect"                => ["controller" => 'DashboardController', "method" => 'disconnect'],
        //Animals
        "dashboardAnimals"          => ["controller" => 'DashboardAnimalsController', "method" => 'manageAnimals'],
        "addAnimal.php"             => ["controller" => 'DashboardAnimalsController', "method" => 'addAnimalPage'],
        "addAnimalToDatabase"       => ["controller" => 'DashboardAnimalsController', "method" => 'addAnimalToDatabase'],
        "editAnimal.php"            => ["controller" => 'DashboardAnimalsController', "method" => 'editAnimalPage'],
        "updateAnimal"              => ["controller" => 'DashboardAnimalsController', "method" => 'updateAnimal'],
        "deleteAnimal"              => ["controller" => 'DashboardAnimalsController', "method" => 'deleteAnimal'],

        //Livings
        "dashboardLivings"          => ["controller" => 'DashboardLivingsController', "method" => 'manageLivings'],
        "addLiving.php"             => ["controller" => 'DashboardLivingsController', "method" => 'addLiving'],
        "addLivingToDatabase"       => ["controller" => 'DashboardLivingsController', "method" => 'addLivingToDatabase'],
        "editLiving.php"            => ["controller" => 'DashboardLivingsController', "method" => 'editLivingPage'],
        "updateLiving"              => ["controller" => 'DashboardLivingsController', "method" => 'updateLiving'],
        "deleteLiving"              => ["controller" => 'DashboardLivingsController', "method" => 'deleteLiving'],
            //Services
        "dashboardServices"         => ["controller" => 'DashboardServicesController', "method" => 'manageServices'],
        "addService.php"            => ["controller" => 'DashboardServicesController', "method" => 'addService'],
        "addServiceToDatabase"      => ["controller" => 'DashboardServicesController', "method" => 'addServiceToDatabase'],
        "editService.php"           => ["controller" => 'DashboardServicesController', "method" => 'editServicePage'],
        "updateService"             => ["controller" => 'DashboardServicesController', "method" => 'updateService'],
        "deleteService"             => ["controller" => 'DashboardServicesController', "method" => 'deleteService'],
            //Feeding
        "dashboardFeedings"         => ["controller" => 'DashboardFeedingsController', "method" => 'manageFeeding'],
        "addFeeding.php"            => ["controller" => 'DashboardFeedingsController', "method" => 'addFeeding'],
        "addFeedingToDatabase"      => ["controller" => 'DashboardFeedingsController', "method" => 'addFeedingToDatabase'],
        "editFeeding.php"           => ["controller" => 'DashboardFeedingsController', "method" => 'editFeedingPage'],
        "updateFeeding"             => ["controller" => 'DashboardFeedingsController', "method" => 'updateFeeding'],
        "deleteFeeding"             => ["controller" => 'DashboardFeedingsController', "method" => 'deleteFeeding'],
            //VeterinaryReports
        "dashboardVet"              => ["controller" => 'DashboardVetController', "method" => 'manageReport'],
        "addReport.php"             => ["controller" => 'DashboardVetController', "method" => 'addReport'],
        "addReportToDatabase"       => ["controller" => 'DashboardVetController', "method" => 'addReportToDatabase'],
        "feedingHistory"            => ["controller" => 'DashboardVetController', "method" => 'feedingHistory'],
        "deleteReport"              => ["controller" => 'DashboardVetController', "method" => 'deleteReport'],
            //Comments
        "submitComment"             => ["controller" => 'DashboardCommentsController', "method" => 'submitComment'],
        "dashboardComments"         => ["controller" => 'DashboardCommentsController', "method" => 'manageComments'],
        "switchVisibility"          => ["controller" => 'DashboardCommentsController', "method" => 'switchVisibility'],
        "deleteComment"             => ["controller" => 'DashboardCommentsController', "method" => 'deleteComment'],
            //Users
        "dashboardUsers"            => ["controller" => 'DashboardUsersController', "method" => 'manageUsers'],
        "addUser.php"               => ["controller" => 'DashboardUsersController', "method" => 'addUser'],
        "addUserToDatabase"         => ["controller" => 'DashboardUsersController', "method" => 'addUserToDatabase'],
        "editUser"                  => ["controller" => 'DashboardUsersController', "method" => 'editUser'],
        "updateUser"                => ["controller" => 'DashboardUsersController', "method" => 'updateUser'],
        "deleteUser"                => ["controller" => 'DashboardUsersController', "method" => 'deleteUser'],
            //Contacts
        "dashboardContacts"         => ["controller" => 'DashboardContactsController', "method" => 'manageContacts'],
        "answerContact"             => ["controller" => 'DashboardContactsController', "method" => 'answerContact'],
        "deleteContact"             => ["controller" => 'DashboardContactsController', "method" => 'deleteContact'],
            //Ajax AnimalOnClick
        "contactApproval"           => ["controller" => 'AjaxController', "method" => 'contactApproval'],














    ];


    /**
     * This function is used to explode a request
     * in order to get the route name which is
     * the first element in the url of a link
     */
    public function getRoute()
    {
        $elements = explode("/", $this->request);
        return $elements[0];
    }

    /**
     * This function is used to explode a request
     * in order to get the params which is
     * the last element in the url of a link
     */
    public function getParams()
    {
        $elements = explode("/", $this->request);
        unset($elements[0]);

        for ($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i]] = $elements[$i + 1];
            $i++;
        }
        if (!isset($params)) {
            $params = null;
        }
        return $params;
    }

    /**
     * This function is used to instantiate the controller associated to the route (url)
     */
    public function renderController()
    {

        $route = $this->getRoute();
        $params = $this->getParams();

        #If the controller exists, instantiate the controller, else 404 not found
        if (key_exists($route, $this->routes)) {
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);

        } else {
            echo "Rooter called but 404 Page not found";
        }
    }

}
