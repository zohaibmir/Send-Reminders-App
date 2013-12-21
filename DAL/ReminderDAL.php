<?php

/**
 * Description of ReminderDAL
 *
 * @author zohaib
 * @Date 30-05-2012
 */
class ReminderDAL implements IReminderDAL {

    //put your code here
    private $id;
    private $reminderName;
    private $emailId;
    private $expiryDate;
    private $startDate;
    private $isActive;
    private $dbConnection = null;
    private $m_Result;

    public function __construct() {
        $this->dbConnection = Connection::Connect();
        $this->startDate = date('Y-m-d H:i:s');
        $this->isActive = true;
    }

    public function setReminderId($id) {
        $this->id = $id;
    }

    public function setReminderName($name) {
        $this->reminderName = $name;
    }

    public function setEmailId($email) {
        $this->emailId = $email;
    }

    public function setExpiryDate($date) {
        $formateddate = date_create($date);
        $this->expiryDate = date_format($formateddate, 'Y-m-d H:i:s');
    }

    public function insertReminder() {
        try {
            $query = "INSERT INTO Reminders (ReminderName, Email, StartDate, ExpiryDate, IsActive) VALUES ('$this->reminderName','$this->emailId','$this->startDate','$this->expiryDate','$this->isActive')";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $e) {
            throw $e;
        }
        return $this->m_Result;
    }

    public function editReminder() {
        try {
            $query = "UPDATE Reminders SET ReminderName = '" . $this->reminderName . "', Email = '" . $this->emailId . "' , ExpiryDate = '" . $this->expiryDate . "'  WHERE Id = " . $this->id . "";
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $e) {
            throw $e;
        }
        return $this->m_Result;
    }

    public function removeReminder() {
        try {
            $query = "DELETE FROM Reminders WHERE Id=" . $this->id;
            $this->m_Result = $this->dbConnection->Query($query);
            $this->dbConnection->Close();
        } catch (Exception $e) {
            throw $e;
        }
        return $this->m_Result;
    }

    public function getReminderList() {
        try {
            $this->m_Result = $this->dbConnection->fetchAll();
            $this->dbConnection->Close();
            for ($i = 0; $i < count($this->m_Result); $i++) {
                $objReminder = new Reminder();
                $objReminder->setReminderId($this->m_Result[$i]["id"]);
                $objReminder->setReminderName($this->m_Result[$i]["ReminderName"]);
                $objReminder->setEmailId($this->m_Result[$i]["Email"]);
                $objReminder->setExpiryDate($this->m_Result[$i]["ExpiryDate"]);
                $ListOfObjects[] = $objReminder;
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $ListOfObjects;
    }

    public function fetchReminders() {
        try {
            $query = "SELECT * FROM reminders";
            $this->dbConnection->Query($query);
        } catch (Exception $e) {
            throw $e;
        }
        return $this->getReminderList();
    }

    public function fetchActiveReminder() {
        try {
            $query = "SELECT * FROM reminders where ExpiryDate > '" . $this->startDate . "'";
            $this->dbConnection->Query($query);
        } catch (Exception $e) {
            throw $e;
        }
        return $this->getReminderList();
    }

    public function fetchExpiredReminder() {
        try {
            $query = "SELECT * FROM reminders where ExpiryDate < '" . $this->startDate . "'";
            $this->dbConnection->Query($query);
        } catch (Exception $e) {
            throw $e;
        }
        return $this->getReminderList();
    }

    public function fetchReminderById() {
        try {
            $query = "SELECT Id,ReminderName,Email,ExpiryDate FROM Reminders where Id =" . $this->id;
            $this->dbConnection->Query($query);
            $this->m_Result = $this->dbConnection->fetchRow();
            $this->dbConnection->Close();
            $objReminder = new Reminder();
            $objReminder->setReminderId($this->m_Result["Id"]);
            $objReminder->setReminderName($this->m_Result["ReminderName"]);
            $objReminder->setEmailId($this->m_Result["Email"]);
            $objReminder->setExpiryDate($this->m_Result["ExpiryDate"]);
        } catch (Exception $e) {
            throw $e;
        }
        return $objReminder;
    }

}

?>
