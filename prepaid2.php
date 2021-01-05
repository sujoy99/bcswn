<?php 




    if(isset($_POST['submit'])){
        $CUSTOMER_NUM = $_POST['CUSTOMER_NUM'];
        $CL_SR_READING = $_POST['CL_SR_READING'];
	$CL_PK_READING = $_POST['CL_PK_READING'];
    $CL_OFF_PK_READING = $_POST['CL_OFF_PK_READING'];
    
    echo $CUSTOMER_NUM;
    echo "<br>";
    echo $CL_SR_READING;
    echo "<br>";
    echo $CL_PK_READING;
    echo "<br>";
    echo $CL_OFF_PK_READING;
    echo "<br>";
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

    <title>Hello, world!</title>
</head>

<body>

    <div class="container">

        <form class="form-horizontal span6" action="" method="post">
            <fieldset>
    
                <legend>Customer Entry</legend>
    
                <div class="control-group">
                    <label for="cust_num" class="control-label">Customer Number :</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" pattern="[0-9]{8}" maxlength="8"
                            title="Fill Customer Number" required name="CUSTOMER_NUM" id="CUSTOMER_NUM"
                            onkeydown="focusNext(event)">
                    </div>
                </div>
    
    
    
                <!-- <div class="control-group">
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
                                                    
                                                    </select>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div> -->
    
                <div class="control-group">
                    <label for="sr_pk_reading" class="control-label">CL SR READING :</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" title="Fill Customer Name" name="CL_SR_READING"
                            id="CL_SR_READING" onkeydown="focusNext(event)" onkeypress="myFunc1()">
                    </div>
                </div>
    
                <div class="control-group">
                    <label for="sr_pk_reading" class="control-label">CL PK READING :</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" title="Fill Customer Name" name="CL_PK_READING"
                            id="CL_PK_READING" onkeydown="focusNext(event)" onkeypress="myFunc2()">
                    </div>
                </div>
    
                <div class="control-group">
                    <label for="off_pk_reading" class="control-label">CL OFF PK READING :</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" title="Fill Customer Name" name="CL_OFF_PK_READING"
                            id="CL_OFF_PK_READING" onkeydown="focusNext(event)" onkeypress="myFunc2()">
                    </div>
                </div>
    
    
                <div class="form-actions">
                    <!-- <button type="submit" class="btn btn-primary float-right" name="submit" id="submit">New</button> -->
    
    
    
                    <?php
                                        if ($update == true) :
                                        ?>
                    <button type="submit" class="btn btn-warning float-right" name="update" id="update">Update</button>
    
                    <?php else : ?>
                    <button type="submit" class="btn btn-primary float-right" name="submit" id="submit"
                        onkeydown="focusNext(event)">Save</button>
                    <?php endif; ?>
                </div>
            </fieldset>
        </form>
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





    <script>
    var idArray = ["CUSTOMER_NUM", "CL_SR_READING", "CL_PK_READING", "CL_OFF_PK_READING"];
    var idA = ["submit", "update"];



    function myFunc1() {
        // console.log("test");
        console.log(document.getElementById("CL_SR_READING").value);
        console.log(document.getElementById('CL_PK_READING').readOnly);
        if (document.getElementById("CL_SR_READING").value) {

            document.getElementById('CL_PK_READING').readOnly = true;
            document.getElementById('CL_OFF_PK_READING').readOnly = true;
        }

    }

    function myFunc2() {
        if(document.getElementById('CL_PK_READING').value || document.getElementById('CL_OFF_PK_READING').value){

        document.getElementById('CL_SR_READING').readOnly = true;
        }
    }

    function focusNext(e) {

        console.log(e.target.id);
        for (var i = 0; i < idArray.length; i++) {
            if (e.keyCode === 13 && e.target.id === idA[0]) {
                document.getElementById("submit").click();
            }

            if (e.keyCode === 13 && e.target.id === idA[1]) {
                document.getElementById("update").click();
            }

            if (e.keyCode === 13 && e.target.id == idArray[i]) {
                // console.log(e.keyCode);
                // console.log("try");
                // e.preventDefault();

                if (e.target.id === idArray[0] || e.target.id === idArray[1] || e.target.id === idArray[2] || e.target
                    .id === idArray[3]) {
                    console.log("o");
                    document.querySelector(`#${idArray[i+1]}`).focus();

                    e.preventDefault();
                }

            }
        }
    }
    </script>


</body>

</html>
