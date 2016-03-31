<?php
/**
 * Candidate Data Class File
 * 
 * This file contains the Candidate class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\candidatesapp {

/**
 * Candidate Data Class
 * 
 * The Candidate class stores various data for candidates
 */
class Candidate {
/**
 * Holder for candidate ID
 * 
 * @var int
 * @access public
 */
    var $id = 0;
/**
 * Holder for candidate name
 * 
 * @var string
 * @access public
 */
    var $name = "";
/**
 * Holder for candidate testing score
 * 
 * @var int
 * @access public
 */
    var $testScore = 0;
/**
 * Holder for candidate experience score
 * 
 * @var int
 * @access public
 */
    var $experienceScore = 0;
/**
 * Holder for candidate interview score
 * 
 * @var int
 * @access public
 */
    var $interviewScore = 0;
    
/**
 * Returns the total score of a candidate
 * 
 * @return int Total Score
 * @access public
 */
    public function getTotalScore() {
        return $this->testScore + $this->experienceScore + $this->interviewScore;
    }
}	
}
 


?>