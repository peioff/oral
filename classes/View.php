<?php
declare(strict_types=1);

/**
 * Class View
 * This class merges the template view (in views folder) with the view _gabarit.php
 */
class View {
    #$template is the name of the php file in views folder called to be rendered
    private $template;
    public function __construct($template) {
        $this->template = $template;
    }

    # This function merge $template with _gabarit.php
    # The param is the $data (an array) to pass to $template
    public function render($data = array()) {
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
}