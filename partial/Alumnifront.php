<?php  @include 'conection.php';?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- OWN CSS -->
    <link rel="stylesheet" href="../css/header.css">
    <!-- <link rel="stylesheet" href="../css/responsive.css"> -->

    <style>
    .card {
        margin-top: 20px;
    }


    .card:hover {



        -webkit-box-shadow: rgb(255, 0, 0);
        -moz-box-shadow: -1px 9px 40px -12px rgb(255, 0, 0);
        box-shadow: -1px 9px 40px -12px rgb(255, 0, 0);
    }


    @media (min-width: 301px) and (max-width: 991px) {
        .col-md-4 {
            display: flex;
            justify-content: center;
        }
    }
    </style>



</head>

<body class=" bg-info">

    <div class="niraj">
        <?php @include 'userheader.php';?>
    </div>


    <div class="mt-5 pt-3">

        <div class="container mt-5">

            <div class="p-3 mt-2 bg-warning rounded-3 text-white text-center ">
                <h3>Our Successfull Student</h3>
            </div>

            <div class="row justify-content-center gy-2">

                <?php

$select_products = mysqli_query($conn, "SELECT * FROM `alumni`");
if(mysqli_num_rows($select_products) > 0){
while($fetch = mysqli_fetch_assoc($select_products)){

?>

                <div class="col-md-4">


                    <div class="card border-4 border-primary " style="width: 20rem;">
                        <img src="../images/<?php echo $fetch['image']; ?>" class="card-img-top p-1"
                            alt="Card image cap" height="250">
                        <div class="card-body text-center">
                            <h3 class="card-title"><b><?php echo $fetch['name'];?></b></h3>
                            <p class="card-text">
                            <h3><?php echo $fetch['job'];?></h3>
                            </p>
                        </div>
                    </div>

                </div>

                <?php
         };
      };
      ?>

                <div class="mt-4 text-center">
                    <button type="button" class="btn btn-secondary text-white btn-lg"
                        onclick="location.href='../index.php'">Back</button>
                </div>

            </div>
        </div>

        <!-- Footer -->

        <div class="mt-4">
            <?php @include 'footer.php';?>
        </div>

    </div>


</body>



<!-- Own Js -->
<!-- <script src="../js/index.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>