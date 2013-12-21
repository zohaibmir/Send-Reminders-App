<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reminder
 *
 * @author zohaib
 */

class Reminder implements IReminder {

    //put your code here
    private $id;
    private $reminderName;
    private $emailId;
    private $expiryDate;

    /**
     * Reminder constructor
     *
     * @param 
     */
    public function __construct() {
        //echo "myClass init'ed successfuly!!!";
    }

    public function getReminderId() {
        return $this->id;
    }

    public function setReminderId($id) {
        $this->id = $id;
    }

    public function getReminderName() {
        return $this->reminderName;
    }

    public function setReminderName($name) {
        $this->reminderName = $name;
    }

    public function getEmailId() {
        return $this->emailId;
    }

    public function setEmailId($emailId) {
        $this->emailId = $emailId;
    }   

    public function getExpiryDate() {
        return $this->expiryDate;
    }
     
    public function setExpiryDate($date) {
        $formateddate = date_create($date);
        $this->expiryDate = date_format($formateddate, 'm/d/Y H:i');
    }

}

?>
