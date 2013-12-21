<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IReminder {
    //put your code here
        public function getReminderId();
        public function setReminderId($id);
        public function setReminderName($name);
	public function getReminderName();
        public function getEmailId();
        public function setEmailId($emailId);
	public function setExpiryDate($date);
	public function getExpiryDate();
	
}

?>
