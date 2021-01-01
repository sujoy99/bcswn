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
				height: 105%;
			}
			.logo{
				height: 5%;
			}
		</style>
    <title>বিসিএস উইমেন নেটওয়ার্ক</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">


            <!-- sidebar starts  -->
            <div class="col-2 p-0">

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
            <div class="col-10 p-0">
                <div class="row m-0" style="height:10%!important">
                    <div class="col-lg-12 col-md-12 col-sm-12 bg-dark p-0 "
                        style="display:flex; align-items: center; justify-content:center;">
                        <div class="row">
                            <img src="./image/logo.png" class="mr-4 mt-2" alt="BD Logo" height="60px" width="60px" >
                            <h1 class="text-white text-center d-inline pt-2"><b style="text-shadow: 3px 3px 5px rgba(150, 150, 150, 1); font-size:3.5vw">বিসিএস উইমেন নেটওয়ার্ক</b></h1>
                        </div>
                    </div>
                </div>


                <div class="row col-12 m-0">
                    <!-- form stars 		 -->
                    <form action="" method="POST" enctype="multipart/form-data" class="col-12">

                        <!-- section 1 starts  -->

                        <div class="row container m-2">
                            <div class="col-12">
                                <div class="card " style="width: 95%">
                                    <div class="card-header " style="background-color: #C0C0C0!important;">

                                        <div class="d-flex justify-content-center align-items-center">
                                        <p class="section_part btn btn-link" id="section_1_label"
                                            style="font-size:2vw;">Section 1 : Login Information
                                        </p>
                                        </div>

                                    </div>

                                    <div class="card-body" id="section_1_content">

                                        <div class="row">
                                            <!-- name starts  -->
                                            <div class="form-group col-6 pl-0">
                                                <label class="form-label" for="name">Name <label
                                                        style="color:red; font-weight:bold">*</label> :</label>
                                                <input type="text" name="u_id" id="u_id" value="<?php echo $W_ID; ?>"
                                                    hidden>
                                                <input type="text" name="pass" id="pass"
                                                    value="<?php echo $W_PASSWORD; ?>" hidden>
                                                <input type="text" class="form-control" placeholder="Enter Name"
                                                    name="name" id="name" value="<?php echo  $W_NAME; ?>" required>

                                            </div>
                                            <!-- name ends  -->

                                            <!-- mobile starts  -->
                                            <div class="form-group col-6 pl-0">
                                                <label class="form-label" for="mobile">Mobile <label
                                                        style="color:red; font-weight:bold">*</label> :</label>
                                                <input type="text" maxLength="11" class="form-control" name="mobile"
                                                    id="mobile" value="<?php echo $W_MOBILE; ?>"
                                                    placeholder="Mobile Number" required>
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
                                        <p class="section_part btn btn-link" id="section_2_label"
                                            style="font-size:2vw;">Section 2 : Personal Information
                                        </p>
                                    </div>

                                    </div>

                                    <div class="card-body" id="section_2_content">



                                        <div class="row">

                                            <!-- Birthday starts  -->
                                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                <label class="form-label" for="dob">Date of Birth :</label>
                                                <input type="date" name="dob" id="dob" class="form-control"
                                                    value="<?php echo date('Y-m-d', strtotime($W_DOB)) ?>">
                                            </div>
                                            <!-- Birthday ends  -->

                                            <!-- Blood starts  -->
                                            <div class="form-group col-lg-4 col-md-4 col-sm-12 pl-0">
                                                <label class="form-label" for="dob">Blood Group :</label>
                                                <input type="text" class="form-control" placeholder="Enter Blood Group"
                                                    name="blood" id="blood" value="<?php echo  $W_BLOOD; ?>">
                                            </div>
                                            <!-- Blood ends  -->

                                            <!-- Marital starts  -->
                                            <div class="form-group col-lg-4 col-md-4 col-sm-12 pl-0">
                                                <label class="form-label d-block">Marital Status :</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="marrige" value="married"
                                                        <?php echo ($W_MARRIGE == 'married') ?  "checked" : "";  ?>>Married
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="marrige" value="divorced"
                                                        <?php echo ($W_MARRIGE == 'divorced') ?  "checked" : "";  ?>>Divorced
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="marrige" value="widow"
                                                        <?php echo ($W_MARRIGE == 'widow') ?  "checked" : "";  ?>>Widow
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="marrige" value="single"
                                                        <?php echo ($W_MARRIGE == 'single') ?  "checked" : "";  ?>>Single
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
                                        <p class="section_part btn btn-link" id="section_3_label"
                                            style="font-size:2vw;">Section 3 : My Picture Upload</p>
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
																								if($W_PICTURE != ''){
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

                        <div class="row container m-2">
                            <div class="col-12">
                                <div class="card " style="width: 95%">
                                    <div class="card-header " style="background-color: #C0C0C0!important;">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="section_part btn btn-link" id="section_4_label"
                                            style="font-size:2vw;">Section 4 : Address Information
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
                                                    <label for="office" class="col-sm-2 col-form-label">Office :</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="office"
                                                            id="office" placeholder="Office Address"
                                                            value="<?php echo  $W_OFFICE; ?>">
                                                    </div>
                                                </div>
                                                <!-- office ends  -->

                                                <!-- residence starts  -->
                                                <div class="form-group row">
                                                    <label for="residence" class="col-sm-2 col-form-label">Residence
                                                        :</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="residence"
                                                            id="residence" placeholder="Residence Address"
                                                            value="<?php echo  $W_RESIDENCE; ?>">
                                                    </div>
                                                </div>
                                                <!-- residence ends  -->

                                                <!-- parmanent starts  -->
                                                <div class="form-group row">
                                                    <label for="permanent" class="col-sm-2 col-form-label">Permanent
                                                        :</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="permanent"
                                                            id="permanent" placeholder="Permanent Address"
                                                            value="<?php echo  $W_PERMANENT; ?>">
                                                    </div>
                                                </div>
                                                <!-- parmanent ends  -->
                                            </div>
                                            <div class="col-12">
                                                <h5>Contact Details </h5>
                                                <hr>

                                                <!-- office starts  -->
                                                <div class="form-group row">
                                                    <label for="office_c" class="col-sm-2 col-form-label">Office
                                                        :</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="office_c"
                                                            id="office_c" placeholder="Office Address"
                                                            value="<?php echo  $W_OFFICE_C; ?>">
                                                    </div>
                                                </div>
                                                <!-- office ends  -->

                                                <!-- home starts  -->
                                                <div class="form-group row">
                                                    <label for="home" class="col-sm-2 col-form-label">Home :</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="home" id="home"
                                                            placeholder="Home Address" value="<?php echo  $W_HOME; ?>">
                                                    </div>
                                                </div>
                                                <!-- home ends  -->



                                                <!-- email starts  -->
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control" name="email" id="email"
                                                            placeholder="Email" value="<?php echo  $W_EMAIL; ?>">
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
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="section_part btn btn-link" id="section_5_label"
                                            style="font-size:2vw;">Section 5 : Educational
                                            Qualification & Skills</p>
                                                                                            </div>

                                    </div>
                                    <div class="card-body" id="section_5_content">
                                        <!-- education starts -->
                                        <div class="form-group">
                                            <label class="form-label" for="education">Educational Qualification
                                                :</label>
                                            <input type="text" class="form-control"
                                                placeholder="Educational Qualification" name="education" id="education"
                                                value="<?php echo  $W_EDUCATION; ?>">
                                        </div>
                                        <!-- education ends  -->

                                        <!-- skill starts -->
                                        <div class="form-group">
                                            <label class="form-label" for="skill">Language Skills:</label>
                                            <input type="text" class="form-control" placeholder="Language Skills"
                                                name="skill" id="skill" value="<?php echo  $W_SKILL; ?>">
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
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="section_part btn btn-link" id="section_6_label"
                                            style="font-size:2vw;">Section 6 : Interest & Hobbies</p>
                                                                                            </div>

                                    </div>
                                    <div class="card-body" id="section_6_content">
                                        <!-- interest starts -->
                                        <div class="form-group">
                                            <label class="form-label" for="interest">Interest & Hobbies:</label>
                                            <input type="text" class="form-control" placeholder="Interest & Hobbies"
                                                name="interest" id="interest" value="<?php echo  $W_INTEREST; ?>">
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
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="section_part btn btn-link" id="section_7_label"
                                            style="font-size:2vw;">Section 7 : Proffesional Records
                                        </p>
                                                                                            </div>

                                    </div>
                                    <div class="card-body" id="section_7_content">

                                        <!-- designation starts  -->
                                        <div class="form-group row">
                                            <label for="designation" class="col-sm-2 col-form-label">Designation
                                                :</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="designation"
                                                    id="designation" placeholder="Designation"
                                                    value="<?php echo  $W_DESIGNATION; ?>">
                                            </div>
                                        </div>
                                        <!-- designation ends  -->

                                        <!-- posting starts  -->
                                        <div class="form-group row">
                                            <label for="posting" class="col-sm-2 col-form-label">Place of Posting
                                                :</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="posting" id="posting"
                                                    placeholder="Place of Posting" value="<?php echo  $W_POSTING; ?>">
                                            </div>
                                        </div>
                                        <!-- posting ends  -->


                                        <div class="row">
                                            <!-- Cadre starts  -->
                                            <div class="form-group col-4">
                                                <label class="form-label" for="cadre">Cadre :</label>
                                                <input type="text" class="form-control" placeholder="Cadre" name="cadre"
                                                    id="cadre" value="<?php echo  $W_CADRE; ?>">
                                            </div>
                                            <!-- Cadre ends  -->

                                            <!-- Batch starts  -->
                                            <div class="form-group col-4 pl-0">
                                                <label class="form-label" for="batch">Batch :</label>
                                                <input type="text" class="form-control" placeholder="Batch" name="batch"
                                                    id="batch" value="<?php echo  $W_BATCH; ?>">
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
                                        <p class="section_part btn btn-link" id="section_8_label"
                                            style="font-size:2vw;">Section 8 : Proffesional
                                            Membership</p>
                                                                                            </div>

                                    </div>
                                    <div class="card-body" id="section_8_content">
                                        <!-- membership starts -->
                                        <div class="form-group">
                                            <label class="form-label" for="membership">Proffesional Membership:</label>
                                            <input type="text" class="form-control"
                                                placeholder="Proffesional Membership" name="membership" id="membership"
                                                value="<?php echo  $W_MEMBERSHIP; ?>">
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
                                        <p class="section_part btn btn-link" id="section_9_label"
                                            style="font-size:2vw;">Section 9 : Honors & Awards
                                            Received</p>
                                                                                            </div>

                                    </div>
                                    <div class="card-body" id="section_9_content">
                                        <!-- honor starts -->
                                        <div class="form-group">
                                            <label class="form-label" for="honor">Honors & Awards Received:</label>
                                            <input type="text" class="form-control"
                                                placeholder="Honors & Awards Received" name="honor" id="honor"
                                                value="<?php echo  $W_HONOR; ?>">
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
                                        <p class="section_part btn btn-link" id="section_10_label"
                                            style="font-size:2vw;">Section 10 : Publications &
                                            Articles</p>
                                                                                            </div>

                                    </div>
                                    <div class="card-body" id="section_10_content">
                                        <!-- article starts -->
                                        <div class="form-group">
                                            <label class="form-label" for="article">Publications & Articles:</label>
                                            <input type="text" class="form-control"
                                                placeholder="Publications & Articles" name="article" id="article"
                                                value="<?php echo  $W_ARTICLE; ?>">
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
                                    <div class="d-flex justify-content-center align-items-center">
                                        <p class="section_part btn btn-link" id="section_11_label"
                                            style="font-size:2vw;">Section 11 : Family Information</p>
                                                                                            </div>
                                    </div>
                                    <div class="card-body" id="section_11_content">
                                        <!-- children starts -->
                                        <div class="form-group">
                                            <label class="form-label" for="child">Number Of Children(If Any) :</label>
                                            <input type="number" min="0" class="form-control"
                                                placeholder="Number Of Children" name="child" id="child"
                                                value="<?php echo  $W_CHILD; ?>">
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
                                        <p class="section_part btn btn-link" id="section_12_label"
                                            style="font-size:2vw;">Section 12 : My Signature Upload
                                        </p>
                                                                                            </div>

                                    </div>
                                    <div class="card-body" id="section_12_content">
                                        <!-- signature starts -->


                                        <!-- signature starts -->
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label class="form-label" for="picture">My Picture :</label>
                                                <input type="file" class="form-control" name="signature" id="signature">
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 ">
                                                <img src="<?php echo $W_SIGNATURE; ?>" height="80px" width="240px"
                                                    style="float: right;">
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

                <!-- <div class="row">

    <h1 name="error" id="error" style="color:red;"></h1>
</div> -->


                <button type='submit' class='btn btn-md btn-primary btn-block' name='submit' id='submit'>Submit</button>

            </div>



                        <!-- <div class="container mt-4" >

                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                        </div> -->
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
        $("#section_13_content").hide();

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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
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
            $("#section_13_content").hide(500);
        });

      

        $("#pay").click(function() {
            $("#value").slideToggle();
        })

				$("#profile").addClass("tbl_btn");



    });
    </script>









</body>

</html>