<?php
/**
 * Basic Memory Model Class File
 * 
 * This file contains the basic memory model class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\models {
	
/**
 * @ignore
 */
require_once 'model.php';

/**
 * Memory Model Class
 * 
 * The MemoryModle class implements the basic operations for Model interface 
 * through an on-memory array. 
 * @abstract
 */
class MemoryModel implements Model {
    
/**
 * Holder for array to store objects
 * 
 * @var array
 * @access protected
 */
    protected $memoryPlaceHolder;
    
/**
 * Default Constructor for Memory Model
 * 
 * The Memory Model initializes the on memory array in the construction.
 * 
 * @access public 
 */
    public function __construct() {
        $this->memoryPlaceHolder = array();
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
        $this->memoryPlaceHolder[] = $fields;
        return sizeof($this->memoryPlaceHolder) - 1;
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
        if (array_key_exists($id, $this->memoryPlaceHolder)) {
            unset ($this->memoryPlaceHolder[$id]);
        }
    }

/**
 * Returns a record
 * 
 * Returns a record of the model.
 * 
 * @param int $id ID of the record to be retrieved
 * @access public
 * @abstract
 */
    public function get($id) {
        if (array_key_exists($id, $this->memoryPlaceHolder)) {
            return; ($this->memoryPlaceHolder[$id]);
        }
        return null;
    }

/**
 * Returns all record
 * 
 * Returns all records of the model.
 * 
 * @access public
 * @abstract
 */
    public function listAll() {
        return $this->memoryPlaceHolder;
    }

/**
 * Updates a record
 * 
 * Updates a record of the model.
 * 
 * @param int $id ID of the record to be updated
 * @param array $fields field values to be updated
 * @access public
 * @abstract
 */
    public function update($id, $fields) {
        $this->memoryPlaceHolder[$id] = $fields;
    }

}


}

?>