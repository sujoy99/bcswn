<?php 

    include "Connection.php";



    $sql = "SELECT BCSWN_USER.NAME, BCSWN_USER.DOB, (SELECT BCSWN_BLOOD.BLOOD_NAME FROM BCSWN_BLOOD WHERE BCSWN_USER.BLOOD = BCSWN_BLOOD.BLOOD_ID ) AS BLOOD, BCSWN_USER.MOBILE, BCSWN_USER.EMAIL, BCSWN_USER.SKILL, (SELECT BCSWN_INTEREST.INTEREST_NAME FROM BCSWN_INTEREST WHERE BCSWN_USER.INTEREST=BCSWN_INTEREST.INTEREST_ID) AS INTEREST, BCSWN_USER.DESIGNATION, BCSWN_USER.POSTING, (SELECT BCSWN_CADRE.CADRE_NAME FROM BCSWN_CADRE WHERE BCSWN_USER.CADRE=BCSWN_CADRE.CADRE_ID ) AS CADRE, (SELECT BCSWN_BATCH.BATCH_NAME FROM BCSWN_BATCH WHERE BCSWN_USER.BATCH=BCSWN_BATCH.BATCH_ID ) AS BATCH, BCSWN_USER.MEMBERSHIP, BCSWN_USER.HONOR, BCSWN_USER.ARTICLE, BCSWN_USER.MARRIGE, BCSWN_USER.PICTURE, BCSWN_USER.SIGNATURE, BCSWN_USER.SSC_EXAM, BCSWN_USER.SSC_BOARD, BCSWN_USER.SSC_ROLL, BCSWN_USER.SSC_RESULT, BCSWN_USER.SSC_GROUP, BCSWN_USER.SSC_PASSING, BCSWN_USER.HSC_EXAM, BCSWN_USER.HSC_BOARD, BCSWN_USER.HSC_ROLL, BCSWN_USER.HSC_RESULT, BCSWN_USER.HSC_GROUP, BCSWN_USER.HSC_PASSING, BCSWN_USER.O_ADDRESS,(SELECT BCSWN_DIVISIONS.DIVISION_NAME FROM BCSWN_DIVISIONS WHERE BCSWN_USER.O_DIVISION=BCSWN_DIVISIONS.DIVISION_ID) AS O_DIV, (SELECT BCSWN_DISTRICTS.DISTRICT_NAME FROM BCSWN_DISTRICTS WHERE BCSWN_USER.O_DISTRICTS=BCSWN_DISTRICTS.DISTRICT_ID) AS O_DIST, (SELECT BCSWN_UPAZILLA.UPAZILLA_NAME FROM BCSWN_UPAZILLA WHERE BCSWN_USER.O_UPAZILLA=BCSWN_UPAZILLA.UPAZILLA_ID) AS O_UP, BCSWN_USER.R_ADDRESS, (SELECT BCSWN_DIVISIONS.DIVISION_NAME FROM BCSWN_DIVISIONS WHERE BCSWN_USER.R_DIVISION=BCSWN_DIVISIONS.DIVISION_ID) AS R_DIV, (SELECT BCSWN_DISTRICTS.DISTRICT_NAME FROM BCSWN_DISTRICTS WHERE BCSWN_USER.R_DISTRICTS=BCSWN_DISTRICTS.DISTRICT_ID) AS R_DIST, (SELECT BCSWN_UPAZILLA.UPAZILLA_NAME FROM BCSWN_UPAZILLA WHERE BCSWN_USER.R_UPAZILLA=BCSWN_UPAZILLA.UPAZILLA_ID) AS R_UP, BCSWN_USER.P_ADDRESS, (SELECT BCSWN_DIVISIONS.DIVISION_NAME FROM BCSWN_DIVISIONS WHERE BCSWN_USER.P_DIVISION=BCSWN_DIVISIONS.DIVISION_ID) AS P_DIV, (SELECT BCSWN_DISTRICTS.DISTRICT_NAME FROM BCSWN_DISTRICTS WHERE BCSWN_USER.P_DISTRICTS=BCSWN_DISTRICTS.DISTRICT_ID) AS P_DIST, (SELECT BCSWN_UPAZILLA.UPAZILLA_NAME FROM BCSWN_UPAZILLA WHERE BCSWN_USER.P_UPAZILLA=BCSWN_UPAZILLA.UPAZILLA_ID) AS P_UP, BCSWN_USER.CHILD_BOY, BCSWN_USER.CHILD_GIRL, (SELECT BCSWN_DEGREE.DEGREE_NAME FROM BCSWN_DEGREE WHERE BCSWN_USER.GRAD_EXAM=BCSWN_DEGREE.DEGREE_ID ) AS GRAD_EXAM, (SELECT BCSWN_SUBJECT.SUBJECT_NAME FROM BCSWN_SUBJECT WHERE BCSWN_USER.GRAD_SUBJECT=BCSWN_SUBJECT.SUBJECT_ID ) AS GRAD_SUB, BCSWN_USER.GRAD_UNIVERSITY, BCSWN_USER.GRAD_RESULT, BCSWN_USER.GRAD_PASSING, BCSWN_USER.GRAD_DURATION, (SELECT BCSWN_DEGREE.DEGREE_NAME FROM BCSWN_DEGREE WHERE BCSWN_USER.MST_EXAM=BCSWN_DEGREE.DEGREE_ID ) AS MST_EXAM, (SELECT BCSWN_SUBJECT.SUBJECT_NAME FROM BCSWN_SUBJECT WHERE BCSWN_USER.MST_SUBJECT=BCSWN_SUBJECT.SUBJECT_ID ) AS MST_SUB, BCSWN_USER.MST_UNIVERSITY, BCSWN_USER.MST_RESULT, BCSWN_USER.MST_PASSING, BCSWN_USER.MST_DURATION FROM BCSWN_USER WHERE ID=134";

    $parseresult = ociparse($conn, $sql);

    oci_execute($parseresult);

    while($row = oci_fetch_assoc($parseresult)){
        $output[] = $row;
    }

    var_dump($output);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $output[0]["R_DIST"]?></h1>
</body>
</html>
