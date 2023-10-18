<?php
session_start();

@include 'conection.php';

if(!isset($_SESSION['Adminid']))
{
  echo " 
  <script> 
      window.location.href='../index.php';
  </script>
 " ;
}




?>





<!-- Fetch detail -->

<?php 
$email=$_GET['updateid'];
echo $email;
  
  $sql="SELECT * FROM `user_registration` WHERE `sr`='$email'";
  $find=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($find);
  
  if($num>0)
  {

    while($row = mysqli_fetch_assoc($find)){

        $usernam = $row["username"];
        $phone = $row["phone"];
        $pin = $row["pin"];
        $city = $row["city"];
        $state = $row["state"];
        $email= $row["email"];
        $image = $row["image"];

        // $_SESSION['photo']= $row["image"];
        // $image =  $_SESSION['photo'];
         

    }





  }

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- OWN CSS -->
    <link rel="stylesheet" href="../css/header.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


</head>

<body>

<div class="tulika">
        <?php @include 'adminheader.php';?>
</div>


    <div class="mt-5 pt-3">

        <section style="background-color: gold;">
            <div class="container py-5">
                <div class="row ">
                    <div class="col">



                        <div class="container">


                            <div class="p-2 mt-1 mb-5 bg-info rounded-3 text-white text-center ">
                                <h3>User Profile </h3>

                                <div class="text-danger">

                                    <?php

                                    if(isset($message)){
                                       foreach($message as $message){
                                          echo '
                                          <div class="message">
                                             <span>'.$message.'</span>
                                             <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                                          </div>
                                          ';
                                       }
                                    }
                                    
                                    ?>


                                </div>

                               
                            </div>





                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4 ">
                                <div class="card-body text-center">

                                    <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_registration` WHERE `email`='$email'") ;
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

                                    <?php
         if($image  == NULL){ ?>

                                    <img src="../image/user.jpg" alt="avatar" class="rounded-circle img-fluid"
                                        style="width: 150px;">
                                    <?php
         }else{
            ?>
                                    <img src="../Niraj/<?= $fetch['image'] ?>" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                    <?php echo '<script>"location.href=profile.php"</script>' ?>;
                                    <?php }
         
      ?>


                                    <h5 class="my-3">
                                        <?php echo $usernam ?>
                                    </h5>
                                    <!-- <p class="text-muted mb-1">Full Stack Developer</p>
                                    <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                                    <div class="d-flex justify-content-center mb-2">

                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#profileModal">update</button>
                                        <button type="button" class="btn btn-outline-primary ms-1"
                                            onclick="location.href=''">Home</button>

                                    </div>
                                </div>
                            </div>


                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">

                                    <ul class="list-group list-group-flush rounded-3">


                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i style="color:blue;">
                                                <h4>Date :</h4>
                                            </i>
                                            <p class="mb-0">
                                                <?php date_default_timezone_set('Asia/Kolkata');
                                    echo date("dS F Y , g:iA") ;
                                    ?>
                                            </p>
                                        </li>

                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center p-3">
                                            <i style="color: palevioletred;">
                                                <h4>Fee :</h4>
                                            </i>
                                            <p class="mb-0">

                                            <?php
                                      $sql="SELECT * FROM `fee` WHERE `email`='$email'";
                                      $find=mysqli_query($conn,$sql);
                                      $num=mysqli_num_rows($find);

                                     if($num>0)
                                    {
                                        while($row = mysqli_fetch_assoc($find)){

                                         $status = $row["status"];
    
                                        
                                        }
                                        echo $status;
                                     }

                                     ?>


                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php echo $usernam ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php echo  $email ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">+91
                                                <?php echo  $phone ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Pin Code</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php echo $pin ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">INDIA,
                                                <?php echo $city ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <button type="button" class="btn btn-primary btn-lg"
                                onclick="location.href='fetch.php'">Back</button>
                        </div>

                    </div>
                </div>
        </section>

    </div>

    <!-- footer -->

    <div class="ft">
        <?php @include 'footer.php';?>
    </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>




<!-- Address Form -->

