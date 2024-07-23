<?php
declare(strict_types=1);

/**
 * Class View
 * This class merges the template view (in views folder) with the view _gabarit.php
 *
 * @param $template // $template is the name of the php file in views folder called to be rendered
 *
 */
class View {
    private $template;
    public function __construct($template = null) {
        $this->template = $template;
    }

    /**
     * This function merge $template with _gabarit.php
     * @param array $data
     * $data is an array to pass to $template
    */
    public function render($data = array()) {

        echo '<pre>';
        echo 'render from view called';
        echo '<pre>';


        exit();

        #set $data the name of the array given as parameter in the controller
        #Method 1
//        forEach($data as $name => $value) {
//            ${$name} = $value;
//        }
        #Method 2
        extract($data);

        $template = $this->template;
        #$template is cached with ob_start()
        ob_start();
        include(VIEWS.$template . '.php');
        $contentPage = ob_get_clean();
        #$template is merged with _gabarit.php
        include_once(VIEWS.'_gabarit.php');
    }

    /**
     * This function merge $template with _gabaritDashboard.php
     * @param array $data
     * $data is an array to pass to $template
     */
    public function renderDashboard($data) {
        extract($data);

        $template = $this->template;
        #$template is cached with ob_start()
        ob_start();
        include(VIEWS.$template . '.php');
        $contentPage = ob_get_clean();
        #$template is merged with _gabarit.php
        include_once(VIEWS.'_gabaritDashBoard.php');
    }

    /**
     * This function is used to redirect user to a specified route
     *
     * @param $route // $route is specified in Router.php
     *
    */
    public function redirect($route){
        header('Location:'.HOST.$route);
        exit();
    }


}
