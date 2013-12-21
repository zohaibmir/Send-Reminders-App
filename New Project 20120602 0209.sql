-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema reminderdb
--

CREATE DATABASE IF NOT EXISTS reminderdb;
USE reminderdb;

--
-- Definition of table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
CREATE TABLE `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ReminderName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `StartDate` datetime NOT NULL,
  `ExpiryDate` datetime NOT NULL,
  `IsActive` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--

/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
INSERT INTO `reminders` (`id`,`ReminderName`,`Email`,`StartDate`,`ExpiryDate`,`IsActive`) VALUES 
 (1,'Reminder 1','zohaib.mir@gmail.com','2012-05-30 07:26:21','2012-06-30 09:27:00',1),
 (2,'Reminder 2','zohaib.mir@gmail.com','2012-05-30 07:27:55','2012-05-31 19:27:00',1),
 (13,'Test Reminder','zohaib.mir@gmail.com','2012-05-31 00:50:48','2012-05-31 13:24:00',1),
 (14,'Test Reminder2','zhb_mir@yahoo.com','2012-05-31 17:56:44','2012-06-21 16:19:00',1),
 (16,'Test Reminder3','zhb.mir@gmail.com','2012-06-02 02:03:37','2012-06-23 14:53:00',1);
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;


--
-- Definition of procedure `reminderProc`
--

DROP PROCEDURE IF EXISTS `reminderProc`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reminderProc`()
BEGIN
  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
