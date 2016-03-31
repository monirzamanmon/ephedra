<?php
/**
 * Generic Handler Class File
 * 
 * This file contains the GenericActionHandler class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\controllers {
	
/**
 * @ignore
 */
require_once '../decorators/basedecorator.php';
require_once '../models/model.php';

use ephedra\decorators\BaseDecorator;
use ephedra\models\Model;

/**
 * Generic Action Handler Class
 * 
 * The GenericActionHandler class implements the basic action handling for 
 * all child action hanlders. 
 * @abstract
 */
abstract class GenericActionHandler {

/**
 * Holder for Model reference
 * 
 * @var Model
 * @access protected
 */
    protected $model;

/**
 * Holder for Decorator reference
 * 
 * @var Decorator
 * @access protected
 */
    protected $decorator;
    
/**
 * Allows children to define their own model
 * @abstract
 * @access protected
 */
    protected abstract function defineModel();

/**
 * Allows children to define their own decorator
 * @abstract
 * @access protected
 */
    protected abstract function defineDecorator();
    
/**
 * Maps action against corresponding model
 * 
 * @var Array
 * @access private
 */
    private $actionToModelMap;


/**
 * Default Constructor for Generic Action Handler
 * 
 * The Generic Action Handler initializes the Action to Model Map and Configures 
 * it in the constructor. Apart from that it allows the children classes to define 
 * their own model and decorators.
 * 
 * @access public 
 */
    public function __construct() {
        $this->defineModel();
        $this->defineDecorator();
        $this->actionToModelMap = array();
        $this->configureActionToModel();
    }

/**
 * Generic action handling method
 * 
 * There is a specific model and operation against each action and parameter combination.
 * This method typically tries to find out the responsible combination, performs the 
 * operation, and hands over the return content to decorator to decorate with view. When 
 * Decorator is done, the handler returns the decorated content.
 * 
 * @param string $action The action to handle
 * @param string $param The parameter passed eventually to model
 * @return string
 * @access public 
 */
    public function handleAction($action, $param) {
        $returnValue = "";
        if (\is_null($this->model) || (\is_null($this->decorator))) {
            return $returnValue;
        }
        
        if (!($this->decorator instanceof BaseDecorator) || !($this->model instanceof Model)) {
            return $returnValue;
        }

        if (!\array_key_exists($action, $this->actionToModelMap)) {
            return returnValue;
        }
        
        $method = $this->actionToModelMap[$action];
        //try {
            if (empty($param)) {
                $information = \call_user_func(array($this->model, $method));
            } else {
                $information = \call_user_func(array($this->model, $method), $param);
            }
            $this->decorator->setDecorationContent($information);
            $returnValue = $this->decorator->getViewContent();
        //} catch (Exception $ex) {
            // just let return blank
        //}
        return $returnValue;
    }
    
/**
 * Configures the Action to Model Map
 * 
 * There is a specific model and operation against each action and parameter combination.
 * This method configures the responsible combination.
 * 
 * @param string $action The action to handle
 * @param string $param The parameter passed eventually to model
 * @access protected 
 */
    protected function configureActionToModel() {
        $this->actionToModelMap["view"] = "get";
        $this->actionToModelMap["list"] = "listAll";
        $this->actionToModelMap["add"] = "add";
        $this->actionToModelMap["update"] = "update";
        $this->actionToModelMap["delete"] = "delete";
    }
}
}

?>