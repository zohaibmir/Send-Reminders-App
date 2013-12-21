<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
include_once 'IReminder.php';;
interface IReminderManager {
    //put your code here
    public function AddReminder(IReminder $IReminder);
    public function EditReminder(IReminder $IReminder);
    public function RemoveReminder(IReminder $IReminder);    
    public function GetExpiredReminders();
    public function GetActiveReminders();
    public function GetReminders();
    public function GetRemindersById($id);
}

?>
