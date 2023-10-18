
<?php

session_start();
@include 'conection.php';

    if(isset($_POST['login'])){

    
    $email = $_POST["email"];
    $password = $_POST["password"];
   
        $sql = "Select * from user_registration  where email = '$email' AND password = '$password' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){

         
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;

            echo " 
            <script>
            window.location.href = '../index.php';
            </script>  ";


        }

        else{        

        $message = 'Invalid email or password';

       
        }


}  



?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login page</title>

 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
   
  <link rel="stylesheet" href="../css/header.css">
</head>

<body>

    <div class="niraj">
        <?php @include 'userheader.php';?>
    </div>




<div">
    <div class="bardbox d-flex justify-content-center" style="background-color: #d3e9f9; height:120vh;">
      <div class="card my-auto shadow login-card" style="width: 400px;">
        <div class="card-header text-center  text-white" style="background-color: #A41034;">
          <h2>Login now</h2>

          

          <?php

if(isset($message)){
   
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
}

?>



        </div>

        <form action="" method="POST">
          <div class="card-body">

            <div class="form-group">
              <label for="email">Enter the Email</label>
              <input type="text" id="email" class="form-control"  value=""  name="email"  style="height: 40px;" required>
            </div>
            
            <div class="mt-2">
             <label for="email2">Enter the password</label>
            <input type="text" id="email2" class="form-control"  value=""  name="password"  style="height: 40px;" required>
            </div>

            <br>

            <button name="login" class="btn btn-sm w-100  text-white " 
            style="background-color: #A41034; height:45px;">Submit</button>

            <div class="mt-3">
              <p>don't have an account? <a href="register.php">register now</a></p>
            </div>
            
          </div>
        </form>


        <div class="card-footer text-end">
          <small>© Mahadev Library</small>
        </div>
      </div>
    </div>
  </div>


  <div class="foot">
            <?php @include 'footer.php';?>
  </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>