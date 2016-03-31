<?php
/**
 * Basic Database Model Class File
 * 
 * This file contains the basic database model class
 * @author Monir callmoni@gmail.com
 * @version p.o.c
 * 
 */

namespace ephedra\models {
	
/**
 * @ignore
 */
require_once '../models/model.php';
require_once '../lib/rb.php';
require_once '../config/config.inc.php';

use \R;

/**
 * Database Model Class
 * 
 * The DbModel class implements the basic operations for Model interface 
 * through a database defined in the configuration. 
 * @abstract
 */
class DbModel implements Model {
    
/**
 * Holder for reference to database entity
 * 
 * @var array
 * @access protected
 */
    protected $placeHolder;
    
/**
 * Name for database entity
 * 
 * @var string
 * @access protected
 */
    protected $placeHolderName;

	/**
 * Default Constructor for Database Model
 * 
 * The Database Model initializes the database connection upon construction.
 * 
 * @access public 
 */
    public function __construct() {
		R::setup(DATABASE_PATH, DATABASE_USER_NAME, DATABASE_PASSWORD);
    }

/**
 * Defines the name of the model
 * 
 * Defines the name of the model, this will reflect in the entity name
 * 
 * @param array $text The name text
 * @access public
 */
    public function defineName($text) {
		$this->placeHolderName = $text;
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
		$this->placeHolder = R::dispense($this->placeHolderName);
		foreach ($fields as $key => $value) {
			if ($key != 'id')
			 $this->placeHolder[$key] = $value;
		}
        return R::store($this->placeHolder);
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
		
		$post = R::load($this->placeHolderName, $id );
		R::trash( $post );
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
		return R::load($this->placeHolderName, $id );
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
        return R::getAll('SELECT * FROM '.$this->placeHolderName, []);
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
        $post = R::load($this->placeHolderName, $id );
		foreach ($fields as $key => $value) {
			if ($key != 'id')
			 $post[$key] = $value;
		}
		R::store( $post );
    }

}


}

?>