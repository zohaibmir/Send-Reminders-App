<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author zohaib
 */
interface IReminderDAL {

    //put your code here
    public function setReminderId($id);

    public function setReminderName($name);

    public function setEmailId($email);

    public function setExpiryDate($date);

    public function insertReminder();

    public function editReminder();

    public function removeReminder();

    public function getReminderList();

    public function fetchReminders();

    public function fetchActiveReminder();

    public function fetchExpiredReminder();

    public function fetchReminderById();
}

?>
