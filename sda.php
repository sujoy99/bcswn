<?php 

include "Connection.php";


///////////////////////////////////////////////////////////////////////
$sql = "select pay_date n from (select distinct pay_date from da_payment_mst order by pay_date desc)   where rownum=1";


$parseresults = ociparse($conn, $sql);
oci_execute($parseresults);

while($row = oci_fetch_assoc($parseresults)){

    $current_date = $row["N"];
}

oci_free_statement($parseresults);


echo "Last Date in database :";
echo $current_date;
echo "<br>";
/////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
$sql1 = "SELECT LAST_DAY(ADD_MONTHS(TO_DATE('". $current_date. "'),-1)) N from dual";


$parseresults = ociparse($conn, $sql1);
oci_execute($parseresults);

while($row = oci_fetch_assoc($parseresults)){

    $last_date = $row["N"];
}

oci_free_statement($parseresults);


echo "Last date of previous month from last database date :";
echo $last_date;
echo "<br>";



////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////////////

$sql2 = "  select dt 
from
(select  (TRUNC (last_day(TO_DATE('". $last_date ."')) - ROWNUM) + 1) dt from dual connect by rownum<32) order by dt asc";


// print_r($sql2);
// $sql2 = ""


$parseresults = ociparse($conn, $sql2);
oci_execute($parseresults);

while($row = oci_fetch_assoc($parseresults)){

    $month_date[] = $row;
}

oci_free_statement($parseresults);


// echo "Previous Month Days :"."<br>";
// var_dump($month_date);

// echo count($month_date);

// for($i=0; $i<count($month_date); $i++){
//     echo $month_date[$i]["DT"]."<br>";
// }

///////////////////////////////////////////////////

$sql3 = "select trunc(to_date('". $last_date ."'), 'MM') N from dual";

// print_r($sql3);


$parseresults = ociparse($conn, $sql3);
oci_execute($parseresults);

while($row = oci_fetch_assoc($parseresults)){

    $first_date = $row["N"];
}

oci_free_statement($parseresults);

echo "First Date of previous Month :".$first_date."<br>";


$next = $first_date;


// $sql4 = "SELECT TO_DATE('". $next. "' ) + 1 tomorrow FROM DUAL";

// // print_r($sql4);

// $parseresults = ociparse($conn, $sql4);
// oci_execute($parseresults);

// while($row = oci_fetch_assoc($parseresults)){

//     $NEXT_date = $row["TOMORROW"];
// }


// oci_free_statement($parseresults);
// $next = $NEXT_date;

// echo "Next Date :". $NEXT_date;

// if($first_date == $first_date){
//     echo "OK";
// }



$next = $first_date;

do {

    $sql4 = "SELECT TO_DATE('". $next. "' ) + 1 tomorrow FROM DUAL";

    $parseresults = ociparse($conn, $sql4);
oci_execute($parseresults);

while($row = oci_fetch_assoc($parseresults)){

    $NEXT_date = $row["TOMORROW"];
}

oci_free_statement($parseresults);


$next = $NEXT_date;
echo "Next Date :". $next. "<br>";

if($next == $last_date){
break;
}
    
  } while ($next <= $last_date);






?>
