<?php


error_reporting(0);
// session_start();
// if (!isset($_SESSION['USERNAME'])) {
// 	header("location:index.php");
// }


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css"> -->



    <!-- custom css link  -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/sidebar.css">

    <!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css"
        integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g=="
        crossorigin="anonymous" />


    <title>Small Project</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">


            <!-- sidebar starts  -->
            <div class="col-lg-2 col-md-2 col-sm-2 p-0">

                <!-- <div class="sidebar">

                    <div class="logo d-flex justify-content-center align-items-center">
                        <img src="./image/ITbl.png" alt="" height="90px" width="90px">
                    </div>
                    <div class="sidebar_item">
                        <h1 class="text-white p-3 logo" style="font-size:34px;">Dashboard</h1>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./prepaid_cust_entry.php">Prepaid Customer Entry</a></li>
                    </div>
                </div> -->

                <?php include "sidebar.php" ?>

            </div>
            <!-- sidebar ends  -->

            <!-- page content starts  -->
            <div class="col-lg-10 col-md-10 col-sm-10 p-0">
                <div class="row m-0" style="height:10%!important">
                    <div class="col-lg-12 col-md-12 col-sm-12 bg-dark p-0 "
                        style="display:flex; align-items: center; justify-content:center;">
                        <div class="row">
                            <img src="./image/logo.png" class="mr-4" alt="BD Logo" height="60px" width="60px">
                            <h1 class="text-white text-center d-inline pt-2"><b>বিসিএস উইমেন নেটওয়ার্ক</b></h1>
                        </div>
                    </div>
                </div>


                <div class="row col-12 m-0">
                    <!-- form stars 		 -->
                   
            </div>
        </div>






    </div>
    <!-- page content ends  -->


    </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <script>

        $(document).ready(function(){
            $("#event").addClass("tbl_btn");
        })
    </script>







</body>

</html>