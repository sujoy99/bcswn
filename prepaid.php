<?php

session_start();
if (!isset($_SESSION['USERNAME'])) {
	header("location:index.php");
}


?>

<?php


// get bill cycle 

$bill_cycle = array();

for ($i = 0; $i < 3; $i++) {
	$bill_cycle[$i] = date("Ym") - $i;
}



error_reporting(0);
set_time_limit(1000);
include 'Connection.php';

$cust_num = '';
$cust_chk_digit = '';
$primary_key = '';
$bill_cycle_code = '';
$cl_sr_reading = '';
$cl_pk_reading = '';
$cl_off_pk_reading = '';
$update = false;



if (isset($_POST['submit'])) {
	$CUSTOMER_NUM = $_POST['CUSTOMER_NUM'];
	$CUST_CHK_DIGIT = substr($CUSTOMER_NUM, -1);
	$CUSTOMER_NUM = substr($CUSTOMER_NUM, 0, -1);

	$BILL_CYCLE_CODE = $_POST['BILL_CYCLE_CODE'];
	// $READING_DATE = '';
	$CL_SR_READING = $_POST['CL_SR_READING'];
	$CL_PK_READING = $_POST['CL_PK_READING'];
	$CL_OFF_PK_READING = $_POST['CL_OFF_PK_READING'];


	// $sql = "INSERT INTO test_project VALUES ('" . $name . ', '" . $status . "')";

	$sql = "INSERT INTO PCC.PC_CUSTOMERS_CORR(CUSTOMER_NUM, CUST_CHK_DIGIT, BILL_CYCLE_CODE, READING_DATE, CL_SR_READING, CL_PK_READING, CL_OFF_PK_READING)
		VALUES('" . $CUSTOMER_NUM . "', '" . $CUST_CHK_DIGIT . "', '" . $BILL_CYCLE_CODE . "', SYSDATE, " . $CL_SR_READING . ", " . $CL_PK_READING . ", " . $CL_OFF_PK_READING . ")";

	$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);

	oci_free_statement($parseresults);
	oci_close($conn);
}

// include 'Connection.php';

if (isset($_GET['new'])) {
	$id = $_GET['new'];
	$CUST_CHK_DIGIT = substr($id, -1);
	$CUSTOMER_NUM = substr($id, 0, -1);
	$bill_cycle = $_GET['bill'];
	$update = true;

	// echo $bill_cycle;

	// $sql = "SELECT * FROM PCC.PC_CUSTOMERS_CORR WHERE
	// CUSTOMER_NUM='1234567' AND CUST_CHK_DIGIT='9' AND BILL_CYCLE_CODE='202011'";


	$sql = "SELECT * FROM PCC.PC_CUSTOMERS_CORR WHERE CUSTOMER_NUM='" . $CUSTOMER_NUM . "' AND CUST_CHK_DIGIT='" . $CUST_CHK_DIGIT . "' AND BILL_CYCLE_CODE='" . $bill_cycle . "'";

	// $sql = "SELECT * FROM PCC.PC_CUSTOMERS_CORR WHERE BILL_CYCLE_CODE='".$bill_cycle."'";

	$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);


	while ($row = oci_fetch_assoc($parseresults)) {
		$cust_num = $row['CUSTOMER_NUM'];

		$cust_chk_digit = $row['CUST_CHK_DIGIT'];
		$primary_key = $cust_num . $cust_chk_digit;
		$bill_cycle_code = $row['BILL_CYCLE_CODE'];
		$cl_sr_reading = $row['CL_SR_READING'];
		$cl_pk_reading = $row['CL_PK_READING'];
		$cl_off_pk_reading = $row['CL_OFF_PK_READING'];
	}






	oci_free_statement($parseresults);
	oci_close($conn);
}

// update section starts
include 'Connection.php';
if (isset($_POST['update'])) {

	// get value from url starts
	$id = $_GET['new'];
	$CUST_CHK_DIGIT = substr($id, -1);
	$CUSTOMER_NUM = substr($id, 0, -1);
	$bill_cycle = $_GET['bill'];
	// get value from url ends



	// get value from form starts 
	$CUSTOMER_NUM1 = $_POST['CUSTOMER_NUM'];
	$CUST_CHK_DIGIT1 = substr($CUSTOMER_NUM1, -1);
	$CUSTOMER_NUM1 = substr($CUSTOMER_NUM1, 0, -1);

	$BILL_CYCLE_CODE1 = $_POST['BILL_CYCLE_CODE'];
	// $READING_DATE = '';
	$CL_SR_READING1 = $_POST['CL_SR_READING'];
	$CL_PK_READING1 = $_POST['CL_PK_READING'];
	$CL_OFF_PK_READING1 = $_POST['CL_OFF_PK_READING'];
	// get value from form ends 

	$sql = "UPDATE PCC.PC_CUSTOMERS_CORR SET CUSTOMER_NUM='" . $CUSTOMER_NUM1 . "', CUST_CHK_DIGIT='" . $CUST_CHK_DIGIT1 . "', BILL_CYCLE_CODE='" . $BILL_CYCLE_CODE1 . "', CL_SR_READING=" . $CL_SR_READING1 . ", CL_PK_READING=" . $CL_PK_READING1 . ",
	CL_OFF_PK_READING=" . $CL_OFF_PK_READING1 . " WHERE CUSTOMER_NUM='" . $CUSTOMER_NUM . "' AND CUST_CHK_DIGIT='" . $CUST_CHK_DIGIT . "' AND BILL_CYCLE_CODE='" . $bill_cycle . "'";

	// print $sql;

	$parseresults = ociparse($conn, $sql);
	ociexecute($parseresults);

	oci_free_statement($parseresults);
	oci_close($conn);


	// reset variables 
	$primary_key = '';
	$bill_cycle_code = '';
	$cl_sr_reading = '';
	$cl_pk_reading = '';
	$cl_off_pk_reading = '';

	header("location:prepaid_cust_entry.php");
}


