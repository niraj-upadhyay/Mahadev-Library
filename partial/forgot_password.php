<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email,$rand)
{

  // session_start();
  $_SESSION['otp'] = $rand;

  // header('location : otp.php');


  
    
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
    $mail->Body    = " your OTP is : $rand  ";

    
   
    $mail->send();
    return true;
    // echo 'Message has been sent';
} catch (Exception $e) {
    
    return false;
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}





//   press the button


if(isset($_POST['forgotpass']))
{

  require("conection.php");


  $_SESSION['Email'] = $_POST['email'];
  $email =  $_SESSION['Email'];

  $rand = rand(000000,999999);



  
  $sql = "SELECT * FROM `user_registration` WHERE  email = '$email'";
  $result = mysqli_query($conn,$sql);
  $numExistRows = mysqli_num_rows($result);

  if($numExistRows > 0 && sendMail($email,$rand))
  {
    
    $_SESSION['messageg']= "Otp send on your mail";

    echo "
            <script> 
              window.location.href = 'otp.php';
            </script>
            ";
  
  }
  else
  {
    $message[] = 'Email is not Register';
  }

}





?>






<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="../css/header.css">

</head>

<body>

    <div class="niraj">
        <?php @include 'userheader1.php';?>
    </div>

    <div class="mt">
        <div class="bardbox d-flex justify-content-center" style="background-color: #d3e9f9; height:120vh;">
            <div class="card my-auto shadow login-card" style="width: 400px;">
                <div class="card-header text-center  text-white" style="background-color: #A41034;">
                    <h2>Forgot password</h2>

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

                        <div class="form-group">
                            <label for="email1">Enter the Email</label>
                            <input type="text" id="email1" class="form-control" value="" name="email"
                                style="height: 40px;">
                        </div>

                        <br>

                        <button name="forgotpass" class="btn btn-sm w-100  text-white "
                            style="background-color: #A41034; height:45px;">Send Otp</button>



                    </div>
                </form>


                <div class="card-footer text-end">
                    <small>© Mahadev Library</small>
                </div>
            </div>
        </div>
    </div>

     
       
    <!-- Footer -->
    
    <div class="foot">
            <?php @include 'footer.php';?>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>