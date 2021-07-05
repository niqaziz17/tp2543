<?php
require_once 'database.php';

if (isset($_SESSION['log'])) 
	header("LOCATION: index.php");

if (isset($_POST['userid'],$_POST['password'])){
	$UserID=htmlspecialchars($_POST['userid']);
	$Password=$_POST['password'];

	if (empty($UserID)||empty($Password)) {
		$_SESSION['error']='Please Enter Email and Password';
	}
	else{
		$stmt=$db->prepare("SELECT * FROM tbl_staff_a174622_pt2 WHERE (FLD_STAFF_ID = :id OR FLD_STAFF_EMAIL =:id) LIMIT 1");
		$stmt->bindParam(':id', $UserID);
		

		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if (isset($user['FLD_STAFF_ID'])) {
			if ($user['FLD_STAFF_PASSWORD'] == $Password) {
				unset($user['FLD_STAFF_PASSWORD']);
				$_SESSION['log'] = true;
				$_SESSION['user'] = $user;

				header("LOCATION: index.php");
				exit();
			}
			else{
				$_SESSION['error'] = 'Your email or password is wrong. Please try again';
			}
		}


		else{
			$_SESSION['error'] = 'Account does not exist.';
		}
	}

	header("LOCATION: " . $_SERVER['REQUEST_URI']);
	exit();
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bubble Bath</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	
	<section>
		<img src="bubblebath.png">
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>

		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			<div class="container">
				<div class="form">
					<h2>Login Page</h2>
					<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
						<div class="inputBox">
							<input type="text" placeholder="Email/Staff ID" name="userid">
						</div>
						<div class="inputBox">
							<input type="password" placeholder="Password" name="password">
						</div>

						<?php
						if (isset($_SESSION['error'])) {
							echo ($_SESSION['error']);
							unset($_SESSION['error']);
						}
						?>

						<div class="inputBox">
							<input type="submit" value="Login">
						</div>

						<div style="text-align: center; color: white;">Demo admin
							<div class="well">
								Email:admin@gmail.com   

							</div>
							<div>Password:2222</div>
						</div>
						<br>
						<div style="text-align: center; color: white;">Demo Staff
							<div class="well">
								Email:staff@gmail.com   

							</div>
							<div>Password:1234</div>
						</div>

					</form>
				</div>
			</div>
		</section>
	</body>
	</html>