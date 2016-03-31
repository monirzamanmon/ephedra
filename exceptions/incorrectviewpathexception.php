<?php
/**
 * This file defines the Exception that is raised when an incorrect view path is specified.
 */

 
namespace ephedra\exceptions {
/**
 * This Exception is thrown when an incorrect view path is specified.
 * @access public
 */

 use \UnexpectedValueException;
 
class IncorrectViewPathException extends UnexpectedValueException {
/**
 * Holder for path of artitfact attempted.
 * 
 * @var string
 * @access protected
 */
    public $pathUsed;
}
	
}

?>