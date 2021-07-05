<link rel="stylesheet"  href="navbar.css">
<nav class="navbar navbar-default" style="background: #e52165; ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color: black;">Bubble Bath</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="color: white;">
      <ul class="nav navbar-nav" >
        <li><a href="index.php" style="color: black;">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  class="bar" style="color: black;" style="color: black;">Products <span class="caret"></span></a>
          <ul class="dropdown-menu" style="background: #e52165">
           <?php if ($_SESSION['user']['FLD_STAFF_ROLE'] == 'Admin') {?>
            <li><a href="products.php" style="color: black;">Create Product</a></li>
            
            
          <?php }?>
          <?php if ($_SESSION['user']['FLD_STAFF_ROLE'] == 'Staff') {?>
           <li><a href="view_product.php">View Product</a></li>
           <?php }?>
            
          <li><a href="search.php" style="color: black;">Search Product</a></li>
         </ul>
       </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  class="bar" style="color: black;" style="color: black;">Customer <span class="caret"></span></a>
        <ul class="dropdown-menu" style="background: #e52165">
          <?php if ($_SESSION['user']['FLD_STAFF_ROLE'] == 'Admin') {?>
            <li><a href="customers.php" style="color: black;">Create Customer</a></li>
            
          <?php }?>
          <?php if ($_SESSION['user']['FLD_STAFF_ROLE'] == 'Staff') {?>  
          <li><a href="view_customer.php">View Customer</a></li>
          <?php }?>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  class="bar" style="color: black;" style="color: black;">Staff <span class="caret"></span></a>
        <ul class="dropdown-menu" style="background:#e52165">
        <?php if ($_SESSION['user']['FLD_STAFF_ROLE'] == 'Admin') {?>
            <li><a href="staffs.php" style="color: black;">Create Staff</a></li>
           
          <?php }?>
        <?php if ($_SESSION['user']['FLD_STAFF_ROLE'] == 'Staff') {?>  
         <li><a href="view_staff.php">View staff</a></li>
         <?php }?>
       </ul>
     </li>
     <li><a href="orders.php" style="color: black;">Orders</a></li>
   </ul>

   <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  class="bar" style="color: black;"><?php echo $_SESSION['user']['FLD_STAFF_NAME']." | ". $_SESSION['user']['FLD_STAFF_ROLE']; ?> <span class="caret"></span></a>
      <ul class="dropdown-menu" style="background: #e52165">
        <li role="separator" class="divider"></li>
        <li><a href="logout.php" style="color: black;">Logout</a></li>
      </ul>
    </li>
  </ul>


</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>