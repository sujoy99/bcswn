<?php

error_reporting(0);
?>




<?php

set_time_limit(1000);
include 'Connection.php';

// $W_ID = "";
$W_NAME = "";
$W_DOB = "";
$W_BLOOD = "";
$W_MARRIGE = "";
$W_OFFICE = "";
$W_RESIDENCE = "";
$W_PERMANENT = "";
$W_OFFICE_C = "";
$W_HOME = "";
$W_MOBILE = "";
$W_EMAIL = "";
$W_EDUCATION = "";
$W_SKILL = "";
$W_INTEREST = "";
$W_DESIGNATION = "";
$W_POSTING = "";
$W_CADRE = "";
$W_BATCH = "";
$W_MEMBERSHIP = "";
$W_HONOR = "";
$W_ARTICLE = "";
$W_CHILD = "";
$W_PICTURE = "";
$W_PICTURE_1 = "";
$W_SIGNATURE = "";
$W_PASSWORD = "";

if (isset($_POST['submit'])) {

	// Start the session
	// session_start();

	$W_NAME = $_POST['name'];
	$W_DOB = $_POST['dob'];
	$W_BLOOD = $_POST['blood'];

	if (isset($_POST['marrige'])) {
		$W_MARRIGE = $_POST['marrige'];
	}

	$W_OFFICE = $_POST['office'];
	$W_RESIDENCE = $_POST['residence'];
	$W_PERMANENT = $_POST['permanent'];
	$W_OFFICE_C = $_POST['office_c'];
	$W_HOME = $_POST['home'];
	$W_MOBILE = $_POST['mobile'];
	$W_EMAIL = $_POST['email'];
	$W_EDUCATION = $_POST['education'];
	$W_SKILL = $_POST['skill'];
	$W_INTEREST = $_POST['interest'];
	$W_DESIGNATION = $_POST['designation'];
	$W_POSTING = $_POST['posting'];
	$W_CADRE = $_POST['cadre'];
	$W_BATCH = $_POST['batch'];
	$W_MEMBERSHIP = $_POST['membership'];
	$W_HONOR = $_POST['honor'];
	$W_ARTICLE = $_POST['article'];
	$W_CHILD = $_POST['child'];



	//FILE UPLOAD   

	// DP UPLOAD STARTS 
	$file = $_FILES['picture'];

	// print_r($file);

	$fileName = $_FILES['picture']['name'];
	$fileTmpName = $_FILES['picture']['tmp_name'];
	$fileSize = $_FILES['picture']['size'];
	$fileError = $_FILES['picture']['error'];
	$fileType = $_FILES['picture']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				// $fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileNameNew = "dp_" . $W_MOBILE . "." . $fileActualExt;
				$fileDestination = 'upload/' . $fileNameNew;

				$W_PICTURE = $fileDestination;
				$W_PICTURE_1 = $fileDestination;
				// $W_PICTURE = $fileDestination;

				move_uploaded_file($fileTmpName, $fileDestination);
			} else {
				echo "Your file is too big";
			}
		} else {

			echo "There was an error uploading your file";
		}
	} else {
		// echo "You can not upload files of this type";
	}

	// DP UPLOAD ENDS 





	// SIGNATURE UPLOAD STARTS 
	$file_s = $_FILES['signature'];

	// print_r($file);

	$fileName_s = $_FILES['signature']['name'];
	$fileTmpName_s = $_FILES['signature']['tmp_name'];
	$fileSize_s = $_FILES['signature']['size'];
	$fileError_s = $_FILES['signature']['error'];
	$fileType_s = $_FILES['signature']['type'];

	$fileExt_s = explode('.', $fileName);
	$fileActualExt_s = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError_s === 0) {
			if ($fileSize_s < 1000000) {

				$fileNameNew_s = "signature_" . $W_MOBILE . "." . $fileActualExt_s;
				$fileDestination_s = 'upload/' . $fileNameNew_s;

				$W_SIGNATURE = $fileDestination_s;
				// $W_SIGNATURE = $fileDestination_s;

				move_uploaded_file($fileTmpName_s, $fileDestination_s);
			} else {
				echo "Your file is too big";
			}
		} else {

			echo "There was an error uploading your file";
		}
	} else {
		// echo "You can not upload files of this type";
	}

	// SIGNATURE UPLOAD ENDS 




	// password generator starts


	$string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789()*#&!@%";

	$W_PASSWORD = substr(str_shuffle($string), 0, 6);
	// password generator ends



	// verify mobile no starts
	$sql = "SELECT COUNT(*) C FROM TEST.BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";

	$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);



	while ($row = oci_fetch_assoc($parseresults)) {
		$return = $row["C"];
	}

	if ($return == 1) {

		echo "<script>alert('This Mobile No. is already used!!')</script>";
	} else {
		$sql = "INSERT INTO TEST.BCSWN_USER(ID, NAME, DOB, BLOOD, OFFICE, RESIDENCE, PERMANENT, OFFICE_C, HOME, MOBILE, EMAIL, EDUCATION, SKILL, INTEREST, DESIGNATION, POSTING, CADRE, BATCH, MEMBERSHIP, HONOR, ARTICLE, CHILD, MARRIGE, PICTURE, SIGNATURE, PASSWORD) 
		VALUES(INC.NEXTVAL,'" . $W_NAME . "',TO_DATE('" .
			$W_DOB . "', 'YYYY-MM-DD'), '" . $W_BLOOD . "', '" . $W_OFFICE . "', '" . $W_RESIDENCE . "','" . $W_PERMANENT . "', '" . $W_OFFICE_C . "', '" . $W_HOME . "', '" . $W_MOBILE . "', '" . $W_EMAIL . "','" . $W_EDUCATION . "','" . $W_SKILL . "','" . $W_INTEREST . "','" . $W_DESIGNATION . "','" . $W_POSTING . "', '" . $W_CADRE . "','" . $W_BATCH . "', '" . $W_MEMBERSHIP . "', '" . $W_HONOR . "','" . $W_ARTICLE . "','" . $W_CHILD . "','" . $W_MARRIGE . "', '" . $W_PICTURE  . "', '" . $W_SIGNATURE . "', '" . $W_PASSWORD . "')";

		// print_r($sql);
		$parseresults = ociparse($conn, $sql);
		ociexecute($parseresults);

		oci_free_statement($parseresults);
		oci_close($conn);

		// $W_MOBILE = $_SESSION['W_MOBILE'];

		header("Location: view.php?u=$W_MOBILE");
	}


	// verify mobile no ends 





}


// error_reporting(0);




?>


<!-- update the form starts  -->
<?php

if (isset($_POST['update'])) {
	$W_ID = $_POST['u_id'];
	$W_PASSWORD = $_POST['pass'];
	$W_NAME = $_POST['name'];
	$W_DOB = $_POST['dob'];
	$W_BLOOD = $_POST['blood'];

	if (isset($_POST['marrige'])) {
		$W_MARRIGE = $_POST['marrige'];
	}

	$W_OFFICE = $_POST['office'];
	$W_RESIDENCE = $_POST['residence'];
	$W_PERMANENT = $_POST['permanent'];
	$W_OFFICE_C = $_POST['office_c'];
	$W_HOME = $_POST['home'];
	$W_MOBILE = $_POST['mobile'];
	$W_EMAIL = $_POST['email'];
	$W_EDUCATION = $_POST['education'];
	$W_SKILL = $_POST['skill'];
	$W_INTEREST = $_POST['interest'];
	$W_DESIGNATION = $_POST['designation'];
	$W_POSTING = $_POST['posting'];
	$W_CADRE = $_POST['cadre'];
	$W_BATCH = $_POST['batch'];
	$W_MEMBERSHIP = $_POST['membership'];
	$W_HONOR = $_POST['honor'];
	$W_ARTICLE = $_POST['article'];
	$W_CHILD = $_POST['child'];



	//FILE UPLOAD   

	// DP UPDATE STARTS 
	
	$file = $_FILES['picture'];

	// print_r($file);

	$fileName = $_FILES['picture']['name'];
	$fileTmpName = $_FILES['picture']['tmp_name'];
	$fileSize = $_FILES['picture']['size'];
	$fileError = $_FILES['picture']['error'];
	// print_r($fileError);
	// echo $W_PICTURE;
	$fileType = $_FILES['picture']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));


	$sql = "SELECT * FROM TEST.BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";

	// print_r($sql);

	$parseresults = ociparse($conn, $sql);
	// print_r($parseresults);
	ociexecute($parseresults);

	while ($row = oci_fetch_assoc($parseresults)) {
		// $cust_num = $row['CUSTOMER_NUM'];
		$W_PICTURE = $row['PICTURE'];

		// $cust_chk_digit = $row['CUST_CHK_DIGIT'];
		// $primary_key = $cust_num . $cust_chk_digit;
		// $bill_cycle_code = $row['BILL_CYCLE_CODE'];
		// $cl_sr_reading = $row['CL_SR_READING'];
		// $cl_pk_reading = $row['CL_PK_READING'];
		// $cl_off_pk_reading = $row['CL_OFF_PK_READING'];

		
	}

	




	$allowed = array('jpg', 'jpeg', 'png');
	$fileNameNew = "dp_" . $W_MOBILE . "." . $fileActualExt;
	$fileDestination = 'upload/' . $fileNameNew;
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				
				

				
				// echo $W_PICTURE;
				// // $W_PICTURE = $fileDestination;
					if(is_uploaded_file($_FILES['picture']['tmp_name']) == 1){						
						move_uploaded_file($fileTmpName, $fileDestination);
						$W_PICTURE = $fileDestination;
					}
				

				//  move_uploaded_file($fileTmpName, $fileDestination);

				
			} else {
				echo "Your file is too big";
			}
		} else {

			echo "There was an error uploading your file";
		}
	} else {
		// echo "You can not upload files of this type";
	}

	// DP UPDATE ENDS 


	// SIGNATURE UPLOAD STARTS 
	$file_s = $_FILES['signature'];

	// print_r($file);

	$fileName_s = $_FILES['signature']['name'];
	$fileTmpName_s = $_FILES['signature']['tmp_name'];
	$fileSize_s = $_FILES['signature']['size'];
	$fileError_s = $_FILES['signature']['error'];
	$fileType_s = $_FILES['signature']['type'];

	$fileExt_s = explode('.', $fileName_s);
	$fileActualExt_s = strtolower(end($fileExt_s));


	$sql = "SELECT * FROM TEST.BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";

	// print_r($sql);

	$parseresults = ociparse($conn, $sql);
	// print_r($parseresults);
	ociexecute($parseresults);

	while ($row = oci_fetch_assoc($parseresults)) {
		// $cust_num = $row['CUSTOMER_NUM'];
		$W_SIGNATURE = $row['SIGNATURE'];

		// $cust_chk_digit = $row['CUST_CHK_DIGIT'];
		// $primary_key = $cust_num . $cust_chk_digit;
		// $bill_cycle_code = $row['BILL_CYCLE_CODE'];
		// $cl_sr_reading = $row['CL_SR_READING'];
		// $cl_pk_reading = $row['CL_PK_READING'];
		// $cl_off_pk_reading = $row['CL_OFF_PK_READING'];

		
	}



	$allowed = array('jpg', 'jpeg', 'png');
	$fileNameNew_s = "signature_" . $W_MOBILE . "." . $fileActualExt_s;
	$fileDestination_s = 'upload/' . $fileNameNew_s;
	echo in_array($fileActualExt_s, $allowed);
	if (in_array($fileActualExt_s, $allowed)== 1) {
		if ($fileError_s === 0) {
			if ($fileSize_s < 1000000) {
				// $fileNameNew = uniqid('', true).".".$fileActualExt;

				

				if(is_uploaded_file($_FILES['signature']['tmp_name']) == 1){						
					move_uploaded_file($fileTmpName_s, $fileDestination_s);
					$W_SIGNATURE = $fileDestination_s;
				}
				

				// $W_SIGNATURE = $fileDestination_s;
				// $W_SIGNATURE = $fileDestination_s;

				

				//move_uploaded_file($fileTmpName_s, $fileDestination_s);
			} else {
				echo "Your file is too big";
			}
		} else {

			echo "There was an error uploading your file";
		}
	} else {
		// echo "You can not upload files of this type";
	}

	// SIGNATURE UPLOAD ENDS 


	$sql = "UPDATE TEST.BCSWN_USER 
	SET 	ID='" . $W_ID . "', NAME='" . $W_NAME . "', 
	DOB=TO_DATE('". $W_DOB. "', 'YYYY-MM-DD'), 
	BLOOD='" . $W_BLOOD   . "', 
	OFFICE='" . $W_OFFICE . "', 
	RESIDENCE='" . $W_RESIDENCE . "', 
	PERMANENT='" . $W_PERMANENT . "', 
	OFFICE_C='" . $W_OFFICE_C . "', 
	HOME='" . $W_HOME . "', 
	EMAIL='" . $W_EMAIL . "', 
	EDUCATION='" . $W_EDUCATION . "', 
	SKILL='" . $W_SKILL . "', 
	INTEREST='" . $W_INTEREST . "', 
	DESIGNATION='" . $W_DESIGNATION . "', 
	POSTING='" . $W_POSTING . "', 
	CADRE='" . $W_CADRE . "', 
	BATCH='" . $W_BATCH . "', 
	MEMBERSHIP='" . $W_MEMBERSHIP . "', 
	HONOR='" . $W_HONOR . "', 
	ARTICLE='" . $W_ARTICLE . "', 
	CHILD='" . $W_CHILD . "', 
	MARRIGE='" . $W_MARRIGE . "', 
	PICTURE='" . $W_PICTURE . "', 
	SIGNATURE='" . $W_SIGNATURE . "', 
	PASSWORD='" . $W_PASSWORD . "' 
	WHERE MOBILE='" . $W_MOBILE . "'";

	// print_r($sql);
	$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);

	oci_free_statement($parseresults);
	oci_close($conn);

	header("Location: view.php?u=$W_MOBILE");
}


