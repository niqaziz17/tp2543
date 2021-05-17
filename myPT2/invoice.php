<?php
  include_once 'database.php';
?>
 


<!DOCTYPE html>
<html>
<head>
  <title>Elegant Comfort Bath : Invoice</title>
</head>
<body>
  <center>
    Elegant Comfort Bath Sdn. Bhd. <br>
    Taman Sri Sentosa <br>
    Jalan Klang Lama  <br>
    58000 <br>
    Kuala Lumpur <br>
    <hr>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_order_a174622_pt2, tbl_staff_a174622_pt2,
        tbl_customer_a174622_pt2, tbl_orders_details_a174622_pt2 WHERE
        tbl_order_a174622_pt2.FLD_STAFF_ID = tbl_staff_a174622_pt2.FLD_STAFF_ID AND
        tbl_order_a174622_pt2.FLD_CUSTOMER_ID = tbl_customer_a174622_pt2.FLD_CUSTOMER_ID AND
        tbl_order_a174622_pt2.FLD_ORDER_ID = tbl_orders_details_a174622_pt2.FLD_ORDER_ID AND
        tbl_order_a174622_pt2.FLD_ORDER_ID = :oid");
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    Order ID: <?php echo $readrow['FLD_ORDER_ID'] ?>
    Order Date: <?php echo $readrow['FLD_ORDER_DATE'] ?>
    <hr>

    Staff: <?php echo $readrow['FLD_STAFF_NAME']." "?>
    Customer: <?php echo $readrow['FLD_CUSTOMER_NAME']." "?>
    Date: <?php echo date("d M Y"); ?>
    <table border="1">
      <tr>
        <td>No</td>
        <td>Product</td>
        <td>Quantity</td>
        <td>Price(RM)/Unit</td>
        <td>Total(RM)</td>
      </tr>
      <?php
      $grandtotal = 0;
      $counter = 1;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a174622_pt2,
            tbl_products_a174622_pt2 where 
            tbl_orders_details_a174622_pt2.FLD_PRODUCT_ID = tbl_products_a174622_pt2.FLD_PRODUCT_ID AND
            FLD_ORDER_ID = :oid");
        $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
          $oid = $_GET['oid'];
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $detailrow) {
      ?>
      <tr>
      	<td><?php echo $counter; ?></td>
        <td><?php echo $detailrow['FLD_PRODUCT_ID']; ?></td>
        <td><?php echo $detailrow['FLD_QUANTITY']; ?></td>
        <td><?php echo $detailrow['FLD_PRICE']; ?></td>
        <td><?php echo $detailrow['FLD_PRICE']*$detailrow['FLD_QUANTITY']; ?></td>
       </tr>
        <?php
        $grandtotal = $grandtotal + $detailrow['FLD_PRICE']*$detailrow['FLD_QUANTITY'];
        $counter++;
      } // while
      $conn = null;
      ?>
      <tr>
        <td colspan="4" align="right">Grand Total</td>
         <td><?php echo $grandtotal ?></td>
      </tr>
    </table>
    <hr>
    Computer-generated invoice. No signature is required.
  </center>
</body>
</html>