<?php 
 @include 'conection.php';

 session_start();

 if(isset($_POST['submit']))
 {
    $admin = $_POST['admin'];
    $new_password = $_POST['newpass'];
    $con_password = $_POST['cfpass'];

    // $email =  $_SESSION['Email'];


    if($new_password == $con_password)
    {
        $update = " UPDATE `admin_login` SET `Admin_Name`='$admin', `Admin_password`='$new_password' ";
        $result = mysqli_query($conn,$update);
        if($result){

          $_SESSION['status']= "password updated sucessfully";
          $_SESSION['status_code']= "success";
      
          echo "
          <script> 
              window.location.href='dashboard.php';
          </script>
          ";
          

        }

    }
    else
    {
      

    $_SESSION['status']= " Password Not Upadated";
    $_SESSION['status_code']= "error";

    echo "
    <script> 
        window.location.href='dashboard.php';
    </script>
    ";
       

    }
 }

?>








<!-- Admin password -->



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--Css -->
    <link rel="stylesheet" href="../css/header.css">




</head>

<body style="background-color: #d3e9f9;">

    <!-- header -->

    <div class="tulika">
        <?php @include 'adminheader.php';?>
    </div>



    <div class="mt-4 pt-5">
        <div class="mt-4 pt-5">
            <div class="bardbox d-flex justify-content-center">
                <div class="card my-auto shadow login-card" style="width: 400px;">
                    <div class="card-header text-center  text-white" style="background-color: #A41034;">
                        <h2>New Password</h2>
                    </div>

                    <form action="" method="POST">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="email">Enter the Admin Name</label>
                                <input type="text" id="email" class="form-control" value="" name="admin"
                                    style="height: 40px;" required>
                            </div>

                            <div class="form-group">
                                <label for="email2">Enter the New password</label>
                                <input type="text" id="email2" class="form-control" value="" name="newpass"
                                    style="height: 40px;" required>
                            </div>

                            <div class="form-group">
                                <label for="email4">Enter the conform password</label>
                                <input type="text" id="email4" class="form-control" value="" name="cfpass"
                                    style="height: 40px;" required>
                            </div>




                            <br>

                            <button name="submit" class="btn btn-sm w-100  text-white "
                                style="background-color: #A41034; height:45px;">Submit</button>



                        </div>
                    </form>


                    <div class="card-footer text-end">
                        <small>© Mahadev Library</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <div class="mt-4 pt-4">
        <div class="mt-2 pt-2">
            <?php @include 'footer.php';?>
        </div>
    </div>







</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>




</html>