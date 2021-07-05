<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/themes/splide-sea-green.min.css">

<?php

include_once 'database.php';

try {

  $result = "";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Create
  if (isset($_POST['search'])) {

    //This array will be used to store temporary
    $dataArray = array();
    $count = 0;

    $input_data = explode(" ", $_POST['inputsearch']);

    ?>
    <center>
      <div class="row" style="display: inline-block; overflow: hidden;">
        <h2 class="mb-4 p-3 bg-secondary text-white" style="color: white;float: left;">Result for : </h2>
        <h2 style="color: white;float: right;"> 
          <?php
          for ($index = 0; $index < count($input_data); $index++) {
            echo $input_data[$index] . " ";
          }
          ?>
        </h2>
        
      </div>
    </center>
    <div id="card-slider" class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <?php

          try {

            if (count($input_data) >= 1) {

              ?>


              <?php
              for ($index = 0; $index < count($input_data); $index-=-1) {

                $stmt = $conn->prepare("SELECT * FROM  tbl_products_a174622_pt2 WHERE FLD_BRAND LIKE :first_string OR FLD_PRICE LIKE :first_string OR FLD_TYPE LIKE :first_string");

                $stmt->bindParam(':first_string', $first_string, PDO::PARAM_STR);

                $first_string = $input_data[$index];
                $first_string = "%$first_string%";

                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $readrow) {
                  if (empty($dataArray)) {

                    $dataArray[$count] = $readrow['FLD_PRODUCT_ID'];
                    $count++;

                    ?>
<!--                     <div style="background: rgba(229, 33, 101,0.9); width:100px; border-radius: 30px; filter: blur(5px);"></div>
-->                    <li class="splide__slide"  style="background: rgba(229, 33, 101,0.9); width:100px; border-radius: 30px;">
  <img style="width: 300px;height: 300px; justify-content: center; border-radius: 30px;" src="products/<?php echo ($readrow['FLD_PRODUCT_IMAGE']); ?>" >
  <div >
    <h4 > <?php echo($readrow['FLD_PRODUCT_NAME']); ?></h4>
    <h4><?php echo($readrow['FLD_BRAND']) ; ?></h4>
    <h4><?php echo($readrow['FLD_TYPE']) ; ?></h4>
    <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-warning btn-m" role="button" >Details</a>
  </div>
</li>
<?php
} else {

  if (in_array($readrow['FLD_PRODUCT_ID'], $dataArray, TRUE)) {

  } else {

    $dataArray[$count] = $readrow['FLD_PRODUCT_ID'];
    $count++;
    ?>
    <li class="splide__slide" style="background: rgba(229, 33, 101,0.9); width:100px; border-radius: 30px;">
      <img style="width: 300px; height: 300px;  border-radius: 30px;" src="products/<?php echo ($readrow['FLD_PRODUCT_IMAGE']); ?>" >
      <h4 style="text-align: center;"><?php echo($readrow['FLD_PRODUCT_NAME']); ?></h4>

      <h4 style="text-align: center;"><?php echo($readrow['FLD_BRAND']); ?></h4>
      <h4 style="text-align: center;"><?php echo($readrow['FLD_TYPE']); ?></h4>
      <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-warning btn-s" role="button" >Details</a>
    </li>

    <?php
  }
}
}
}
?>

<?php

} else {

  ?>

  <?php
  for ($index = 0; $index < count($input_data); $index++) {

    $stmt = $conn->prepare("SELECT * FROM  tbl_products_a174622_pt2 WHERE FLD_BRAND LIKE :first_string OR FLD_PRICE LIKE :first_string OR FLD_TYPE LIKE :first_string");

    $stmt->bindParam(':first_string', $first_string, PDO::PARAM_STR);

    $first_string = $input_data[$index];
    $first_string = "%$first_string%";

    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $readrow) {
      ?>
      <li class="splide__slide">
        <img src="<?php echo ['FLD_PRODUCT_IMAGE']; ?>">
        <h4><?php echo ['FLD_PRODUCT_NAME']; ?></h4>
        <h4><?php echo['FLD_BRAND']; ?></h4>
        <h4 ><?php echo['FLD_TYPE']; ?></h4>

      </li>
      <button type="submit" class="btn btn-default"><a href="products_details.php" style="color: black;">Search</a></button>
    <?php }
  }
  ?>
</table>
</div>
</div>
<?php

}

if ($result == "") {
  ?>
  <div class="px-5 mt-5">
    <p class="text-muted  fw-normal"> No result found.</p>
  </div>
  <?php
}
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
      // header("location:error.php");
}?>
</ul>
</div>
</div>

<script>
  document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '#card-slider', {
      perMove: 1,
      focus:'center',
      autowidth:true ,
      height:'500px',
      type:'loop',
      gap:20,
      perPage    : 1,
      autoplay :true,
      breakpoints: {
        600: {
          perPage: 1,
        }
      }

    } ).mount();
  } );
</script>
<?php  }
} catch (PDOException $e) {
  // echo "Error: " . $e->getMessage();
  header("location:error.php");
}
?>