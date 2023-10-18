<!-- Login php -->

<?php 

session_start();
@include 'conection.php';

    if(isset($_POST['sign'])){

    
    $email = $_POST["email"];
    $password = $_POST["password"];
   
        $sql = "Select * from user_registration  where email = '$email' AND password = '$password' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){

          
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
        }

        else{

        $message[] = 'incorrect email or password!';
       
        
        }


}





// For  Admin

if(isset($_POST['admin'])){

    $query = "SELECT * FROM `admin_login` WHERE `Admin_Name`= '$_POST[AdminName]' AND `Admin_password`='$_POST[AdminPassword]'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        // session_start();

        $_SESSION['Adminid'] = $_POST['AdminName'];
    
        echo " 
        <script> 
            window.location.href = 'partial/dashboard.php';
        </script>
    " ;
    
    
    
    }
    else
    {
        
        echo "
                    <script>
                        alert('Your password does not match')
                        window.location.href = 'index.php';
                    </script>
                 ";
    
    
    }
     
    
    }
    
    
    
    





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

    // session_start();
    $_SESSION['name'] = $username;
   

    $existSql = "SELECT * FROM `user_registration` WHERE  email = '$email'";

    
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);



    if($numExistRows > 0){

        $result_fetch= mysqli_fetch_assoc($result);
        if($result_fetch['email']==$_POST['email'])
        {

        echo "
        <script>
            alert('$result_fetch[email]- E-mail already registered');
            window.location.href = 'index.php';

        </script>
         ";
        
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
                    window.location.href = 'partial/login.php';
                </script>
                
                ";
                

            }
        }
        else{

            echo " <script> alert('Your password does not match')  </script>  ";

        }
    }

}
?>

<!-- Header  -->


<header>
    <nav class="navbar navbar-expand-lg navigation-wrap">
        <div class="container">
            <a class="navbar-brand" href="#"><img decoding="async" src="../image/mahdev.png" alt="" width="70"
                    height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#owner">Owner</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#plan">Offer</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#alumini">Alumni</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#testimonial">Profile</a>
                    </li>


                    <?php 
                    if(isset($_SESSION['loggedin'])){
                        ?>

                    <!-- profile photo fetch -->

                    <?php 
                   
                    $email= $_SESSION['email'];
  
                    $sql="SELECT * FROM `user_registration` WHERE `email`='$email'";
                    $find=mysqli_query($conn,$sql);
                    $num=mysqli_num_rows($find);
                    
                    if($num>0)
                    {
                  
                      while($row = mysqli_fetch_assoc($find)){
                  
                         
                  
                  
                        $image = $row["image"];
                          
                  
                      }
                    }
                    
                      ?>



                    <div class="dropdown">
                        <button class="btn light dropdown-toggle border-0 " type="button" data-bs-toggle="dropdown">

                            <img src="../Niraj/<?= $image?>" class="rounded-circle me-2 border-4 border-primary"
                                width="35" height="35" alt="Pofile">

                        </button>

                        <ul class="dropdown-menu ">

                            <li><a class="dropdown-item text-info" href="profile.php"><i class="fa-solid fa-user"></i>
                                    Profile</a></li>
                            <li><a class="dropdown-item text-info" href="myfee.php"><i
                                        class="fa-brands fa-first-order-alt"></i> My Fee</a></li>
                            <li><a class="dropdown-item text-info" href="changeuspassword.php"><i
                                        class="fa-solid fa-key"></i>change password</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item text-info" href="../index.php"> <i
                                        class="fa-solid fa-right-from-bracket"></i>Back</a></li>


                        </ul>
                    </div>




                    <?php } else
                  {  ?>

                    <div class="mx-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Log
                            In</button>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#sinupModal">sinup</button>
                    </div>



                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
</header>




<!-- Login modal -->


<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="loginModalLabel">Login Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <button type="button" class="btn btn-outline-primary" id="user">user</button>
                <button type="button" class="btn btn-outline-secondary" id="Admin">Admin</button>

                <div class="mt-2">
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

                <div class="my-4" style="display: block;" id="id1">
                    <form action="" method="POST">
                        <div class="mb-1">
                            <label for="usname" class="form-label">User Email</label>
                            <input type="email" class="form-control" value="" id="usname" name="email"
                                aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="uspassword" class="form-label">Password</label>
                            <input type="password" class="form-control" value="" id="uspassword" name="password"
                                required>
                        </div>


                        <button type="submit" class="btn btn-primary" name="sign">Submit</button>
                    </form>
                </div>



                <!-- Admin form -->

                <div class="my-4" style="display:none;" id="id2">
                    <form action="" method="POST">
                        <div class="mb-1">
                            <label for="admin" class="form-label">Admin Name</label>
                            <input type="text" class="form-control" id="admin" name="AdminName"
                                aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="adpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adpassword" name="AdminPassword" required>
                        </div>


                        <button type="submit" class="btn btn-primary" name="admin">Submit</button>
                    </form>
                </div>

            </div>

            <div class="modal-footer" style="display: block;" id="id4">

                <div class="mx-2">

                    <span><a href="partial/forgot_password.php">Forgot password?</a></span><br>

                </div>

            </div>

        </div>
    </div>
</div>












<!-- Sinup modal -->

<div class="modal fade" id="sinupModal" tabindex="-1" aria-labelledby="sinupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="sinupModalLabel">Registration Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">


                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="cfpassword" class="form-label">conform password</label>
                        <input type="password" class="form-control" id="cfpassword" name="cpassword" required>
                    </div>


                    <button type="submit" class="btn btn-primary" name="sinup">Submit</button>
                </form>


            </div>

        </div>
    </div>
</div>



<script>
let user = document.getElementById("user");
let Admin = document.getElementById("Admin");
let usershow = document.getElementById("id1");
let Adminshow = document.getElementById("id2");
let footer = document.getElementById("id4");


user.addEventListener("click", function() {
    if (Adminshow.style.display == "block") {
        Adminshow.style.display = "none";
        usershow.style.display = "block";
        footer.style.display = "block"
    }
});
Admin.addEventListener("click", function() {
    if (usershow.style.display == "block") {
        usershow.style.display = "none";
        Adminshow.style.display = "block";
        footer.style.display = "none";
    }
});
</script>