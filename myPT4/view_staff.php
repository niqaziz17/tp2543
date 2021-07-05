<?php
include_once 'staffs_crud.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Staff</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #0d1137;">
	<?php include 'nav_bar.php' ?>
	 <div class="container-fluid">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2 style="color: white; text-align: center;">Staff List</h2>
      </div>
      <table class="table  table-bordered" style="color: white; text-align: center;">
        <tr>
          <th style="text-align: center;">Staff ID</th>
          <th style="text-align: center;">Staff Name</th>
          <th style="text-align: center;">Phone Number</th>
          <th style="text-align: center;">Email</th>
          <th style="text-align: center;">Role</th>
        
        </tr>
      <?php
      // Read

      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("select * from tbl_staff_a174622_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['FLD_STAFF_ID']; ?></td>
        <td><?php echo $readrow['FLD_STAFF_NAME']; ?></td>
        <td><?php echo $readrow['FLD_STAFF_PHONENUM']; ?></td>
        <td><?php echo $readrow['FLD_STAFF_EMAIL']; ?></td>
        <td><?php echo $readrow['FLD_STAFF_ROLE']; ?></td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
  </div>
</div>

   <div class="container-fluid">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_staff_a174622_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true"><<</span></li>
          <?php } else { ?>
            <li><a href="view_staff.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true"><<</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"view_staff.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"view_staff.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">>></span></li>
          <?php } else { ?>
            <li><a href="view_staff.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">>></span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>