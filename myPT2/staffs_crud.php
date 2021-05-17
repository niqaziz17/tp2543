<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_staff_a174622_pt2(FLD_STAFF_ID, FLD_STAFF_NAME, FLD_STAFF_PHONENUM) VALUES(:sid, :name, :phonenum)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phonenum', $phonenum, PDO::PARAM_STR);
    
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phonenum = $_POST['phonenum'];
    
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staff_a174622_pt2 SET
      FLD_STAFF_ID = :sid, FLD_STAFF_NAME = :name,
      FLD_STAFF_PHONENUM = :phonenum 
      WHERE FLD_STAFF_ID = :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phonenum', $phonenum, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phonenum = $_POST['phonenum'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_staff_a174622_pt2 where FLD_STAFF_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staff_a174622_pt2 where FLD_STAFF_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
 
?>