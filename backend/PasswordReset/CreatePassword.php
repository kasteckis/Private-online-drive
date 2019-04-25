<?php


  function CreatePassword($selector, $validator, $password, $passwordRepeat) {
    require 'includes/mysql_connection.php';
    require 'includes/config.php';

    if (empty($password) || empty($passwordRepeat)) {
      echo "<div style='text-align:center;'>
          <p style='color:red;'>Password is empty</p>
      </div>";
      exit();
    } elseif($password != $passwordRepeat) {
      echo "<div style='text-align:center;'>
          <p style='color:red;'>Passwords do not match</p>
      </div>";
      exit();
    }
    $currentDate = date("U");

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector='$selector' AND pwdResetExpires >= '$currentDate'";
    $result = mysqli_query($conn, $sql);
    if(!$row = mysqli_fetch_assoc($result)){
      echo "You need to resubmit your reset request";
      exit();
    // $statement = mysqli_stmt_init($conn); //stmt
    // if(!mysqli_stmt_prepare($statement, $sql)){
    //   echo "Couldnt prepare";
    //   exit();
    // }else{


      // mysqli_stmt_bind_param($statement, "s", $selector);
      // mysqli_stmt_execute($statement);
      //
      // $result = mysqli_stmt_get_result($statement);
      // if(!$row = mysqli_fetch_assoc($result)){
      //   echo "You need to resubmit your reset request";
      //   exit();
      }else{

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

        if ($tokenCheck === false) {
          echo "You need to resubmit your reset request 2";
          exit();
        }elseif($tokenCheck === true) {

          $tokenEmail = $row['pwdResetEmail'];

          $sql = "SELECT * FROM Users WHERE email='$tokenEmail'";
          $result = mysqli_query($conn, $sql);
          if(!$row = mysqli_fetch_assoc($result)){
            echo "There was an error";
            exit();
          // $statement = mysqli_stmt_init($conn); //stmt
          // if(!mysqli_stmt_prepare($statement, $sql)){
          //   echo "Couldnt prepare";
          //   exit();
          // }else{
          //   mysqli_stmt_bind_param($statement, "s", $tokenEmail);
          //   mysqli_stmt_execute($statement);
          //   $result = mysqli_stmt_get_result($statement);
          //   if(!$row = mysqli_fetch_assoc($result)){
          //     echo "There was an error!";
          //     exit();
            }else{
              $sql = "UPDATE Users Set password=? WHERE email=?;";
              $statement = mysqli_stmt_init($conn); //stmt
              if(!mysqli_stmt_prepare($statement, $sql)){
                echo "Couldnt prepare 1";
                exit();
              }else{
                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($statement, "ss", $newPwdHash, $tokenEmail);
                mysqli_stmt_execute($statement);

                //Delete the same users tokens that were not used
                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                $statement = mysqli_stmt_init($conn); //stmt
                if(!mysqli_stmt_prepare($statement, $sql)){
                  echo "Couldnt prepare 2";
                  exit();
                }else{
                  mysqli_stmt_bind_param($statement, "s", $tokenEmail);
                  mysqli_stmt_execute($statement);
                  header("Location: ../../index.php?newpwd=passwordupdated");
                }

              }
            }
          }
        }
      }
?>
