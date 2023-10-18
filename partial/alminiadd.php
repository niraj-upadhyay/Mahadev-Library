<?php  @include 'conection.php';
session_start();
?>


<?php

if(isset($_POST['alumni'])){
   $p_name = $_POST['name'];
   $job = $_POST['jobg'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = '../images/'.$p_image;

   $sql="INSERT INTO `alumni`( `name`, `job`, `image` ) VALUES ('$p_name','$job','$p_image')";
   $result = mysqli_query($conn, $sql);
   move_uploaded_file($p_image_tmp_name, $p_image_folder);


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
    </script>s
    ";

   }
};

?>


<!-- Alumni Add Form -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Alumni</title>


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
                        <h2>Add Alumni</h2>
                    </div>

                    <form action="" method="POST" class="add-product-form" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="email">Enter the student Name</label>
                                <input type="text" id="email" class="form-control" value="" name="name"
                                    style="height: 40px;" required>
                            </div>

                            <div class="form-group">
                                <label for="email2">Enter the Job Name</label>
                                <input type="text" id="email2" class="form-control" value="" name="jobg"
                                    style="height: 40px;" required>
                            </div>


                            <div class="mt-2">
                                <label for="email4">profile picture</label>
                                <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg"
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