<?php
/**
 * Security Helper Class File
 * 
 * This file contains the SecurityHelper class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\helpers {
/**
 * Security Helper Class
 * 
 * The SecurityHelper class implements the secure request processing activities
 */
class SecurityHelper {
	
/**
 * Secures requests
 * 
 * Before feeding into the responsibility chain of the application, the request inputs are filtered here 
 * @access public 
 */
	public static function getSecureRequestInputs() {
        $filterDef = array();
        $filterDef["target"] = FILTER_SANITIZE_STRING;
        $filterDef["action"] = FILTER_SANITIZE_STRING;
        $filterDef["param"] = FILTER_VALIDATE_INT;
        
        return filter_var_array($_REQUEST, $filterDef);
	}
	
/**
 * Secures Posts
 * 
 * Before feeding into the responsibility chain of the application, the POST inputs are filtered here 
 * @access public 
 */
	public static function getSecurePostInputs($param) {
 
		if (is_array($param)) {
			foreach ($_POST as $key=>$value) {
				$param[$key] = mysql_real_escape_string($value);
			}
		}

		return $param;
	}
	

}	 
 }
 


?>