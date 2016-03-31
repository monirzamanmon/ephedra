<?php
/**
 * Front Controller Class File
 * 
 * This file contains the FrontController class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\controllers {

/**
 * @ignore
 */
require_once '../controllers/indexviewactionhandler.php';
require_once '../helpers/securityhelper.php';
require_once '../appregistry/applicationregistry.php';

use ephedra\helpers\SecurityHelper;
use ephedra\appregistry\ApplicationRegistry;
	
/**
 * Front Controller Class
 * 
 * The FrontController class implements the request processing activities
 */
class FrontController {
    
/**
 * Maps targets and actions to specific handlers
 * 
 * @var Model
 * @access protected
 */
    var $targetActionMap = array();
    
/**
 * Default Constructor for Front Controller
 * 
 * The Front Controller Class configures the mapping between all targets, actions and 
 * their respective handlers. This class also processes requests to be delegated to 
 * their corresponding handlers.
 * 
 * @access public 
 */
    public function __construct() {
        $this->configure();
    }
        
/**
 * Processes requests
 * 
 * Typically a request is expected in this miniature framework for evaluation is like:
 * index.php?target=X&action=Y&param=z format, although param may not be present
 * @access public 
 */
    public function processRequest() {

        $processedRequest = SecurityHelper::getSecureRequestInputs();

        $target = $processedRequest["target"];
        $action = $processedRequest["action"];
		$param = [];
        $param['_param_'] = $processedRequest["param"];
		
		$param = SecurityHelper::getSecurePostInputs($param);
		return $this->delegateToHandler($target, $action, $param);
    }

	
/**
 * Delegates processing the responsible handler
 * 
 * For each of the targets, a specific handler is delegated to.
 * 
 * @param string $target The Target to handle
 * @param string $action The Action to handle
 * @param string $param The Parameter to handle
 * @access private 
 */
    private function delegateToHandler($target, $action, $param) {
        if (!empty($target) && !empty($action)) {
            if (!array_key_exists($target, $this->targetActionMap)) {
                return $this->defaultAction();
            }

            $targetActions = $this->targetActionMap[$target];
            
            if (!array_key_exists($action, $targetActions)) {
                return $this->defaultAction();
            }

            $actionHandlerInfo = $targetActions[$action];
            
            if (!isset($actionHandlerInfo[0]) || !isset($actionHandlerInfo[1])) {
                return $this->defaultAction();
            }

            $handlerFile = $actionHandlerInfo[0];
            $handlerName = $actionHandlerInfo[1];
            
            if (!is_readable($handlerFile)) {
                return $this->defaultAction();
            }
            
            return $this->invokeHandlerAction($handlerFile, $handlerName, $action, $param);
        }
        return $this->defaultAction();
    } 

/**
 * When there is no specific combination of target, action or param present, the 
 * default index view action is executed.
 * 
 * @access private 
 */
    private function defaultAction() {
        $handler = new IndexViewActionHandler();
        return $handler->handleAction("", "");
    }
    
/**
 * Invokes the specific handler, if matched one.
 * 
 * @param string $handlerFile The file to require or include for the handler
 * @param string $handlerName The class for the handler
 * @param string $action The action to execute
 * @param string $param The parameter to use
 * 
 * @access private 
 */
    private function invokeHandlerAction($handlerFile, $handlerName,$action, $param) {
            //try {
                require_once $handlerFile;
                $handler = new $handlerName;
                return $handler->handleAction($action, $param); 
            //} catch (Exception $ex) {
                // ignore and let default content (index) return
                //return $this->defaultAction();
            //}
    }
 
/**
 * Configures the target action map in a set strategy.
 * 
 * For each additional target and action set, one array element will be added to 
 * this main array.
 * 
 * @access private 
 */
    private function configure() {
        $this->targetActionMap["candidate"] = ApplicationRegistry::getApplicationRegistry();
    }
    
}

}

?>