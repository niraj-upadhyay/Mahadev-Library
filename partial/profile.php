<!-- Insert detail -->

<?php  @include 'conection.php';

session_start();

?>



<?php 

if(isset($_POST['sinup']) && isset($_FILES['my_image'])){

// if(isset($_POST['sinup'])){
    
    $email= $_SESSION['email'];

    // $username = $_POST["username"];

    $user = $_POST['username'];
    $phone = $_POST["phone"];
    $pin = $_POST["pin"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $picture2=explode("@",$email);
    $picture=$picture2[0];

    // echo "<pre>";
	// print_r($_FILES['my_image']);
	// echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
    $result=0;
	if ($error === 0) {
		// if ($img_size > 125000) {
		// 	$em = "Sorry, your file is too large.";
        //     echo "Hello JI";		   
		// }
        // else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 
        


			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = str_replace(" "," ",$picture).'.'.$img_ex_lc;
				$img_upload_path = '../Niraj/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                $update = " UPDATE `user_registration` SET `username`='$user' , `phone`='$phone' , `pin`='$pin' , `city`='$city', `state`='$state',`image`= '$new_img_name'  WHERE `email`='$email'";
                $result = mysqli_query($conn, $update);
                
			}else {
				$em = "You can't upload files of this type";
		        
			}
		// }
	}
    else 
    {
		$em = "unknown error occurred!";
		
	}    
    
    if($result)
    {
        // echo "Sucessfull";
        $message[] = 'Updated Successfully';
    }
    else
    {
        // echo "Not sucessfull";
        $message[] = 'Not Updated Sucessfully';
    }
        
}

?>







<!-- Fetch detail -->

<?php 
if(isset($_SESSION['loggedin']))
{
    
  $email= $_SESSION['email'];
  
  $sql="SELECT * FROM `user_registration` WHERE `email`='$email'";
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

    <div class="niraj">
        <?php @include 'userheader1.php';?>
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
                                            onclick="location.href='../index.php'">Home</button>

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
                                onclick="location.href='../index.php'">Back</button>
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

<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="profileModalLabel">Your Address </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <!-- <form action="" method="POST"> -->
                <form action="" method="POST" enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for="name" class="form-label"> Name</label>
                        <input type="text" value="<?php echo $usernam ?>" class="form-control" id="name"
                            name="username">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Phone No</label>
                        <input type="text" value="<?php echo $phone ?>" class="form-control" id="email" name="phone"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Pin code </label>
                        <input type="text" value="<?php echo $pin ?>" class="form-control" id="password" name="pin"
                            required>
                    </div>


                    <div class="mb-3">
                        <label for="cfpassword" class="form-label">City</label>
                        <input type="text" value="<?php echo $city ?>" class="form-control" id="cfpassword" name="city"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">State</label>
                        <input type="text" value="<?php echo $state ?>" class="form-control" id="pass" name="state"
                            required>
                    </div>

                    <div class="mb-3">

                        <label for="Input" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" name="my_image" id="Input">

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="sinup">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>