?>


<?php

include "Connection.php";

if (isset($_GET['u'])) {
	$W_MOBILE = $_GET['u'];
	// echo $W_MOBILE;
	$sql = "SELECT * FROM TEST.BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";

	// print_r($sql);

	$parseresults = ociparse($conn, $sql);
	// print_r($parseresults);
	ociexecute($parseresults);

	while ($row = oci_fetch_assoc($parseresults)) {
		// $cust_num = $row['CUSTOMER_NUM'];

		// $cust_chk_digit = $row['CUST_CHK_DIGIT'];
		// $primary_key = $cust_num . $cust_chk_digit;
		// $bill_cycle_code = $row['BILL_CYCLE_CODE'];
		// $cl_sr_reading = $row['CL_SR_READING'];
		// $cl_pk_reading = $row['CL_PK_READING'];
		// $cl_off_pk_reading = $row['CL_OFF_PK_READING'];

		$output[] = $row;
	}

	// var_dump($output);

	for ($i = 0; $i < count($output); $i++) {
		$W_ID = $output[$i]['ID'];
		
		$W_NAME = $output[$i]['NAME'];
		$W_DOB = $output[$i]['DOB'];
		$W_BLOOD = $output[$i]['BLOOD'];
		$W_MARRIGE = $output[$i]['MARRIGE'];
		$W_OFFICE = $output[$i]['OFFICE'];
		$W_RESIDENCE = $output[$i]['RESIDENCE'];
		$W_PERMANENT = $output[$i]['PERMANENT'];
		$W_OFFICE_C = $output[$i]['OFFICE_C'];
		$W_HOME = $output[$i]['HOME'];
		$W_MOBILE = $output[$i]['MOBILE'];
		$W_EMAIL = $output[$i]['EMAIL'];
		$W_EDUCATION = $output[$i]['EDUCATION'];
		$W_SKILL = $output[$i]['SKILL'];
		$W_INTEREST = $output[$i]['INTEREST'];
		$W_DESIGNATION = $output[$i]['DESIGNATION'];
		$W_POSTING = $output[$i]['POSTING'];
		$W_CADRE = $output[$i]['CADRE'];
		$W_BATCH = $output[$i]['BATCH'];
		$W_MEMBERSHIP = $output[$i]['MEMBERSHIP'];
		$W_HONOR = $output[$i]['HONOR'];
		$W_ARTICLE = $output[$i]['ARTICLE'];
		$W_CHILD = $output[$i]['CHILD'];
		$W_PICTURE = $output[$i]['PICTURE'];
		$W_PICTURE_1 = $output[$i]['PICTURE'];
		$W_SIGNATURE = $output[$i]['SIGNATURE'];
		$W_PASSWORD = $output[$i]['PASSWORD'];
	}
}

