<?php 

	error_reporting(0);
	


	set_time_limit(1000);
	include 'Connection.php';


	if (isset($_POST['submit'])){
		$W_NAME = $_POST['name'];
		$W_MOBILE = $_POST['mobile'];

		// verify mobile number starts
		$sql = "SELECT COUNT(*) C FROM TEST.BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";

		$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);

	while ($row = oci_fetch_assoc($parseresults)) {
		$return = $row["C"];
	}

	oci_free_statement($parseresults);
	

	if ($return == 1) {

		echo "<script>alert('This Mobile No. is already used!!')</script>";

		// verify mobile number ends
	}
	else{


		// password generator starts


	$string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789()*#&!@%";

	$W_PASSWORD = substr(str_shuffle($string), 0, 6);
	// password generator ends

		// insert new user starts 

		$sql = "INSERT INTO TEST.BCSWN_USER(ID, NAME, MOBILE, PASSWORD) VALUES(INC.NEXTVAL, '". $W_NAME ."', '". $W_MOBILE."', '". $W_PASSWORD."')";

		// $sql = "INSERT INTO TEST.BCSWN_USER(ID, NAME, DOB, BLOOD, OFFICE, RESIDENCE, PERMANENT, OFFICE_C, HOME, MOBILE, EMAIL, EDUCATION, SKILL, INTEREST, DESIGNATION, POSTING, CADRE, BATCH, MEMBERSHIP, HONOR, ARTICLE, CHILD, MARRIGE, PICTURE, SIGNATURE, PASSWORD) 
		// VALUES(INC.NEXTVAL,'" . $W_NAME . "',TO_DATE('" .
		// 	$W_DOB . "', 'YYYY-MM-DD'), '" . $W_BLOOD . "', '" . $W_OFFICE . "', '" . $W_RESIDENCE . "','" . $W_PERMANENT . "', '" . $W_OFFICE_C . "', '" . $W_HOME . "', '" . $W_MOBILE . "', '" . $W_EMAIL . "','" . $W_EDUCATION . "','" . $W_SKILL . "','" . $W_INTEREST . "','" . $W_DESIGNATION . "','" . $W_POSTING . "', '" . $W_CADRE . "','" . $W_BATCH . "', '" . $W_MEMBERSHIP . "', '" . $W_HONOR . "','" . $W_ARTICLE . "','" . $W_CHILD . "','" . $W_MARRIGE . "', '" . $W_PICTURE  . "', '" . $W_SIGNATURE . "', '" . $W_PASSWORD . "')";


		$parseresults = ociparse($conn, $sql);
		ociexecute($parseresults);

		oci_free_statement($parseresults);
		oci_close($conn);

		// insert new user starts 

		header("Location: login.php");

	}
		
	}

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



    <!-- font awesome link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

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



    <title>বিসিএস উইমেন নেটওয়ার্ক</title>
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


    <div class="row m-0">
        <div class="col-lg-12 col-md-12 col-sm-12 bg-dark p-0 "
            style="height:40%!important; display:flex; align-items: center; justify-content:center;">
            <div class="row" style="margin: 30px;">
                <img src="./image/logo.png" class="mr-4" alt="BD Logo" height="60px" width="60px">
                <h1 class="text-white text-center d-inline pt-2"><b
                        style="text-shadow: 3px 3px 5px rgba(150, 150, 150, 1);">বিসিএস উইমেন নেটওয়ার্ক</b></h1>
            </div>
        </div>
    </div>





    <!-- <div class="jumbotron jumbotron-fluid bg_color">
        <div class="container text-center">
            <h1>Registration</h1>

        </div>
    </div> -->

    <div class="container">

        <div class="d-flex justify-content-center align-items-center">

            <h1 style="font-family: 'Nunito', sans-serif; font-weight:bold; border-bottom: 1px solid black;"
                class="text-center d-inline">Registration</h1>

        </div>


        <!-- form stars 		 -->
        <form action="" method="POST" enctype="multipart/form-data">

            <!-- section 1 starts  -->

            <div class="row container m-2">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card ">
                        <div class="card-header " style="background-color: #C0C0C0!important;">

                            <div class="d-flex justify-content-center align-items-center">
                                <p class="section_part btn btn-link" id="section_1_label" style="font-size:2vw;">
                                    Section 1
                                    : Login Information
                                </p>
                            </div>

                        </div>

                        <div class="card-body" id="section_1_content">

                            <div class="form-group">
                                <label class="form-label" for="name">Name <label
                                        style="color:red; font-weight:bold">*</label> :</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name"
                                    value="<?php echo $W_NAME; ?>" required>

                            </div>
                            <div class="form-group">
                                <label class="form-label" for="mobile">Mobile <label
                                        style="color:red; font-weight:bold">*</label> :</label>
                                <input type="tel" class="form-control" id="mobile" maxLength="11" name="mobile"
                                    placeholder="Mobile Number" pattern="[0-9]{11}" required>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <!-- section 1 ends  -->







            <div class="container mt-4 col-3">

                <!-- <div class="row">

    <h1 name="error" id="error" style="color:red;"></h1>
</div> -->


                <button type='submit' class='btn btn-md btn-primary btn-block' name='submit' id='submit'>Submit</button>

            </div>
        </form>


        <!-- error message section starts  -->
        <!--  -->
        <!-- error message section ends  -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>

</html>