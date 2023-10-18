<?php

session_start();
@include 'conection.php';


//  Registration form (sinup)

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



function sendMail($username,$email,$password)
{

    // echo "Niraj";
    
require ('phpMailer/Exception.php');
require ('phpMailer/PHPMailer.php');
require ('phpMailer/SMTP.php');
    


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'nirajupadhyay2024@gmail.com';                     //SMTP username
    $mail->Password   = 'wjhiafljqcxetkbb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nirajupadhyay2024@gmail.com', 'Niraj');
    $mail->addAddress($email);     //Add a recipient
   
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to Mahadev Library';
    $mail->Body    = "Name : $username <br> Email : $email <br> password : $password <br> <h2> Your Registration was successful <br> Thanks for visiting </h2> ";

    
   
    $mail->send();
    return true;
    
} catch (Exception $e) {
    
    return false;
   
}
}





    if(isset($_POST['sinup'])){

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    
    $_SESSION['name'] = $username;
   

    $existSql = "SELECT * FROM `user_registration` WHERE  email = '$email'";

    
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);



    if($numExistRows > 0){

        $result_fetch= mysqli_fetch_assoc($result);
        if($result_fetch['email']==$_POST['email'])
        {

        $message[] = 'E-mail already registered';

        }

    }



    else
    {

        if(($password == $cpassword)){

           

            $sql = "INSERT INTO `user_registration` ( `username`, `email`, `password`, `dt`) VALUES ( '$username', '$email', '$password', current_timestamp())";
    
            $result = mysqli_query($conn, $sql);

           

    
            if ($result  && sendMail($_POST["username"] , $_POST['email'],$_POST["password"])){


                echo "
                <script> 
                    window.location.href = 'login.php';
                </script>
                
                ";
                

            }
        }
        else{

           

            $message[] = 'your password does not match';



        }
    }

}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">

</head>

<body>



    <div class="niraj">
        <?php @include 'userheader1.php';?>
    </div>

    <div class="mt-5 pt-3">
        <div class="bardbox d-flex justify-content-center" style="background-color: #d3e9f9; height:120vh;">
            <div class="card my-auto shadow login-card" style="width: 400px;">
                <div class="card-header text-center  text-white" style="background-color: #A41034;">
                    <h2>Register now</h2>

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

                <form action="" method="POST">
                    <div class="card-body">

                        <div class="mt-2">
                            <label for="email">Enter the username</label>
                            <input type="text" id="email" class="form-control" value="" name="username"
                                style="height: 40px;" required>
                        </div>

                        <div class="mt-2">
                            <label for="email2">Enter the Email</label>
                            <input type="text" id="email2" class="form-control" value="" name="email"
                                style="height: 40px;" required>
                        </div>


                        <div class="mt-2">
                            <label for="email4">Enter the password</label>
                            <input type="text" id="email4" class="form-control" value="" name="password"
                                style="height: 40px;" required>
                        </div>


                        <div class="mt-2">
                            <label for="email5">Enter the confirm password</label>
                            <input type="text" id="email5" class="form-control" value="" name="cpassword"
                                style="height: 40px;" required>
                        </div>



                        <br>

                        <button name="sinup" class="btn btn-sm w-100  text-white "
                            style="background-color: #A41034; height:45px;">Submit</button>

                        <div class="mt-3">
                            <p>you have an account? <a href="login.php">Login now</a></p>
                        </div>


                    </div>
                </form>


                <div class="card-footer text-end">
                    <small>© Mahadev Library</small>
                </div>
            </div>
        </div>
   
        <!-- Footer -->

        <div class="foot">
            <?php @include 'footer.php';?>
        </div>

    </div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>