<?php
include_once 'products_crud.php'
?>


<!DOCTYPE html>
<html>
<head>
  <title>Elegant Comfort Bath  : Products</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr />
    <form action="products.php" method="post">
      Product ID
      <input name="pid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; ?>" required> <br />
      Name
      <input  name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>" required> <br>
      Price
       <input name="price" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>"required> <br>
      Brand
      <select name="brand">
        <option value="Delta"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Delta") echo "selected"; ?>>Delta</option>
        <option value="Parlos"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Parlos") echo "selected"; ?>>Parlos</option>
        <option value="Iriber"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Iriber") echo "selected"; ?>>Iriber</option>
        <option value="Bathlavish"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Bathlavish") echo "selected"; ?>>Bathlavish</option>
        <option value="Sumerain"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Sumerain") echo "selected"; ?>>Sumerain</option>
        <option value="Starbath"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Starbath") echo "selected"; ?>>Starbath</option>
        <option value="SOMRXO"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="SOMRXO") echo "selected"; ?>>SOMRXO</option>
        <option value="Ufaucet"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Ufaucet") echo "selected"; ?>>Ufaucet</option>
        <option value="Puloumis"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Puloumis") echo "selected"; ?>>Puloumis</option>
        <option value="American Standard"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="American Standard") echo "selected"; ?>>American Standard</option>
        <option value="TOTO"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="TOTO") echo "selected"; ?>>TOTO</option>
        <option value="American Soft Linen"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="American Soft Linen") echo "selected"; ?>>American Soft Linen</option>
        <option value="Hamman Linen"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Hamman Linen") echo "selected"; ?>>Hamman Linen</option>
        <option value="Amazon Basics"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Amazon Basics") echo "selected"; ?>>Amazon Basics</option>
      </select> <br>
      Type
    <select name="type">
     <option value="Faucet"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Faucet") echo "selected"; ?>>Faucet</option>
      <option value="Sink"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Sink") echo "selected"; ?>>Sink</option>
      <option value="Toilets"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Toilets") echo "selected"; ?>>Toilets</option>
      <option value="Linen"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Linen") echo "selected"; ?>>Linen</option>
    </select><br>
      Colour
    <input name="colour" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_COLOUR']; ?>" required><br>
      Warranty
    <select name="warranty">
      <option value="0"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="0") echo "selected"; ?>>0</option>
      <option value="1"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="1") echo "selected"; ?>>1</option>
      <option value="2"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="2") echo "selected"; ?>>2</option>
      <option value="3"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="3") echo "selected"; ?>>3</option> 
    </select><br>

      Quantity
      <input name="quantity" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; ?>" required> <br>
      <?php if (isset($_GET['edit'])) {  ?>
        <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
        <button type="submit" name="update">Update</button>
      <?php } else { ?>
        <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Product ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Brand</td>
        <td>Type</td>
        <td>Colour</td>
        <td>Warranty</td>
        <td>Quantity</td>
      </tr>

      <?php
         try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a174622_pt2");
          $stmt->execute();
          $result = $stmt->fetchAll();
        }
        catch(PDOException $e){
          echo "Error: " . $e->getMessage();
        }
        foreach($result as $readrow) {
          ?>  
            <tr>
            <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
            <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
            <td><?php echo $readrow['FLD_PRICE']; ?></td>
            <td><?php echo $readrow['FLD_BRAND']; ?></td>
            <td><?php echo $readrow['FLD_TYPE']; ?></td>
            <td><?php echo $readrow['FLD_COLOUR']; ?></td>
            <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
            <td><?php echo $readrow['FLD_QUANTITY']; ?></td>
            <td>
          <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Details</a>
          <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
    }
    $conn = null;
      ?>
    </table>
  </center>
</body>
</html>