oci_free_statement($parseresults);
oci_close($conn);

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
			background: -webkit-linear-gradient(left, #0072ff, #8811c5);
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

	<div class="note">
		<!-- <p>This is a simpleRegister Form made using Boostrap.</p> -->

		<legend>
			<center>



				<div class="row">

					<div class="col-md-2" style="padding-right: 0!important;">
						<!-- <img class=" mt-2 mb-2 logo" src="./image/Logo.png" alt="BPDB" height="80px" width="80px"> -->
					</div>

					<div class="col-md-8 m-4">
						<center>
							<h1><b>Registration</b></h1>

						</center>
					</div>
					<div class="col-md-2"></div>

				</div>
			</center>
		</legend>
	</div>
	<!-- header ends  -->




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

			<!-- section 2 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">

							<p class="section_part btn btn-link" id="section_2_label" style="font-size:22px;">Section 2 : Personal Information
							</p>

						</div>

						<div class="card-body" id="section_2_content">



							<div class="row">

								<!-- Birthday starts  -->
								<div class="form-group col-4 ">
									<label class="form-label" for="dob">Date of Birth :</label>
									<input type="date" name="dob" id="dob" value="<?php echo date('Y-m-d',strtotime($W_DOB)) ?>" class="form-control">
								</div>
								<!-- Birthday ends  -->

								<!-- Blood starts  -->
								<div class="form-group col-4 pl-0">
									<label class="form-label" for="dob">Blood Group :</label>
									<input type="text" class="form-control" placeholder="Enter Blood Group" name="blood" id="blood" value="<?php echo $W_BLOOD; ?>">
								</div>
								<!-- Blood ends  -->

								<!-- Marital starts  -->
								<div class="form-group col-4 pl-0">
									<label class="form-label d-block">Marital Status :</label>
									<label class="radio-inline">
										<input type="radio" name="marrige" value="married" <?php echo ($W_MARRIGE == 'married') ?  "checked" : "";  ?>>Married
									</label>
									<label class="radio-inline">
										<input type="radio" name="marrige" value="divorced" <?php echo ($W_MARRIGE == 'divorced') ?  "checked" : "";  ?>>Divorced
									</label>
									<label class="radio-inline">
										<input type="radio" name="marrige" value="widow" <?php echo ($W_MARRIGE == 'widow') ?  "checked" : "";  ?> >Widow
									</label>
									<label class="radio-inline">
										<input type="radio" name="marrige" value="single" <?php echo ($W_MARRIGE == 'single') ?  "checked" : "";  ?> >Single
									</label>

								</div>
								<!-- Marital status ends  -->
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- section 2 ends  -->

			<!-- section 3 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_2_label">
                            Section 2 : My Picture Upload
                        </button> -->
							<p class="section_part btn btn-link" id="section_3_label" style="font-size:22px;">Section 3 : My Picture Upload</p>

						</div>
						<div class="card-body" id="section_3_content">
							<!-- picture starts -->
							<div class="form-group col-6">
								<label class="form-label" for="picture">My Picture :</label>
								
								<!-- <input type="file" id="files" class="hidden"/>
								<label for="files">Select file</label> -->

								

								<input type='file' class='form-control' name='picture'  id='picture'>	
								<?php 
									if($W_PICTURE != ''){
										
										echo "<img src='".$W_PICTURE."' alt='' height='120px' width='120px'> ";
									}

								?>
								
							</div>
							<!-- picture ends  -->
						</div>

					</div>
				</div>
			</div>
			<!-- section 3 ends  -->

			<!-- section 4 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_3_label">
                            Section 3 : Address Information
                        </button> -->
							<p class="section_part btn btn-link" id="section_4_label" style="font-size:22px;">Section 4 : Address Information
							</p>


						</div>
						<div class="card-body" id="section_4_content">
							<div class="row">
								<div class="col-12">
									<h5>Address </h5>
									<hr>
									<!-- office starts  -->
									<div class="form-group row">
										<label for="office" class="col-sm-2 col-form-label">Office :</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="office" id="office" value="<?php echo $W_OFFICE; ?>" placeholder="Office Address">
										</div>
									</div>
									<!-- office ends  -->

									<!-- residence starts  -->
									<div class="form-group row">
										<label for="residence" class="col-sm-2 col-form-label">Residence :</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="residence" id="residence" value="<?php echo $W_RESIDENCE; ?>" placeholder="Residence Address">
										</div>
									</div>
									<!-- residence ends  -->

									<!-- parmanent starts  -->
									<div class="form-group row">
										<label for="permanent" class="col-sm-2 col-form-label">Permanent :</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="permanent" id="permanent" value="<?php echo $W_PERMANENT; ?>" placeholder="Permanent Address">
										</div>
									</div>
									<!-- parmanent ends  -->
								</div>
								<div class="col-12">
									<h5>Contact Details </h5>
									<hr>

									<!-- office starts  -->
									<div class="form-group row">
										<label for="office_c" class="col-sm-2 col-form-label">Office :</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="office_c" id="office_c" value="<?php echo $W_OFFICE_C; ?>" placeholder="Office Address">
										</div>
									</div>
									<!-- office ends  -->

									<!-- home starts  -->
									<div class="form-group row">
										<label for="home" class="col-sm-2 col-form-label">Home :</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="home" id="home" value="<?php echo $W_HOME; ?>" placeholder="Home Address">
										</div>
									</div>
									<!-- home ends  -->



									<!-- email starts  -->
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label">Email :</label>
										<div class="col-sm-6">
											<input type="email" class="form-control" name="email" id="email" value="<?php echo $W_EMAIL; ?>" placeholder="Email">
										</div>
									</div>
									<!-- email ends  -->
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- section 4 ends  -->

			<!-- section 5 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">

							<p class="section_part btn btn-link" id="section_5_label" style="font-size:22px;">Section 5 : Educational
								Qualification & Skills</p>

						</div>
						<div class="card-body" id="section_5_content">
							<!-- education starts -->
							<div class="form-group">
								<label class="form-label" for="education">Educational Qualification :</label>
								<input type="text" class="form-control" placeholder="Educational Qualification" name="education" id="education" value="<?php echo $W_EDUCATION; ?>">
							</div>
							<!-- education ends  -->

							<!-- skill starts -->
							<div class="form-group">
								<label class="form-label" for="skill">Language Skills:</label>
								<input type="text" class="form-control" placeholder="Language Skills" name="skill" id="skill" value="<?php echo $W_SKILL; ?>">
							</div>
							<!-- skill ends  -->
						</div>

					</div>
				</div>
			</div>
			<!-- section 5 ends  -->

			<!-- section 6 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_5_label">
                            Section 5 : Interest & Hobbies
                        </button> -->
							<p class="section_part btn btn-link" id="section_6_label" style="font-size:22px;">Section 6 : Interest & Hobbies</p>

						</div>
						<div class="card-body" id="section_6_content">
							<!-- interest starts -->
							<div class="form-group">
								<label class="form-label" for="interest">Interest & Hobbies:</label>
								<input type="text" class="form-control" placeholder="Interest & Hobbies" name="interest" id="interest" value="<?php echo $W_INTEREST; ?>">
							</div>
							<!-- interest ends  -->
						</div>

					</div>
				</div>
			</div>
			<!-- section 6 ends  -->

			<!-- section 7 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_6_label">
                            Section 6 : Proffesional Records
                        </button> -->
							<p class="section_part btn btn-link" id="section_7_label" style="font-size:22px;">Section 7 : Proffesional Records
							</p>

						</div>
						<div class="card-body" id="section_7_content">

							<!-- designation starts  -->
							<div class="form-group row">
								<label for="designation" class="col-sm-2 col-form-label">Designation :</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="designation" id="designation" value="<?php echo $W_DESIGNATION; ?>" placeholder="Designation">
								</div>
							</div>
							<!-- designation ends  -->

							<!-- posting starts  -->
							<div class="form-group row">
								<label for="posting" class="col-sm-2 col-form-label">Place of Posting :</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="posting" id="posting" value="<?php echo $W_POSTING; ?>" placeholder="Place of Posting">
								</div>
							</div>
							<!-- posting ends  -->


							<div class="row">
								<!-- Cadre starts  -->
								<div class="form-group col-4">
									<label class="form-label" for="cadre">Cadre :</label>
									<input type="text" class="form-control" placeholder="Cadre" name="cadre" id="cadre" value="<?php echo $W_CADRE; ?>">
								</div>
								<!-- Cadre ends  -->

								<!-- Batch starts  -->
								<div class="form-group col-4 pl-0">
									<label class="form-label" for="batch">Batch :</label>
									<input type="text" class="form-control" placeholder="Batch" name="batch" id="batch" value="<?php echo $W_BATCH; ?>">
								</div>
								<!-- Batch ends  -->
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- section 7 ends  -->

			<!-- section 8 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">

							<p class="section_part btn btn-link" id="section_8_label" style="font-size:22px;">Section 8 : Proffesional
								Membership</p>

						</div>
						<div class="card-body" id="section_8_content">
							<!-- membership starts -->
							<div class="form-group">
								<label class="form-label" for="membership">Proffesional Membership:</label>
								<input type="text" class="form-control" placeholder="Proffesional Membership" name="membership" id="membership" value="<?php echo $W_MEMBERSHIP; ?>">
							</div>
							<!-- membership ends  -->
						</div>

					</div>
				</div>
			</div>
			<!-- section 8 ends  -->

			<!-- section 9 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_8_label">
                            Section 8 : Honors & Awards Received
                        </button> -->
							<p class="section_part btn btn-link" id="section_9_label" style="font-size:22px;">Section 9 : Honors & Awards
								Received</p>

						</div>
						<div class="card-body" id="section_9_content">
							<!-- honor starts -->
							<div class="form-group">
								<label class="form-label" for="honor">Honors & Awards Received:</label>
								<input type="text" class="form-control" placeholder="Honors & Awards Received" name="honor" id="honor" value="<?php echo $W_HONOR; ?>">
							</div>
							<!-- honor ends  -->

						</div>

					</div>
				</div>
			</div>
			<!-- section 9 ends  -->

			<!-- section 10 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">

							<p class="section_part btn btn-link" id="section_10_label" style="font-size:22px;">Section 10 : Publications &
								Articles</p>

						</div>
						<div class="card-body" id="section_10_content">
							<!-- article starts -->
							<div class="form-group">
								<label class="form-label" for="article">Publications & Articles:</label>
								<input type="text" class="form-control" placeholder="Publications & Articles" name="article" id="article" value="<?php echo $W_ARTICLE; ?>">
							</div>
							<!-- article ends  -->

						</div>

					</div>
				</div>
			</div>
			<!-- section 10 ends  -->


			<!-- section 11 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_8_label">
                            Section 8 : Honors & Awards Received
                        </button> -->
							<p class="section_part btn btn-link" id="section_11_label" style="font-size:22px;">Section 11 : Family Information</p>

						</div>
						<div class="card-body" id="section_11_content">
							<!-- children starts -->
							<div class="form-group">
								<label class="form-label" for="child">Number Of Children(If Any) :</label>
								<input type="number" min="0" class="form-control" placeholder="Number Of Children" name="child" id="child" value="<?php echo $W_CHILD; ?>">
							</div>
							<!-- children ends  -->

						</div>

					</div>
				</div>
			</div>
			<!-- section 11 ends  -->

			<!-- section 12 starts  -->

			<div class="row container m-2">
				<div class="col-12">
					<div class="card " style="width: 95%">
						<div class="card-header " style="background-color: #C0C0C0!important;">
							<!-- <button class='btn btn-link section_part' id="section_10_label">
                            Section 10 : My Signature Upload
                        </button> -->
							<p class="section_part btn btn-link" id="section_12_label" style="font-size:22px;">Section 12 : My Signature Upload
							</p>

						</div>
						<div class="card-body" id="section_12_content">
							<!-- signature starts -->
							<div class="form-group col-6">
								<label class="form-label" for="picture">My Signature :</label>
								<input type="file" class="form-control" name="signature" id="signature">

								<?php 
									if($W_SIGNATURE != ''){
										
										echo "<img src='".$W_SIGNATURE."' alt='' height='120px' width='120px'> ";
									}

								?>
							</div>
							<!-- signature ends  -->
						</div>

					</div>
				</div>
			</div>
			<!-- section 12 ends  -->



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

	<script>
		$(document).ready(function() {

			$("#section_2_content").hide();
			$("#section_3_content").hide();
			$("#section_4_content").hide();
			$("#section_5_content").hide();
			$("#section_6_content").hide();
			$("#section_7_content").hide();
			$("#section_8_content").hide();
			$("#section_9_content").hide();
			$("#section_10_content").hide();
			$("#section_11_content").hide();
			$("#section_12_content").hide();

			$("#section_1_label").click(function() {
				$("#section_1_content").slideToggle();

				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_2_label").click(function() {
				$("#section_2_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_3_label").click(function() {
				$("#section_3_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_4_label").click(function() {
				$("#section_4_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_5_label").click(function() {
				$("#section_5_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_6_label").click(function() {
				$("#section_6_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_7_label").click(function() {
				$("#section_7_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_8_label").click(function() {
				$("#section_8_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_9_label").click(function() {
				$("#section_9_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});
			$("#section_10_label").click(function() {
				$("#section_10_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_11_content").hide(500);
				$("#section_12_content").hide(500);
			});

			$("#section_11_label").click(function() {
				$("#section_11_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_12_content").hide(500);
			});

			$("#section_12_label").click(function() {
				$("#section_12_content").slideToggle();

				$("#section_1_content").hide(500);
				$("#section_2_content").hide(500);
				$("#section_3_content").hide(500);
				$("#section_4_content").hide(500);
				$("#section_5_content").hide(500);
				$("#section_6_content").hide(500);
				$("#section_7_content").hide(500);
				$("#section_8_content").hide(500);
				$("#section_9_content").hide(500);
				$("#section_10_content").hide(500);
				$("#section_11_content").hide(500);
			});


		});
	</script>



</body>

</html>