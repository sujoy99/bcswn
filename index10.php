<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>BPDB</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow-x: hidden;
            /* background-color: green; */
            background: url('./image/bg.jpg');
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* min-height: 100%;
            
            display: flex;

            flex-direction: column; */
        }

        .box {
            /* display: flex;
            flex-flow: column; */
            /* height: 100vh; */
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login {
            height: 500px;
            width: 300px;
            /* background-color: yellowgreen; */
        }

        .box1 {
            width: 300px;
            height: 400px;
            padding: 40px;
            /* position: absolute; */
            /* top: 50%; */
            /* left: 50%; */
            /* transform: translate(-50%, -50%); */
            background: #192a56;
            text-align: center;
            
        }

        .box1 input[type="text"],
        .box1 input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #718093;
            padding: 10px 6px;
            /* padding: 14px 10px; */
            width: 160px;
            /* width: 200px; */
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;


        }

        .box1 input[type="text"]:focus,
        .box1 input[type="password"]:focus {
            width: 200px;
            /* width: 230px; */
            border-color: #e84118;
        }

        .box1 input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #e84118;
            padding: 10px 30px;
            /* padding: 14px 40px; */
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
        }

        .box1 input[type="submit"]:hover {
            background: #e84118;
        }

        /* html{

          height:100%;
        } */


        footer{

              position: fixed;
              bottom: 0;
              width: 100vw;

        }
    </style>
</head>

<body>

    <div class="content" style="height: 100vh!important">

        <div class="container-fluid ">
            <div class="row " style="height: 20%!important; margin-bottom: 20px;">
                <p style="color: #fff; font-size: 50px; margin:0 auto;"><b> বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড</b></p>
            </div>

            <div class="row" style="height: 70%!important; ">
                
                <form action="" method="post" class="box1" style="margin: 0 auto;">
                    <img src='./image/Logo.png' alt='BPDB Logo' height='80px' width='80px'>

                    <input type="text" name="p_User_Id" placeholder="Username">
                    <input type="password" name="p_User_Pass" placeholder="Password">
                    <input type="submit" id="submit" name="submit" value="Login">
                </form>
                

            </div>

            <div class="row " >
                <p style="color: #fff; font-size: 40px; margin:0 auto;">Powered By <b>  IT Bangla Ltd.</b></p>
            </div>

            <!-- <div class="row " style="height: 10%!important; margin-bottom: 20px; position:absolute; bottom:0; text-align:center;" >
                <p style="color: #fff; font-size: 50px; margin:0 auto;"><b>/b></p>
            </div> -->






        </div>

    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
