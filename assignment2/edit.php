<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM myguestbook WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
 ?>



<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 
<form method="post" action="update.php">
  Nama :
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  <br>
  Email :
  <input type="text" name="email" size="25" required value="<?php echo $result["email"]; ?>">
  <br>
  How do you find me?
  <select name="find" id="find">
    <option value="From a friend">From a friend</option>
    <option value="I googled you">I googled you</option>
    <option value="Just surf on in">Just surf on in</option>
    <option value="From your Facebook">From your Facebook</option>
    <option value="I clicked an ads">I clicked an ads</option>
  </select><br>

  I like your: <br>
    <input type="checkbox" id="page" name="page" value="Front Page">
      <label for="page">Front Page</label><br>
    <input type="checkbox" id="form" name="form" value="Form">
      <label for="form">Form</label><br>
    <input type="checkbox" id="ui" name="ui" value="UserInterface">
      <label for="ui">User Interface</label><br>

  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment">
  <input type="reset">
  <br>
</form>
 
</body>
</html>