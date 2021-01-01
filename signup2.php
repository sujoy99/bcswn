<?php 

    error_reporting(0);

?>




<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		header {
			height: 40%;
			background-color: #76A28D;
		}

		header h1 {
			padding: 10px;
		}

		.bg_color {
			background-color: #76a28d !important;
		}

		/* header css starts  */
		.note {
			text-align: center;
			height: 15%;
			/* background: -webkit-linear-gradient(left, #0072ff, #8811c5); */
			color: #fff;
			font-weight: bold;
			line-height: 80px;
		}

		/* header css ends */


		/* form section css start */
		.section_part {
			color: #4287f5;
		}

		.section_part:hover {
			color: #4287f5;
			cursor: pointer;

		}



		/* form section css end  */
	</style>



	<title>Registration</title>
</head>

<body>



	<!-- <header class="text-center">
        <h2>Registration</h2>
    </header> -->


	<!-- header starts  -->
<!-- 
	<div class="note bg-dark">

		<legend>
			<center>



				<div class="row">

					<div class="col-md-2" style="padding-right: 0!important;">
					</div>

					<div class="col-md-8 m-4 ">
						<center>
                        <img src="./image/logo.png" class="mr-4" alt="BD Logo" height="60px" width="60px">
                        <h1 class="text-white text-center d-inline pt-4"><b class="mt-2">বিসিএস উইমেন নেটওয়ার্ক</b></h1>

						</center>
					</div>
					<div class="col-md-2"></div>

				</div>
			</center>
		</legend>
	</div> -->
	<!-- header ends  -->


    <div class="row m-0" >
                    <div class="col-lg-12 col-md-12 col-sm-12 bg-dark p-0 "  style="height:40%!important; display:flex; align-items: center; justify-content:center;">
						<div class="row" style="margin: 30px;">
						<img src="./image/logo.png" class="mr-4" alt="BD Logo" height="60px" width="60px">
                        <h1 class="text-white text-center d-inline pt-2"><b>বিসিএস উইমেন নেটওয়ার্ক</b></h1>
						</div>
                    </div>
                </div>





	<!-- <div class="jumbotron jumbotron-fluid bg_color">
        <div class="container text-center">
            <h1>Registration</h1>

        </div>
    </div> -->

	<div class="container">

		<!-- form stars 		 -->
		<form action="" method="POST" enctype="multipart/form-data">

			<!-- section 1 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button disabled class='btn btn-link section_part' id="section_1_label">
                            Section 1 : Personal Information
                        </button> -->

							<p class="section_part btn btn-link" id="section_1_label" style="font-size:22px;">Section 1 : Login Information
							</p>

						</div>

						<div class="card-body" id="section_1_content">



							<div class="row">
								<!-- name starts  -->
								<div class="form-group col-6 pl-0">
									<label class="form-label" for="name">Name <label style="color:red; font-weight:bold">*</label> :</label>
									<input type="text" name="u_id" id="u_id" value="<?php echo $W_ID; ?>" hidden>
									<input type="text" name="pass" id="pass" value="<?php echo $W_PASSWORD; ?>" hidden>
									<input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" value="<?php echo $W_NAME; ?>" required>

								</div>
								<!-- name ends  -->

								<!-- mobile starts  -->
								<div class="form-group col-6 pl-0">
									<label class="form-label" for="mobile">Mobile <label style="color:red; font-weight:bold">*</label> :</label>
									<input type="text" maxLength="11" class="form-control" name="mobile" id="mobile" value="<?php echo $W_MOBILE; ?>" placeholder="Mobile Number" required>
								</div>
								<!-- mobile ends  -->
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- section 1 ends  -->








			<div class="container mt-4" style="width:15%">

				<div class="row">

					<h1 name="error" id="error" style="color:red;"></h1>
				</div>
				<?php
				if (isset($_GET['u'])) {
					echo "<button type='submit' class='btn btn-primary btn-block' name='update' id='submit'>Submit</button>";
				} else {
					echo "<button type='submit' class='btn btn-primary btn-block' name='submit' id='submit'>Submit</button>";
				}
				?>

			</div>
		</form>


		<!-- error message section starts  -->
		<!--  -->
		<!-- error message section ends  -->
	</div>







	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>

</html>