<?php
include_once 'products_crud.php'
?>


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bubble Bath  : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

   <?php include_once 'nav_bar.php'; ?>
 
<div class="container-fluid">
   <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>

    <form action="products.php" method="post" class="form-horizontal" style="background: white;">
     <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID: </label>
          <div class="col-sm-9">
         <input name="pid" type="text" class="form-control" id="productid" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; else echo sprintf('B%02d',$pid); ?>" readonly> <br />
      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name: </label>
          <div class="col-sm-9">
      <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>"> <br>
      </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price: </label>
          <div class="col-sm-9">
        <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo($editrow['FLD_PRICE']); ?>" min="0.0" step="0.01" required> <br>
      </div>
        </div>
      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand: </label>
          <div class="col-sm-9">
      <select name="brand" class="form-control" id="productbrand" required>
        <option value="">Please select</option>
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
      </div>
        </div>    
        <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type: </label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
    <select name="type" class="form-control" id="producttype" required>
      <option value="">Please select</option>
     <option value="Faucet"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Faucet") echo "selected"; ?>>Faucet</option>
      <option value="Sink"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Sink") echo "selected"; ?>>Sink</option>
      <option value="Toilets"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Toilets") echo "selected"; ?>>Toilets</option>
      <option value="Linen"<?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Linen") echo "selected"; ?>>Linen</option>
    </select><br>
  </label>
</div>
</div>

     <div class="form-group">
          <label for="productcolour" class="col-sm-3 control-label">Colour: </label>
          <div class="col-sm-9">
    <input id="productcolour" name="colour" class="form-control" type="text" placeholder="Product Colour" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_COLOUR']; ?>" required> <br>
     </div>
   </div>
      <div class="form-group">
          <label for="productwarranty" class="col-sm-3 control-label">Warranty: </label>
          <div class="col-sm-9">
    <select name="warranty" id="productwarranty" class="form-control" required>
      <option value="">Please select</option>
      <option value="0"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="0") echo "selected"; ?>>0</option>
      <option value="1"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="1") echo "selected"; ?>>1</option>
      <option value="2"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="2") echo "selected"; ?>>2</option>
      <option value="3"<?php if(isset($_GET['edit'])) if($editrow['FLD_WARRANTY']=="3") echo "selected"; ?>>3</option> 
    </select><br></div></div>

      <div class="form-group">
          <label for="productq" class="col-sm-3 control-label">Quantity: </label>
          <div class="col-sm-9">
      <input id="productq" name="quantity" type="number" class="form-control" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; ?>" required> <br></div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) {  ?>
        <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
            <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
       <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <?php } ?>
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      </div>
    </form>
     </div>
  </div>
    </div>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Brand</th>
          <th>Action </th>
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
           $stmt = $conn->prepare("select * from tbl_products_a174622_pt2 LIMIT $start_from, $per_page");
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
            
            <td>
           <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-warning btn-xs" role="button" >Details</a>
          <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
    }
    $conn = null;
      ?>
    </table>
    </div>
  
  
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a174622_pt2");
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
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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