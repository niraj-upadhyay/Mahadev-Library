<?php  @include 'conection.php';


session_start();

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <title>Library</title>
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />



    <!-- OWN CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive.css">

    <style>
    h4 {
        color: yellow;
    }

    .aakrit {
        margin-bottom: 5px;
    }

    @media (min-width: 301px) and (max-width: 991px) {
        .col-md-4 {
            display: flex;
            justify-content: center;
        }
    }
    </style>






</head>




<body>
    <!-- header design -->

    <?php @include 'partial/header.php';?>



    <!-- section -->

    <section id="home">
        <div class="container-fluid px-0 top-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <h1> Welcome to Mahdev Library</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- section-2 counter -->

    <section id="counter">
        <section class="counter-section">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h2>
                            <span id="count1"></span>+
                        </h2>
                        <p>SAVINGS</p>
                    </div>
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h2>
                            <span id="count2"></span>+
                        </h2>
                        <p>PHOTOS</p>
                    </div>
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h2>
                            <span id="count3"></span>+
                        </h2>
                        <p>ROCKETS</p>
                    </div>
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h2>
                            <span id="count4"></span>+
                        </h2>
                        <p>GLOBES</p>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- Scrolling Text -->

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center breaking-news bg-info">
                    <div
                        class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news">
                        <span class="d-flex align-items-center text-center">&nbsp;Upcomming Offer</span>
                    </div>
                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();"
                        onmouseout="this.start();">
                        <h4>
                            <?php 
               $sql="SELECT * FROM `scroll`";
               $find=mysqli_query($conn,$sql);
               $num=mysqli_num_rows($find);
  
              if($num>0)
              {

               while($row = mysqli_fetch_assoc($find)){

               $offer = $row["text"];
       
               }

              }

               echo $offer;

              ?>
                        </h4>


                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <!-- section-3 about-->

    <section id="about">
        <div class="about-section wrapper">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12 mb-lg-0 mb-3">
                        <div class="card border-0">
                            <img decoding="async" src="image/library-1.jpg" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 text-sec">
                        <h2>My library is an archive of longings.</h2>
                        <p>A library is a collection of materials, books or media that are accessible for use and not
                            just for
                            display purposes.
                            They also help ensure an authentic record of knowledge created and accumulated by past
                            generations. In a
                            world without libraries, it would be difficult to advance research and human knowledge or
                            preserve the
                            world's cumulative knowledge and heritage for future generations.
                        </p>
                    </div>
                </div>
            </div>

            <div class="container food-type">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 text-sec mb-lg-0 mb-5">
                        <h2>When in doubt go to the library.</h2>

                        <p>The library is a place that provides access to a wide range of resources and services for
                            information,
                            education, and entertainment. Libraries have been an integral part of society for centuries,
                            serving as
                            repositories of knowledge and fostering a love for learning and reading.</p>

                        <ul class="list-unstyled py-3">
                            <li>Libraries are the memory of mankind.</li>
                            <li>Believe you can and you're halfway there.</li>
                            <li>The only way to do great work is to love what you do. </li>
                        </ul>

                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card border-0">
                            <img decoding="async" src="image/library5.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section-3 story-->

    <section id="story">
        <div class="story-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- About Owner -->

    <section id="owner">

        <div class="container">
            <div class="aakrit">
                <div class="p-3 mt-5 mb-2 bg-warning rounded-3 text-white text-center ">
                    <h3>Owner</h3>
                </div>

            </div>
        </div>


        <div class="ram" ;>
            <div class="container ">
                <div class="row justify-content-center gy-3">

                    <div class="col-md-4 ">

                        <div class="card custom-card d-flex border-4 border-primary" style="width: 17em"
                            data-aos="flip-left">
                            <div class="inner">
                                <img src="image/deepak.jpeg" class="card-img-top p-1" alt="..." height="250">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Deepak Tiwari</h5>
                                <p class="card-text"></p>
                                <hr>

                                <div class="icons">
                                    <a href="https://www.facebook.com/profile.php?id=100008728660466&mibextid=ZbWKwL"
                                        class="fab fa-facebook-f"></a>
                                    <a href="https://instagram.com/deepak_tiwari24?igshid=YmM0MjE2YWMzOA=="
                                        class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-whatsapp"></a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 ">

                        <div class="card custom-card d-flex border-4 border-primary" style="width: 17em"
                            data-aos="flip-left">
                            <div class="inner">
                                <img src="image/suraj.jpeg" class="card-img-top p-1" alt="..." height="250">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Suraj Tiwari</h5>
                                <p class="card-text"></p>
                                <hr>

                                <div class="icons">
                                    <a href="https://www.facebook.com/deepu.tiwari.7169?mibextid=ZbWKwL"
                                        class="fab fa-facebook-f"></a>
                                    <a href="https://instagram.com/surajkrtiwari14?igshid=YmM0MjE2YWMzOA=="
                                        class="fab fa-instagram"></a>
                                    <a href="#" class="fab fa-whatsapp"></a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- About offer -->

    <section id="plan">

        <div class="container mb-5">


            <div class="p-3 mt-5 bg-warning rounded-3 text-white text-center ">
                <h3>Our Plan</h3>
            </div>

        </div>
        <div class="mb-5">

            <div class=" container-fluid pricingTable">
                <div class="container ">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>


                    <!-- Fetch the plan -->

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
          $six_price = $row["six_price"];
          $year = $row["yearly"];
          $year_price = $row["yearly_price"];
          
          }

         }

         ?>







                    <div class="row monthlyPriceList animated gy-3">
                        <div class="col-md-4">
                            <div class="inner holder border-4 border-primary">
                                <div class="hdng">
                                    <p>
                                        <?php echo $month ?>
                                    </p>
                                </div>
                                <div class="price mt-5">
                                    <p><b>₹
                                            <?php echo $m_price ?>
                                        </b><span> / month</span></p>
                                </div>
                                <div class="info">
                                    <p>
                                        Separate self study zone
                                    </p>
                                    <p>
                                        unlimited high speed wifi
                                    </p>
                                    <p>
                                        purified R.O water
                                    </p>
                                    <p>
                                        power socket on each desk
                                    </p>
                                    <p>
                                        Fully air conditioned hall
                                    </p>
                                </div>
                                <div class="btn">
                                    <a href="" class="readon">Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="inner holder active border-4 border-primary">
                                <div class="hdng">
                                    <p>
                                        <?php echo $six_month ?>
                                    </p>
                                </div>
                                <div class="price mt-5">
                                    <p><b>₹
                                            <?php echo $six_price ?>
                                        </b><span>/six-month</span></p>
                                </div>
                                <div class="info">
                                    <p>Separate self study zone</p>
                                    <p>unlimited high speed wifi</p>
                                    <p>purified R.O water</p>
                                    <p>power socket on each desk</p>
                                    <p>Fully air conditioned hall</p>
                                </div>
                                <div class="btn">
                                    <a href="" class="readon">Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="inner holder border-4 border-primary">
                                <div class="hdng">
                                    <p>
                                        <?php echo $year?>
                                    </p>
                                </div>
                                <div class="price mt-5">
                                    <p><b>₹
                                            <?php echo $year_price ?>
                                        </b><span>/year</span></p>
                                </div>
                                <div class="info">
                                    <p>Separate self study zone</p>
                                    <p>unlimited high speed wifi</p>
                                    <p>purified R.O water</p>
                                    <p>power socket on each desk</p>
                                    <p>Fully air conditioned hall</p>
                                </div>

                                <div class="btn">
                                    <a href="" class="readon">Buy Now</a>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Student image -->


    <?php 
          $sql="SELECT * FROM `card`";
          $find=mysqli_query($conn,$sql);
          $num=mysqli_num_rows($find);
  
          if($num>0)
          {

          while($row = mysqli_fetch_assoc($find)){

            $name = $row["name"];
            $job = $row["job"];
            $image = $row["image"];
            $name1 = $row["name1"];
            $job1 = $row["job1"];
            $image1 = $row["image1"];
            $name2 =  $row["name2"];
            $job2 =  $row["job2"];
            $image2 = $row["image2"];
          
          }

         }

         ?>

    <!-- Student -->

    <!-- About student -->
    <section id="alumini">
        <div class="container">
            <div class="p-3 mt-5 bg-warning rounded-3 text-white text-center">
                <h3>Our Successful Students</h3>
            </div>
        </div>

        <div class="container mt-4">
            <!-- Use a container to hold the cards for proper alignment -->

            <!-- First card -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-4 border-primary">
                        <img src="images/<?php echo $image;?>" class="card-img-top p-1" alt="..."
                            style="height: 250px;">
                        <div class="card-body text-center">
                            <h3 class="card-title"><b><?php echo $name;?></b></h3>

                            <!-- <h3><p class="card-text"><strong><?php echo $job;?></strong></p><h3> -->

                            <h3 class="card-text"><strong><?php echo $job;?></strong></h3>


                            <a href="partial/Alumnifront.php" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Second Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-4 border-primary">
                        <img src="images/<?php echo $image1;?>" class="card-img-top p-1" alt="..."
                            style="height: 250px;">
                        <div class="card-body text-center">
                            <h3 class="card-title"><b><?php echo $name1;?></b></h3>
                            <h3 class="card-text"><strong><?php echo $job1;?></strong></h3>
                            <a href="partial/Alumnifront.php" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Third card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-4 border-primary">
                        <img src="images/<?php echo $image2;?>" class="card-img-top p-1" alt="..."
                            style="height: 250px;">
                        <div class="card-body text-center">
                            <h3 class="card-title"><b><?php echo $name2;?></b></h3>
                            <h3 class="card-text"><strong><?php echo $job2;?></strong></h3>
                            <a href="partial/Alumnifront.php" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
















    <!-- Section-5 testimonial-->
    <section id="testimonial">
        <div class="wrapper testimonial-section">
            <div class="container text-center">
                <div class="text-center pb-4">
                    <h2>Testimonial</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-10 offset-lg-1">
                        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="carousel-caption">
                                        <img decoding="async" src="images/<?php echo $image;?>">
                                        <p>"It is only when we take chances, when our lives improve.
                                            The initial and the most difficult risk that we need to take is to become
                                            honest. "</p>
                                        <h5><?php echo $name;?></h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <img decoding="async" src="images/<?php echo $image1;?>">
                                        <p>"It is only when we take chances, when our lives improve.
                                            The initial and the most difficult risk that we need to take is to become
                                            honest. "</p>
                                        <h5><?php echo $name1;?></h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <img decoding="async" src="images/<?php echo $image2;?>">
                                        <p>"It is only when we take chances, when our lives improve.
                                            The initial and the most difficult risk that we need to take is to become
                                            honest . "</p>
                                        <h5><?php echo $name2;?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


















    <!-- Contact Form And Map-->

    <div class="container-fluid mb-1">

        <div class="p-3 mt-1 mb-2 bg-warning rounded-3 text-white text-center ">
            <h3>Our Location</h3>
        </div>

        <div class="row">

            <div id="map" class="col-md-6 bg-secondary">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28918.3787092502!2d83.58511534485896!3d25.04095081209833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398dd8b8194cec47%3A0x53677e383d2f70bc!2sBhabua%2C%20Bihar%20821101!5e0!3m2!1sen!2sin!4v1691681927356!5m2!1sen!2sin"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div id="contact" class="col-md-6 bg-info">
                <h1 class="text-center text-danger font-weight-bold">Our Another Service</h1>


                <div class="card-body-fluid">


                    <div class="mt-3">
                        <h2 class="niraj text-center">Mahadev Enterprises</h2>
                    </div>

                    <div class="mt-4">
                        <h2 class="niraj text-center">Mahadev GYM </h2>
                    </div>

                    <div class="mt-4">
                        <h2 class="niraj text-center">Mahadev Travels </h2>
                    </div>

                    <div class="mt-4">
                        <h2 class="niraj text-center">Mahadev Resturent </h2>
                    </div>

                    <div class="mt-4 mb-4">
                        <h1 class="text-center text-light font-weight-bold">Contact Us</h1>
                    </div>

                    <!-- Contact Form -->


                    <form action="partial/contact.php" method="post">

                        <div class="mt-2">
                            <label for="user">
                                <h3>Enter the Name</h3>
                            </label>
                            <input type="text" id="user" class="form-control" value="" name="username"
                                style="height: 50px;" required>
                        </div>

                        <!-- <div class="mt-2">
                            <label for="email2">
                                <h3>Enter the Email</h3>
                            </label>
                            <input type="email" id="email2" class="form-control" value="" name="email"
                                style="height: 50px;" required>
                        </div> -->


                        <div class="mt-2">
                            <label for="email4">
                                <h3>Enter the phone Number</h3>
                            </label>
                            <input type="text" id="email4" class="form-control" value="" name="phone"
                                style="height: 50px;" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">
                                <h3>Enter the message</h3>
                            </label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>

                        <br>


                        <div class="text-center">
                            <button class="main-btn mb-4" type="submit" name="contact">Submit</button>
                        </div>


                    </form>





                    <!-- Form end -->

                </div>




            </div>
        </div>
    </div>










    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php 
  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
   ?>
    <script>
    swal({
        title: "<?php echo $_SESSION['status']?>",
        //  text: "You clicked the button!",
        icon: "<?php echo $_SESSION['status_code']?>",
        button: "Ok",
    });
    </script>

    <?php
    unset($_SESSION['status']);
  }
  ?>









    <!-- section-9 footer-->

    <?php @include 'partial/footer.php';?>


    <script>
    $(document).ready(function() {
        $('.col-md-4').hover(

            // trigger when mouse hover

            function() {
                $(this).animate({
                    marginTop: "-=1%",
                }, 200);
            },

            // trigger when mouse out

            function() {
                $(this).animate({
                    marginTop: "0%"
                }, 200);
            }

        );
    })
    </script>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<!-- Own Js -->
<script src="js/index.js"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init({
    offset: 120,
    duration: 900,
});
</script>

<!-- <script src="js/plan.js"></script> -->

</html>