// update section ends 






?>


<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">




	<!-- custom css link  -->
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/sidebar.css">

	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<!-- font awesome link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />


	<style>
		.sidebar {
			height: 100%;
		}
	</style>


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
				<div class="row m-0">
					<div class="col-lg-12 col-md-12 col-sm-12 bg-dark p-0">
						<h1 class="text-white text-center">Header</h1>
					</div>
				</div>

				<div class="row m-0">
					<div class="span12">
						<form class="form-horizontal span6" action="" method="post">
							<fieldset>

								<legend>Customer Entry</legend>

								<div class="control-group">
									<label for="cust_num" class="control-label">Customer Number :</label>
									<div class="controls">
										<input type="text" class="input-block-level" pattern="[0-9]{8}" maxlength="8" title="Fill Customer Number" required name="CUSTOMER_NUM" id="CUSTOMER_NUM" value="<?php echo $primary_key; ?>" onkeydown="focusNext(event)">
									</div>
								</div>



								<div class="control-group">
									<label class="control-label">BILL_CYCLE_CODE :</label>
									<div class="controls">
										<div class="row-fluid">
											<div class="span9">
												<select class="input-block-level" name="BILL_CYCLE_CODE" id="BILL_CYCLE_CODE">
													<?php
													if ($bill_cycle_code == '') {
														echo "<option >Select Bill Cycle</option>";
														for ($i = 0; $i < count($bill_cycle); $i++) {

															echo "<option value='" . $bill_cycle[$i] . "'>" . $bill_cycle[$i] . "</option>";
														}
													} else {
														$bill_cycle = array();

														for ($i = 0; $i < 3; $i++) {
															$bill_cycle[$i] = date("Ym") - $i;
														}


														echo "<option value='$bill_cycle_code' >" . $bill_cycle_code . "</option>";


														for ($i = 0; $i < count($bill_cycle); $i++) {
															if ($bill_cycle_code != $bill_cycle[$i]) {
																echo "<option value='" . $bill_cycle[$i] . "'>" . $bill_cycle[$i] . "</option>";
															}
														}
													}

													?>
													<!-- <option value="">Select Bill Cycle</option> -->



													<!-- <option>January</option>
                                                    <option>...</option>
                                                    <option>December</option> -->
												</select>
											</div>

										</div>
									</div>
								</div>

								<div class="control-group">
									<label for="sr_pk_reading" class="control-label">CL SR READING :</label>
									<div class="controls">
										<input type="text" class="input-block-level" title="Fill Customer Name" name="CL_SR_READING" id="CL_SR_READING" value="<?php echo $cl_sr_reading; ?>" onkeydown="focusNext(event)" onkeypress="myFunc1()">
									</div>
								</div>

								<div class="control-group">
									<label for="sr_pk_reading" class="control-label">CL PK READING :</label>
									<div class="controls">
										<input type="text" class="input-block-level" title="Fill Customer Name" name="CL_PK_READING" id="CL_PK_READING" value="<?php echo $cl_pk_reading; ?>" onkeydown="focusNext(event)" >
									</div>
								</div>

								<div class="control-group">
									<label for="off_pk_reading" class="control-label">CL OFF PK READING :</label>
									<div class="controls">
										<input type="text" class="input-block-level" title="Fill Customer Name" name="CL_OFF_PK_READING" id="CL_OFF_PK_READING" value="<?php echo $cl_off_pk_reading; ?>" onkeydown="focusNext(event)" onkeypress="myFunc2()">
									</div>
								</div>


								<div class="form-actions">
									<!-- <button type="submit" class="btn btn-primary float-right" name="submit" id="submit">New</button> -->



									<?php
									if ($update == true) :
									?>
										<button type="submit" class="btn btn-warning float-right" name="update" id="update">Update</button>

									<?php else : ?>
										<button type="submit" class="btn btn-primary float-right" name="submit" id="submit" onkeydown="focusNext(event)">Save</button>
									<?php endif; ?>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

				<div class="row m-0">

					<div class="span12">

						<table class="table table-striped  table-responsive-md">

							<thead>
								<tr>
									<th>Customer Number</th>
									<!-- <th>CUST_CHK_DIGIT</th> -->
									<th>Bill Cycle Code</th>
									<th>Reading Date</th>
									<!-- <th>CL_SR_READING</th> -->
									<th>Closing Single Register Reading</th>
									<!-- <th>CL_PK_READING</th> -->
									<th>Closing Pick Reading</th>
									<!-- <th>CL_OFF_PK_READING</th> -->
									<th>Closing Off Pick Reading</th>
									<th>Status</th>
								</tr>
							</thead>

							<tbody>
								<?php

								include 'Connection.php';

								set_time_limit(1000);

								// execute query starts
								$curs = oci_new_cursor($conn);
								$stid = oci_parse($conn, "begin PCC.PCC_CUSTOMER_DTL.PCC_CUSTOMER_WISE(:cur_data); end;");
								oci_bind_by_name($stid, ":cur_data", $curs, -1, OCI_B_CURSOR);
								// oci_bind_by_name($stid, ":P_BILL_CYCLE_CODE", $P_BILL_CYCLE_CODE, -1, SQLT_CHR);
								// oci_bind_by_name($stid, ":P_ZONE_CODE", $P_ZONE_CODE, -1, SQLT_CHR);
								oci_execute($stid);
								oci_execute($curs);
								// execute query ends

								// store fetch data in variable array starts 
								while (($row = oci_fetch_array($curs, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
									$output[] = $row;
								}




								for ($i = 0; $i < count($output); $i++) {
									echo "<tr>";
									echo "<td>" . $output[$i]['CUSTOMER_NUM'] . $output[$i]['CUST_CHK_DIGIT'] . "</td>";
									// echo "<td>". $output[$i]['CUST_CHK_DIGIT'] ."</td>";
									$pk = $output[$i]['CUSTOMER_NUM'] . $output[$i]['CUST_CHK_DIGIT'];
									echo "<td>" . $output[$i]['BILL_CYCLE_CODE'] . "</td>";
									$bill = $output[$i]['BILL_CYCLE_CODE'];
									echo "<td>" . $output[$i]['READING_DATE'] . "</td>";
									echo "<td>" . $output[$i]['CL_SR_READING'] . "</td>";
									echo "<td>" . $output[$i]['CL_PK_READING'] . "</td>";
									echo "<td>" . $output[$i]['CL_OFF_PK_READING'] . "</td>";
									$status = $output[$i]['REC_STATUS'];
									echo "<td>";
									switch ($status) {
										case "N":
											echo "<a href='prepaid_cust_entry.php?new=$pk&bill=$bill ' class='btn   m-0 tbl_btn'>New</a>";
											// echo "<button type='button' class='btn   m-0 tbl_btn' name='add' id='add'>New</button>";
											break;
										case "B":
											echo "<button type='button' class='btn   m-0 tbl_btn' disabled
																					style='background:#ccc;'>Being Processing</button>";
											break;
										case "P":
											echo "<button type='button' class='btn   m-0 tbl_btn' disabled
																					style='background:#ccc;'>Processed</button>";
											break;
										default:
											echo "<button type='button' class='btn   m-0 tbl_btn'>New</button>";
									}

									echo "</td>";

									echo "</tr>";
								}









								oci_free_statement($stid);
								oci_free_statement($curs);
								oci_close($conn);
								?>
							</tbody>

						</table>


					</div>
				</div>

			</div>
			<!-- page content ends  -->


		</div>

	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>


	
	<script>

		var idArray = ["CUSTOMER_NUM",  "CL_SR_READING", "CL_PK_READING", "CL_OFF_PK_READING"];
		var idA = ["submit", "update"];

		function myFunc1(){
		document.getElementById('CL_PK_READING').readOnly = true;
		document.getElementById('CL_OFF_PK_READING').readOnly = true;
		
	}

	function myFunc2(){
		document.getElementById('CL_SR_READING').readOnly = true;
	}

					
					


		function focusNext(e){
        try{
            for(var i=0; i<idArray.length; i++){

				if(e.keyCode === 13 && e.target.id === idA[0] ){
					document.getElementById("submit").click();
				}

				if(e.keyCode === 13 && e.target.id === idA[1]){
					document.getElementById("update").click();
				}



                if(e.keyCode === 13 && e.target.id === idArray[i]){
                    
                    
					if(e.target.id === idArray[0] || e.target.id === idArray[1] || e.target.id === idArray[2] || e.target.id === idArray[3]){
						document.querySelector(`#${idArray[i+1]}`).focus();
						
						e.preventDefault();
					}
					
                }
            }
        }catch(error){

        }

    }



	</script>


<script>


	
</script>




</body>

</html>
