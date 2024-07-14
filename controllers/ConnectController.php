<?php
declare(strict_types=1);

/**
 * Classe ConnectController
 * Used to diplay the connect page
 */

class ConnectController
{
    public function display(){
        include (VIEWS.'connect.php');
    }
}
