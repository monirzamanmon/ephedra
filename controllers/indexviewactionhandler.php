<?php
/**
 * Index View Action Handler Class File
 * 
 * This file contains the IndexViewActionHandler class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\controllers {
	
/**
 * @ignore
 */
require_once '../controllers/genericactionhandler.php';
require_once '../decorators/indexviewdecorator.php';

use ephedra\decorators\IndexViewDecorator;

/**
 * Index View Action Handler Class
 * 
 * The IndexViewActionHandler class implements the action handling for Index View (default)
 */
class IndexViewActionHandler extends GenericActionHandler {

/**
 * Defines the decorator for the action
 * 
 * This implements the abstract method defineDecorator of GenericActionHandler.
 * GenericActionHandler calls this method so that all different action handlers
 * can define their own decorators.
 * @access protected 
 */
    protected function defineDecorator() {
        $this->decorator = new IndexViewDecorator();
    }

/**
 * Defines the model for the action
 * 
 * This implements the abstract method defineModel of GenericActionHandler.
 * GenericActionHandler calls this method so that all different action handlers
 * can define their own models.
 * @access protected 
 */
    protected function defineModel() {
        $this->model = null;
    }

/**
 * Custom action handling for Index View
 * 
 * Index view page in this example does not need a model transformation. So it 
 * overrides the default behavior of Generic Action Handler.
 * 
 * @param string $action The action to handle
 * @param string $param The parameter passed eventually to model
 * @return string
 * @access public 
 */
    public function handleAction($action, $param) {
        $this->decorator->setDecorationContent("");
        return $this->decorator->getViewContent();
    }
}
}

?>