<div class="file-nav-container">

  <h2>Directory</h2>
  <?php
    //Perskaitome katalogo turinį
    $usersDirectory = "./files/".$_SESSION['nick'];


    $fileList = scandir($usersDirectory);
    chdir($usersDirectory);
    array_multisort(array_map('filemtime', ($fileList = glob("*.*"))), SORT_DESC, $fileList);
    chdir("../..");

    $thereAreNoFiles = true;
  ?>
  <div class="file-nav">
      <ul class="file-nav-list">
          <?php
            foreach ($fileList as $key => $value)
            {
              if($value == "." || $value == "..")
                continue;
                print("<li>
                <a href='./files/".$_SESSION['nick']."/".$value."'>".$value."</a>
                </li>");
              $thereAreNoFiles = false;
            }

            echo "</ul>";
            // files (".$row['tillWhen'].")

            $yourId = $_SESSION['id'];
            $currDate = date('Y-m-d H:i:s');
            $sqlCheckIfAnyoneIsSharing = "SELECT * FROM SharedFiles
                            JOIN Users ON fileOwnerId=Users.id
                            WHERE otherId='$yourId' and tillWhen>'$currDate'";

            $resultsCheckIfAnyoneIsSharing = mysqli_query($conn, $sqlCheckIfAnyoneIsSharing);

            if (mysqli_num_rows($resultsCheckIfAnyoneIsSharing) > 0)
            {
              echo "<h2>Shared files</h2>";
              echo "<ul class='file-nav-list'>";
              echo "<form method='post'>";
                while($row = mysqli_fetch_assoc($resultsCheckIfAnyoneIsSharing))
                {
                    echo "<li><a><button class='btn-link' name='".$row['nick']."'>".$row['nick']."	(".$row['tillWhen'].")</button></a></li>";
                    if(isset($_POST[$row['nick']]))
                    {
                      $_SESSION['viewingFiles'] = $row['nick'];
                      $_SESSION['specAccesToViewFile'] = $row['tillWhen'];
                      echo '<meta http-equiv="refresh" content="0; url=./viewfiles" />';
                    }
                }
                echo "</form>";
                echo "</ul>";
            }

            ?>

  </div>
</div>
