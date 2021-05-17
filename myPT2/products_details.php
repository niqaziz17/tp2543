<?php
  include_once 'database.php';
?>


<!DOCTYPE html>
<html>
<head>
  <title>Elegant Comfort Bath  : Products Details</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
     <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a174622_pt2 WHERE FLD_PRODUCT_ID = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>

    Product ID: <?php echo $readrow['FLD_PRODUCT_ID'] ?> <br>
    Name: <?php echo $readrow['FLD_PRODUCT_NAME'] ?> <br>
    Price: RM <?php echo $readrow['FLD_PRICE'] ?> <br />
    Brand: <?php echo $readrow['FLD_BRAND'] ?> <br />
    Type: <?php echo $readrow['FLD_TYPE'] ?> <br />
    Colour: <?php echo $readrow['FLD_COLOUR'] ?> <br />
    Warranty: <?php echo $readrow['FLD_WARRANTY'] ?> <br /><br>
    Quantity: <?php echo $readrow['FLD_QUANTITY'] ?> <br /> <br>
   <br>
<br>
   <img src="products/<?php echo $readrow['FLD_PRODUCT_ID'] ?>.jpg" width="30%" height="30%"/>
  </center>
  
</body>
</html>