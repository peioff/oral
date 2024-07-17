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
        ""                     => ["controller" => 'HomeController', "method" => 'display'],
        "home"                  => ["controller" => 'HomeController', "method" => 'display'],
        "submitComment"         => ["controller" => 'HomeController', "method" => 'submitComment'],
        //Livings
        "livings"               => ["controller" => 'LivingsController', "method" => 'display'],
        //Services
        "services"              => ["controller" => 'ServicesController', "method" => 'display'],
        //Contact
        "contact"               => ["controller" => 'ContactController', "method" => 'display'],
        //Dashboard
        "connect"               => ["controller" => 'DashboardController', "method" => 'display'],
        "connection"            => ["controller" => 'DashboardController', "method" => 'connection'],
            //Animals
        "dashboardAnimals"      => ["controller" => 'DashboardController', "method" => 'manageAnimals'],
        "addAnimal.php"         => ["controller" => 'DashboardController', "method" => 'addAnimalPage'],
        "addAnimalToDatabase"   => ["controller" => 'DashboardController', "method" => 'addAnimalToDatabase'],
        "editAnimal.php"        => ["controller" => 'DashboardController', "method" => 'editAnimalPage'],
        "updateAnimal"          => ["controller" => 'DashboardController', "method" => 'updateAnimal'],
        "deleteAnimal"          => ["controller" => 'DashboardController', "method" => 'deleteAnimal'],
            //Livings
        "dashboardLivings"      => ["controller" => 'DashboardController', "method" => 'manageLivings'],
        "addLiving.php"         => ["controller" => 'DashboardController', "method" => 'addLiving'],
        "addLivingToDatabase"   => ["controller" => 'DashboardController', "method" => 'addLivingToDatabase'],
        "editLiving.php"        => ["controller" => 'DashboardController', "method" => 'editLivingPage'],
        "updateLiving"        => ["controller" => 'DashboardController', "method" => 'updateLiving'],
        "deleteLiving"          => ["controller" => 'DashboardController', "method" => 'deleteLiving'],

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
            echo "404 Page not found";
        }
    }

}