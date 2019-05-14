<?php

require 'mysql_connection.php';
include '../backend/UserManagement.php';

if (isset($_POST['id']))
{

  $id = $_POST['id'];
  $nick = $_POST['nick'];
  echo "$id, $nick";
  $sqlDeleteUser = "DELETE FROM Users WHERE id='$id'";
  if($conn == false)
  {
    echo "veleka";
  }
  delete_directory("./files/".$nick);
  if(mysqli_query($conn, $sqlDeleteUser))
  {
    echo $nick." sėkmingai ištrintas!<br>";
    // TODO: KAZKODEL NESIREFRESHINA??
    //echo '<meta http-equiv="refresh" content="0; />';
  } else {
    echo("Error description: " . mysqli_error($conn));
    echo "nepavyko";
  }
}

?>
