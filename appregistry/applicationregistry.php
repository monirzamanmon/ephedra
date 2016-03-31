<?php
/**
 * Application Registry Class File
 * 
 * This file contains the ApplicationRegistry class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */
 
 namespace ephedra\appregistry {
/**
 * Application Registry Class
 * 
 * The ApplicationRegistry class holds records of application routes
 */
	class ApplicationRegistry {

/**
 * Configures the target action map in a set strategy.
 * 
 * For each additional target and action set, one array element will be added to 
 * this main array.
 * 
 * @access public 
 */
		public static function getApplicationRegistry() {
			$registry = array("list" => array( 
                "../candidatesapp/candidatelistactionhandler.php", 
                "ephedra\candidatesapp\CandidateListActionHandler"), 
				"add" => array( 
                "../candidatesapp/candidateaddactionhandler.php", 
                "ephedra\candidatesapp\CandidateAddActionHandler"), 
				"delete" => array( 
                "../candidatesapp/candidatedeleteactionhandler.php", 
                "ephedra\candidatesapp\CandidateDeleteActionHandler"));;
			return $registry;
		}
	}	 
}
?>