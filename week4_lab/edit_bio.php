<?php
 
$univ = array
  (
  array ("name"=>"Universiti Putra Malaysia","abb"=>"UPM"),
  array ("name"=>"Universiti Kebangsaan Malaysia","abb"=>"UKM"),
  array ("name"=>"Universiti Malaya","abb"=>"UM"),
  array ("name"=>"Universiti Malaysia Sabah","abb"=>"UMS"),
  array ("name"=>"Universiti Pendidikan Sultan Idris","abb"=>"UPSI"),
  array ("name"=>"Universiti Sains Islam Malaysia","abb"=>"USIM"),
  array ("name"=>"Universiti Teknologi MARA","abb"=>"UiTM"),
  array ("name"=>"Universiti Malaysia Terengganu","abb"=>"UMT"),
  array ("name"=>"Universiti Tun Hussein Onn","abb"=>"UTHM"),
  array ("name"=>"Universiti Teknikal Malaysia","abb"=>"UTeM"),
  array ("name"=>"Universiti Malaysia Pahang","abb"=>"UMP"),
  array ("name"=>"Universiti Malaysia Perlis","abb"=>"UniMap"),
  array ("name"=>"Universiti Sultan Zainal Abidin ","abb"=>"UniSZA"),
  array ("name"=>"Universiti Malaysia Kelantan ","abb"=>"UMK"),
  array ("name"=>"Universiti Pertahanan Nasional Malaysia","abb"=>"UPNM")
  );

  $record = array
  (
  'name' => "Mohammad Faidzul Nasrudin",
  'age' => 41,
  'sex' => "male",
  'address' => "Bandar Seri Putra",
  'email' => "mfn@ukm.edu.my",
  'dob' => "1975-10-31",
  'height' => 188,
  'phone' => "+6012-2646234",
  'color' => "#ccaa34",
  'fbtwig' => "https://www.facebook.com/mohammad.f.nasrudin",
  'univ' => "UKM",
  'matricnum' => "a123456"
  );
 
 ?>




<!DOCTYPE html>
<html>
<head>
  <title>Biodata</title>
</head>
<body>
<h1>Biodata Form</h1>
<hr>
<form action="validate_biodata.php" method="post">
  <table border="1" cellpadding="10">
    <tr>
      <td>Name:</td>
       <td><input type="text" name="name" placeholder="Insert your name" autofocus value="<?php echo $record['name']; ?>"></td>
    </tr>
    <tr>
      <td>Age:</td>
     <td><input type="number" name="age" min="0" max="100" step="1" value="<?php echo $record['age']; ?>"></td>
    </tr>
    <tr>
      <td>Sex:</td>
      <td>
         <input type="radio" name="sex" value="male" <?php if($record['sex'] == "male") echo "checked"; ?>>Male<br>
        <input type="radio" name="sex" value="female" <?php if($record['sex'] == "female") echo "checked"; ?>>Female
      </td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><textarea name="address" cols="50" rows="5" placeholder="Insert your address"><?php echo $record['address']; ?></textarea></td>
    </tr>
    <tr>
      <td>Email:</td>
       <td><input type="email" name="email" placeholder="Insert your email" value="<?php echo $record['email']; ?>"></td>
    </tr>
    <tr>
      <td>Date of Birth:</td>
      <td><input type="date" name="dob" value="<?php echo $record['dob']; ?>"></td>
    </tr>
    <tr>
      <td>Height:</td>
      <td><input type="range" name="height" id="heightId" min = "100" max = "200" oninput="outputId.value = heightId.value" value="<?php echo $record['height']; ?>">
      <output id="outputId"><?php echo $record['height']; ?></output>cm</td>
    </tr>
    <tr>
      <td>Tel:</td>
       <td><input type="tel" name="phone" pattern="\+60\d{2}-\d{7}" placeholder="+60##-#######" value="<?php echo $record['phone']; ?>"></td>
    </tr>
    <tr>
      <td>My Favorite Color:</td>
        <td><input type="color" name="color" value="<?php echo $record['color']; ?>"></td>
    </tr>
    <tr>
      <td>Fb/TW/IG:</td>
      <td><input type="url" name="fbtwig" placeholder="Insert the URL" value="<?php echo $record['fbtwig']; ?>"></td>
    </tr>
    <tr>
      <td>My University:</td>
      <td>
        <select name="univ">
          <option value="" selected>Selected</option>
          <option value="Universiti Putra Malaysia" selected>Universiti Putra Malaysia</option>
          <option value="Universiti Kebangsaan Malaysia" selected>Universiti Kebangsaan Malaysia</option>
          <option value="Universiti Malaya" selected>Universiti Malaya</option>
          <option value="Universiti Malaysia Sabah" selected>Universiti Malaysia Sabah</option>
          <option value="Universiti Pendidikan Sultan Idris" selected>Universiti Malaysia Sabah</option>
          <option value="Universiti Sains Islam Malaysia" selected>Universiti Sains Islam Malaysia</option>
          <option value="Universiti Teknologi MARA" selected>Universiti Teknologi MARA</option>
          <option value="Universiti Malaysia Terengganu" selected>Universiti Malaysia Terengganu</option>
          <option value="Universiti Tun Hussein Onn" selected>Universiti Tun Hussein Onn</option>
          <option value="Universiti Teknikal Malaysia" selected>Universiti Teknikal Malaysia</option>
          <option value="Universiti Malaysia Pahang" selected>Universiti Malaysia Pahang</option>
          <option value="Universiti Malaysia Perlis" selected>Universiti Malaysia Perlis</option>
          <option value="Universiti Sultan Zainal Abidin" selected>Universiti Sultan Zainal Abidin</option>
          <option value="Universiti Malaysia Kelantan " selected>Universiti Malaysia Kelantan</option>
          <option value="Universiti Pertahanan Nasional Malaysia" selected>Universiti Pertahanan Nasional Malaysia</option>
          <?php
          foreach ($univ as $u) {
            if ($u['abb'] == $record['univ'])
              echo "<option value=".$u['abb']." selected>".$u['name']."</option>";
            else 
              echo "<option value=".$u['abb'].">".$u['name']."</option>";
          }
          ?>

        </select>
      </td>
    </tr>
  </table>
<hr>
<input type="hidden" name="matricnum" value="a174622">
<input type="submit" name="biodata_form" value="Submit My Biodata">
<input type="reset">
</form>
 
</body>
</html>