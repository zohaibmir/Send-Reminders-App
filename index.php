<?php
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);

spl_autoload_register(function ($className) {
    $possibilities = array(
        'Cls'.DIRECTORY_SEPARATOR.$className.'.php',
        'Configuration'.DIRECTORY_SEPARATOR.$className.'.php',
        'DAL'.DIRECTORY_SEPARATOR.$className.'.php',
        'DBConnection'.DIRECTORY_SEPARATOR.$className.'.php',
        'Types'.DIRECTORY_SEPARATOR.$className.'.php',
        $className.'.php'
    );
    foreach ($possibilities as $file) {
        if (file_exists($file)) {            
            include_once($file);
            return true;
        }
    }
    throw new Exception($file . "   Not Found");
});


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">               
        <link rel="stylesheet" href="css/site.css" />
        <link rel="icon" type="image/png" href="favicon.ico">
        <link type="text/css" href="css/ui-lightness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />                
        <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript" src="js/timepicker.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.validation.functions.js" type="text/javascript"></script>     
        <script type="text/javascript" src="js/validation.js" type="text/javascript"></script>     
        <title>Reminder Application</title>
    </head>

    <body>
        <fieldset>
            <form class="cmxform" id="reminderForm" method="post" action="index.php">

                
                <legend>Reminder Application</legend>
                <p style="padding-left: 100px;color:#cd0a0a;font-weight: bold;margin-top: 20px;margin-bottom: 15px;">
                <?php
                if(!empty($_REQUEST["mesg"]))
                echo $_REQUEST["mesg"]
                ?>
            </p>
                <p>
                    <label for="cname"> Reminder Name</label>
                    <em>*</em><input id="reminderName" name="reminderName" size="25" class="required" value="" minlength="2" />
                </p>
                <p>
                    <label for="cname"> Email</label>
                    <em>*</em><input id="email" name="email" size="25" class="required" minlength="2" />
                </p>
                <p>
                    <label for="cemail">Reminder Date</label>
                    <em>*</em><input id="datetime" name="datetime" size="25"  class="required date" />
                </p>   
                <p>                    
                    <input type="submit"  class="submit" title="Save Reminder" id="sbmtbtn" value="Submit" />
                </p>
            </form>    
            
                <?php
                try {
                    $objReminder = new Reminder();
                    $objManager = ReminderManagerFactory::CreateReminderManager();
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $remName = (get_magic_quotes_gpc()) ? $_POST["reminderName"] : addslashes($_POST["reminderName"]);
                        $remEmail = (get_magic_quotes_gpc()) ? $_POST["email"] : addslashes($_POST["email"]);
                        $remDateTime = (get_magic_quotes_gpc()) ? $_POST["datetime"] : addslashes($_POST["datetime"]);
                        $objReminder->setReminderName($remName);
                        $objReminder->setEmailId($remEmail);
                        $objReminder->setExpiryDate($remDateTime);
                        $objManager->AddReminder($objReminder);
                    }
                   
                        if (isset($_GET['remType']) && $_GET['remType'] == "active") {
                            $arr = $objManager->GetActiveReminders();                            
                        }
                        elseif(isset($_GET['remType']) && $_GET['remType'] == "expired") {                           
                            $arr = $objManager->GetExpiredReminders();
                        }
                        else {
                            $arr = $objManager->GetReminders();
                        }

                } catch (Exception $e) {                    
                    header("Location: error.php?mesg=".$e->getMessage());
                }                               
                include_once 'view.php';
               ?>
                   
            

        </fieldset>

    </body>
</html>
