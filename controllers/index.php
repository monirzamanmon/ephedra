<?php
/**
 * Internal Index Page in the controllers
 * 
 * Delegates the incoming request to Front Controller, and returns the response.
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\controllers {
/**
 * @ignore
 */
require_once '../controllers/frontcontroller.php';
$controller = new FrontController();
echo $controller->processRequest();
}
 
?>