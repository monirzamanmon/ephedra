<?php
/**
 * Candidate List Action Handler Class File
 * 
 * This file contains the CandidateListActionHandler class
 * @author Monir callmoni@gmail.com
 * 
 */

namespace ephedra\candidatesapp {

/**
 * @ignore
 */
require_once '../controllers/genericactionhandler.php'; 
require_once '../candidatesapp/candidatelistdecorator.php'; 
require_once '../candidatesapp/candidatemodel.php'; 

use ephedra\controllers\GenericActionHandler;

/**
 * Candidate List Action Handler Class
 * 
 * The CandidateListActionHandler class implements the action handling for candidate list
 */
class CandidateListActionHandler extends GenericActionHandler {
    
/**
 * Defines the decorator for the action
 * 
 * This implements the abstract method defineDecorator of GenericActionHandler.
 * GenericActionHandler calls this method so that all different action handlers
 * can define their own decorators.
 * @access protected
 */
    protected function defineDecorator() {
        $this->decorator = new CandidateListDecorator();
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
        $this->model = new CandidateModel();
    }

}
}

?>