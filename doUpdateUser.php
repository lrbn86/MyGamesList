<?php

  session_start();
  include("includes/openDbConn.php");

  $userID = $_POST["userID"];
  $lastName = addslashes($_POST["lastName"]);
  $firstName = addslashes($_POST["firstName"]);
  $title = addslashes($_POST["title"]);
  $removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
  $lastName = str_replace($removeThese, "", $lastName);
  $firstName = str_replace($removeThese, "", $firstName);
  $title = str_replace($removeThese, "", $title);
  if (empty($userID)) {
    header("Location: select.php");
  }

  $sql = "UPDATE usersLab5 SET LastName='" . $lastName . "', FirstName='" . $firstName . "', Title='" . $title . "' WHERE UserID=" . $userID;
  $result = mysqli_query($db, $sql);

  include("includes/closeDbConn.php");
  header("Location: select.php");
?>
