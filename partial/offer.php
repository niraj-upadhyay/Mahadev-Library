<?php
@include 'conection.php';
session_start();

if(isset($_POST['sinup'])){

  $text1 = $_POST["facility1"];
  $text2 = $_POST["facility2"];
  $text3 = $_POST["facility3"];
  $text4 = $_POST["facility4"];
  $text5 = $_POST["facility5"];
  $text6 = $_POST["facility6"];
  
  


  $select="SELECT * FROM `offer`";
  $result=mysqli_query($conn,$select); 
  $number=mysqli_num_rows($result);
  if($number>0)
  {
    $sql="UPDATE `offer` SET `monthly` = '$text1' ,`month_price`='$text2' , `six_month`='$text3' ,`six_price` = '$text4' , `yearly` = '$text5' , `yearly_price` = '$text6'";
    
  }
  else
  {
    $sql="INSERT INTO `offer` ( `monthly`, `month_price`, `six_month`, `six_price`, `yearly`, `yearly_price`) VALUES ( '$text1', '$text2', '$text3', '$text4', '$text5', '$text6')";
  }  
  $result=mysqli_query($conn,$sql);

  if($result){

    $_SESSION['status']= "Offer Upadated sucessfully";

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
        window.location.href='offer.php';
    </script>
    ";
  }
}



  ?>


<!-- fetch -->


<?php 


  $sql="SELECT * FROM `offer`";
  $find=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($find);
  
  if($num>0)
  {

    while($row = mysqli_fetch_assoc($find)){

        $month = $row["monthly"];
        $m_price = $row["month_price"];
        $six_month = $row["six_month"];
        $six_price= $row["six_price"];
        $year = $row["yearly"];
        $year_price = $row["yearly_price"];
        
    }

  }

?>





<!-- Offer Form -->





<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--Css -->
    <link rel="stylesheet" href="../css/header.css">


</head>

<body style="background-color: #d3e9f9;">

    <div class="tulika">
        <?php @include 'adminheader.php';?>
    </div>

    <div class="mt-4 pt-5">
        <div class="mt-4 pt-5">
            <div class="bardbox d-flex justify-content-center">
                <div class="card my-auto shadow login-card" style="width: 400px;">
                    <div class="card-header text-center  text-white" style="background-color: #A41034;">
                        <h2>About offer</h2>
                    </div>

                    <form action="" method="POST">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="email1">Enter the offer name (monthly)</label>
                                <input type="text" id="email1" class="form-control" value="<?php echo $month ?>"
                                    name="facility1" style="height: 40px;">
                            </div>

                            <div class="form-group">
                                <label for="email2">Enter the offer price (monthly)</label>
                                <input type="text" id="email2" class="form-control" value="<?php echo $m_price ?>"
                                    name="facility2" style="height: 40px;">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="email3">Enter the offer name (6-month)</label>
                                <input type="text" id="email3" class="form-control" value="<?php echo $six_month ?>"
                                    name="facility3" style="height: 40px;">
                            </div>

                            <div class="form-group">
                                <label for="email4">Enter the about price (6-month)</label>
                                <input type="text" id="email4" class="form-control" value="<?php echo $six_price ?>"
                                    name="facility4" style="height: 40px;">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="email5">Enter the offer name (yearly)</label>
                                <input type="text" id="email5" class="form-control" value="<?php echo $year ?>"
                                    name="facility5" style="height: 40px;">
                            </div>

                            <div class="form-group">
                                <label for="email6">Enter the price (yearly)</label>
                                <input type="text" id="email6" class="form-control" value="<?php echo $year_price ?>"
                                    name="facility6" style="height: 40px;">
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
    </div>


    <!-- Footer -->

    
        <div class="mt-4 pt-4">
            <div class="mt-2 pt-2">
                <?php @include 'footer.php';?>
            </div>
        </div>
    






</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<!-- Sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>