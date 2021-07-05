<?php
  include_once 'staffs_crud.php';

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Bubble Bath  : Staffs</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #0d1137;">
 <?php include_once 'nav_bar.php'; ?>
 
 <div class="container-fluid">
   <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2 style="color: white; text-align: center;">Create New Staff</h2>
      </div>


    <form action="staffs.php" method="post" class="form-horizontal" style="color: white">
     <div class="form-group">
          <label for="customerid" class="col-sm-3 control-label">Staff ID: </label>
          <div class="col-sm-9">
         <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID"  value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_ID']; else echo sprintf('S%02d',$sid); ?>" readonly> <br />
      </div>
        </div>
      <div class="form-group">
            <label for="fullname" class="col-sm-3 control-label">Full Name</label>
            <div class="col-sm-9">
              <input name="name" type="text" class="form-control" id="fullname" placeholder="Full Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_NAME']; ?>" required />
            </div>
          </div>
       <div class="form-group">
            <label for="phonenum" class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-9">
              <input name="phonenum" type="text" class="form-control" id="phone" placeholder="+60##-#######" pattern="^(\+601)[0-46-9]-[0-9]{7,8}$" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_PHONENUM']; ?>" required />
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input name="email" type="text" class="form-control" id="email" placeholder="abc@gmail.com" pattern="[a-zA-Z0-9-]+@gmail.com" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_EMAIL']; ?>" required />
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
              <input name="password" type="text" class="form-control" id="password" placeholder="abc123"  value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_PASSWORD']; ?>" required />
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Role</label>
            <div class="col-sm-9">
              <select name="role"  class="form-control" id="role" required>
                 <option value="">Please select</option>
                 <option value="Staff" <?php if(isset($_GET['edit'])) if($editrow['FLD_STAFF_ROLE']=="staff") echo "selected"; ?>>Staff</option>
                 <option value="Admin" <?php if(isset($_GET['edit'])) if($editrow['FLD_STAFF_ROLE']=="admin") echo "selected"; ?>>Admin</option>
              </select>
            </div>
          </div>


      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['FLD_STAFF_ID']; ?>">
       <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <?php } ?>
       <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
       </div>
       </div> 
    </form>
  </div>
</div>

    <div class="row">
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
          <th style="text-align: center;">Action</th>
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

        <td>
          <a href="staffs.php?edit=<?php echo $readrow['FLD_STAFF_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="staffs.php?delete=<?php echo $readrow['FLD_STAFF_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
  </div>
</div>

   <div class="row">
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
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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