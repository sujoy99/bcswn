<?php
$W_ID = "";
$W_NAME = "";
$W_DOB = "";
$W_BLOOD = "";
$W_MOBILE = "";
$W_EMAIL = "";
$W_SKILL = "";
$W_INTEREST = "";
$W_DESIGNATION = "";
$W_POSTING = "";
$W_CADRE = "";
$W_BATCH = "";
$W_MEMBERSHIP = "";
$W_HONOR = "";
$W_ARTICLE = "";
$W_MARRIGE = "";
$W_PICTURE = "";
$W_SIGNATURE = "";
$W_PASSWORD = "";


$W_SSC_EXAMINATION = "";
$W_SSC_BOARD = "";
$W_SSC_ROLL = "";
$W_SSC_RESULT = "";
$W_SSC_GROUP = "";
$W_SSC_PASSING_YEAR = "";
$W_HSC_EXAMINATION = "";
$W_HSC_BOARD = "";
$W_HSC_ROLL = "";
$W_HSC_RESULT = "";
$W_HSC_GROUP = "";
$W_HSC_PASSING_YEAR = "";
$W_GRADUATION_EXAMINATION = "";
$W_GRADUATION_SUBJECT = "";
$W_GRADUATION_UNIVERSITY = "";
$W_GRADUATION_RESULT = "";
$W_GRADUATION_PASSING_YEAR = "";
$W_GRADUATION_COURSE_DURATION = "";
$W_MASTER_EXAMINATION = "";
$W_MASTER_SUBJECT = "";
$W_MASTER_UNIVERSITY = "";
$W_MASTER_RESULT = "";
$W_MASTER_PASSING_YEAR = "";
$W_MASTER_COURSE_DURATION = "";
$W_O_ADDRESS = "";
$W_O_DIVISION = "";
$W_O_DISTRICT = "";
$W_O_UPAZILLA = "";
$W_R_ADDRESS = "";
$W_R_DIVISON = "";
$W_R_DISTRICT = "";
$W_R_UPAZILLA = "";
$W_P_ADDRESS = "";
$W_P_DIVISION = "";
$W_P_DISTRICT = "";
$W_P_UPAZILLA = "";
$W_CHILD_BOYS = "";
$W_CHILD_GIRLS = "";


$W_SSC_GRADE = "";
$W_HSC_GRADE = "";
$W_GRADUATION_GRADE = "";
$W_MASTER_GRADE = "";


error_reporting(0);
session_start();
if (!isset($_SESSION['MOBILE'])) {
	header("location:login.php");
} else {
	set_time_limit(1000);
	include "Connection.php";
	$W_MOBILE = $_SESSION['MOBILE'];
	echo $W_MOBILE;
	// $sql = "SELECT * FROM BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";


	$sql2 = "SELECT * FROM BCSWN_DIVISIONS";
	$parse = ociparse($conn, $sql2);
	oci_execute($parse);

	while ($row = oci_fetch_assoc($parse)) {
		$division[] = $row;
	}

	// var_dump($division);
	// echo count($division);
	oci_free_statement($parse);



	$sql = "SELECT BCSWN_USER.NAME, BCSWN_USER.DOB, (SELECT BCSWN_BLOOD.BLOOD_NAME FROM BCSWN_BLOOD WHERE BCSWN_USER.BLOOD = BCSWN_BLOOD.BLOOD_ID ) AS BLOOD, BCSWN_USER.MOBILE, BCSWN_USER.EMAIL, BCSWN_USER.SKILL, (SELECT BCSWN_INTEREST.INTEREST_NAME FROM BCSWN_INTEREST WHERE BCSWN_USER.INTEREST=BCSWN_INTEREST.INTEREST_ID) AS INTEREST, BCSWN_USER.DESIGNATION, BCSWN_USER.POSTING, (SELECT BCSWN_CADRE.CADRE_NAME FROM BCSWN_CADRE WHERE BCSWN_USER.CADRE=BCSWN_CADRE.CADRE_ID ) AS CADRE, (SELECT BCSWN_BATCH.BATCH_NAME FROM BCSWN_BATCH WHERE BCSWN_USER.BATCH=BCSWN_BATCH.BATCH_ID ) AS BATCH, BCSWN_USER.MEMBERSHIP, BCSWN_USER.HONOR, BCSWN_USER.ARTICLE, BCSWN_USER.MARRIGE, BCSWN_USER.PICTURE, BCSWN_USER.SIGNATURE, BCSWN_USER.SSC_EXAM, BCSWN_USER.SSC_BOARD, BCSWN_USER.SSC_ROLL, BCSWN_USER.SSC_RESULT, BCSWN_USER.SSC_GROUP, BCSWN_USER.SSC_PASSING, BCSWN_USER.HSC_EXAM, BCSWN_USER.HSC_BOARD, BCSWN_USER.HSC_ROLL, BCSWN_USER.HSC_RESULT, BCSWN_USER.HSC_GROUP, BCSWN_USER.HSC_PASSING, BCSWN_USER.O_ADDRESS,(SELECT BCSWN_DIVISIONS.DIVISION_NAME FROM BCSWN_DIVISIONS WHERE BCSWN_USER.O_DIVISION=BCSWN_DIVISIONS.DIVISION_ID) AS O_DIV, (SELECT BCSWN_DISTRICTS.DISTRICT_NAME FROM BCSWN_DISTRICTS WHERE BCSWN_USER.O_DISTRICTS=BCSWN_DISTRICTS.DISTRICT_ID) AS O_DIST, (SELECT BCSWN_UPAZILLA.UPAZILLA_NAME FROM BCSWN_UPAZILLA WHERE BCSWN_USER.O_UPAZILLA=BCSWN_UPAZILLA.UPAZILLA_ID) AS O_UP, BCSWN_USER.R_ADDRESS, (SELECT BCSWN_DIVISIONS.DIVISION_NAME FROM BCSWN_DIVISIONS WHERE BCSWN_USER.R_DIVISION=BCSWN_DIVISIONS.DIVISION_ID) AS R_DIV, (SELECT BCSWN_DISTRICTS.DISTRICT_NAME FROM BCSWN_DISTRICTS WHERE BCSWN_USER.R_DISTRICTS=BCSWN_DISTRICTS.DISTRICT_ID) AS R_DIST, (SELECT BCSWN_UPAZILLA.UPAZILLA_NAME FROM BCSWN_UPAZILLA WHERE BCSWN_USER.R_UPAZILLA=BCSWN_UPAZILLA.UPAZILLA_ID) AS R_UP, BCSWN_USER.P_ADDRESS, (SELECT BCSWN_DIVISIONS.DIVISION_NAME FROM BCSWN_DIVISIONS WHERE BCSWN_USER.P_DIVISION=BCSWN_DIVISIONS.DIVISION_ID) AS P_DIV, (SELECT BCSWN_DISTRICTS.DISTRICT_NAME FROM BCSWN_DISTRICTS WHERE BCSWN_USER.P_DISTRICTS=BCSWN_DISTRICTS.DISTRICT_ID) AS P_DIST, (SELECT BCSWN_UPAZILLA.UPAZILLA_NAME FROM BCSWN_UPAZILLA WHERE BCSWN_USER.P_UPAZILLA=BCSWN_UPAZILLA.UPAZILLA_ID) AS P_UP, BCSWN_USER.CHILD_BOY, BCSWN_USER.CHILD_GIRL, (SELECT BCSWN_DEGREE.DEGREE_NAME FROM BCSWN_DEGREE WHERE BCSWN_USER.GRAD_EXAM=BCSWN_DEGREE.DEGREE_ID ) AS GRAD_EXAM, (SELECT BCSWN_SUBJECT.SUBJECT_NAME FROM BCSWN_SUBJECT WHERE BCSWN_USER.GRAD_SUBJECT=BCSWN_SUBJECT.SUBJECT_ID ) AS GRAD_SUB, (SELECT BCSWN_UNI.UNI_NAME FROM BCSWN_UNI WHERE BCSWN_USER.GRAD_UNIVERSITY=BCSWN_UNI.UNI_ID) AS GRAD_UNIVERSITY, BCSWN_USER.GRAD_RESULT, BCSWN_USER.GRAD_PASSING, BCSWN_USER.GRAD_DURATION, (SELECT BCSWN_DEGREE.DEGREE_NAME FROM BCSWN_DEGREE WHERE BCSWN_USER.MST_EXAM=BCSWN_DEGREE.DEGREE_ID ) AS MST_EXAM, (SELECT BCSWN_SUBJECT.SUBJECT_NAME FROM BCSWN_SUBJECT WHERE BCSWN_USER.MST_SUBJECT=BCSWN_SUBJECT.SUBJECT_ID ) AS MST_SUB, (SELECT BCSWN_UNI.UNI_NAME FROM BCSWN_UNI WHERE BCSWN_USER.MST_UNIVERSITY=BCSWN_UNI.UNI_ID) AS MST_UNIVERSITY, BCSWN_USER.MST_RESULT, BCSWN_USER.MST_PASSING, BCSWN_USER.MST_DURATION FROM BCSWN_USER WHERE MOBILE=" . $W_MOBILE;

	print_r($sql);
	$parseresult = ociparse($conn, $sql);
	ociexecute($parseresult);





	while ($row = oci_fetch_assoc($parseresult)) {
		// $W_ID = $row['ID'];
		$W_NAME = $row['NAME'];
		$W_MOBILE = $row['MOBILE'];
		// $W_PASSWORD = $row['PASSWORD'];


		$W_DOB = $row['DOB'];
		$W_BLOOD = $row['BLOOD'];
		$W_MARRIGE = $row['MARRIGE'];
		$W_OFFICE = $row['OFFICE'];
		$W_RESIDENCE = $row['RESIDENCE'];
		$W_OFFICE_C = $row['OFFICE_C'];
		$W_HOME = $row['HOME'];
		$W_MOBILE = $row['MOBILE'];
		$W_EMAIL = $row['EMAIL'];
		$W_EDUCATION = $row['EDUCATION'];
		$W_SKILL = $row['SKILL'];
		$W_INTEREST = $row['INTEREST'];
		$W_DESIGNATION = $row['DESIGNATION'];
		$W_POSTING = $row['POSTING'];
		$W_CADRE = $row['CADRE'];
		$W_BATCH = $row['BATCH'];
		$W_MEMBERSHIP = $row['MEMBERSHIP'];
		$W_HONOR = $row['HONOR'];
		$W_ARTICLE = $row['ARTICLE'];
		$W_CHILD = $row['CHILD'];
		$W_PICTURE = $row['PICTURE'];
		$W_SIGNATURE  = $row['SIGNATURE'];



		$W_SSC_EXAMINATION = $row['SSC_EXAM'];
		$W_SSC_BOARD = $row['SSC_BOARD'];
		$W_SSC_ROLL = $row['SSC_ROLL'];
		$W_SSC_RESULT = $row['SSC_RESULT'];
		$W_SSC_GROUP = $row['SSC_GROUP'];
		$W_SSC_PASSING_YEAR = $row['SSC_PASSING'];
		$W_HSC_EXAMINATION = $row['HSC_EXAM'];
		$W_HSC_BOARD = $row['HSC_BOARD'];
		$W_HSC_ROLL = $row['HSC_ROLL'];
		$W_HSC_RESULT = $row['HSC_RESULT'];
		$W_HSC_GROUP = $row['HSC_GROUP'];
		$W_HSC_PASSING_YEAR = $row['HSC_PASSING'];
		$W_GRADUATION_EXAMINATION = $row['GRAD_EXAM'];
		$W_GRADUATION_SUBJECT = $row['GRAD_SUB'];
		$W_GRADUATION_UNIVERSITY = $row['GRAD_UNIVERSITY'];
		$W_GRADUATION_RESULT = $row['GRAD_RESULT'];
		$W_GRADUATION_PASSING_YEAR = $row['GRAD_PASSING'];
		$W_GRADUATION_COURSE_DURATION = $row['GRAD_DURATION'];
		$W_MASTER_EXAMINATION = $row['MST_EXAM'];
		$W_MASTER_SUBJECT = $row['MST_SUB'];
		$W_MASTER_UNIVERSITY = $row['MST_UNIVERSITY'];
		$W_MASTER_RESULT = $row['MST_RESULT'];
		$W_MASTER_PASSING_YEAR = $row['MST_PASSING'];
		$W_MASTER_COURSE_DURATION = $row['MST_DURATION'];
		$W_O_ADDRESS = $row['O_ADDRESS'];
		$W_O_DIVISION = $row['O_DIV'];



		// echo $W_O_DIVISION;
		$W_O_DISTRICT = $row['O_DIST'];
		$W_O_UPAZILLA = $row['O_UP'];
		$W_R_ADDRESS = $row['R_ADDRESS'];
		$W_R_DIVISON = $row['R_DIV'];
		$W_R_DISTRICT = $row['R_DIST'];
		$W_R_UPAZILLA = $row['R_UP'];
		$W_P_ADDRESS = $row['P_ADDRESS'];
		$W_P_DIVISION = $row['P_DIV'];
		$W_P_DISTRICT = $row['P_DIST'];
		$W_P_UPAZILLA = $row['P_UP'];
		$W_CHILD_BOYS = $row['CHILD_BOY'];
		$W_CHILD_GIRLS = $row['CHILD_GIRL'];

		$W_SSC_GRADE = "";

		$W_HSC_GRADE = "";
		$W_GRADUATION_GRADE = "";
		$W_MASTER_GRADE = "";



		$output[] = $row;
	}

	var_dump($output);
}



oci_free_statement($parseresults);
// oci_close($conn);


