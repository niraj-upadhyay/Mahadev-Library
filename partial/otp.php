<?php 

@include 'conection.php'; 

session_start();

$otp = $_SESSION['otp'];

if(isset($_POST['submit']))
{
    $submit_otp = $_POST['otp'];

    if($submit_otp == $otp)
    {

        echo "
        <script> 
            window.location.href='newpassword.php';
        </script>
        
        ";

    }
    else
    {

        $message[] = 'your password does not match';
    }
}



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>otp</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="../css/header.css">

  </head>
  <body>


  <div class="mt">

  <div class="niraj">
        <?php @include 'userheader1.php';?>
  </div>

    <div class="bardbox d-flex justify-content-center" style="background-color: #d3e9f9; height:120vh;">
      <div class="card my-auto shadow login-card" style="width: 400px;">
        <div class="card-header text-center  text-white" style="background-color: #A41034;">
          <h2>Otp</h2>

          <?php



$messageg = $_SESSION['messageg'];


if(isset($messageg)){

  echo '
  <div class="message">
     <span>'.$messageg.'</span>
     <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
  </div>
  ';

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


}


?>

        </div>

        <form action="" method="POST">
          <div class="card-body">

            <div class="form-group">
              <label for="email1">Enter the Otp</label>
              <input type="text" id="email1" class="form-control"  value=""  name="otp"  style="height: 40px;" required>
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

  <!-- Footer -->
    
  <div class="ft">
     <?php @include 'footer.php';?>
  </div>
   
  
  </body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>