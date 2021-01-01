<?php

include 'Connection.php';
//error_reporting(0);
set_time_limit(1000);



if (isset($_POST['submit'])) {

	// $P_USERNAME = $_POST['P_USERNAME'];
	// $P_PASSWORD = $_POST['P_PASSWORD'];
	$W_MOBILE = $_POST['W_MOBILE'];
	$W_PASSWORD = $_POST['W_PASSWORD'];


	$sql = "SELECT COUNT(*) C FROM TEST.BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "' AND PASSWORD='" . $W_PASSWORD . "'";



	$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);



	while ($row = oci_fetch_assoc($parseresults)) {
		$return = $row["C"];
	}


	oci_free_statement($parseresults);
	oci_close($conn);


	if ($return == 1) {
		session_start();
		$_SESSION['MOBILE'] = $W_MOBILE;

		header("Location: u_profile.php");
	}
}

?>






<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Login</title>

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: sans-serif;
			background: rgb(0, 24, 36);
			background: linear-gradient(210deg, rgba(0, 24, 36, 1) 12%, rgba(26, 125, 145, 1) 36%, rgba(0, 212, 255, 1) 80%);
			height: 100vh;
			width: 100vw;
		}

		.box1 {
			width: 300px;
			padding: 40px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background: #192a56;
			text-align: center;
		}

		.box1 h1 {
			color: #e84118;
			text-transform: uppercase;
			font-weight: 500;
		}

		.box1 input[type="text"],
		.box1 input[type="password"] {
			border: 0;
			background: none;
			display: block;
			margin: 20px auto;
			text-align: center;
			border: 2px solid #718093;
			padding: 14px 10px;
			width: 200px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;


		}

		.box1 input[type="text"]:focus,
		.box1 input[type="password"]:focus {
			width: 230px;
			border-color: #e84118;
		}

		.box1 input[type="submit"] {
			border: 0;
			background: none;
			display: block;
			margin: 20px auto;
			text-align: center;
			border: 2px solid #e84118;
			padding: 14px 40px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;
			cursor: pointer;
		}

		.box1 input[type="submit"]:hover {
			background: #e84118;
		}

		.box1 a {
			color: #fff;
			text-decoration: none;



		}



		.box1 a:hover {
			background: #e84118;
			
		}
	</style>
	<link rel="stylesheet">
</head>

<body>
	<form class="box1" method="post">
		<h1>Sign in</h1>
		<input type="text" name="W_MOBILE" placeholder="Mobile No">
		<input type="password" name="W_PASSWORD" placeholder="Password">
		<input type="submit" name="submit" value="Sign in">

		<div style="margin-bottom: 6px;">
			<!-- <a href="#">Lost Your Password</a></br> -->
		</div>

		<a href="./signup.php" class="btn btn-outline-warning">
			<b>Sign Up</b> 
		</a>
	</form>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>