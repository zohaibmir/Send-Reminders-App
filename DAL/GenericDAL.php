<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenericDAL
 *
 * @author zohaib
 */
include_once 'DBConnection/Connection.php';

class GenericDAL {

    //put your code here
    public $dbConnection = null;
    public function __construct() {
        $this->$dbConnection =  Connection::Connect();
    }
    public function query($sql) {
		// output sql sting for debugging
		// crude debugging
		if($this->debug) {
			echo '<h3>Query</h3>';
			echo '<div>';
			echo $sql;
			echo '</div>';
		}
		
		// execute query
		return $this->dbConnection->query($sql);
	}
}

?>
