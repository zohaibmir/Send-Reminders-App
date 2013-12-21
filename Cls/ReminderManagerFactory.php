<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReminderManagerFactory
 *
 * @author zohaib
 */
class ReminderManagerFactory {
    //put your code here
    
    private static  $iReminder = null;
    
    private function __construct() {
        
    }

    public static function CreateReminderManager() {

        if (!isset(self::$iReminder)) {
            $iReminder = new ReminderManager();
        }
        return $iReminder;
    }
}

?>
