<?php
  session_start();
  include("includes/openDbConn.php");
?>
<!DOCTYPE html>
<html>
  </head>
    <meta charset="UTF-8"/>
    <title>MGL - Your Games</title>
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
    <?php
      // prepare mysql statement
      $sql = "SELECT UserID, LastName, FirstName, Title FROM usersLab5";
      // execute the sql query and store the result of the execution into $result
      // the $db is the variable you created in openDbConn.php
      $result = mysqli_query($db, $sql);
      // check to see if there are records in the result, if not set the number
      // results to 0
      if (empty($result))
        $num_results = 0;
      else
        $num_results = mysqli_num_rows($result);
    ?>
    <h1 style="text-align:center">My Games List</h1>
    <p style="text-align: center;">Personalize your list!</p>
    <?php
      include("includes/menu.php");
    ?>
    <!-- Everything below here is copied from up above and modified to pull from the shippersLab5 table --> 
    <?php
      // prepare mysql statement
      $sql = "SELECT ShipperID, CompanyName, Phone FROM shippersLab5";
      // execute the sql query and store the result of the execution into $result
      // the $db is the variable you created in openDbConn.php
      $result = mysqli_query($db, $sql);
      // check to see if there are records in the result, if not set the number
      // results to 0
      if (empty($result))
        $num_results = 0;
      else
        $num_results = mysqli_num_rows($result);
    ?>
    <table style="border:0px;width:500px;padding:0px;margin:0px auto;border-spacing:0px;">
      <thead>
        <tr>
          <th style="background-color: #01a9c1; font-weight: bold; border-right:1px solid #000000;">Title</th>
          <th style="background-color: #01a9c1; font-weight: bold; border-right:1px solid #000000;">Genre</th>
          <th style="background-color: #01a9c1; font-weight: bold;">Options</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan="3" style="text-align:center; font-style:italic;"> <br> Information pulled from MySQL database</td>
        </tr>
      </tfoot>
      <tbody>
        <?php
          // loop through the results
          for($i=0;$i<$num_results;$i++) {
            // store a single record out of $result into $row
            $row = mysqli_fetch_array($result);
            // below, ALWAYS use trim() on data pulled from the database
            // About trim()
            // A database column(field) may be set up to hold, say, 12 characters, When you pull that column
            // from the database using $row[], it gives you all 12 characters (actual number of chars varies by column)
            // even if some of them are empty spaces. Say you store "hello" into that column. When you pull it out, you
            // get "hello        " using trim() removes all the extra spaces to give you "hello"
            ?>
            <tr>
              <td style="border-right:1px solid #000000; text-align: center;"><?php echo (trim($row["CompanyName"]));?></td>
              <td style="border-right:1px solid #000000; text-align: center;"><?php echo(trim($row["Phone"]));?></td>
              <td style="text-align: center;">
                <a id="edit-button" class="options-button" href="update.php?id=<?php echo(trim($row["ShipperID"]));?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
</a> &nbsp;
                <a id="delete-button" class="options-button" href="delete.php?id=<?php echo(trim($row["ShipperID"]));?>"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
    <!-- End of what was copied from above-->
<?php
  // close the database connection
  include("includes/closeDbConn.php");
?>
  </body>
</html>
