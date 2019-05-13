<?php
session_start();
require 'mysql_connection.php';
require 'config.php';
require 'messages.php';

//Includins visus skriptus is backendo, nežinau ar funkcijas į vieną .php failą kraut ar į atskirus
foreach(glob("backend/*.php") as $back)
{
    require $back;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $WebsiteTitle; ?></title>
    <link rel="icon" type="image/png" href="../images/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="css/styleManager.css">
    <link rel="stylesheet" href="css/styleMediaQ.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Javascript scripts -->
    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
    <script src="js/jquery.fileupload.js" type="text/javascript"></script>
  </head>
