<?php 

    include "Connection.php";

    $sql = "select distinct EMSS_PAGE_1_DATE from emss_page_1 order by EMSS_PAGE_1_DATE desc";

    $parseresult = oci_parse($conn, $sql);

    oci_execute($parseresult);


    while($row = oci_fetch_assoc($parseresult)){

        $output[] = $row;
    }

    // var_dump($output);
    // var_dump($output[0]);

    $n = count($output);


    echo "<br>";

    $sql1 = "select * from emss_page_1 where EMSS_PAGE_1_DATE='".$output[0]["EMSS_PAGE_1_DATE"]."'";


    $parseresult1 = oci_parse($conn, $sql1);

    oci_execute($parseresult1);


    while($row = oci_fetch_assoc($parseresult1)){

        $output1[] = $row;
    }

    // var_dump($output1);
    echo "<br>";

    $sql2 = "SELECT EMSS_PAGE_1.EMSS_PAGE_1_DATE, EMSS_MENU.EMSS_MENU_NAME, EMSS_SUB_MENU.EMSS_SUB_MENU_NAME FROM EMSS_PAGE_1,EMSS_MENU, EMSS_SUB_MENU 
    WHERE EMSS_PAGE_1.EMSS_MENU_ID=EMSS_MENU.EMSS_MENU_ID AND EMSS_PAGE_1.EMSS_SUB_MENU_SUB_ID=EMSS_SUB_MENU.EMSS_SUB_MENU_SUB_ID AND EMSS_PAGE_1.EMSS_PAGE_1_DATE='". $output[0]["EMSS_PAGE_1_DATE"] ."'  ORDER BY EMSS_PAGE_1_DATE DESC";

$parseresult2 = oci_parse($conn, $sql2);

oci_execute($parseresult2);


while($row = oci_fetch_assoc($parseresult2)){

    $output2[] = $row;
}

// var_dump($output2);



for($i=0; $i<$n; $i++){
    // echo $i;
    // echo "<br>";
    $output3 = array();

    $sql3 = "SELECT EMSS_PAGE_1.EMSS_PAGE_1_DATE, EMSS_MENU.EMSS_MENU_NAME, EMSS_SUB_MENU.EMSS_SUB_MENU_NAME FROM EMSS_PAGE_1,EMSS_MENU, EMSS_SUB_MENU 
    WHERE EMSS_PAGE_1.EMSS_MENU_ID=EMSS_MENU.EMSS_MENU_ID AND EMSS_PAGE_1.EMSS_SUB_MENU_SUB_ID=EMSS_SUB_MENU.EMSS_SUB_MENU_SUB_ID AND EMSS_PAGE_1.EMSS_PAGE_1_DATE='". $output[$i]["EMSS_PAGE_1_DATE"] ."'  ORDER BY EMSS_PAGE_1_DATE DESC";


    $parseresult3 = oci_parse($conn, $sql3);

    oci_execute($parseresult3);


    while($row = oci_fetch_assoc($parseresult3)){

        $output3[] = $row;
    }

    // var_dump($output3);
    

    echo "<br>";

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



    <?php 


for($i=0; $i<$n; $i++){
    // echo $i;
    // echo "<br>";
    $output3 = array();

    $sql3 = "SELECT EMSS_PAGE_1.EMSS_PAGE_1_DATE, EMSS_MENU.EMSS_MENU_NAME, EMSS_SUB_MENU.EMSS_SUB_MENU_NAME FROM EMSS_PAGE_1,EMSS_MENU, EMSS_SUB_MENU 
    WHERE EMSS_PAGE_1.EMSS_MENU_ID=EMSS_MENU.EMSS_MENU_ID AND EMSS_PAGE_1.EMSS_SUB_MENU_SUB_ID=EMSS_SUB_MENU.EMSS_SUB_MENU_SUB_ID AND EMSS_PAGE_1.EMSS_PAGE_1_DATE='". $output[$i]["EMSS_PAGE_1_DATE"] ."'  ORDER BY EMSS_PAGE_1_DATE DESC";


    $parseresult3 = oci_parse($conn, $sql3);

    oci_execute($parseresult3);


    while($row = oci_fetch_assoc($parseresult3)){

        $output3[] = $row;
    }

    for($j=0; $j<count($output3); $j++){
        echo "<div>'".$output3[$j]["EMSS_PAGE_1_DATE"]."'</div>";
        echo "<div>'".$output3[$j]["EMSS_MENU_NAME"]."'</div>";
    echo "<div>'".$output3[$j]["EMSS_SUB_MENU_NAME"]."'</div>";
    }


    
    

    echo "<br>";

}
    
    

    ?>
</body>
</html>
