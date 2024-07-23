<?php
#Error managing setup
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * The AutoLoad Class is used to avoid having to include classes in files each time a class is used
 * The start function defines global variables that will be used in the application
*/
class AutoLoad
{
    public static function start()
    {
        # autoLoad Function declaration
        spl_autoload_register(array(__CLASS__, 'autoload'));

        #Get server variables
        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        #Global variables
        define('HOST', 'http://'.$host.'/app/');
        define('ROOT', $root.'/app/');

        define('CLASSES', ROOT.'classes/');
        define('CONTROLLERS', ROOT.'controllers/');
        define('VIEWS', ROOT.'views/');
        define('MODELS', ROOT.'models/');

        define('ASSETSCSS', HOST.'assets/css/');
        define('ASSETSIMG', HOST.'assets/images/');
        define('ASSETSLOGO', HOST.'assets/logos/');
    }

    #autoLoad function. Avoid to include classes in each objects
    public static function autoload($class)
    {
        if (file_exists(MODELS.$class.'.php')) {
            include_once(MODELS.$class.'.php');
        } else if (file_exists(CLASSES.$class.'.php')) {
            include_once(CLASSES.$class.'.php');
        } else if (file_exists(CONTROLLERS.$class.'.php')) {
            include_once(CONTROLLERS.$class.'.php');
        }
    }
}

