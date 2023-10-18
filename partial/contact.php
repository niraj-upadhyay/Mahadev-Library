<?php 


session_start();

@include 'conection.php';


if(isset($_POST['contact'])){

$name = $_POST['username'];
// $email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];



$sql="INSERT INTO `contact` ( `name`, `phone`, `message`, `dt`) VALUES ('$name', '$phone', '$message', current_timestamp())";

$result = mysqli_query($conn, $sql);

if($result){

    $_SESSION['status']= "Successfull";

    $_SESSION['status_code']= "success";

    echo "
    <script> 
        window.location.href = '../index.php';
    </script>
    
    ";



}

else{


    $_SESSION['status']= " Data not Upadated";

    $_SESSION['status_code']= "error";

    echo "
    <script> 
        window.location.href = '../index.php';
    </script>
    
    ";
  
}



}

?>