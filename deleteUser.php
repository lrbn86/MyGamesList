<?php
  // Use session object
  session_start();

  include("includes/openDbConn.php");
  $id = $_GET["id"];
  // Prepare SQL statement
  $sql = "DELETE FROM usersLab5 WHERE UserID=" . $id;

  // Execute the SQL query and store the result of the execution into $result
  $result = mysqli_query($db, $sql);

  // Clean up
  include("includes/closeDbConn.php");

  // Redirect to default
  header("Location: select.php");
?>
