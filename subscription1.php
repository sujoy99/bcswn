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



		<style>
			.sidebar{
				height: 100vh;
			}
			.logo{
				height: 11%;
			}
		</style>
    <title>বিসিএস উইমেন নেটওয়ার্ক</title>
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
                <div class="row m-0" style="height:20%!important">
                    <div class="col-lg-12 col-md-12 col-sm-12 bg-dark p-0 "
                        style="display:flex; align-items: center; justify-content:center;">
                        <div class="row">
                            <img src="./image/logo.png" class="mr-4" alt="BD Logo" height="60px" width="60px">
                            <h1 class="text-white text-center d-inline pt-2"><b style="text-shadow: 3px 3px 5px rgba(150, 150, 150, 1);">বিসিএস উইমেন নেটওয়ার্ক</b></h1>
                        </div>
                    </div>
                </div>


                <div class="row col-12 m-0">
                    <!-- form stars 		 -->
                    <form action="" method="POST" enctype="multipart/form-data" class="col-12">

                            			<!-- section 12 starts  -->

			<div class="row container m-4">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_10_label">
                            Section 10 : My Signature Upload
                        </button> -->
							<p class="section_part btn btn-link" id="section_12_label" style="font-size:22px;">Section  : Subscription
							</p>

						</div>
						<div class="card-body" id="section_12_content">
							<!-- signature starts -->
							<div class="row">
								<div class="form-group col-6">
									<label for="sel1">Choose Your Subscription Type :</label>
									<select class="form-control" name="S_TYPE" id="S_TYPE">
										<option>Select</option>
										<option value="1">Monthly</option>
										<option value="2">Yearly</option>

									</select>
									<div id="voucher"></div>

									<!-- <button type="button" class="btn btn-info mt-2" name="select" id="select">Select</button> -->


								</div>

								<!-- <div class="col-6 mt-4">
									<button type="button" class="btn btn-info mt-2" name="select" id="select">Select</button>
								</div> -->
							</div>
							<!-- signature ends  -->
						</div>

					</div>
				</div>
			</div>
			<!-- section 12 ends  -->



                        <div class="container mt-4" style="width:15%">

                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                        </div>
                    </form>
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
    $(document).ready(function() {

        $("#S_TYPE").on("change", function() {
            var type = this.value;
            console.log(type);

            $.ajax({
                type: "POST",
                url: "tracking.php",
                data: 'type=' + type,
                success: function(result) {
                    $("#voucher").html(result);
                }
            })
        });

        // $("#S_TYPE").on("change", function() {
        // 	var type = this.value;
        // 	console.log(type);

        // 	$.ajax({
        // 		type: "POST",
        // 		url: "tracking.php",
        // 		data: 'type='+type,
        // 		success: function(result){
        // 			$("#voucher").html(result);
        // 		}
        // 	})
        // });



      

        // $("#pay").click(function() {
        //     $("#value").slideToggle();
        // })

				// $("#pay").slideToggle();
                $("#value").show();
				$("#subscription").addClass("tbl_btn");



    });
    </script>









</body>

</html>