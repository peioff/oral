<?php
#Error managing setup
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE); // add " & ~E_NOTICE " (To disable notices)

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
        define('HOST', 'http://'.$host.'/ecf/');
        define('ROOT', $root.'/ecf/');

        define('CLASSES', ROOT.'classes/');
        define('CONTROLLERS', ROOT.'controllers/');
        define('VIEWS', ROOT.'views/');
        define('MODELS', ROOT.'models/');

        define('ASSETSCSS', HOST.'assets/css/');
        define('ASSETSIMG', HOST.'assets/images/');
        define('ASSETSLOGO', HOST.'assets/logos/');

        define('SCRIPTS', HOST.'assets/js/');

        define('HTTP_OK', "200");
        define('HTTP_BAD_REQUEST', "400");
        define('HTTP_UNAUTHORIZED', "401");
        define('HTTP_FORBIDDEN', "403");
        define('HTTP_NOT_FOUND', "404");
        define('HTTP_METHOD_NOT_ALLOWED', "405");
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

