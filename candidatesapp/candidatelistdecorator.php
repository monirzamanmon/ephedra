<?php
/**
 * Candidate List Decorator Class File
 * 
 * This file contains the CandidateListDecorator class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\candidatesapp {
	
/**
 * @ignore
 */
require_once "../decorators/basedecorator.php";
require_once '../candidatesapp/candidate.php';


const CANDIDATE_VIEW_PATH = "../candidatesapp/candidateslist.xhtml";

use ephedra\decorators\BaseDecorator;

/**
 * Candidate List Decorator Class
 * 
 * The CandidateListDecorator class implements the decoration of data for candidate list
 */
class CandidateListDecorator extends BaseDecorator {

/**
 * Defines the view for this decorator
 * 
 * This implements the abstract method defineViewPath of BaseDecorator.
 * BaseDecorator calls this method so that all different decorators
 * can define their own views' paths.
 * @access protected
 */
    protected function defineViewPath() {
        $this->viewPath = CANDIDATE_VIEW_PATH;
    }

/**
 * Helper method for view transformation
 * 
 * Transforms the data from the model to be decorated with the Candidate list view.
 * @access protected
 */
    protected function applyTransformation() {
        if (is_array($this->decorationContent)) {
            $newContent = "<div class='row'>\n";
            $newContent .= "<span class='cell'>Name</span>";
            $newContent .= "<span class='headernumericcell'>Test Score</span>";
            $newContent .= "<span  class='headernumericcell'>Interview Score</span>";
            $newContent .= "<span  class='headernumericcell'>Experience Score</span>";
            $newContent .= "<span  class='headernumericcell'>Total score</span>";
            $newContent .= "<span  class='headernumericcell'>Actions</span>";
            $newContent .= "</div>\n";
            foreach ($this->decorationContent as $candidate) {
                if ($candidate instanceof Candidate) {
                    $newContent .= "<div class='row'>\n";
                    $newContent .= "<span  class='cell'>".$candidate->name."</span>";
                    $newContent .= "<span  class='numericcell'>".$candidate->testScore."</span>";
                    $newContent .= "<span  class='numericcell'>".$candidate->interviewScore."</span>";
                    $newContent .= "<span  class='numericcell'>".$candidate->experienceScore."</span>";
                    $newContent .= "<span  class='numericcell'>".$candidate->getTotalScore()."</span>";
                    $newContent .= "<span  class='numericcell'>&nbsp;
					<input  class='button' type=button name='editButton' id='editButton' onclick=\"javascript:editCells(".$candidate->id.",'".$candidate->name."',".$candidate->testScore.",".$candidate->interviewScore.",".$candidate->experienceScore.")\" value='Edit'/>
					<input  class='button' type=button name='deleteButton' id='deleteButton' onclick=\"javascript:deleteCandidate(".$candidate->id.")\" value='Delete'/></span>";
                    $newContent .= "</div>\n";
                }
            }
            
            $this->decorationContent = $newContent;
        }
    }

}

	
}
?>