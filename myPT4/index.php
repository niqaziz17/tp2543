<?php 
include'database.php';

if (!isset($_SESSION['log']))
  header("LOCATION: login.php");
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bubble Bath</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet"  href="index.css">
    
  </head>
  <body  style="background:rgba(121,126,246,1.5);">

    <?php include_once 'nav_bar.php'; ?>

    <section>
      <div class="container">
        <div class="text-center">
          <div class="row">
            <div class="col-md-12 " id="transparent">
              <img src="bubblebath.png">
            </div>
            <div class="col-md-12 " id="text">
             <hr style="border-top: 1px solid transparent;"/>
             <p class="text-muted" style="color: white; font-size: 20px">Search product by brand, type, price or all three.</p>

           </div>
           <div class="col-md-12" >
            <form action="search.php" method="post" class="form-inline">
              <div class="form-group">
              </div>
              <div class="form-group">
                <label for="inputPassword2" class="sr-only">Eriber Faucet 500</label>
                <input type="text" class="form-control" style="text-align: center;" placeholder="Eriber Faucet 500" required>
              </div>
              <button type="submit" class="btn btn-default"><a href="search.php" style="color: black;">Search</a></button>
            </form>

          </div>

        </div>
      </div>
    </div>

  </section>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>