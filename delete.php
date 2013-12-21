<?php
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
            echo $file, "\n";
            include_once($file);
            return true;
        }
    }
    throw new Exception($file . "   Not Found");
});
$objManager = ReminderManagerFactory::CreateReminderManager();
$reminder_id = $_GET['id'];
$result = $objManager->RemoveReminder($reminder_id);
if($result == true)
{
    header("Location: index.php?mesg=The Record was deleted successfully");  // bring back to original page
}
else
{
    header("Location: index.php?mesg= The Record was not deleted successfully");
}
?>
