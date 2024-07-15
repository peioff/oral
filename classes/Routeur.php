<?php
declare(strict_types=1);

/**
 * Class Routeur
 * This class creates routes and bind it with dedicated controller
 * Rewrite urls in navigation bar
 */

class Routeur
{
    #request recovery (from index.php - $_GET['r'])
    private string $request;

    # definition of an array of array where each element is an array where [0] is the name of the controller associated to the request
    # and [1] is the method called in the controller
    private $routes = [
        "/"                   => ["controller" => 'HomeController', "method" => 'display'],
        "home"                => ["controller" => 'HomeController', "method" => 'display'],
        "livings"             => ["controller" => 'LivingsController', "method" => 'display'],
        "services"            => ["controller" => 'ServicesController', "method" => 'display'],
        "contact"             => ["controller" => 'ContactController', "method" => 'display'],
        "connect"             => ["controller" => 'DashboardController', "method" => 'display'],
        "connection"          => ["controller" => 'DashboardController', "method" => 'connection'],
        "dashboardAnimals"    => ["controller" => 'DashboardController', "method" => 'manageAnimals'],
        "addAnimal.php"       => ["controller" => 'DashboardController', "method" => 'addAnimalPage'],
        "addAnimalToDatabase" =>["controller" => 'DashboardController', "method" => 'addAnimalToDatabase'],
        "submitComment"       => ["controller" => 'HomeController', "method" => 'submitComment'],
        ];


    public function __construct($request){
        $this->request = $request;
    }

    /**
     * This function is used to instantiate the controller associated to the route (url)
    */
    public function renderController(){

        $request = $this->request;
        #If the controller exists, instantiate the controller, else 404 not found
        if (key_exists($request, $this->routes)) {
            $controller = $this->routes[$request]['controller'];
            $method = $this->routes[$request]['method'];

            $currentController = new $controller();
            $currentController -> $method();

        } else {
            echo "404 Page not found";
        }
    }

}