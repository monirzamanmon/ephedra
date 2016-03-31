<?php
/**
 * Candidate Model Class File
 * 
 * This file contains the CandidateModel class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\candidatesapp {

/**
 * @ignore
 */
require_once '../models/dbmodel.php';
require_once '../candidatesapp/candidate.php';

use ephedra\models\DbModel;

/**
 * Candidate Model Class
 * 
 * The CandidateModel class implements memory model for candidate list
 */
class CandidateModel extends DbModel {
/**
 * Default Constructor for Candidate Model
 * 
 * The constructor of CandidateModel initializes candidate properties.
 * @access public 
 */
    public function __construct() {
        parent::__construct();
		$this->defineName("candidates");
    }
/**
 * Returns all record
 * 
 * Returns all records of the model.
 * 
 * @access public
 */
    public function listAll() {
		$data = parent::listAll();
		$listing = [];
		foreach ($data as $value) {
			$candidate = new Candidate();
			$candidate->id = $value['id'];
			$candidate->name = $value['name'];
			$candidate->testScore = $value['test_score'];
			$candidate->experienceScore = $value['experience_score'];
			$candidate->interviewScore = $value['interview_score'];
			$listing[] = $candidate;
		}
		
        return $listing;
    }

	/**
 * Adds a record
 * 
 * Adds a new record for the model.
 * 
 * @param array $fields The fields to add
 * @return int ID of the newly added record
 * @access public
 * @abstract
 */
    public function add($fields) {
		
		if (!\array_key_exists('candidateName', $fields))
			return 0;
		$candidate = new Candidate();
		$candidate->name = $fields['candidateName'];
		
		if (\array_key_exists('testScore', $fields)) {
			$candidate->testScore = $fields['testScore'];
		}		
		
		if (\array_key_exists('experienceScore', $fields)) {
			$candidate->experienceScore = $fields['experienceScore'];
		}		
		
		if (\array_key_exists('interviewScore', $fields)) {
			$candidate->interviewScore = $fields['interviewScore'];
		}		
		
		if (\array_key_exists('id', $fields)) {
			if(\is_numeric($fields['id'])) {
				if ($fields['id'] > 0) {
					$candidate->id = $fields['id'];
					return parent::update($candidate->id, $candidate);
				}
			}
		}
		return parent::add($candidate);
		
    }

	/**
 * Deletes a record
 * 
 * Deletes a record of the model.
 * 
 * @param int $id ID of the record to be deleted
 * @access public
 * @abstract
 */
    public function delete($id) {
		if (!\array_key_exists('_param_', $id))
			return 0;
		if(!\is_numeric($id['_param_'])) 
			return 0;
		if ($id['_param_'] < 1) 
			return 0;
		parent::delete($id['_param_']);
    }
}	
}


?>