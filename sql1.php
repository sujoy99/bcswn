<?php 

    include "Connection.php";

    $sql = "SELECT COUNT( DISTINCT EMSS_PAGE_1_DATE) AS C FROM EMSS_PAGE_1";


    $parseresult=ociparse($conn,$sql);
oci_execute($parseresult);

while($row=oci_fetch_assoc($parseresult)){

    $output[]=$row;
}


oci_free_statement($parseresult);
$sql = array();

$sql[0] = "SELECT MAX(EMSS_PAGE_1_DATE) AS D FROM EMSS_PAGE_1";


for($i=0;$i<$output[0]["C"]; $i++){


    $sql[$i+1] = "SELECT MAX(EMSS_PAGE_1_DATE) AS D FROM EMSS_PAGE_1 WHERE EMSS_PAGE_1_DATE < ( ". $sql[$i]." )";

    
    $parseresult1=ociparse($conn,$sql[$i+1]);
    oci_execute($parseresult1);

    while($row=oci_fetch_assoc($parseresult1)){

        $output1[]=$row;
        // var_dump($output1);
    }
    var_dump($output1);
    oci_free_statement($parseresult1);




}
// var_dump($output1[3]);
// var_dump(count($sql));
// var_dump($output1);


for($i=0; $i<count($sql)-1; $i++){


    $n = "SELECT  EMSS_PAGE_1.EMSS_PAGE_1_DATE, EMSS_PAGE_1.EMSS_PAGE_1_PIC,EMSS_MENU.EMSS_MENU_NAME, EMSS_SUB_MENU.EMSS_SUB_MENU_NAME FROM EMSS_PAGE_1, EMSS_MENU, EMSS_SUB_MENU  WHERE EMSS_PAGE_1_DATE IN (". $sql[$i] .") AND EMSS_PAGE_1.EMSS_MENU_ID=EMSS_MENU.EMSS_MENU_ID AND EMSS_PAGE_1.EMSS_SUB_MENU_SUB_ID = EMSS_SUB_MENU.EMSS_SUB_MENU_SUB_ID ORDER BY EMSS_PAGE_1_DATE DESC";

    $parseresult2=ociparse($conn,$n);
    oci_execute($parseresult2);

    while($row=oci_fetch_assoc($parseresult2)){

        $output2[]=$row;
        // var_dump($output2);
    }
    oci_free_statement($parseresult2);
}


oci_close($conn);



?>
