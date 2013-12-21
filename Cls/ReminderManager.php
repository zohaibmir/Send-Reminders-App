<?php

/**
 * Description of ReminderManager
 *
 * @author zohaib
 */

class ReminderManager {

    //put your code here
    private $objRModel;

    public function AddReminder(IReminder $IReminder) {
        try {
            $this->objRModel = new ReminderDAL();
            $this->objRModel->setReminderName($IReminder->getReminderName());
            $this->objRModel->setEmailId($IReminder->getEmailId());
            $this->objRModel->setExpiryDate($IReminder->getExpiryDate());
            $this->objRModel->insertReminder();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function EditReminder(IReminder $IReminder) {
        try {
            $this->objRModel = new ReminderDAL();
            $this->objRModel->setReminderId($IReminder->getReminderId());
            $this->objRModel->setReminderName($IReminder->getReminderName());
            $this->objRModel->setEmailId($IReminder->getEmailId());
            $this->objRModel->setExpiryDate($IReminder->getExpiryDate());
            $this->objRModel->editReminder();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function RemoveReminder($reminderId) {
        try {
            $this->objRModel = new ReminderDAL();
            $this->objRModel->setReminderId($reminderId);
            return $this->objRModel->removeReminder();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function GetExpiredReminders() {
        try {
        $this->objRModel = new ReminderDAL();
        return $this->objRModel->fetchExpiredReminder();      
         } catch (Exception $e) {
            throw $e;
        }       
    }

    public function GetActiveReminders() {
       try {
        $this->objRModel = new ReminderDAL();
        return $this->objRModel->fetchActiveReminder();      
        } catch (Exception $e) {
            throw $e;
        }  
    }

    public function GetReminders() {
        try {
        $this->objRModel = new ReminderDAL();
        return $this->objRModel->fetchReminders();      
        } catch (Exception $e) {
            throw $e;
        }  
    }

    public function GetRemindersById($id) {        
       try {
        $this->objRModel = new ReminderDAL();        
        $this->objRModel->setReminderId($id);
        return $this->objRModel->fetchReminderById();
        } catch (Exception $e) {
            throw $e;
        }  
    }

}

?>
