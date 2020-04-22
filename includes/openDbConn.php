<?php
  $username = "cgt356web1v";
  $password = "Soybeans1v2321";

  // Connect to MySQL from PHP
  // Open DB connection and select DB to use
  // The '@' bypasses the usual PHP error handling, so you get to deal with a
  // failure return from pconnect yourself in the if statement below.
  // If you leave off the '@' then any errors will automatically be thrown
  @ $db = mysqli_connect("goss.tech.purdue.edu", $username, $password);
  mysqli_select_db($db, "$username") or die(mysqli_error());
  
  // Check to see if connection is successful
  if (!$db) {
    echo("Error: could not connect to database. Please try again later.");
    exit;
  }
?>
