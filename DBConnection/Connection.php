<?php
/**
 * Description of Connection
 * This Class provides the connectivity with the Database. This class implementes the sigleton pattern.
 * @author zohaib
 * Date 5/30/2012
 */
class Connection implements IConnection{

    private $con;
    private $m_Result;
    private static $objConn = null;
    public $debug ;
    private function __construct() {

        try {
            $this->con = mysql_connect(ApplicationSetting::DATABASE_HOST, ApplicationSetting::DATABASE_USER, ApplicationSetting::DATABASE_PASSWORD);
            if (!$this->con) {
                throw new Exception('Could not connect: ' . mysql_error());
            }
            $db_selected = mysql_select_db(ApplicationSetting::DATABASE_NAME, $this->con);
            if (!$db_selected) {
                throw new Exception("Unable to Connect with:  " . ApplicationSetting::DATABASE_NAME);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //Return connection Object
     /**
     * 
      * @return \Connection
      * @throws Exception 
      */
    public static function Connect() {

        try {
            if (!isset(self::$objConn)) {
                $objConn = new Connection();
            }
            
        } catch (Exception $e) {
            throw $e;
        }   
        return $objConn;
    }

    //Return false on query faliure and true|resource on success
    function Query($query) {
        
        if ($this->debug) {
            echo '<h3>Query</h3>';
            echo '<div>';
            echo $sql;
            echo '</div>';
        }
        try {
            $this->m_Result = mysql_query($query, $this->con);
            if (!$this->m_Result) {
                throw new Exception("Could not run query: " . mysql_error());
            }
        } catch (Exception $e) {
            throw $e;
        }
        return true;
    }

    /*
     * Fetch Single row from the resultset     
     */
    function fetchRow() {
        return mysql_fetch_array($this->m_Result);
    }
    /*
     * Fetch All rows 
     */
    function fetchAll() {
        while ($row = mysql_fetch_array($this->m_Result)) {
            $a_rs[] = $row;
        }
        mysql_free_result($this->m_Result);
        return $a_rs;
    }
  
    /*
     * Function getNumRows
     * Return total number of affected rows
     */
    function getNumRows() {
        return mysql_num_rows($this->m_Result);
    }
    
    /* Function Error
     * Return database Errors
     */
    public function Error() {
        return mysql_error($this->con);
    }
    
    /*
     * Function Close
     * Close connection with Database
     */
    public function Close() {
        try {
            mysql_close($this->con);
        } catch (Exception $e) {

            throw $e("Error in Closing Database Connection" . mysql_error());
        }
    }


}

?>
