<?php

include 'Connection.php';
//error_reporting(0);
set_time_limit(1000);



if (isset($_POST['submit'])) {
    
    // $P_USERNAME = $_POST['P_USERNAME'];
    // $P_PASSWORD = $_POST['P_PASSWORD'];
    $P_USERNAME = strtoupper($_POST['P_USERNAME']);
    $P_PASSWORD = strtoupper($_POST['P_PASSWORD']);

   
    $sql = "SELECT COUNT(*) C FROM PCC.PC_USERS WHERE USERNAME='". $P_USERNAME ."' AND PASSWORD='". $P_PASSWORD ."'";



	$parseresults = ociparse($conn, $sql);
    ociexecute($parseresults);
    
    
    
    while ($row = oci_fetch_assoc($parseresults)) {
        $return = $row["C"];
		
    }
    

	oci_free_statement($parseresults);
    oci_close($conn);
    
    
    if ($return == 1) {
        session_start();
        $_SESSION['USERNAME'] = $P_USERNAME;
    
        header("Location: dashboard.php");
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="./image/logo1.ico" type="image/ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>BPDB</title>


    <style>

html,body{
    height:100%;
    background: linear-gradient(210deg, rgba(0, 24, 36, 1) 12%, rgba(26, 125, 145, 1) 36%, rgba(0, 212, 255, 1) 80%);
    /* background: url('./image/bg.jpg'); */
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            
}


.box1 {
            /* width: 300px; */
            width: 30%;
            height: 100%;
            height: 320px;
            padding: 15px;
            /* position: absolute; */
            /* top: 50%; */
            /* left: 50%; */
            /* transform: translate(-50%, -50%); */
            background: #192a56;
            text-align: center;
            margin: 5% auto;
        }



        .box1 input[type="text"],
        .box1 input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #718093;
            padding: 10px 6px;
            /* padding: 14px 10px; */
            width: 160px;
            /* width: 200px; */
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;


        }

        .box1 input[type="text"]:focus,
        .box1 input[type="password"]:focus {
            width: 200px;
            /* width: 230px; */
            border-color: #e84118;
        }

        .box1 input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #e84118;
            padding: 10px 30px;
            /* padding: 14px 40px; */
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
        }

        .box1 input[type="submit"]:hover {
            background: #e84118;
        }



        
    
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   /* background-color: red; */
   color: white;
   text-align: center;
   padding-bottom: 25px;
}
</style>
</head>
<body>
    

<h1 class="text-white text-center" style="padding-top: 5%; margin-bottom:10vh; font-size: 50px"><b> বিসিএস উইমেন নেটওয়ার্ক </b></h1>

<div class="container text-center">


<form action="" method="post" class="box1">
                        <img src='./image/Logo.png' alt='BPDB Logo' height='80px' width='80px'>

                        <input type="text" name="P_USERNAME" placeholder="Username">
                        <input type="password" name="P_PASSWORD" placeholder="Password">
                        <input type="submit" id="submit" name="submit" value="Login">
                    </form>
</div>

<div class="footer">
  <h3>Powered By <b style="font-size: 35px"> IT Bangla Ltd. </b></h3>
</div>


        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
