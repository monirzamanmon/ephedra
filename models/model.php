<?php
/**
 * Model Interface Definition File
 * 
 * This file contains the Model interface declaration
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

 namespace ephedra\models {
	 
/**
 * Model Interface
 * 
 * The Model interface declares the basic functionalities for all models.
 * @abstract
 */
interface Model {
/**
 * Adds a record
 * 
 * Adds a new record for the model.
 * 
 * @return int ID of the newly added record
 * @access public
 * @abstract
 */
    public function add($fields);
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
    public function update($id, $fields);
/**
 * Deletes a record
 * 
 * Deletes a record of the model.
 * 
 * @param int $id ID of the record to be deleted
 * @access public
 * @abstract
 */
    public function delete($id);
/**
 * Returns a record
 * 
 * Returns a record of the model.
 * 
 * @param int $id ID of the record to be retrieved
 * @access public
 * @abstract
 */
    public function get($id);
/**
 * Returns all record
 * 
 * Returns all records of the model.
 * @access public
 * @abstract
 */
    public function listAll();
}
 }
 
?>