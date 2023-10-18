<?php  @include 'conection.php';
session_start();
?>


<?php

if(isset($_POST['alumni'])){

    $p_name = $_POST['name'];
    $job = $_POST['jobg'];
 

    $p_name1 = $_POST['name1'];
    $job1 = $_POST['jobg1'];

    $p_name2 = $_POST['name2'];
    $job2 = $_POST['jobg2'];




     // First Card
     $p_image = $_FILES['p_image']['name'];
     $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
     $p_image_folder = '../images/' . $p_image;
     
     // Second Card
     $p_image1 = $_FILES['p_image1']['name'];
     $p_image1_tmp_name = $_FILES['p_image1']['tmp_name'];
     $p_image1_folder = '../images/' . $p_image1;
     
     // Third Card
     $p_image2 = $_FILES['p_image2']['name'];
     $p_image2_tmp_name = $_FILES['p_image2']['tmp_name'];
     $p_image2_folder = '../images/' . $p_image2;





   //    Query



   $select="SELECT * FROM `card`";
   $result=mysqli_query($conn,$select); 
   $number=mysqli_num_rows($result);

   if($number>0)
  {
    
    $sql = "UPDATE `card` SET `name`='$p_name',`job`='$job',`image`='$p_image',`name1`='$p_name1',`job1`='$job1',`image1`='$p_image1',`name2`='$p_name2',`job2`='$job2',`image2`='$p_image2'";
    
  }
  else
  {

   $sql="INSERT INTO `card`( `name`, `job`, `image`, `name1`, `job1`, `image1`, `name2`, `job2`, `image2`) VALUES ('$p_name','$job','$p_image','$p_name1','$job1','$p_image1','$p_name2','$job2','$p_image2')";

  }  

  $result=mysqli_query($conn,$sql);

//   move_uploaded_file($p_image_tmp_name, $p_image_folder);
    move_uploaded_file($p_image_tmp_name, $p_image_folder);
    move_uploaded_file($p_image1_tmp_name, $p_image1_folder);
    move_uploaded_file($p_image2_tmp_name, $p_image2_folder);






   if($result){

    $_SESSION['status']= "Alumni Inserted sucessfully";
    $_SESSION['status_code']= "success";

    echo "
    <script> 
        window.location.href='dashboard.php';
    </script>
    ";
  

   }else{

    $_SESSION['status']= " Data not Upadated";
    $_SESSION['status_code']= "error";

    echo "
    <script> 
        window.location.href='alminiadd.php';
    </script>
    ";

    

   }
};

?>


<?php 


  $sql="SELECT * FROM `card`";
  $find=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($find);
  
  if($num>0)
  {

    while($row = mysqli_fetch_assoc($find)){

        $name = $row["name"];
        $job = $row["job"];
        $image = $row["image"];
        $name1 = $row["name1"];
        $job1 = $row["job1"];
        $image1 = $row["image1"];
        $name2 =  $row["name2"];
        $job2 =  $row["job2"];
        $image2 = $row["image"];
        
    }

  }

?>














<!-- Alumni Add Form -->

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


    <div class="tulika">
        <?php @include 'adminheader.php';?>
    </div>




    <div class="mt-2 pt-4">
        <div class="mt-5 pt-5">
            <div class="bardbox d-flex justify-content-center">
                <div class="card my-auto shadow login-card" style="width: 400px;">
                    <div class="card-header text-center  text-white" style="background-color: #A41034;">
                        <h2>Front Alumni</h2>
                    </div>

                    <form action="" method="POST" class="add-product-form" enctype="multipart/form-data">

                         <div class=" text-center mt-2">
                         <h6> First card </h6>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="email">Enter the student Name</label>
                                <input type="text" id="email" class="form-control" value="<?php echo $name ?>" name="name"
                                    style="height: 40px;" required>
                            </div>

                            <div class="form-group">
                                <label for="email2">Enter the Job Name</label>
                                <input type="text" id="email2" class="form-control" value="<?php echo $job ?>" name="jobg"
                                    style="height: 40px;" required>
                            </div>


                            <div class="mt-2">
                                <label for="email4">profile picture</label>
                                <input type="file" name="p_image" value="" accept="image/png, image/jpg, image/jpeg"
                                    class="form-control" required>
                            </div>

                            <hr>

                            <div class=" text-center mt-2">
                            <h6> Second card </h6>
                            </div>

                            <div class="form-group">
                                <label for="name">Enter the student Name</label>
                                <input type="text" id="name" class="form-control" value="<?php echo $name1 ?>" name="name1"
                                    style="height: 40px;" required>
                            </div>

                            <div class="form-group">
                                <label for="name1">Enter the Job Name</label>
                                <input type="text" id="name1" class="form-control" value="<?php echo $job1 ?>" name="jobg1"
                                    style="height: 40px;" required>
                            </div>


                            <div class="mt-2">
                                <label for="image">profile picture</label>
                                <input type="file" id="image" value="" name="p_image1" accept="image/png, image/jpg, image/jpeg"
                                    class="form-control" required>

                            </div>     

                            <hr>

                            <div class=" text-center mt-2">
                            <h6> Third card </h6>
                            </div>

                            <div class="form-group">
                                <label for="enter">Enter the student Name</label>
                                <input type="text" id="enter" class="form-control" value="<?php echo $name2 ?>" name="name2"
                                    style="height: 40px;" required>
                            </div>

                            <div class="form-group">
                                <label for="job1">Enter the Job Name</label>
                                <input type="text" id="job" class="form-control" value="<?php echo $job2 ?>" name="jobg2"
                                    style="height: 40px;" required>
                            </div>


                            <div class="mt-2">
                                <label for="image2">profile picture</label>
                                <input type="file" value="" id="image2" name="p_image2" accept="image/png, image/jpg, image/jpeg"
                                    class="form-control" required>

                            </div>     




                            <br>

                            <button name="alumni" class="btn btn-sm w-100  text-white "
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