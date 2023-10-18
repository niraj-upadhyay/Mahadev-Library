


<?php

session_start();

@include 'conection.php';

if(isset($_POST['sinup'])){

  $text = $_POST["satya"];
  $select="SELECT * FROM `scroll`";
  $result=mysqli_query($conn,$select);
  $number=mysqli_num_rows($result);
  if($number>0)
  {
    $sql="UPDATE `scroll` SET `text` = '$text'";
  }
  else
  {
    $sql="INSERT INTO `scroll` (`text`) VALUES ('$text')";
  }  
  $result=mysqli_query($conn,$sql);

  if($result){

    $_SESSION['status']= "Upadated sucessfully";

    $_SESSION['status_code']= "success";


    echo "
    <script> 
        window.location.href='dashboard.php';
    </script>
    ";


  }
  else
  {

    $_SESSION['status']= " Data not Upadated";

    $_SESSION['status_code']= "error";

    echo "
    <script> 
        window.location.href='scrolling.php';
    </script>
    ";


  }





}

  ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap v5.1.3 CDNs -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--Css -->
    <link rel="stylesheet" href="../css/header.css">



</head>

<body>

<div class="tulika">
        <?php @include 'adminheader.php';?>
</div>
    




  <div class="pt-5 mt-4">
    <div class="bardbox d-flex justify-content-center" style="background-color: #d3e9f9; height:100vh;">
      <div class="card my-auto shadow login-card" style="width: 400px;">
        <div class="card-header text-center  text-white" style="background-color: #A41034;">
          <h2>Scrolling Text</h2>
        </div>

        <form action="" method="POST">
          <div class="card-body">

            <div class="form-group">
              <label for="email">Enter the upcoming offer</label>
              <input type="text" id="email" class="form-control" name="satya" style="height: 40px;" required>

            </div>
            <br>

            <button name="sinup" class="btn btn-sm w-100  text-white "
              style="background-color: #A41034; height:45px;">Enter</button>

              <!-- <button type="submit" class="btn btn-primary" name="sinup">Submit</button> -->


          </div>
        </form>


        <div class="card-footer text-end">
          <small>© Mahadev Library</small>
        </div>
      </div>
    </div>
    </div>
      <!--Footer  -->
    <div class="ft">
        <?php @include 'footer.php';?>
    </div>




</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <!-- Sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>