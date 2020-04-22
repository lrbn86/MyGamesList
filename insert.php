<?php
  session_start();
  if (empty($_SESSION["errorMessage"]))
    $_SESSION["errorMessage"] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>MGL - Add Game</title>
  <link rel="stylesheet" href="style.css"/>
  <style type="text/css">
    form {width:400px;margin:0px auto;}
    ul {list-style:none; margin-top:5px;}
    ul li {display:block; float:left;width:100%;height:1%;}
    ul li label {float:left;padding:7px;}
    ul li span {color:#0000ff; font-weight:bold;}
    ul li input {float:right;margin-right:10px; border:1px solid #000;padding:3px;width:240px;}
    input#submit {width:248px; transition: all 0.2s;}
    input#submit:hover {background-color: green; cursor: pointer;}
    li input:focus {border:1px solid #999;}
    fieldset{padding:10px; border:1px solid white; width:400px; overflow:auto; margin:10px;}
    legend{color:white; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold;}
  </style>
</head>
<body>
  <h1 style="text-align:center;">Add Game</h1>
  <?php
    include("includes/menu.php");
  ?>
  <form id="form0" method="post" action="doInsert.php">
    <fieldset>
      <legend>Add a Game</legend>
      <ul>
        <li>
          <label title="ShipperID" for="shipperID">Entry #</label>
          <input name="shipperID" id="shipperID" type="text" size="20" maxlength="3"/>
        </li>
        <li>
          <label title="CompanyName" for="companyName">Game Title</label>
          <input name="companyName" id="companyName" type="text" size="20" maxlength="20"/>
        </li>
        <li>
          <label title="Phone" for="phone">Genre</label>
          <input name="phone" id="phone" type="text" size="20" maxlength="20"/>
        </li>
        <li><span><?php echo $_SESSION["errorMessage"];?></span></li>
        <li><input type="submit" value="Add Game" name="submit" id="submit"/></li>
      </ul>
    </fieldset>
  </form>

  <?php
    $_SESSION["errorMessage"] = "";
  ?>

  <script type="text/javascript">
    document.getElementById("shipperID").focus();
  </script>
</body>
</html>
