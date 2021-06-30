<?php
  include_once 'orders_crud.php';
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Bubble Bath  : Orders</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <?php include_once 'nav_bar.php'; ?>
 <div class="container-fluid">
   <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Order</h2>
      </div>


     <form action="orders.php" method="post" class="form-horizontal">
     <div class="form-group">
          <label for="customerid" class="col-sm-3 control-label">Order ID: </label>
          <div class="col-sm-9">
         <input name="oid" type="text" class="form-control" id="orderid"  value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_ORDER_ID']; else echo sprintf('OID%02d',$oid); ?>" readonly> <br />
      </div>
        </div>
      <div class="form-group">
            <label for="staff" class="col-sm-3 control-label">Staff</label>
            <div class="col-sm-9">
              <select name="sid" class="form-control" id="staff" required>
                <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staff_a174622_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $staffrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['FLD_STAFF_ID']==$staffrow['FLD_STAFF_ID'])) { ?>
          <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>" selected><?php echo $staffrow['FLD_STAFF_NAME']." ";?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>"><?php echo $staffrow['FLD_STAFF_NAME']." ";?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>
    </div>
  </div>

      <div class="form-group">
      <label for="customer" class="col-sm-3 control-label">Customer</label>
        <div class="col-sm-9">
        <select name="cid" class="form-control" id="customer" required>
          <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customer_a174622_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $custrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['FLD_CUSTOMER_ID']==$custrow['FLD_CUSTOMER_ID'])) { ?>
          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>" selected><?php echo $custrow['FLD_CUSTOMER_NAME']." "?></option>
        <?php } else { ?>
          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>"><?php echo $custrow['FLD_CUSTOMER_NAME']." "?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>
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
    <hr>
     <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h2>Order List</h2>
          </div>
          <table class="table table-striped table-bordered">
      <tr>
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Staff ID</td>
        <td>Customer ID</td>
        <td></td>
      </tr>
      <?php
       $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_order_a174622_pt2, tbl_staff_a174622_pt2, tbl_customer_a174622_pt2 WHERE ";
        $sql = $sql."tbl_order_a174622_pt2.FLD_STAFF_ID = tbl_staff_a174622_pt2.FLD_STAFF_ID and ";
        $sql = $sql."tbl_order_a174622_pt2.FLD_CUSTOMER_ID = tbl_customer_a174622_pt2.FLD_CUSTOMER_ID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $orderrow) {
      ?>
      <tr>
        <td><?php echo $orderrow['FLD_ORDER_ID']; ?></td>
        <td><?php echo $orderrow['FLD_ORDER_DATE']; ?></td>
        <td><?php echo $orderrow['FLD_STAFF_NAME'] ?></td>
        <td><?php echo $orderrow['FLD_CUSTOMER_NAME'] ?></td>
        <td>
          <a href="orders_details.php?oid=<?php echo $orderrow['FLD_ORDER_ID']; ?>" class="btn btn-success btn-xs" role="button">Details</a>
          <a href="orders.php?edit=<?php echo $orderrow['FLD_ORDER_ID']; ?>" class="btn btn-warning btn-xs" role="button">Edit</a>
          <a href="orders.php?delete=<?php echo $orderrow['FLD_ORDER_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class ="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
  </center>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>