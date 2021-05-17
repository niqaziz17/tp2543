<?php
 
if (isset($_POST['edit_form'])) {
 
  include "db.php";
 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $stmt = $conn->prepare("UPDATE myguestbook SET user = :name, email = :email, comment = :comment, Find = :find, Front = :page, Form = :form, UI = :ui  WHERE id = :record_id");
 
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':find',$Find, PDO::PARAM_STR);
    $stmt->bindParam(':page',$Front, PDO::PARAM_STR);
    $stmt->bindParam(':form',$Form, PDO::PARAM_STR);
    $stmt->bindParam(':ui',$UI, PDO::PARAM_STR);
    $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
       
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $Find = $_POST['find'];
    $Front = (isset($_POST['page']) ? 'page' : '');
    $Form = (isset($_POST['form']) ? 'form' : '');
    $UI = (isset($_POST['ui']) ?  'ui': '');
 
    $id = $_POST['id'];
 
    $stmt->execute();
     
    header("Location:list.php");
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