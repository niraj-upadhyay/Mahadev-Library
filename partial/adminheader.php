
<!-- Header  -->

<?php 
session_start();

?>

<header>
    <nav class="navbar navbar-expand-lg navigation-wrap">
        <div class="container">
            <a class="navbar-brand" href="#"><img decoding="async" src="../image/mahdev.png" alt="" width="70"
                    height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="Fee.php">Add fee</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Feefetch.php">Fee Detail</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="alminiadd.php">Add Alumni</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="offer.php">Add Offer</a>
                    </li>

                    

                    <?php 
                    if(isset($_SESSION['Adminid'])){
                        
                        ?>

                        <!-- profile photo fetch -->

                      <?php
                    // $email= $_SESSION['email'];
  
                    $sql="SELECT * FROM `admin_login`";
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
                        <button class="btn light dropdown-toggle border-0 "   type="button" data-bs-toggle="dropdown">

                            <img src= "../admin/<?= $image?>"  class="rounded-circle me-2 border-4 border-primary" width="35" height="35"
                                alt="Pofile">

                        </button>

                        <ul class="dropdown-menu ">

                        <li><a class="dropdown-item text-white" href="adminprofile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item text-white" href="fetch.php"><i class="fa-brands fa-first-order-alt"></i>User data</a></li>
                        <li><a class="dropdown-item text-white" href="adminpass.php"><i class="fa-solid fa-key"></i>change password</a></li>
                            <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item text-white" href="logout.php"> <i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>

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



