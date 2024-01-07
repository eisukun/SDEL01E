<?php

include 'process/db_connection.php';
$conn = OpenCon();
$sql = "SELECT * FROM `user_accounttbl`;";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user = $_POST['user'];
	$pass = $_POST['password'];
	$sql = "SELECT COUNT(*) AS count
    FROM user_accounttbl
    WHERE username = '$user' AND password = '$pass';
    ";
	$result = mysqli_fetch_assoc($conn->query($sql));

	if ($result['count'] > 0 && $user != "" && $pass != "") {
		$sql = "SELECT * FROM user_accounttbl WHERE username = '$user' AND password = '$pass';";
		$result = mysqli_fetch_assoc($conn->query($sql));
		session_start();
		$_SESSION['privilege'] = $result['privilege'];
		$_SESSION['username'] = $result['username'];
		$_SESSION['employee_no'] = $result['employee_no'];
		
		if($_SESSION['privilege'] == 1){
			header("Refresh:0; url=Admin_page.php");
		}elseif($_SESSION['privilege'] == 2){
			header("Refresh:0; url=Payroll_page.php");
		}elseif($_SESSION['privilege'] == 3){
			header("Refresh:0; url=Beefs.php");
		}
		
		exit();
	} else {
		echo "<script>";
		echo "alert('Invalid credentials!');";
		echo "</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/login_util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="css/global.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	<link rel="icon" type="image/png" href="Images/Assets/favicon.ico">
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('Images/bg.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post">
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="user" placeholder="User name">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</body>

</html>