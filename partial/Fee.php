<?php @include 'conection.php'; 

if(isset($_POST['login'])){

$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['emailg'];
$month=$_POST['month'];
$Rupee=$_POST['Rupee'];
$status=$_POST['status'];

// $sql="INSERT INTO `fee`( `name`, `phone`, `email`, `month`, `rupee`,`dt`) VALUES ('$name','$phone','$email','$month','$Rupee','$status',current_timestamp())";

$sql="INSERT INTO `fee`(`name`, `phone`, `email`, `month`, `rupee`, `status`, `dt`) VALUES ('$name','$phone','$email','$month','$Rupee','$status',current_timestamp())";




$result = mysqli_query($conn, $sql);

if($result){
  
  $message[] = 'Fee Added Sucessfully';

}
else
{
    
  $message[] = 'Fee Not Added ';

}

}


?>



<!-- Student Fee Form -->



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--Css -->
    <link rel="stylesheet" href="../css/header.css">



</head>

<body style="background-color: #d3e9f9; height:128vh;">

    <div class="tulika">
        <?php @include 'adminheader.php';?>
    </div>



    <div class="mt-2 pt-4">
        <div class="mt-5 pt-5">
            <div class="bardbox d-flex justify-content-center">
                <div class="card my-auto shadow login-card" style="width: 400px;">
                    <div class="card-header text-center  text-white" style="background-color: #A41034;">
                        <h2>Student Fee</h2>

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
                                <label for="email">Enter the Student Name </label>
                                <input type="text" id="email" class="form-control" value="" name="name"
                                    style="height: 40px;" required>
                            </div>

                            <div class="mt-2">
                                <label for="email2">Enter the phone No</label>
                                <input type="text" id="email2" class="form-control" value="" name="phone"
                                    style="height: 40px;" required>
                            </div>

                            <div class="mt-2">
                                <label for="email3">Enter the Email address</label>
                                <input type="text" id="email3" class="form-control" value="" name="emailg"
                                    style="height: 40px;" required>
                            </div>

                            <div class="mt-2">
                                <label for="email4">Enter the Month</label>
                                <input type="text" id="email4" class="form-control" value="" name="month"
                                    style="height: 40px;" required>
                            </div>

                            <div class="mt-2">
                                <label for="email5">Enter the Fee(Rupees)</label>
                                <input type="text" id="email5" class="form-control" value="" name="Rupee"
                                    style="height: 40px;" required>
                            </div>


                            <div class="mt-4">
                                <select class="form-select" name="status" style="height: 42px;" required>
                                    <option value="">Select Fee status</option>
                                    <option value="paid">Paid</option>
                                    <option value="Not paid">Not Paid</option>
                                </select>
                            </div>




                            <br>

                            <button name="login" class="btn btn-sm w-100  text-white "
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

    <div class="mt-5 pt-4">
        <div class="mt-2 pt-2">
            <?php @include 'footer.php';?>
        </div>
    </div>





</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>