if ($W_O_DIVISION != null) {

	$a = "SELECT DIVISION_ID FROM BCSWN_DIVISIONS WHERE DIVISION_NAME='" . $W_O_DIVISION . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$O_DIV_ID = $r["DIVISION_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}

if ($W_O_DISTRICT != null) {

	$a = "SELECT DISTRICT_ID FROM BCSWN_DISTRICTS	WHERE DISTRICT_NAME='" . $W_O_DISTRICT . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$O_DIST_ID = $r["DISTRICT_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}

if ($W_O_UPAZILLA != null) {

	$a = "SELECT UPAZILLA_ID FROM BCSWN_UPAZILLA WHERE UPAZILLA_NAME='" . $W_O_UPAZILLA . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$O_UP_ID = $r["UPAZILLA_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}

if ($W_R_DIVISON != null) {

	$a = "SELECT DIVISION_ID FROM BCSWN_DIVISIONS WHERE DIVISION_NAME='" . $W_R_DIVISON . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$R_DIV_ID = $r["DIVISION_ID"];
	}
	// echo $R_DIV_ID;
	oci_free_statement($b);
}


if ($W_R_DISTRICT != null) {

	$a = "SELECT DISTRICT_ID FROM BCSWN_DISTRICTS	WHERE DISTRICT_NAME='" . $W_R_DISTRICT . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$R_DIST_ID = $r["DISTRICT_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}






if ($W_R_UPAZILLA != null) {

	$a = "SELECT UPAZILLA_ID FROM BCSWN_UPAZILLA WHERE UPAZILLA_NAME='" . $W_R_UPAZILLA . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$R_UP_ID = $r["UPAZILLA_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}

if ($W_P_DIVISION != null) {

	$a = "SELECT DIVISION_ID FROM BCSWN_DIVISIONS WHERE DIVISION_NAME='" . $W_P_DIVISION . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$P_DIV_ID = $r["DIVISION_ID"];
	}
	// echo $R_DIV_ID;
	oci_free_statement($b);
}

if ($W_P_DISTRICT != null) {

	$a = "SELECT DISTRICT_ID FROM BCSWN_DISTRICTS	WHERE DISTRICT_NAME='" . $W_P_DISTRICT . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$P_DIST_ID = $r["DISTRICT_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}



if ($W_P_UPAZILLA != null) {

	$a = "SELECT UPAZILLA_ID FROM BCSWN_UPAZILLA WHERE UPAZILLA_NAME='" . $W_P_UPAZILLA . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$P_UP_ID = $r["UPAZILLA_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}



if ($W_GRADUATION_UNIVERSITY != null) {

	$a = "SELECT UNI_ID FROM BCSWN_UNI WHERE UNI_NAME='" . $W_GRADUATION_UNIVERSITY . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$G_UNI_ID = $r["UNI_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}


if ($W_MASTER_UNIVERSITY != null) {

	$a = "SELECT UNI_ID FROM BCSWN_UNI WHERE UNI_NAME='" . $W_MASTER_UNIVERSITY . "'";

	$b = ociparse($conn, $a);
	oci_execute($b);

	while ($r = oci_fetch_assoc($b)) {
		$M_UNI_ID = $r["UNI_ID"];
	}
	// echo $O_DIV_ID;
	oci_free_statement($b);
}






if (isset($_POST['submit'])) {
	// $W_ID = $_POST['u_id'];
// $W_PASSWORD = $_POST['pass'];
	$W_NAME = $_POST['name'];
	
	$W_DOB = $_POST['dob'];

	$W_BLOOD = $_POST['blood'];
	
	$W_MOBILE = $_POST['mobile'];

	$W_EMAIL = $_POST['email'];
	
	$W_SKILL = $_POST['skill'];

	$W_INTEREST = $_POST['interest'];
	
	$W_DESIGNATION = $_POST['designation'];
	
	$W_POSTING = $_POST['posting'];
	
	$W_CADRE = $_POST['cadre'];
	
	$W_BATCH = $_POST['batch'];
	
	$W_MEMBERSHIP = $_POST['membership'];
	
	$W_HONOR = $_POST['honor'];
	
	$W_ARTICLE = $_POST['article'];
	

	if (isset($_POST['marrige'])) {
		$W_MARRIGE = $_POST['marrige'];
		
	}







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


	$sql = "SELECT * FROM BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";

	// print_r($sql);

	$parseresults = ociparse($conn, $sql);
	// print_r($parseresults);
	ociexecute($parseresults);

	while ($row = oci_fetch_assoc($parseresults)) {
		// $cust_num = $row['CUSTOMER_NUM'];
		$W_PICTURE = $row['PICTURE'];
		
	}






	$allowed = array('jpg', 'jpeg', 'png');
	$fileNameNew = "dp_" . $W_MOBILE . "." . $fileActualExt;
	$fileDestination = 'upload/' . $fileNameNew;
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {




				// echo $W_PICTURE;
				// // $W_PICTURE = $fileDestination;
				if (is_uploaded_file($_FILES['picture']['tmp_name']) == 1) {
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


	$sql = "SELECT * FROM BCSWN_USER WHERE MOBILE='" . $W_MOBILE . "'";

	// print_r($sql);

	$parseresults = ociparse($conn, $sql);
	// print_r($parseresults);
	ociexecute($parseresults);

	while ($row = oci_fetch_assoc($parseresults)) {
		// $cust_num = $row['CUSTOMER_NUM'];
		$W_SIGNATURE = $row['SIGNATURE'];
	}



	$allowed = array('jpg', 'jpeg', 'png');
	$fileNameNew_s = "signature_" . $W_MOBILE . "." . $fileActualExt_s;
	$fileDestination_s = 'upload/' . $fileNameNew_s;
	echo in_array($fileActualExt_s, $allowed);
	if (in_array($fileActualExt_s, $allowed) == 1) {
		if ($fileError_s === 0) {
			if ($fileSize_s < 1000000) {

				if (is_uploaded_file($_FILES['signature']['tmp_name']) == 1) {
					move_uploaded_file($fileTmpName_s, $fileDestination_s);
					$W_SIGNATURE = $fileDestination_s;
					
				}




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












	$W_SSC_EXAMINATION = $_POST['s_examination'];
	
	$W_SSC_BOARD = $_POST['s_board'];
	
	$W_SSC_ROLL = $_POST['s_roll'];
	
	$W_SSC_RESULT = $_POST['s_result'];
	
	$W_SSC_GROUP = $_POST['s_group'];
	
	$W_SSC_PASSING_YEAR = $_POST['s_year'];
	
	$W_HSC_EXAMINATION = $_POST['h_examination'];
	
	$W_HSC_BOARD = $_POST['h_board'];
	
	$W_HSC_ROLL = $_POST['h_roll'];
	
	$W_HSC_RESULT = $_POST['h_result'];
	
	$W_HSC_GROUP = $_POST['h_group'];
	
	$W_HSC_PASSING_YEAR = $_POST['h_year'];
	
	$W_GRADUATION_EXAMINATION = $_POST['g_examination'];
	
	$W_GRADUATION_SUBJECT = $_POST['g_subject'];

	$W_GRADUATION_UNIVERSITY = $_POST['g_university'];
	
	$W_GRADUATION_RESULT = $_POST['g_result'];
	
	$W_GRADUATION_PASSING_YEAR = $_POST['g_year'];
	
	$W_GRADUATION_COURSE_DURATION = $_POST['g_duration'];
	
	$W_MASTER_EXAMINATION = $_POST['m_examination'];
	
	$W_MASTER_SUBJECT = $_POST['m_subject'];
	
	$W_MASTER_UNIVERSITY = $_POST['m_university'];
	
	$W_MASTER_RESULT = $_POST['m_result'];
	
	$W_MASTER_PASSING_YEAR = $_POST['m_year'];
	
	$W_MASTER_COURSE_DURATION = $_POST['m_duration'];
	
	$W_O_ADDRESS = $_POST['o_address'];
	
	$W_O_DIVISION = $_POST['o_division'];
	
	$W_O_DISTRICT = $_POST['o_district'];

	$W_O_UPAZILLA = $_POST['o_upazilla'];
	
	$W_R_ADDRESS = $_POST['r_address'];
	
	$W_R_DIVISON = $_POST['r_division'];
	
	$W_R_DISTRICT = $_POST['r_district'];
	
	$W_R_UPAZILLA = $_POST['r_upazilla'];
	
	$W_P_ADDRESS = $_POST['p_address'];
	
	$W_P_DIVISION = $_POST['p_division'];
	
	$W_P_DISTRICT = $_POST['p_district'];
	
	$W_P_UPAZILLA = $_POST['p_upazilla'];
	
	$W_CHILD_BOYS = $_POST['child_boy'];
	
	$W_CHILD_GIRLS = $_POST['child_girl'];
	















	// $W_OFFICE = $_POST['office'];
	// echo $W_NAME;
	// echo "<br>";
	// $W_RESIDENCE = $_POST['residence'];
	// echo $W_NAME;
	// echo "<br>";
	// $W_PERMANENT = $_POST['permanent'];
	// echo $W_NAME;
	// echo "<br>";
	// $W_OFFICE_C = $_POST['office_c'];
	// echo $W_NAME;
	// echo "<br>";
	// $W_HOME = $_POST['home'];
	// echo $W_NAME;
	// echo "<br>";
	// $W_EDUCATION = $_POST['education'];
	// $W_CHILD = $_POST['child'];








	// other's input field start

	$W_SSC_GRADE = $_POST['s_grade'];
	if ($W_SSC_GRADE != null) {
		$W_SSC_RESULT = $W_SSC_GRADE;
		
	}


	$W_HSC_GRADE = $_POST['h_grade'];
	if ($W_HSC_GRADE != null) {
		$W_HSC_RESULT = $W_HSC_GRADE;
		
	}

	$W_GRADUATION_GRADE = $_POST['g_grade'];
	if ($W_GRADUATION_GRADE != null) {
		$W_GRADUATION_RESULT = $W_GRADUATION_GRADE;
		
	}

	$W_MASTER_GRADE = $_POST['m_grade'];
	if ($W_MASTER_GRADE != null) {
		$W_MASTER_RESULT = $W_MASTER_GRADE;
		
	}


	


	$sql = "UPDATE BCSWN_USER 
	SET  
	NAME='" . $W_NAME . "', 
	DOB=TO_DATE('" . $W_DOB . "', 'YYYY-MM-DD'), 
	BLOOD='" . $W_BLOOD   . "', 
	EMAIL='" . $W_EMAIL . "', 
	SKILL='" . $W_SKILL . "', 
	INTEREST='" . $W_INTEREST . "', 
	DESIGNATION='" . $W_DESIGNATION . "', 
	POSTING='" . $W_POSTING . "', 
	CADRE='" . $W_CADRE . "', 
	BATCH='" . $W_BATCH . "', 
	MEMBERSHIP='" . $W_MEMBERSHIP . "', 
	HONOR='" . $W_HONOR . "', 
	ARTICLE='" . $W_ARTICLE . "', 

	MARRIGE='" . $W_MARRIGE . "', 
	PICTURE='" . $W_PICTURE . "', 
	SIGNATURE='" . $W_SIGNATURE . "', 
	SSC_EXAM='" . $W_SSC_EXAMINATION . "', 
	SSC_BOARD='" . $W_SSC_BOARD . "', 
	SSC_ROLL='" . $W_SSC_ROLL . "', 
	SSC_RESULT='" . $W_SSC_RESULT . "', 
	SSC_GROUP='" . $W_SSC_GROUP . "', 
	SSC_PASSING='" . $W_SSC_PASSING_YEAR . "', 
	HSC_EXAM='" . $W_HSC_EXAMINATION . "', 
	HSC_BOARD='" . $W_HSC_BOARD . "', 
	HSC_ROLL='" . $W_HSC_ROLL . "', 
	HSC_RESULT='" . $W_HSC_RESULT . "', 
	HSC_GROUP='" . $W_HSC_GROUP . "', 
	HSC_PASSING='" . $W_HSC_PASSING_YEAR . "', 
	GRAD_EXAM='" . $W_GRADUATION_EXAMINATION . "', 
	GRAD_SUBJECT='" . $W_GRADUATION_SUBJECT . "', 
	GRAD_UNIVERSITY='" . $G_UNI_ID . "', 
	GRAD_RESULT='" . $W_GRADUATION_RESULT . "', 
	GRAD_PASSING='" . $W_GRADUATION_PASSING_YEAR . "', 
	GRAD_DURATION='" . $W_GRADUATION_COURSE_DURATION . "', 
	MST_EXAM='" . $W_MASTER_EXAMINATION . "', 
	MST_SUBJECT='" . $W_MASTER_SUBJECT . "', 
	MST_UNIVERSITY='" . $M_UNI_ID . "', 
	MST_RESULT='" . $W_MASTER_RESULT . "', 
	MST_PASSING='" . $W_MASTER_PASSING_YEAR . "', 
	MST_DURATION='" . $W_MASTER_COURSE_DURATION . "', 
	O_ADDRESS='" . $W_O_ADDRESS . "', 
	O_DIVISION='" . $W_O_DIVISION . "', 
	O_DISTRICTS='" . $W_O_DISTRICT . "', 
	O_UPAZILLA='" . $W_O_UPAZILLA . "', 
	R_ADDRESS='" . $W_R_ADDRESS . "', 
	R_DIVISION='" . $W_R_DIVISON . "', 
	R_DISTRICTS='" . $W_R_DISTRICT . "', 
	R_UPAZILLA='" . $W_R_UPAZILLA . "', 
	P_ADDRESS='" . $W_P_ADDRESS . "', 
	P_DIVISION='" . $W_P_DIVISION . "', 
	P_DISTRICTS='" . $W_P_DISTRICT . "', 
	P_UPAZILLA='" . $W_P_UPAZILLA . "', 
	CHILD_BOY='" . $W_CHILD_BOYS . "', 
	CHILD_GIRL='" . $W_CHILD_GIRLS . "'  
	WHERE MOBILE='" . $W_MOBILE . "'";

	// $sql = "UPDATE BCSWN_USER 
	// SET ID='" . $W_ID . "', NAME='" . $W_NAME . "', 
	// DOB=TO_DATE('" . $W_DOB . "', 'YYYY-MM-DD'), 
	// BLOOD='" . $W_BLOOD   . "', 
	// OFFICE='" . $W_OFFICE . "', 
	// RESIDENCE='" . $W_RESIDENCE . "', 
	// PERMANENT='" . $W_PERMANENT . "', 
	// OFFICE_C='" . $W_OFFICE_C . "', 
	// HOME='" . $W_HOME . "', 
	// EMAIL='" . $W_EMAIL . "', 
	// EDUCATION='" . $W_EDUCATION . "', 
	// SKILL='" . $W_SKILL . "', 
	// INTEREST='" . $W_INTEREST . "', 
	// DESIGNATION='" . $W_DESIGNATION . "', 
	// POSTING='" . $W_POSTING . "', 
	// CADRE='" . $W_CADRE . "', 
	// BATCH='" . $W_BATCH . "', 
	// MEMBERSHIP='" . $W_MEMBERSHIP . "', 
	// HONOR='" . $W_HONOR . "', 
	// ARTICLE='" . $W_ARTICLE . "', 
	// CHILD='" . $W_CHILD . "', 
	// MARRIGE='" . $W_MARRIGE . "', 
	// PICTURE='" . $W_PICTURE . "', 
	// SIGNATURE='" . $W_SIGNATURE . "', 
	// PASSWORD='" . $W_PASSWORD . "' 
	// WHERE MOBILE='" . $W_MOBILE . "'";

	print_r($sql);
	$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);

	oci_free_statement($parseresults);
	oci_close($conn);

	// header("Location: u_detail.php?u=" . $W_MOBILE);
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet" />
	<title>বিসিএস উইমেন নেটওয়ার্ক</title>
	<link rel="icon" href="./image/logo.png" type="image/ico">

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
	<!--fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

	<!-- font awesome link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />

</head>

<style>
	body {
		position: relative;
		overflow-x: hidden;
		background: #f7f7fc;
		font-family: "Roboto", sans-serif;
	}

	a:hover {
		color: white;
		text-decoration: none;
	}

	body,
	html {
		height: 100%;
		scroll-behavior: smooth;
	}

	/*---------------------------------
sidebar
----------------------*/

	#sidebar-wrapper {
		z-index: 1000;
		height: 100%;
		width: 0px;
		left: -50px;
		overflow-y: auto;
		overflow-x: hidden;
		background: #222e3c;
		transition: all 0.5s ease;
	}

	#sidebar-wrapper::-webkit-scrollbar {
		width: 8px;
		background: #222e3c;
	}

	#sidebar-wrapper::-webkit-scrollbar-thumb {
		background-color: #989898;
		border-radius: 10px;
	}

	.sidebar-brand {
		font-weight: 600;
		font-size: 1.15rem;
		padding: 1.15rem 1.5rem;
		display: block;
		color: #f8f9fa;
	}

	.sidebar-header {
		text-transform: capitalize;
		padding: 1.5rem 1.5rem 0.375rem !important;
		font-size: 14px;
		color: #ced4da;
	}

	.navbar-nav>li>a,
	.submenu-box ul li a {
		color: gray !important;
		text-transform: capitalize;
		font-size: 14px;
		padding: 10px 10px 10px 20px !important;
		display: block;
		font-weight: 400;
		position: relative;
		z-index: 2;
		font-family: "Roboto", sans-serif;
		letter-spacing: 0.2px;
	}

	.submenu-box ul li a {
		padding: 4px 10px 4px 20px !important;
		color: #c1c1c1 !important;
	}

	.navbar-nav>li>a.active {
		color: #e9ecef !important;
		background: linear-gradient(90deg,
				rgba(59, 125, 221, 0.1),
				rgba(59, 125, 221, 0.0875) 50%,
				transparent);
		border-left: 4px solid #3b7ddd;
	}

	.navbar-nav .has-sub>a.collapsed::after {
		transition: 0.4s ease;
	}

	.navbar-nav .has-sub>a.collapsed::after {
		color: #6aa364;
		font-size: 10px;
		content: "\f078";
	}

	.navbar-nav .has-sub>a.collapsed::after {
		color: #6aa364;
	}

	.navbar-nav .has-sub>a::after {
		position: absolute;
		right: 0px;
		top: 50%;
		height: 30px;
		width: 30px;
		text-align: center;
		color: #6aa364;
		display: block;
		content: "\f077";
		font-family: "Font Awesome\ 5 Free";
		font-weight: 900;
		font-size: 13px;
		line-height: 30px;
		margin-top: -15px;
	}

	#wrapper.toggled {
		padding-left: 270px;
	}

	.toggled#sidebar-wrapper {
		width: 270px !important;
		height: 100%;
		left: 0px;
		overflow-y: auto;
		overflow-x: hidden;
		transition: all 0.5s ease;
	}

	.navbar-nav li {
		display: block !important;
		margin: 2px 0px;
	}

	.nav-item .nav-link {
		display: block;
		color: white !important;
		text-transform: capitalize;
		text-decoration: none;
		padding: 6px 10px;
		transition: 0.4s ease;
	}

	.navbar-nav>li>a i:before {
		margin: 0px 5px 0px 0px;
		font-size: 14px;
	}

	/*---------------------------------
sidebar
----------------------*/

	/*---------------------------------
  main-content
----------------------*/

	#page-content-wrapper {
		width: 100%;
		transition: all 0.5s ease;
	}

	#wrapper.toggled #page-content-wrapper {
		position: absolute;
		margin-right: -270px;

		transition: all 0.5s ease;
	}

	.toggled#page-content-wrapper {
		margin-left: 270px;
		transition: all 0.5s ease;
	}






	/* scroll icon starts */
	#myBtn {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 40px;
		z-index: 99;
		border: none;
		border-radius: 10px;
		color: #fff;
		background: #333;
		padding: 10px;
	}

	#myBtn:hover {
		background: #606060;
	}

	/* scroll icon ends */

	@media only screen and (min-width: 992px) {
		.toggled#page-content-wrapper {
			width: calc(100% - 270px);
		}
	}

	/*---------------------------------
  main-content
----------------------*/

	/*---------------------------------
cross-bar animation
----------------------*/

	.nav-icon1 {
		z-index: 999;
		position: relative;
		display: block;
		width: 23px;
		margin: 0px 30px 0px 25px;
		cursor: pointer;
		height: 25px;
	}

	.nav-icon1 span {
		position: absolute;
		top: 0;
		width: 100%;
		height: 3px;
		cursor: pointer;
		background-color: #5d5d5d;
		left: 0;
		transform: rotate(0deg);
		transition: 0.3s ease-in-out;
	}

	.nav-icon1:hover span:nth-of-type(1) {
		top: -3px;
	}

	.nav-icon1:hover span:nth-of-type(3) {
		top: 19px;
	}

	.nav-icon1 span:nth-of-type(1) {
		top: 0;
	}

	.nav-icon1 span:nth-of-type(2) {
		top: 8px;
	}

	.nav-icon1 span:nth-of-type(3) {
		top: 16px;
	}

	.nav-icon1.open span:nth-of-type(1) {
		top: 8px;
		transform: rotate(135deg);
	}

	.nav-icon1.open span:nth-of-type(2) {
		top: 8px;
		opacity: 0;
		left: -30px;
	}

	.nav-icon1.open span:nth-of-type(3) {
		top: 8px;
		transform: rotate(-135deg);
	}

	/*---------------------------------
cross-bar animation
----------------------*/

	/*---------------------------------
header navbar design
----------------------*/
	.my-navbar {
		height: 40%;
		padding: 0px;
		background-color: white;
		box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.16);
	}

	.text-gray-600 {
		color: #858796 !important;
	}

	.nav-link .img-profile {
		height: 40px;
		width: 40px;
	}

	.navbar-nav>li>a>i {
		font-size: 18px;
		color: #b3b3b3;
		margin: 8px 0px 0px 0px;
		padding: 0px;
	}

	.badge-counter {
		position: absolute;
		transform: scale(0.7);
		transform-origin: top right;
		right: 6px;
		margin-top: 4px;
	}

	.dropdown,
	.dropleft,
	.dropright,
	.dropup {
		position: relative;
	}

	.nav-flag,
	.nav-icon {
		padding: 0.1rem 0.8rem;
		display: block;
		font-size: 1.5rem;
		color: #6c757d;
		transition: background 0.1s ease-in-out, color 0.1s ease-in-out;
		line-height: 1.4;
	}

	.navbar-expand .navbar-nav .dropdown-menu {
		position: absolute;
	}

	.navbar-nav .dropdown-menu {
		box-shadow: 0 0.1rem 0.2rem rgba(0, 0, 0, 0.05);
	}

	.navbar-nav .dropdown-menu {
		position: static;
		float: none;
	}

	.dropdown-menu-lg {
		min-width: 20rem;
	}

	.position-relative {
		position: relative !important;
	}

	.nav-item .indicator {
		background: #3b7ddd;
		box-shadow: 0 0.1rem 0.2rem rgba(0, 0, 0, 0.05);
		border-radius: 50%;
		display: block;
		height: 18px;
		width: 18px;
		padding: 1px;
		position: absolute;
		top: 0;
		right: -8px;
		text-align: center;
		transition: top 0.1s ease-out;
		font-size: 0.675rem;
		color: #fff;
	}

	/*---------------------------------
 header navbar design
----------------------*/

	/*---------------------------------
main-top card
----------------------*/

	.card {
		margin-bottom: 24px;
		border: none;
		box-shadow: 0 0 0.875rem 0 rgba(33, 37, 41, 0.05);
	}

	.card-body {
		flex: 1 1 auto;
		min-height: 1px;
		padding: 1.25rem;
	}

	.card-title {
		font-size: 0.875rem;
		color: #495057;
	}

	.card-body h1 {
		font-size: 1.75rem;
		font-weight: 400;
		line-height: 1.2;
		color: #000;
	}

	.text-gray-800 {
		color: #5a5c69 !important;
		font-size: 1.75rem;
		font-weight: 400;
		line-height: 1.2;
	}

	.shadow-sm {
		box-shadow: 0 0.125rem 0.25rem 0 rgba(58, 59, 69, 0.2) !important;
	}

	.btn-sm {
		padding: 0.25rem 0.5rem;
		font-size: 0.875rem;
		line-height: 1.5;
		border-radius: 0.2rem;
	}

	.font-16 {
		font-size: 16px;
	}

	/*---------------------------------
main-top card
----------------------*/

	/*---------------------------------
main-table
----------------------*/

	.m-r-10 {
		margin-right: 10px;
	}

	.btn-circle {
		border-radius: 100%;
		width: 40px;
		height: 40px;
		padding: 10px;
	}

	.btn-info {
		color: #fff;
		background-color: #2962ff;
		border-color: #2962ff;
	}

	.btn-orange {
		color: #212529;
		background-color: #fb8c00;
		border-color: #fb8c00;
	}

	.btn-success {
		color: #fff;
		background-color: #36bea6;
		border-color: #36bea6;
	}

	.btn-purple {
		color: #fff;
		background-color: #7460ee;
		border-color: #7460ee;
	}

	.card .card-title {
		position: relative;
		font-weight: 600;
		margin-bottom: 10px;
	}

	.card .card-subtitle {
		font-weight: 300;
		margin-bottom: 10px;
		color: #a1aab2;
		margin-top: -0.375rem;
	}

	.table td,
	.table th {
		padding: 1rem;
		font-size: 14px;
		color: #333;
		vertical-align: top;
		border-top: 1px solid #dee2e6;
	}

	.table h5 {
		font-size: 16px;
		font-weight: 600;
		color: #585858;
	}

	/*---------------------------------
main-table
----------------------*/

	/*---------------------------------
 footer
----------------------*/

	footer.footer {
		padding: 1rem 0.875rem;
		direction: ltr;
		background: #fff;
	}

	footer.footer ul {
		margin: 0px;
		list-style: none;
	}

	.footer ul li {
		display: inline-block;
		margin: 0px 7px;
	}

	.text-muted {
		color: #6c757d !important;
		font-size: 14px;
	}

	/*---------------------------------
footer
----------------------*/


	.h:hover {
		background-color: teal;
		border-radius: 100px;
	}
</style>

<body>
	<div id="wrapper">
		<div class="overlay"></div>

		<!-- Sidebar -->

		<?php

		include "sidebar_user.php";

		?>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div id="content">
				<div class="container-fluid p-0 px-lg-0 px-md-0">
					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-dark my-navbar">
						<!-- Sidebar Toggle (Topbar) -->
						<div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
							<span></span>
							<span></span>
							<span></span>
						</div>

						<!-- Topbar Search -->


						<!-- Topbar Navbar -->
						<img src="./image/logo.png" class="mr-4 " alt="BD Logo" height="60px" width="60px">
						<h1 class="text-white text-center d-inline" style="padding: 20px; margin-top:5px;"><b style="text-shadow: 3px 3px 5px rgba(150, 150, 150, 1); font-size:3.5vw">বিসিএস
								উইমেন নেটওয়ার্ক</b></h1>
						<ul class="navbar-nav ml-auto">
							<!-- Nav Item - Search Dropdown (Visible Only XS) -->

							<!-- Nav Item - Alerts -->

							<!-- Nav Item - Messages -->

							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown">

							</li>
						</ul>
					</nav>
					<!-- End of Topbar -->

					<!-- Begin Page Content -->



					<div class="row col-12 m-0">
						<!-- form stars 		 -->
						<form action="" method="POST" enctype="multipart/form-data" class="col-12">

							<!-- section 1 starts  -->

							<div class="row container m-2">
								<div class="col-12">
									<div class="card " style="width: 95%">
										<div class="card-header " style="background-color: #C0C0C0!important;">

											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_1_label" style="font-size:2vw;">Section 1 : Login Information
												</p>
											</div>

										</div>

										<div class="card-body" id="section_1_content">

											<div class="row">
												<!-- name starts  -->
												<div class="form-group col-6 pl-0">
													<label class="form-label" for="name">Name <label style="color:red; font-weight:bold">*</label> :</label>
													<input type="text" name="u_id" id="u_id" value="<?php echo $W_ID; ?>" hidden>
													<input type="text" name="pass" id="pass" value="<?php echo $W_PASSWORD; ?>" hidden>
													<input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" value="<?php echo  $W_NAME; ?>" required>

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

											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_2_label" style="font-size:2vw;">Section 2 : Personal Information
												</p>
											</div>

										</div>

										<div class="card-body" id="section_2_content">



											<div class="row">

												<!-- Birthday starts  -->
												<div class="form-group col-lg-4 col-md-4 col-sm-12">
													<label class="form-label" for="dob">Date of Birth :</label>
													<input type="date" name="dob" id="dob" class="form-control" value="<?php if ($W_DOB) {
																																																echo date('Y-m-d', strtotime($W_DOB));
																																															} ?>">

												</div>
												<!-- Birthday ends  -->

												<!-- Blood starts  -->
												<div class="form-group col-lg-4 col-md-4 col-sm-12 pl-0">
													<label class="form-label" for="dob">Blood Group :</label>
													<input type="text" class="form-control" placeholder="Enter Blood Group" name="blood" id="blood" value="<?php echo  $W_BLOOD; ?>">
												</div>
												<!-- Blood ends  -->

												<!-- Marital starts  -->
												<div class="form-group col-lg-4 col-md-4 col-sm-12 pl-0">
													<label class="form-label d-block">Marital Status :</label>
													<label class="radio-inline">
														<input type="radio" name="marrige" value="married" <?php echo ($W_MARRIGE == 'married') ?  "checked" : "";  ?>>Married
													</label>
													<label class="radio-inline">
														<input type="radio" name="marrige" value="divorced" <?php echo ($W_MARRIGE == 'divorced') ?  "checked" : "";  ?>>Divorced
													</label>
													<label class="radio-inline">
														<input type="radio" name="marrige" value="widow" <?php echo ($W_MARRIGE == 'widow') ?  "checked" : "";  ?>>Widow
													</label>
													<label class="radio-inline">
														<input type="radio" name="marrige" value="single" <?php echo ($W_MARRIGE == 'single') ?  "checked" : "";  ?>>Single
													</label>

												</div>
												<!-- Blood ends  -->
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

											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_3_label" style="font-size:2vw;">Section 3 : My Picture Upload</p>
											</div>

										</div>
										<div class="card-body" id="section_3_content">
											<!-- picture starts -->
											<div class="row">
												<div class="form-group col-lg-6 col-md-6 col-sm-12">
													<label class="form-label" for="picture">My Picture :</label>
													<input type="file" class="form-control" name="picture" id="picture">
												</div>
												<div class="form-group col-lg-6 col-md-6 col-sm-12 ">

													<?php
													if ($W_PICTURE != '') {
														echo "<img src=' $W_PICTURE ' height='120px' width='120px'
																						style='float: right;'>";
													}

													?>

												</div>
											</div>

											<!-- picture ends  -->
										</div>

									</div>
								</div>
							</div>
							<!-- section 3 ends  -->

							<!-- section 4 starts  -->

							<div class="row container m-2" style="margin: 2px auto!important">
								<div class="col-12">
									<div class="card " style="width: 95%">
										<div class="card-header " style="background-color: #C0C0C0!important;">
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_4_label" style="font-size:2vw;">Section 4 : Address Information
												</p>
											</div>


										</div>
										<div class="card-body" id="section_4_content">
											<div class="row">
												<div class="col-12">
													<h5>Address </h5>
													<hr>
													<!-- office starts  -->
													<div class="form-group row">
														<label for="office" class="col-sm-2 col-form-label">Office
															:</label>
														<div class="col-sm-6">
															<input type="text" class="form-control" name="o_address" id="office" placeholder="Office Address" value="<?php echo  $W_O_ADDRESS; ?>">

														</div>
													</div>
													<!-- office ends  -->


													<!-- division starts  -->
													<div class="form-group row ">
														<label for="o_division" class="col-sm-2 col-form-label">Division
															:</label>
														<div class="col-sm-6">

															<select class="form-control" name="o_division" id="o_division">


																<?php

																if ($W_O_DIVISION != null) {
																?>
																	<option value="<?php echo $O_DIV_ID ?>" selected><?php echo $W_O_DIVISION ?></option>
																<?php
																}

																?>
																<option value="">Select Division</option>
																<?php
																for ($i = 0; $i < count($division); $i++) {

																	echo "<option value='" . $division[$i]["DIVISION_ID"] . "'>" . $division[$i]["DIVISION_NAME"] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
													<!-- division ends  -->


													<!-- district starts  -->
													<div class="form-group row">
														<label for="o_district" class="col-sm-2 col-form-label">District
															:</label>
														<div class="col-sm-6">

															<select class="form-control" name="o_district" id="o_district">
																<?php

																if ($W_O_DISTRICT != null) {
																?>
																	<option value="<?php echo $O_DIST_ID; ?>" selected><?php echo $W_O_DISTRICT ?></option>
																<?php
																}

																?>

																<option value="">Select District</option>

															</select>
														</div>
													</div>
													<!-- district ends  -->


													<!-- Upazilla starts  -->
													<div class="form-group row">
														<label for="o_upazilla" class="col-sm-2 col-form-label">Upazilla
															:</label>
														<div class="col-sm-6">

															<select class="form-control" name="o_upazilla" id="o_upazilla">
																<?php

																if ($W_O_UPAZILLA != null) {
																?>
																	<option value="<?php echo $O_UP_ID ?>" selected><?php echo $W_O_UPAZILLA ?></option>
																<?php
																}

																?>
																<option value="">Select Upazilla</option>

															</select>
														</div>
													</div>
													<!-- Upazilla ends  -->


													<!-- test starts  -->
													<div class="form-group row">
														<div class="col-6 col-sm-12">


														</div>
														<div class="col-6 col-sm-12">


														</div>

													</div>
													<!-- test ends  -->

													<!-- residence starts  -->
													<div class="form-group row ">


														<div class="col-6">
															<div class="row">
																<label for="residence" class="col-sm-4 col-form-label">Residence
																	:</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" name="r_address" id="residence" placeholder="Residence Address" value="<?php echo  $W_R_ADDRESS; ?>">
																</div>
															</div>
															<!-- division starts  -->
															<div class="row mt-2">
																<label for="r_division" class="col-sm-4 col-form-label">Division
																	:</label>
																<div class="col-sm-8">
																	<select class="form-control" name="r_division" id="r_division">
																		<?php

																		if ($W_R_DIVISON != null) {
																		?>
																			<option value="<?php echo $R_DIV_ID ?>" selected><?php echo $W_R_DIVISON ?></option>
																		<?php
																		}

																		?>

																		<option value="">Select Division</option>
																		<?php
																		for ($i = 0; $i < count($division); $i++) {

																			echo "<option value='" . $division[$i]["DIVISION_ID"] . "'>" . $division[$i]["DIVISION_NAME"] . "</option>";
																		}

																		?>
																	</select>
																</div>
															</div>
															<!-- division ends  -->
															<!-- district starts  -->
															<div class="row mt-2">
																<label for="o_district" class="col-sm-4 col-form-label">District
																	:</label>
																<div class="col-sm-8">
																	<select class="form-control" name="r_district" id="r_district">
																		<?php

																		if ($W_R_DISTRICT != null) {
																		?>
																			<option value="<?php echo $R_DIST_ID ?>" selected><?php echo $W_R_DISTRICT ?></option>
																		<?php
																		}

																		?>
																		<option value="">Select District</option>

																	</select>
																</div>
															</div>
															<!-- district ends  -->

															<!-- Upazilla starts  -->
															<div class="row mt-2">
																<label for="o_upazilla" class="col-sm-4 col-form-label">Upazilla
																	:</label>
																<div class="col-sm-8">
																	<select class="form-control" name="r_upazilla" id="r_upazilla">
																		<?php

																		if ($W_R_UPAZILLA != null) {
																		?>
																			<option value="<?php echo $R_UP_ID ?>" selected><?php echo $W_R_UPAZILLA ?></option>
																		<?php
																		}

																		?>

																		<option value="">Select Upazilla</option>

																	</select>
																</div>
															</div>



														</div>



														<!-- parmanent address starts  -->
														<div class="col-6">
															<div class="row">
																<label for="parmanent" class="col-sm-4 col-form-label">Permanent
																	:</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" name="p_address" id="parmanent" placeholder="Parmanent Address" value="<?php echo  $W_P_ADDRESS; ?>">
																</div>
															</div>
															<!-- division starts  -->
															<div class="row mt-2">
																<label for="p_division" class="col-sm-4 col-form-label">Division
																	:</label>
																<div class="col-sm-8">
																	<select class="form-control" name="p_division" id="p_division">
																		<?php

																		if ($W_P_DIVISION != null) {
																		?>
																			<option value="<?php echo $P_DIV_ID ?>" selected><?php echo $W_P_DIVISION ?></option>
																		<?php
																		}

																		?>
																		<option value="">Select Division</option>

																		<?php
																		for ($i = 0; $i < count($division); $i++) {

																			echo "<option value='" . $division[$i]["DIVISION_ID"] . "'>" . $division[$i]["DIVISION_NAME"] . "</option>";
																		}

																		?>
																	</select>
																</div>
															</div>
															<!-- division ends  -->
															<!-- district starts  -->
															<div class="row mt-2">
																<label for="p_district" class="col-sm-4 col-form-label">District
																	:</label>
																<div class="col-sm-8">
																	<select class="form-control" name="p_district" id="p_district">

																		<?php

																		if ($W_P_DISTRICT != null) {
																		?>
																			<option value="<?php echo $P_DIST_ID ?>" selected><?php echo $W_P_DISTRICT ?></option>
																		<?php
																		}

																		?>

																		<option value="">Select District</option>

																	</select>
																</div>
															</div>
															<!-- district ends  -->

															<!-- Upazilla starts  -->
															<div class="row mt-2">
																<label for="p_upazilla" class="col-sm-4 col-form-label">Upazilla
																	:</label>
																<div class="col-sm-8">
																	<select class="form-control" name="p_upazilla" id="p_upazilla">

																		<?php

																		if ($W_P_UPAZILLA != null) {
																		?>
																			<option value="<?php echo $P_UP_ID ?>" selected><?php echo $W_P_UPAZILLA ?></option>
																		<?php
																		}

																		?>

																		<option value="">Select Upazilla</option>

																	</select>
																</div>
															</div>



														</div>


														<!-- parmanent address ends  -->






													</div>


												</div>
												<!-- parmanent ends  -->



												<div class="col-12">
													<h5>Contact Details </h5>
													<hr>

													<!-- office starts  -->
													<!-- <div class="form-group row">
                                                        <label for="office_c" class="col-sm-2 col-form-label">Office
                                                            :</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="office_c"
                                                                id="office_c" placeholder="Office Address"
                                                                value="<?php echo  $W_OFFICE_C; ?>">
                                                        </div>
                                                    </div> -->
													<!-- office ends  -->

													<!-- home starts  -->
													<!-- <div class="form-group row">
                                                        <label for="home" class="col-sm-2 col-form-label">Home :</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="home"
                                                                id="home" placeholder="Home Address"
                                                                value="<?php echo  $W_HOME; ?>">
                                                        </div>
                                                    </div> -->
													<!-- home ends  -->



													<!-- email starts  -->
													<div class="form-group row">
														<label for="email" class="col-sm-2 col-form-label">Email
															:</label>
														<div class="col-sm-6">
															<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo  $W_EMAIL; ?>">
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

							<div class="row container m-2" style="margin: 2px auto!important">
								<div class="col-12">
									<div class="card " style="width: 95%">
										<div class="card-header " style="background-color: #C0C0C0!important;">
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_5_label" style="font-size:2vw;">Section 5 : Educational
													Qualification & Skills</p>
											</div>

										</div>
										<div class="card-body" id="section_5_content">
											<!-- education starts -->
											<div class="form-group">



												<!-- S.S.C or Equivalent starts  -->

												<div class="container-fluid">
													<div class="row">
														<div class="col-md-6 col-lg-6 col-sm-12 card">
															<label class="form-label" for="education">S.S.C or
																Equivalent
																:</label>
															<label>Examination :</label>
															<div class="form-group ">

																<select id="inputState" name="s_examination" class="form-control">

																<?php 
																		if($W_SSC_EXAMINATION != null){
																			?>

																		<option  value="<?php echo $W_SSC_EXAMINATION?>" selected><?php echo $W_SSC_EXAMINATION?></option>
																	<?php
																		}
																	?>
																	<option  value="">Select One
																	</option>
																	<option value="S.S.C">S.S.C</option>
																	<option value="Dakhil">Dakhil</option>
																	<option value="S.S.C Vocational">S.S.C Vocational
																	</option>
																	<option value="O Level/Cambridge">O Level/Cambridge
																	</option>
																	<option value="S.S.C Equivalent">S.S.C Equivalent
																	</option>
																</select>
															</div>


															<label>Board : </label>
															<div class="form-group ">

																<select id="inputState" name="s_board" class="form-control">
																<?php 
																		if($W_SSC_BOARD != null){
																			?>

																		<option  value="<?php echo $W_SSC_BOARD?>" selected><?php echo $W_SSC_BOARD?></option>
																	<?php
																		}
																	?>
																	<option value="">Select One
																	</option>
																	<option value="Dhaka">Dhaka</option>
																	<option value="Comilla">Comilla</option>
																	<option value="Rajshahi">Rajshahi</option>
																	<option value="Jessore">Jessore</option>
																	<option value="Chittagong">Chittagong</option>
																	<option value="Barisal">Barisal</option>
																	<option value="Sylhet">Sylhet</option>
																	<option value="Dinajpur">Dinajpur</option>
																	<option value="Madrasah">Madrasah</option>
																	<option value="Technical">Technical</option>
																	<option value="Cambridge International - IGCE">
																		Cambridge International - IGCE
																	</option>
																	<option value="Edexcel International">Edexcel
																		International</option>
																	<option value="Others">Others</option>
																</select>
															</div>


															<div class="form-group ">

																<label>Roll : </label>
																<input type="text" class="form-control" placeholder="Roll" name="s_roll" id="roll" value="<?php echo  $W_SSC_ROLL; ?>">
															</div>

															<label>Result : </label>
															<div class="form-group ">

																<select id="s_result" name="s_result" class="form-control">

																<?php 
																		if($W_SSC_RESULT != null){
																			?>

																		<option  value="<?php echo $W_SSC_RESULT?>" selected><?php echo $W_SSC_RESULT?></option>
																	<?php
																		}
																	?>
																	<option value="" >Select
																	</option>
																	<option value="1st Division">1st Division</option>
																	<option value="2nd Division">2nd Division</option>
																	<option value="3rd Division">3rd Division</option>
																	<option value="4">GPA/CGPA in scale 4</option>
																	<option value="5">GPA/CGPA in scale 5</option>
																</select>
																<input type="text" class="form-control mt-2 col-3" id="s_grade" name="s_grade">
															</div>

															<label>Group : </label>
															<div class="form-group ">

																<select id="inputState" name="s_group" class="form-control">
																	
																<?php 
																		if($W_SSC_GROUP!= null){
																			?>

																		<option  value="<?php echo $W_SSC_GROUP?>" selected><?php echo $W_SSC_GROUP?></option>
																	<?php
																		}
																	?>
																	<option value="">Select One
																	</option>
																	<option value="Science">Science</option>
																	<option value="Humanities">Humanities</option>
																	<option value="Commerce">Commerce</option>
																	<option value="Others">Others</option>
																</select>
															</div>

															<label>Passing Year : </label>
															<div class="form-group ">

																<select id="inputState" name="s_year" class="form-control">
																<?php 
																		if($W_SSC_PASSING_YEAR != null){
																			?>

																		<option  value="<?php echo $W_SSC_PASSING_YEAR?>" selected><?php echo $W_SSC_PASSING_YEAR?></option>
																	<?php
																		}
																	?>
																	<option  value="">Select One
																	</option>
																	<option value="2001">2001</option>
																	<option value="2002">2002</option>
																	<option value="2003">2003</option>
																	<option value="2004">2004</option>
																	<option value="2005">2005</option>
																	<option value="2006">2006</option>
																	<option value="2007">2007</option>
																	<option value="2008">2008</option>
																	<option value="2009">2009</option>
																	<option value="2010">2010</option>
																	<option value="2011">2011</option>
																	<option value="2012">2012</option>
																	<option value="2013">2013</option>
																	<option value="2014">2014</option>
																	<option value="2015">2015</option>
																	<option value="2016">2016</option>
																	<option value="2017">2017</option>
																	<option value="2018">2018</option>
																	<option value="2019">2019</option>
																	<option value="2020">2020</option>
																	<option value="2021">2021</option>
																</select>
															</div>














														</div>



														<!-- S.S.C or Equivalent ends  -->




														<!-- H.S.C or Equivalent starts  -->

														<div class="col-md-6 col-lg-6 col-sm-12 card">
															<label class="form-label" style="font-weight: bold;" for="education">H.S.C or Equivalent
																:</label>
															<label>Examination :</label>
															<div class="form-group ">

																<select id="inputState" name="h_examination" class="form-control">
																<?php 
																		if($W_HSC_EXAMINATION!= null){
																			?>

																		<option  value="<?php echo $W_HSC_EXAMINATION?>" selected><?php echo $W_HSC_EXAMINATION?></option>
																	<?php
																		}
																	?>
																	<option value="">Select One
																	</option>
																	<option value="H.S.C">H.S.C</option>
																	<option value="Alim">Alim</option>
																	<option value="Business Management">Business
																		Management</option>
																	<option value="Diploma">Diploma</option>
																	<option value="A Level/Sr. Cambridge">A Level/Sr.
																		Cambridge</option>
																	<option value="H.S.C Equivalent">H.S.C Equivalent
																	</option>
																</select>
															</div>


															<label>Board : </label>
															<div class="form-group ">

																<select id="inputState" name="h_board" class="form-control">

																<?php 
																		if($W_HSC_BOARD!= null){
																			?>

																		<option  value="<?php echo $W_HSC_BOARD?>" selected><?php echo $W_HSC_BOARD?></option>
																	<?php
																		}
																	?>
																	<option  value="">Select One
																	</option>
																	<option value="Dhaka">Dhaka</option>
																	<option value="Comilla">Comilla</option>
																	<option value="Rajshahi">Rajshahi</option>
																	<option value="Jessore">Jessore</option>
																	<option value="Chittagong">Chittagong</option>
																	<option value="Barisal">Barisal</option>
																	<option value="Sylhet">Sylhet</option>
																	<option value="Dinajpur">Dinajpur</option>
																	<option value="Madrasah">Madrasah</option>
																	<option value="Technical">Technical</option>
																	<option value="Cambridge International - IGCE">
																		Cambridge International - IGCE
																	</option>
																	<option value="Edexcel International">Edexcel
																		International</option>
																	<option value="Others">Others</option>
																</select>
															</div>


															<div class="form-group ">

																<label>Roll : </label>
																<input type="text" class="form-control" placeholder="Batch" name="h_roll" id="batch" value="<?php echo  $W_BATCH; ?>">
															</div>

															<label>Result : </label>
															<div class="form-group ">

																<select id="h_result" name="h_result" class="form-control">
																<?php 
																		if($W_HSC_RESULT!= null){
																			?>

																		<option  value="<?php echo $W_HSC_RESULT?>" selected><?php echo $W_HSC_RESULT?></option>
																	<?php
																		}
																	?>
																	<option value="">Select
																	</option>
																	<option value="1st Division">1st Division</option>
																	<option value="2nd Division">2nd Division</option>
																	<option value="3rd Division">3rd Division</option>
																	<option value="4">GPA/CGPA in scale 4</option>
																	<option value="5">GPA/CGPA in scale 5</option>
																</select>
																<input type="text" class="form-control mt-2 col-3" id="h_grade" name="h_grade">

															</div>

															<label>Group : </label>
															<div class="form-group ">

																<select id="inputState" name="h_group" class="form-control">
																<?php 
																		if($W_HSC_GROUP!= null){
																			?>

																		<option  value="<?php echo $W_HSC_GROUP?>" selected><?php echo $W_HSC_GROUP?></option>
																	<?php
																		}
																	?>
																	<option value="">Select One
																	</option>
																	<option value="Science">Science</option>
																	<option value="Humanities">Humanities</option>
																	<option value="Commerce">Commerce</option>
																	<option value="Others">Others</option>
																</select>
															</div>

															<label>Passing Year : </label>
															<div class="form-group ">

																<select id="inputState" class="form-control" name="h_year">
																<?php 
																		if($W_HSC_PASSING_YEAR!= null){
																			?>

																		<option  value="<?php echo $W_HSC_PASSING_YEAR?>" selected><?php echo $W_HSC_PASSING_YEAR?></option>
																	<?php
																		}
																	?>
																	<option  value="">Select One
																	</option>
																	<option value="2001">2001</option>
																	<option value="2002">2002</option>
																	<option value="2003">2003</option>
																	<option value="2004">2004</option>
																	<option value="2005">2005</option>
																	<option value="2006">2006</option>
																	<option value="2007">2007</option>
																	<option value="2008">2008</option>
																	<option value="2009">2009</option>
																	<option value="2010">2010</option>
																	<option value="2011">2011</option>
																	<option value="2012">2012</option>
																	<option value="2013">2013</option>
																	<option value="2014">2014</option>
																	<option value="2015">2015</option>
																	<option value="2016">2016</option>
																	<option value="2017">2017</option>
																	<option value="2018">2018</option>
																	<option value="2019">2019</option>
																	<option value="2020">2020</option>
																	<option value="2021">2021</option>
																</select>
															</div>














														</div>


													</div>



													<!-- H.S.C or Equivalent ends  -->



													<!-- Graduation starts  -->

													<div class="row">
														<div class="col-md-12 col-lg-12 col-sm-12 card">
															<label for="">Graduation</label>

															<div class="row">
																<div class="col-md-6 col-lg-6 col-sm-12">
																	<label>Examination : </label>
																	<div class="form-group ">

																		<select id="graduation" name="g_examination" class="form-control">
																		<?php 
																		if($W_GRADUATION_EXAMINATION!= null){
																			?>

																		<option  value="<?php echo $W_GRADUATION_EXAMINATION?>" selected><?php echo $W_GRADUATION_EXAMINATION?></option>
																	<?php
																		}
																	?>
																			<option value="" >Select
																				One</option>
																			<option value="1">B.Sc
																				(Engineering/Architecture)</option>
																			<option value="2">B.Sc (Agricultural
																				Science)</option>
																			<option value="3">M.B.B.S/B.D.S</option>
																			<option value="4">Honours</option>
																			<option value="5">Pass Course</option>
																			<option value="6">A &amp; B Section of
																				A.M.I.E</option>
																			<option value="7">BAMS/BHMS/BUMS</option>
																			<option value="8">Others</option>
																		</select>
																	</div>


																	<label>Subject/Degree : </label>
																	<div class="form-group ">

																		<select id="subject" name="g_subject" class="form-control">
																		<?php 
																		if($W_GRADUATION_SUBJECT!= null){
																			?>

																		<option  value="<?php echo $W_GRADUATION_SUBJECT?>" selected><?php echo $W_GRADUATION_SUBJECT?></option>
																	<?php
																		}
																	?>
																			<option value="">Choose...</option>

																		</select>
																	</div>

																	<label>University/Institute : </label>
																	<div class="form-group ">

																		<select id="inputState" name="g_university" class="form-control">
																		<?php 
																		if($W_GRADUATION_UNIVERSITY!= null){
																			?>

																		<option  value="<?php echo $G_UNI_ID?>" selected><?php echo $W_GRADUATION_UNIVERSITY?></option>
																	<?php
																		}
																	?>
																			<option value="">Select
																				One</option>
																			<option value="503">Ad-din Womens Medical
																				College, Dhaka</option>
																			<option value="222">Ahsanullah University of
																				Science and Technology</option>
																			<option value="223">America Bangladesh
																				University</option>
																			<option value="224">American International
																				University Bangladesh</option>
																			<option value="504">Anwer Khan Modern
																				Medical College, Dhaka</option>
																			<option value="225">ASA University
																				Bangladesh</option>
																			<option value="333">Asian University for
																				Women</option>
																			<option value="226">Asian University of
																				Bangladesh</option>
																			<option value="227">Atish Dipankar
																				University of Science &amp; Technology
																			</option>
																			<option value="111">Bangabandhu Sheikh Mujib
																				Medical University</option>
																			<option value="548">Bangabandhu Sheikh
																				Mujibur Rahman Science and Technology
																				University</option>
																			<option value="112">Bangabandhu Sheikh
																				Mujibur Rahman Agricultural University
																			</option>
																			<option value="550">Bangabandhu Sheikh
																				Mujibur Rahman Science &amp; Technology
																				University</option>
																			<option value="113">Bangladesh Agricultural
																				University,Mymensingh</option>
																			<option value="228">Bangladesh Islami
																				University</option>
																			<option value="505">Bangladesh Medical
																				College</option>
																			<option value="114">Bangladesh Open
																				University</option>
																			<option value="229">Bangladesh University
																			</option>
																			<option value="230">Bangladesh University of
																				Business &amp; Technology (BUBT)
																			</option>
																			<option value="115">Bangladesh University of
																				Engineering &amp; Technology</option>
																			<option value="116">Bangladesh University of
																				Professionals</option>
																			<option value="143">Bangladesh University of
																				Textiles</option>
																			<option value="555">Barisal Engineering
																				College</option>
																			<option value="549">Begum Rokeya University,
																				Rangpur</option>
																			<option value="507">BGC Trust Medical
																				College, Chittagong</option>
																			<option value="231">BGC Trust University
																				Bangladesh, Chittagong</option>
																			<option value="232">BRAC University</option>
																			<option value="508">Central Medical College,
																				Comilla</option>
																			<option value="233">Central Women's
																				University</option>
																			<option value="404">Chittagong Medical
																				College</option>
																			<option value="117">Chittagong University of
																				Engineering &amp; Technology</option>
																			<option value="118">Chittagong Veterinary
																				and Animal Sciences University</option>
																			<option value="509">Chottagram Ma-O-Shishu
																				Hospital Medical College</option>
																			<option value="234">City University</option>
																			<option value="409">Comilla Medical College
																			</option>
																			<option value="119">Comilla University
																			</option>
																			<option value="510">Community Based Medical
																				College (cbmc), Mymensingh</option>
																			<option value="511">Community Medical
																				College, Dhaka</option>
																			<option value="417">Cox's Bazar Medical
																				College</option>
																			<option value="235">Daffodil International
																				University</option>
																			<option value="512">Delta Medical College,
																				Dhaka</option>
																			<option value="237">Dhaka International
																				University</option>
																			<option value="401">Dhaka Medical College
																			</option>
																			<option value="513">Dhaka National Medical
																				College</option>
																			<option value="120">Dhaka University
																			</option>
																			<option value="121">Dhaka University of
																				Engineering &amp; Technology</option>
																			<option value="412">Dinajpur Medical College
																			</option>
																			<option value="514">Durra Samad Rahman Red
																				Crescent Women�s Medical College, Sylhet
																			</option>
																			<option value="238">East Delta University ,
																				Chittagong</option>
																			<option value="239">East West University
																			</option>
																			<option value="515">Eastern Medical College,
																				Comilla</option>
																			<option value="240">Eastern University
																			</option>
																			<option value="516">Enam Medical College,
																				Savar, Dhaka</option>
																			<option value="276">European University of
																				Bangladesh</option>
																			<option value="554">Faridpur Engineering
																				College</option>
																			<option value="413">Faridpur Medical College
																			</option>
																			<option value="501">Feni Medical
																				College,Feni</option>
																			<option value="241">Gono Bishwabidyalay
																			</option>
																			<option value="502">Gono Bishwabidyalay,
																				Savar, Dhaka</option>
																			<option value="518">Green Life Medical
																				College,Dhaka</option>
																			<option value="242">Green University of
																				Bangladesh</option>
																			<option value="122">Hajee Mohammad Danesh
																				Science &amp; Technology University
																			</option>
																			<option value="519">Holy Family Red Crescent
																				Medical College, Dhaka</option>
																			<option value="243">IBAIS University
																			</option>
																			<option value="521">Ibn Sina Medical
																				College, Dhaka</option>
																			<option value="520">Ibrahim Medical College,
																				Dhaka</option>
																			<option value="244">Independent University,
																				Bangladesh</option>
																			<option value="245">International Islamic
																				University, Chittagong</option>
																			<option value="522">International Medical
																				College, Gazipur</option>
																			<option value="246">International University
																				of Business Agriculture &amp; Technology
																			</option>
																			<option value="523">Islami Bank Medical
																				College, Rajshahi</option>
																			<option value="144">Islamic Arabic
																				University</option>
																			<option value="123">Islamic University
																			</option>
																			<option value="334">Islamic University of
																				Technology</option>
																			<option value="124">Jagannath University
																			</option>
																			<option value="125">Jahangirnagar University
																			</option>
																			<option value="524">Jahurul Islam Medical
																				College, Kishoregonj</option>
																			<option value="506">Jalalabad Rageb-Rabeya
																				Medical College,Sylhet</option>
																			<option value="525">Jalalabad Ragib-Rabeya
																				Medical College Sylhet</option>
																			<option value="126">Jatiya Kabi Kazi Nazrul
																				Islam University</option>
																			<option value="418">Jessore Medical College
																			</option>
																			<option value="127">Jessore Science &amp;
																				Technology University</option>
																			<option value="526">Khawja Yunus Ali Medical
																				College, Sirajganj</option>
																			<option value="410">Khulna Medical College
																			</option>
																			<option value="128">Khulna University
																			</option>
																			<option value="129">Khulna University of
																				Engineering and Technology</option>
																			<option value="527">Kumudini Medical
																				College, Tangail</option>
																			<option value="420">Kushtia Medical College
																			</option>
																			<option value="528">Labaid Medical
																				College[6] Dhanmondi, Dhaka</option>
																			<option value="247">Leading University,
																				Sylhet</option>
																			<option value="406">MAG Osmani Medical
																				College</option>
																			<option value="248">Manarat International
																				University</option>
																			<option value="529">Maulana Bhasani Medical
																				College</option>
																			<option value="130">Mawlana Bhashani Science
																				&amp; Technology University</option>
																			<option value="530">Medical College for
																				Women and Hospital, Dhaka</option>
																			<option value="249">Metropolitan University,
																				Sylhet</option>
																			<option value="553">Mymensingh Engineering
																				College</option>
																			<option value="403">Mymensingh Medical
																				College</option>
																			<option value="131">National University
																			</option>
																			<option value="531">Nightingale Medical
																				College, Dhaka</option>
																			<option value="416">Noakhali Medical College
																			</option>
																			<option value="132">Noakhali Science &amp;
																				Technology University</option>
																			<option value="532">North Bengal Medical
																				College, Sirajganj</option>
																			<option value="533">North East Medical
																				College, Sylhet</option>
																			<option value="250">North South University
																			</option>
																			<option value="534">Northern International
																				Medical College, Dhaka</option>
																			<option value="535">Northern Private Medical
																				College, Rangpur</option>
																			<option value="251">Northern University
																				Bangladesh</option>
																			<option value="415">Pabna Medical College
																			</option>
																			<option value="133">Pabna University of
																				Science and Technology</option>
																			<option value="134">Patuakhali Science And
																				Technology University</option>
																			<option value="536">Popular Medical College
																				&amp; Hospital, Dhaka</option>
																			<option value="551">Port City International
																				University</option>
																			<option value="252">Premier University,
																				Chittagong</option>
																			<option value="253">Presidency University
																			</option>
																			<option value="537">Prime Medical College,
																				Rangpur</option>
																			<option value="254">Prime University
																			</option>
																			<option value="255">Primeasia University
																			</option>
																			<option value="256">Queens University
																			</option>
																			<option value="405">Rajshahi Medical College
																			</option>
																			<option value="135">Rajshahi University
																			</option>
																			<option value="136">Rajshahi University of
																				Engineering &amp; Technology</option>
																			<option value="538">Rangpur Community
																				Hospital Medical College</option>
																			<option value="408">Rangpur Medical College
																			</option>
																			<option value="137">Rangpur University
																			</option>
																			<option value="257">Royal University of
																				Dhaka</option>
																			<option value="539">Sahabuddin Medical
																				College and Hospital</option>
																			<option value="540">Samaj Vittik Medical
																				College, Mirzanagar, Savar</option>
																			<option value="421">Satkhira Medical College
																			</option>
																			<option value="541">Shahabuddin Medical
																				College, Dhaka</option>
																			<option value="419">Shaheed Nazrul Islam
																				Medical College</option>
																			<option value="414">Shaheed Suhrawardy
																				Medical College</option>
																			<option value="411">Shaheed Ziaur Rahman
																				Medical College</option>
																			<option value="138">Shahjalal University of
																				Science &amp; Technology</option>
																			<option value="258">Shanto Mariam University
																				of Creative Technology</option>
																			<option value="422">Sheikh Sayera Khatun
																				Medical College, Gopalganj</option>
																			<option value="139">Sher-e-Bangla
																				Agricultural University</option>
																			<option value="407">Sher-E-Bangla Medical
																				College</option>
																			<option value="402">Sir Salimullah Medical
																				College</option>
																			<option value="142">Sonargaon University
																			</option>
																			<option value="335">South Asian University
																			</option>
																			<option value="259">Southeast University
																			</option>
																			<option value="543">Southern Medical
																				College, Chittagong</option>
																			<option value="260">Southern University of
																				Bangladesh , Chittagong</option>
																			<option value="261">Stamford University,
																				Bangladesh</option>
																			<option value="262">State University Of
																				Bangladesh</option>
																			<option value="140">Sylhet Agricultural
																				University</option>
																			<option value="552">Sylhet Engineering
																				College</option>
																			<option value="263">Sylhet International
																				University, Sylhet</option>
																			<option value="517">Sylhet Women`s Medical
																				College, Sylhet</option>
																			<option value="544">Tairunnessa Memorial
																				Medical College, Gazipur</option>
																			<option value="264">The Millenium University
																			</option>
																			<option value="265">The Peoples University
																				of Bangladesh</option>
																			<option value="266">The University of Asia
																				Pacific</option>
																			<option value="545">TMSS Medical
																				College,Bogra</option>
																			<option value="267">United International
																				University</option>
																			<option value="141">University of Chittagong
																			</option>
																			<option value="268">University of
																				Development Alternative</option>
																			<option value="556">University of Global
																				Village</option>
																			<option value="269">University of
																				Information Technology &amp; Sciences
																			</option>
																			<option value="270">University of Liberal
																				Arts Bangladesh</option>
																			<option value="271">University of Science
																				&amp; Technology, Chittagong</option>
																			<option value="546">University Of Science
																				and Technology Chittagong. IAMS</option>
																			<option value="272">University of South Asia
																			</option>
																			<option value="547">Uttara Adhunik Medical
																				College,Dhaka</option>
																			<option value="273">Uttara University
																			</option>
																			<option value="274">Victoria University of
																				Bangladesh</option>
																			<option value="275">World University of
																				Bangladesh</option>
																			<option value="542">Z. H. Sikder Women`s
																				Medical College</option>
																			<option value="999">Others</option>
																		</select>
																	</div>
																</div>




																<div class="col-md-6 col-lg-6 col-sm-12">
																	<label>Result : </label>
																	<div class="form-group ">

																		<select id="g_result" name="g_result" class="form-control">
																		<?php 
																		if($W_GRADUATION_RESULT!= null){
																			?>

																		<option  value="<?php echo $W_GRADUATION_RESULT?>" selected><?php echo $W_GRADUATION_RESULT?></option>
																	<?php
																		}
																	?>
																			<option value="" >Select
																				One</option>
																			<option value="1st Class">1st Class</option>
																			<option value="2nd Class">2nd Class</option>
																			<option value="3rd Class">3rd Class</option>
																			<option value="4">GPA/CGPA in scale 4
																			</option>
																			<option value="5">GPA/CGPA in scale 5
																			</option>
																			<option value="Pass">Pass</option>
																			<option value="Appeared">Appeared</option>
																			<option value="Others">Others</option>
																		</select>
																		<input type="text" class="form-control mt-2 col-3" id="g_grade" name="g_grade">

																	</div>


																	<label>Passing Year : </label>
																	<div class="form-group ">

																		<select id="inputState" class="form-control" name="g_year">
																		<?php 
																		if($W_GRADUATION_PASSING_YEAR!= null){
																			?>

																		<option  value="<?php echo $W_GRADUATION_PASSING_YEAR?>" selected><?php echo $W_GRADUATION_PASSING_YEAR?></option>
																	<?php
																		}
																	?>
																			<option value="">Select
																				One</option>
																			<option value="2001">2001</option>
																			<option value="2002">2002</option>
																			<option value="2003">2003</option>
																			<option value="2004">2004</option>
																			<option value="2005">2005</option>
																			<option value="2006">2006</option>
																			<option value="2007">2007</option>
																			<option value="2008">2008</option>
																			<option value="2009">2009</option>
																			<option value="2010">2010</option>
																			<option value="2011">2011</option>
																			<option value="2012">2012</option>
																			<option value="2013">2013</option>
																			<option value="2014">2014</option>
																			<option value="2015">2015</option>
																			<option value="2016">2016</option>
																			<option value="2017">2017</option>
																			<option value="2018">2018</option>
																			<option value="2019">2019</option>
																			<option value="2020">2020</option>
																			<option value="2021">2021</option>
																		</select>
																	</div>


																	<label>Course Duration : </label>
																	<div class="form-group ">

																		<select id="g_duration" name="g_duration" class="form-control">
																		<?php 
																		if($W_GRADUATION_COURSE_DURATION!= null){
																			?>

																		<option  value="<?php echo $W_GRADUATION_COURSE_DURATION?>" selected><?php echo $W_GRADUATION_COURSE_DURATION?></option>
																	<?php
																		}
																	?>
																			<option value="">Select One</option>
																			<option value="02 Years">02 Years</option>
																			<option value="03 Years">03 Years</option>
																			<option value="04 Years">04 Years</option>
																			<option value="05 Years">05 Years</option>
																		</select>
																	</div>

																</div>
															</div>

														</div>
													</div>
												</div>



												<!-- Graduation ends  -->





												<!-- Masters starts  -->

												<div class="row">
													<div class="col-md-12 col-lg-12 col-sm-12 card">
														<label for="">Master's</label>

														<div class="row">
															<div class="col-md-6 col-lg-6 col-sm-12">
																<label>Examination : </label>
																<div class="form-group ">

																	<select id="master" name="m_examination" class="form-control">
																	<?php 
																		if($W_MASTER_EXAMINATION!= null){
																			?>

																		<option  value="<?php echo $W_MASTER_EXAMINATION?>" selected><?php echo $W_MASTER_EXAMINATION?></option>
																	<?php
																		}
																	?>
																		<option value="" >Select One
																		</option>
																		<option value="1">B.Sc
																			(Engineering/Architecture)</option>
																		<option value="2">B.Sc (Agricultural Science)
																		</option>
																		<option value="3">M.B.B.S/B.D.S</option>
																		<option value="4">Honours</option>
																		<option value="5">Pass Course</option>
																		<option value="6">A &amp; B Section of A.M.I.E
																		</option>
																		<option value="7">BAMS/BHMS/BUMS</option>
																		<option value="8">Others</option>
																	</select>
																</div>


																<!-- <label>Subject/Degree : </label>
                                                                <div class="form-group ">

                                                                    <select id="mst_subject" class="form-control">
                                                                        <option selected="selected" value="0">Select One
                                                                        </option>
                                                                       
                                                                    </select>
                                                                </div> -->

																<label>Subject/Degree : </label>
																<div class="form-group ">

																	<select id="subject1" name="m_subject" class="form-control">
																	<?php 
																		if($W_MASTER_SUBJECT!= null){
																			?>

																		<option  value="<?php echo $W_MASTER_SUBJECT?>" selected><?php echo $W_MASTER_SUBJECT?></option>
																	<?php
																		}
																	?>
																		<option value="">Choose...</option>

																	</select>
																</div>

																<label>University/Institute : </label>
																<div class="form-group ">

																	<select id="inputState" name="m_university" class="form-control">
																	<?php 
																		if($W_MASTER_UNIVERSITY!= null){
																			?>

																		<option  value="<?php echo $M_UNI_ID?>" selected><?php echo $W_MASTER_UNIVERSITY?></option>
																	<?php
																		}
																	?>
																		<option value="" >Select One
																		</option>
																		<option value="503">Ad-din Womens Medical
																			College, Dhaka</option>
																		<option value="222">Ahsanullah University of
																			Science and Technology</option>
																		<option value="223">America Bangladesh
																			University</option>
																		<option value="224">American International
																			University Bangladesh</option>
																		<option value="504">Anwer Khan Modern Medical
																			College, Dhaka</option>
																		<option value="225">ASA University Bangladesh
																		</option>
																		<option value="333">Asian University for Women
																		</option>
																		<option value="226">Asian University of
																			Bangladesh</option>
																		<option value="227">Atish Dipankar University of
																			Science &amp; Technology</option>
																		<option value="111">Bangabandhu Sheikh Mujib
																			Medical University</option>
																		<option value="548">Bangabandhu Sheikh Mujibur
																			Rahman Science and Technology University
																		</option>
																		<option value="112">Bangabandhu Sheikh Mujibur
																			Rahman Agricultural University</option>
																		<option value="550">Bangabandhu Sheikh Mujibur
																			Rahman Science &amp; Technology University
																		</option>
																		<option value="113">Bangladesh Agricultural
																			University,Mymensingh</option>
																		<option value="228">Bangladesh Islami University
																		</option>
																		<option value="505">Bangladesh Medical College
																		</option>
																		<option value="114">Bangladesh Open University
																		</option>
																		<option value="229">Bangladesh University
																		</option>
																		<option value="230">Bangladesh University of
																			Business &amp; Technology (BUBT)</option>
																		<option value="115">Bangladesh University of
																			Engineering &amp; Technology</option>
																		<option value="116">Bangladesh University of
																			Professionals</option>
																		<option value="143">Bangladesh University of
																			Textiles</option>
																		<option value="555">Barisal Engineering College
																		</option>
																		<option value="549">Begum Rokeya University,
																			Rangpur</option>
																		<option value="507">BGC Trust Medical College,
																			Chittagong</option>
																		<option value="231">BGC Trust University
																			Bangladesh, Chittagong</option>
																		<option value="232">BRAC University</option>
																		<option value="508">Central Medical College,
																			Comilla</option>
																		<option value="233">Central Women's University
																		</option>
																		<option value="404">Chittagong Medical College
																		</option>
																		<option value="117">Chittagong University of
																			Engineering &amp; Technology</option>
																		<option value="118">Chittagong Veterinary and
																			Animal Sciences University</option>
																		<option value="509">Chottagram Ma-O-Shishu
																			Hospital Medical College</option>
																		<option value="234">City University</option>
																		<option value="409">Comilla Medical College
																		</option>
																		<option value="119">Comilla University</option>
																		<option value="510">Community Based Medical
																			College (cbmc), Mymensingh</option>
																		<option value="511">Community Medical College,
																			Dhaka</option>
																		<option value="417">Cox's Bazar Medical College
																		</option>
																		<option value="235">Daffodil International
																			University</option>
																		<option value="512">Delta Medical College, Dhaka
																		</option>
																		<option value="237">Dhaka International
																			University</option>
																		<option value="401">Dhaka Medical College
																		</option>
																		<option value="513">Dhaka National Medical
																			College</option>
																		<option value="120">Dhaka University</option>
																		<option value="121">Dhaka University of
																			Engineering &amp; Technology</option>
																		<option value="412">Dinajpur Medical College
																		</option>
																		<option value="514">Durra Samad Rahman Red
																			Crescent Women�s Medical College, Sylhet
																		</option>
																		<option value="238">East Delta University ,
																			Chittagong</option>
																		<option value="239">East West University
																		</option>
																		<option value="515">Eastern Medical College,
																			Comilla</option>
																		<option value="240">Eastern University</option>
																		<option value="516">Enam Medical College, Savar,
																			Dhaka</option>
																		<option value="276">European University of
																			Bangladesh</option>
																		<option value="554">Faridpur Engineering College
																		</option>
																		<option value="413">Faridpur Medical College
																		</option>
																		<option value="501">Feni Medical College,Feni
																		</option>
																		<option value="241">Gono Bishwabidyalay</option>
																		<option value="502">Gono Bishwabidyalay, Savar,
																			Dhaka</option>
																		<option value="518">Green Life Medical
																			College,Dhaka</option>
																		<option value="242">Green University of
																			Bangladesh</option>
																		<option value="122">Hajee Mohammad Danesh
																			Science &amp; Technology University</option>
																		<option value="519">Holy Family Red Crescent
																			Medical College, Dhaka</option>
																		<option value="243">IBAIS University</option>
																		<option value="521">Ibn Sina Medical College,
																			Dhaka</option>
																		<option value="520">Ibrahim Medical College,
																			Dhaka</option>
																		<option value="244">Independent University,
																			Bangladesh</option>
																		<option value="245">International Islamic
																			University, Chittagong</option>
																		<option value="522">International Medical
																			College, Gazipur</option>
																		<option value="246">International University of
																			Business Agriculture &amp; Technology
																		</option>
																		<option value="523">Islami Bank Medical College,
																			Rajshahi</option>
																		<option value="144">Islamic Arabic University
																		</option>
																		<option value="123">Islamic University</option>
																		<option value="334">Islamic University of
																			Technology</option>
																		<option value="124">Jagannath University
																		</option>
																		<option value="125">Jahangirnagar University
																		</option>
																		<option value="524">Jahurul Islam Medical
																			College, Kishoregonj</option>
																		<option value="506">Jalalabad Rageb-Rabeya
																			Medical College,Sylhet</option>
																		<option value="525">Jalalabad Ragib-Rabeya
																			Medical College Sylhet</option>
																		<option value="126">Jatiya Kabi Kazi Nazrul
																			Islam University</option>
																		<option value="418">Jessore Medical College
																		</option>
																		<option value="127">Jessore Science &amp;
																			Technology University</option>
																		<option value="526">Khawja Yunus Ali Medical
																			College, Sirajganj</option>
																		<option value="410">Khulna Medical College
																		</option>
																		<option value="128">Khulna University</option>
																		<option value="129">Khulna University of
																			Engineering and Technology</option>
																		<option value="527">Kumudini Medical College,
																			Tangail</option>
																		<option value="420">Kushtia Medical College
																		</option>
																		<option value="528">Labaid Medical College[6]
																			Dhanmondi, Dhaka</option>
																		<option value="247">Leading University, Sylhet
																		</option>
																		<option value="406">MAG Osmani Medical College
																		</option>
																		<option value="248">Manarat International
																			University</option>
																		<option value="529">Maulana Bhasani Medical
																			College</option>
																		<option value="130">Mawlana Bhashani Science
																			&amp; Technology University</option>
																		<option value="530">Medical College for Women
																			and Hospital, Dhaka</option>
																		<option value="249">Metropolitan University,
																			Sylhet</option>
																		<option value="553">Mymensingh Engineering
																			College</option>
																		<option value="403">Mymensingh Medical College
																		</option>
																		<option value="131">National University</option>
																		<option value="531">Nightingale Medical College,
																			Dhaka</option>
																		<option value="416">Noakhali Medical College
																		</option>
																		<option value="132">Noakhali Science &amp;
																			Technology University</option>
																		<option value="532">North Bengal Medical
																			College, Sirajganj</option>
																		<option value="533">North East Medical College,
																			Sylhet</option>
																		<option value="250">North South University
																		</option>
																		<option value="534">Northern International
																			Medical College, Dhaka</option>
																		<option value="535">Northern Private Medical
																			College, Rangpur</option>
																		<option value="251">Northern University
																			Bangladesh</option>
																		<option value="415">Pabna Medical College
																		</option>
																		<option value="133">Pabna University of Science
																			and Technology</option>
																		<option value="134">Patuakhali Science And
																			Technology University</option>
																		<option value="536">Popular Medical College
																			&amp; Hospital, Dhaka</option>
																		<option value="551">Port City International
																			University</option>
																		<option value="252">Premier University,
																			Chittagong</option>
																		<option value="253">Presidency University
																		</option>
																		<option value="537">Prime Medical College,
																			Rangpur</option>
																		<option value="254">Prime University</option>
																		<option value="255">Primeasia University
																		</option>
																		<option value="256">Queens University</option>
																		<option value="405">Rajshahi Medical College
																		</option>
																		<option value="135">Rajshahi University</option>
																		<option value="136">Rajshahi University of
																			Engineering &amp; Technology</option>
																		<option value="538">Rangpur Community Hospital
																			Medical College</option>
																		<option value="408">Rangpur Medical College
																		</option>
																		<option value="137">Rangpur University</option>
																		<option value="257">Royal University of Dhaka
																		</option>
																		<option value="539">Sahabuddin Medical College
																			and Hospital</option>
																		<option value="540">Samaj Vittik Medical
																			College, Mirzanagar, Savar</option>
																		<option value="421">Satkhira Medical College
																		</option>
																		<option value="541">Shahabuddin Medical College,
																			Dhaka</option>
																		<option value="419">Shaheed Nazrul Islam Medical
																			College</option>
																		<option value="414">Shaheed Suhrawardy Medical
																			College</option>
																		<option value="411">Shaheed Ziaur Rahman Medical
																			College</option>
																		<option value="138">Shahjalal University of
																			Science &amp; Technology</option>
																		<option value="258">Shanto Mariam University of
																			Creative Technology</option>
																		<option value="422">Sheikh Sayera Khatun Medical
																			College, Gopalganj</option>
																		<option value="139">Sher-e-Bangla Agricultural
																			University</option>
																		<option value="407">Sher-E-Bangla Medical
																			College</option>
																		<option value="402">Sir Salimullah Medical
																			College</option>
																		<option value="142">Sonargaon University
																		</option>
																		<option value="335">South Asian University
																		</option>
																		<option value="259">Southeast University
																		</option>
																		<option value="543">Southern Medical College,
																			Chittagong</option>
																		<option value="260">Southern University of
																			Bangladesh , Chittagong</option>
																		<option value="261">Stamford University,
																			Bangladesh</option>
																		<option value="262">State University Of
																			Bangladesh</option>
																		<option value="140">Sylhet Agricultural
																			University</option>
																		<option value="552">Sylhet Engineering College
																		</option>
																		<option value="263">Sylhet International
																			University, Sylhet</option>
																		<option value="517">Sylhet Women`s Medical
																			College, Sylhet</option>
																		<option value="544">Tairunnessa Memorial Medical
																			College, Gazipur</option>
																		<option value="264">The Millenium University
																		</option>
																		<option value="265">The Peoples University of
																			Bangladesh</option>
																		<option value="266">The University of Asia
																			Pacific</option>
																		<option value="545">TMSS Medical College,Bogra
																		</option>
																		<option value="267">United International
																			University</option>
																		<option value="141">University of Chittagong
																		</option>
																		<option value="268">University of Development
																			Alternative</option>
																		<option value="556">University of Global Village
																		</option>
																		<option value="269">University of Information
																			Technology &amp; Sciences</option>
																		<option value="270">University of Liberal Arts
																			Bangladesh</option>
																		<option value="271">University of Science &amp;
																			Technology, Chittagong</option>
																		<option value="546">University Of Science and
																			Technology Chittagong. IAMS</option>
																		<option value="272">University of South Asia
																		</option>
																		<option value="547">Uttara Adhunik Medical
																			College,Dhaka</option>
																		<option value="273">Uttara University</option>
																		<option value="274">Victoria University of
																			Bangladesh</option>
																		<option value="275">World University of
																			Bangladesh</option>
																		<option value="542">Z. H. Sikder Women`s Medical
																			College</option>
																		<option value="999">Others</option>

																	</select>
																</div>
															</div>




															<div class="col-md-6 col-lg-6 col-sm-12">
																<label>Result : </label>
																<div class="form-group ">

																	<select id="m_result" name="m_result" class="form-control">
																	<?php 
																		if($W_MASTER_RESULT!= null){
																			?>

																		<option  value="<?php echo $W_MASTER_RESULT?>" selected><?php echo $W_MASTER_RESULT?></option>
																	<?php
																		}
																	?>
																		<option value="" >Select One
																		</option>
																		<option value="1st Class">1st Class</option>
																		<option value="2nd Class">2nd Class</option>
																		<option value="3rd Class">3rd Class</option>
																		<option value="4">GPA/CGPA in scale 4</option>
																		<option value="5">GPA/CGPA in scale 5</option>
																		<option value="Pass">Pass</option>
																		<option value="Appeared">Appeared</option>
																		<option value="Others">Others</option>
																	</select>
																	<input type="number" class="form-control mt-2 col-3" id="m_grade" name="m_grade">
																</div>


																<label>Passing Year : </label>
																<div class="form-group ">

																	<select id="inputState" name="m_year" class="form-control">
																	<?php 
																		if($W_MASTER_PASSING_YEAR!= null){
																			?>

																		<option  value="<?php echo $W_MASTER_PASSING_YEAR?>" selected><?php echo $W_MASTER_PASSING_YEAR?></option>
																	<?php
																		}
																	?>
																		<option  value="">Select One
																		</option>
																		<option value="2001">2001</option>
																		<option value="2002">2002</option>
																		<option value="2003">2003</option>
																		<option value="2004">2004</option>
																		<option value="2005">2005</option>
																		<option value="2006">2006</option>
																		<option value="2007">2007</option>
																		<option value="2008">2008</option>
																		<option value="2009">2009</option>
																		<option value="2010">2010</option>
																		<option value="2011">2011</option>
																		<option value="2012">2012</option>
																		<option value="2013">2013</option>
																		<option value="2014">2014</option>
																		<option value="2015">2015</option>
																		<option value="2016">2016</option>
																		<option value="2017">2017</option>
																		<option value="2018">2018</option>
																		<option value="2019">2019</option>
																		<option value="2020">2020</option>
																		<option value="2021">2021</option>
																	</select>
																</div>


																<label>Course Duration : </label>
																<div class="form-group ">

																	<select id="inputState" name="m_duration" class="form-control">
																	<?php 
																		if($W_MASTER_COURSE_DURATION!= null){
																			?>

																		<option  value="<?php echo $W_MASTER_COURSE_DURATION?>" selected><?php echo $W_MASTER_COURSE_DURATION?></option>
																	<?php
																		}
																	?>
																		<option value="">Select One</option>
																		<option value="02 Years">02 Years</option>
																		<option value="03 Years">03 Years</option>
																		<option value="04 Years">04 Years</option>
																		<option value="05 Years">05 Years</option>
																	</select>
																</div>

															</div>
														</div>

													</div>
												</div>
											</div>



											<!-- Master's ends  -->





















											<!-- <input type="text" class="form-control" placeholder="Educational Qualification" name="education" id="education" value="<?php echo  $W_EDUCATION; ?>"> -->
										</div>
										<!-- education ends  -->

										<!-- skill starts -->
										<div class="row ml-2">
											<div class="col-md-6 col-lg-6 col-sm-12 ">
												<div class="form-group">
													<label class="form-label" for="skill">Language Skills:</label>
													<input type="text" name="skill" class="form-control" placeholder="Language Skills" name="skill" id="skill" value="<?php echo  $W_SKILL; ?>">
												</div>
												<!-- skill ends  -->
											</div>

										</div>
									</div>

								</div>
							</div>


							<!-- section 5 ends  -->

							<!-- section 6 starts  -->

							<div class="row container m-2" style="margin: 2px auto!important">
								<div class="col-12">
									<div class="card " style="width: 95%">
										<div class="card-header " style="background-color: #C0C0C0!important;">
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_6_label" style="font-size:2vw;">Section 6 : Interest & Hobbies</p>
											</div>

										</div>
										<div class="card-body" id="section_6_content">
											<!-- interest starts -->
											<div class="form-group">
												<label class="form-label" for="interest">Interest & Hobbies:</label>
												<select class="form-control" name="interest" id="interest">
													<option value="0">Select Interest & Hobbies</option>
													<?php
													for ($i = 0; $i < count($interest); $i++) {

														echo "<option value='" . $interest[$i]["INTEREST_ID"] . "'>" . $interest[$i]["INTEREST_NAME"] . "</option>";
													}

													?>
												</select>
											</div>
											<!-- interest ends  -->
										</div>

									</div>
								</div>
							</div>
							<!-- section 6 ends  -->

							<!-- section 7 starts  -->

							<div class="row container m-2" style="margin: 2px auto!important">
								<div class="col-12">
									<div class="card " style="width: 95%">
										<div class="card-header " style="background-color: #C0C0C0!important;">
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_7_label" style="font-size:2vw;">Section 7 : Proffesional Records
												</p>
											</div>

										</div>
										<div class="card-body" id="section_7_content">

											<!-- designation starts  -->
											<div class="form-group row">
												<label for="designation" class="col-sm-2 col-form-label">Designation
													:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="<?php echo  $W_DESIGNATION; ?>">
												</div>
											</div>
											<!-- designation ends  -->

											<!-- posting starts  -->
											<div class="form-group row">
												<label for="posting" class="col-sm-2 col-form-label">Place of
													Posting:
												</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="posting" id="posting" placeholder="Place of Posting" value="<?php echo  $W_POSTING; ?>">
												</div>
											</div>
											<!-- posting ends  -->


											<div class="row">
												<!-- Cadre starts  -->
												<div class="form-group col-4">
													<label class="form-label" for="cadre">Cadre :</label>
													<select class="form-control" name="cadre" id="cadre">
														<option value="0">Select Cadre</option>
														<?php
														for ($i = 0; $i < count($cadre); $i++) {

															echo "<option value='" . $cadre[$i]["CADRE_ID"] . "'>" . $cadre[$i]["CADRE_NAME"] . "</option>";
														}

														?>
													</select>
												</div>
												<!-- Cadre ends  -->

												<!-- Batch starts  -->
												<div class="form-group col-4 pl-0">
													<label class="form-label" for="batch">Batch :</label>
													<select class="form-control" name="batch" id="batch">
														<option value="0">Select Batch</option>
														<?php
														for ($i = 0; $i < count($batch); $i++) {

															echo "<option value='" . $batch[$i]["BATCH_ID"] . "'>" . $batch[$i]["BATCH_NAME"] . "</option>";
														}

														?>
													</select>
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
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_8_label" style="font-size:2vw;">Section 8 : Proffesional
													Membership</p>
											</div>

										</div>
										<div class="card-body" id="section_8_content">
											<!-- membership starts -->
											<div class="form-group">
												<label class="form-label" for="membership">Proffesional Membership:</label>
												<input type="text" class="form-control" placeholder="Proffesional Membership" name="membership" id="membership" value="<?php echo  $W_MEMBERSHIP; ?>">
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
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_9_label" style="font-size:2vw;">Section 9 : Honors & Awards
													Received</p>
											</div>

										</div>
										<div class="card-body" id="section_9_content">
											<!-- honor starts -->
											<div class="form-group">
												<label class="form-label" for="honor">Honors & Awards Received:</label>
												<input type="text" class="form-control" placeholder="Honors & Awards Received" name="honor" id="honor" value="<?php echo  $W_HONOR; ?>">
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
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_10_label" style="font-size:2vw;">Section 10 : Publications &
													Articles</p>
											</div>

										</div>
										<div class="card-body" id="section_10_content">
											<!-- article starts -->
											<div class="form-group">
												<label class="form-label" for="article">Publications & Articles:</label>
												<input type="text" class="form-control" placeholder="Publications & Articles" name="article" id="article" value="<?php echo  $W_ARTICLE; ?>">
											</div>
											<!-- article ends  -->

										</div>

									</div>
								</div>
							</div>
							<!-- section 10 ends  -->


							<!-- section 11 starts  -->

							<div class="row container m-2" style="margin: 2px auto!important">
								<div class="col-12">
									<div class="card " style="width: 95%">
										<div class="card-header " style="background-color: #C0C0C0!important;">
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_11_label" style="font-size:2vw;">Section 11 : Family Information</p>
											</div>
										</div>
										<div class="card-body" id="section_11_content">
											<!-- children starts -->
											<div class="form-group">
												<label class="form-label" for="child">Number Of Children(If Any)
													:</label>

												<div class="row">
													<div class="col-6">
														<label>Boy/s :</label>
														<input type="number" min="0" class="form-control col-6" placeholder="Number Of Boy" name="child_boy" id="child" value="<?php echo  $W_CHILD_BOYS; ?>">

													</div>
													<div class="col-6">

														<label>Girl/s :</label>
														<input type="number" min="0" class="form-control col-6" placeholder="Number Of Girl" name="child_girl" id="child" value="<?php echo  $W_CHILD_GIRLS; ?>">


													</div>

												</div>
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
											<div class="d-flex justify-content-center align-items-center">
												<p class="section_part btn btn-link" id="section_12_label" style="font-size:2vw;">Section 12 : My Signature Upload
												</p>
											</div>

										</div>
										<div class="card-body" id="section_12_content">
											<!-- signature starts -->


											<!-- signature starts -->
											<div class="row">
												<div class="form-group col-lg-6 col-md-6 col-sm-12">
													<label class="form-label" for="picture">My Signature :</label>
													<input type="file" class="form-control" name="signature" id="signature">
												</div>
												<div class="form-group col-lg-6 col-md-6 col-sm-12 ">
													<?php
													if ($W_SIGNATURE != '') {
														echo "<img src=' $W_SIGNATURE ' height='120px' width='120px'
																						style='float: right;'>";
													}

													?>

												</div>
											</div>

											<!-- signature ends  -->


											<!-- signature ends  -->
										</div>

									</div>
								</div>
							</div>
							<!-- section 12 ends  -->



							<div class="container mt-4 col-4">




								<button type='submit' class='btn btn-md btn-primary btn-block' name='submit' id='submit'> <b> Edit</b></button>

							</div>



						</form>
					</div>

					<!-- /.container-fluid -->
				</div>

				<footer class="footer mt-4 bg-dark" style="font-weight: bold; text-shadow: 3px 3px 5px rgba(150, 150, 150, 1); ">

					<div class="container text-center">

						<h3 class="d-inline text-white">
							Powered By <h1 class="d-inline text-white">IT Bangla Ltd.</h1>
						</h3>
					</div>


					<div class="scrolltop float-right">
						<i class="fa fa-arrow-up" onclick="topFunction()" id="myBtn"></i>
					</div>


				</footer>
			</div>
		</div>
		<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<script>
		var mybtn = document.getElementById("myBtn")
		window.onscroll = function() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybtn.style.display = "block";
			} else {
				mybtn.style.display = "none";
			}
		}

		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}

		$(document).ready(function() {
			$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
		});


		$("#bar").click(function() {
			$(this).toggleClass("open");
			$("#page-content-wrapper ,#sidebar-wrapper").toggleClass("toggled");
		});
	</script>






	<script>
		// district code cascading starts 
		$('#o_division').on('change', function() {
			var divisionID = $(this).val();

			// console.log(divisionID);
			if (divisionID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_div_dist.php',
					data: 'div_id=' + divisionID,
					success: function(html) {
						$('#o_district').html(html);
					}
				});
			} else {
				$('#o_district').html('<option value="">Select division first</option>');
			}
		});
		// distirct code cascading ends
	</script>
	<script>
		// district code cascading starts 
		$('#o_district').on('change', function() {
			var districtID = $(this).val();

			// console.log(divisionID);
			if (districtID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_dis_upo.php',
					data: 'dis_id=' + districtID,
					success: function(html) {
						$('#o_upazilla').html(html);
					}
				});
			} else {
				$('#o_upazilla').html('<option value="">Select upazilla first</option>');
			}
		});
		// distirct code cascading ends
	</script>

	<script>
		// district code cascading starts 
		$('#r_division').on('change', function() {
			var divisionID = $(this).val();

			// console.log(divisionID);
			if (divisionID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_div_dist.php',
					data: 'div_id=' + divisionID,
					success: function(html) {
						$('#r_district').html(html);
					}
				});
			} else {
				$('#r_district').html('<option value="">Select division first</option>');
			}
		});
		// distirct code cascading ends
	</script>

	<script>
		// district code cascading starts 
		$('#r_district').on('change', function() {
			var districtID = $(this).val();

			// console.log(divisionID);
			if (districtID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_dis_upo.php',
					data: 'dis_id=' + districtID,
					success: function(html) {
						$('#r_upazilla').html(html);
					}
				});
			} else {
				$('#r_upazilla').html('<option value="">Select upazilla first</option>');
			}
		});
		// distirct code cascading ends
	</script>

	<script>
		// district code cascading starts 
		$('#p_division').on('change', function() {
			var divisionID = $(this).val();

			// console.log(divisionID);
			if (divisionID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_div_dist.php',
					data: 'div_id=' + divisionID,
					success: function(html) {
						$('#p_district').html(html);
					}
				});
			} else {
				$('#p_district').html('<option value="">Select division first</option>');
			}
		});
		// distirct code cascading ends
	</script>


	<script>
		// district code cascading starts 
		$('#p_district').on('change', function() {
			var districtID = $(this).val();

			// console.log(divisionID);
			if (districtID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_dis_upo.php',
					data: 'dis_id=' + districtID,
					success: function(html) {
						$('#p_upazilla').html(html);
					}
				});
			} else {
				$('#p_upazilla').html('<option value="">Select upazilla first</option>');
			}
		});
		// distirct code cascading ends
	</script>


	<script>
		//  Graduation subject cascading starts 
		$('#graduation').on('change', function() {
			var degreeID = $(this).val();

			// console.log(degreeID);
			if (degreeID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_degree.php',
					data: 'degree_id=' + degreeID,
					success: function(html) {
						$('#subject').html(html);
					}
				});
			} else {
				$('#subject').html('<option value="">Select Degree first</option>');
			}
		});
		// Graduation subject code cascading ends
	</script>



	<script>
		//  Graduation subject cascading starts 
		$('#master').on('change', function() {
			var degreeID = $(this).val();

			// console.log(degreeID);
			if (degreeID) {
				$.ajax({
					type: 'POST',
					url: 'ajaxDataCascading_degree.php',
					data: 'degree_id=' + degreeID,
					success: function(html) {
						$('#subject1').html(html);
					}
				});
			} else {
				$('#subject1').html('<option value="">Select Degree first</option>');
			}
		});
		// Graduation subject code cascading ends
	</script>

	<!-- ssc grade start -->
	<script>
		$(document).ready(function() {
			$("#s_grade").hide();


			$("#s_result").change(function() {

				var result = $(this).val();
				console.log(result);

				if (result === '4' || result === '5') {

					console.log("ok");
					$("#s_grade").show();
				} else {
					$("#s_grade").hide();

				}
			});

		})


		//    
	</script>

	<!-- ssc grade end -->


	<!-- HSC grade start -->

	<script>
		$(document).ready(function() {
			$("#h_grade").hide();


			$("#h_result").change(function() {

				var result1 = $(this).val();
				console.log(result1);

				if (result1 === '4') {

					console.log("ok");
					$("#h_grade").show();
					$("#h_grade").attr("pattern", "[0-4]{1}.[0-9]{2}");
				} else if (result1 === '5') {

					console.log("test");
					$("#h_grade").show();
					$("#h_grade").attr("pattern", "[0-5]{1}.[0-9]{2}");
				} else {
					$("#h_grade").hide();

				}
			});

		})


		//    
	</script>
	<!-- HSC grade end -->






	<!-- Graduation grade start -->

	<script>
		$(document).ready(function() {
			$("#g_grade").hide();


			$("#g_result").change(function() {

				var result1 = $(this).val();
				console.log(result1);

				if (result1 === '4' || result1 === '5') {

					console.log("ok");
					$("#g_grade").show();
				} else {
					$("#g_grade").hide();

				}
			});

		})


		//    
	</script>
	<!-- Graduation grade end -->


	<!-- Master grade start -->

	<script>
		$(document).ready(function() {
			$("#m_grade").hide();


			$("#m_result").change(function() {

				var result2 = $(this).val();
				console.log(result2);

				if (result2 === '4') {

					console.log("ok");
					$("#m_grade").show();
					$("#m_grade").attr("max", "4.00");
				} else if (result2 === '5') {
					$("#m_grade").show();
					$("#m_grade").attr("max", "5.00");
				} else {
					$("#m_grade").hide();

				}
			});

		})


		//    
	</script>
	<!-- Master grade end -->

</body>

</html>
