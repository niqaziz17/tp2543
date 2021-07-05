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
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>

    <style >
      input[type="file"]{
        display: none;
      }
    </style>
  </head>
  <body  style="background: #0d1137;">

   <?php include_once 'nav_bar.php'; ?>

   <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
    <div class="page-header">
      <h2 style="color: white; text-align: center; ">Products List</h2>
    </div>
    <table class="table table-bordered" id="productList" style="color: white; text-align: center;">
      <thead>
      <tr>
        <th style="text-align: center;">Product ID</th>
        <th style="text-align: center;">Name</th>
        <th style="text-align: center;">Price</th>
        <th style="text-align: center;">Brand</th>
        <th style="text-align: center;">Type</th>
        <th style="text-align: center;">Colour</th>
        <th style="text-align: center;">Warranty</th>
        <th style="text-align: center;">Quantity</th>
        <th style="text-align: center;">Action </th>
      </tr>
    </thead>
    <tbody>
      <?php
     
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a174622_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
        echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
        ?>  
        <tr style="background: #0d1137;"> 
          <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
          <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
          <td><?php echo $readrow['FLD_PRICE']; ?></td>
          <td><?php echo $readrow['FLD_BRAND']; ?></td>
          <td><?php echo $readrow['FLD_TYPE']; ?></td>
          <td><?php echo $readrow['FLD_COLOUR']; ?></td>
          <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
          <td><?php echo $readrow['FLD_QUANTITY']; ?></td>

          <td>
           <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-warning btn-xs" role="button" >Details</a>
          
         </td>
       </tr>
       <?php
     }
     $conn = null;
     ?>
     </tbody>
   </table>
 </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
   <script type="application/javascript">
        var loadFile = function (event) {
          /*  var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('productPhoto');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);*/
            document.getElementById('inputImage').value = event.target.files[0]['name'];
        };
    </script>
    <script type="text/javascript">var loadFile = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('productPhoto');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
        document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
    };

    $(document).ready(function () {
        $("#productList").DataTable({
          "pageLength": 5
        });
    });</script>
</body>
</html>