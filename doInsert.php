<?php
  session_start();
  $ShipperID = $_POST["shipperID"];
  $CompanyName = addslashes($_POST["companyName"]);
  $Phone = addslashes($_POST["phone"]);

  $removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
  $CompanyName = str_replace($removeThese, "", $CompanyName);
  $Phone = str_replace($removeThese, "", $Phone);

  if (($ShipperID == "") || ($CompanyName == "") || ($Phone == "")) {
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location: insert.php");
    exit;
  } else if (!is_numeric($ShipperID)) {
    $_SESSION["errorMessage"] = "You must enter a number for Entry #!";
    header("Location: insert.php");
    exit;
  } else {
    $_SESSION["errorMessage"] = "";
  }

  include("includes/openDbConn.php");

  $sql = "SELECT ShipperID FROM shippersLab5 WHERE ShipperID=" . $ShipperID;
  $result = mysqli_query($db, $sql);

  if (empty($result)) {
    $num_results = 0;
  } else {
    $num_results = mysqli_num_rows($result);
  }

  if ($num_results != 0) {
    $_SESSION["errorMessage"] = "This Entry # you entered already exists!";
    header("Location: insert.php");
    exit;
  } else {
    $_SESSION["errorMessage"] = "";
  }

  $sql = "INSERT INTO shippersLab5(ShipperID, CompanyName, Phone) VALUES(" . $ShipperID . ", '" . $CompanyName . "', '" . $Phone . "')";
  $result = mysqli_query($db, $sql);

  include("includes/closeDbConn.php");
  header("Location: select.php");
  exit;
?>
