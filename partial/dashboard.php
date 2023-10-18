<?php
session_start();

@include 'conection.php';

if(!isset($_SESSION['Adminid']))
{
  echo " 
  <script> 
      window.location.href='../index.php';
  </script>
 " ;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Open Sans Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">






    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header.css">

    <style>
    .main-cards .card h3 a {

        /* style="color: aqua; text-decoration: none; " */
        color: aqua;
        text-decoration: none;

    }

    .main-cards .card h3 a:hover{
        /* style="color: aqua; text-decoration: none; " */
        
        color: greenyellow;
        

    }
    </style>



</head>

<body>

    <div class="tulika">
        <?php @include 'adminheader.php';?>
    </div>



    <div class="grid-container mt-5 pt-5 ">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>SS
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">notifications</span>
                <span class="material-icons-outlined">email</span>
                <span class="material-icons-outlined">account_circle</span>
            </div>
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined"></span> Mahadev
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">


                <li class="sidebar-list-item">
                    <a href="scrolling.php">
                        <span class="material-icons-outlined">text_fields</span> scroll text
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="Fee.php">
                        <span class="material-icons-outlined">library_add</span> Add Fee
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="Feefetch.php">
                        <span class="material-icons-outlined">dataset</span> Fee detail
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="frontalumni.php">
                        <span class="material-icons-outlined">person_add</span> Front Alumni
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="offer.php">
                        <span class="material-icons-outlined">event_available</span> Offer
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="fetch.php">
                        <span class="material-icons-outlined">table_rows</span> user data
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="fetchalumni.php">
                        <span class="material-icons-outlined">table_view</span> Alumni data
                    </a>
                </li>

                <li class="sidebar-list-item">
                    <a href="adminpass.php">
                        <span class="material-icons-outlined">key</span> change password
                    </a>
                </li>

                <hr>


                <li class="sidebar-list-item">
                    <a href="logout.php">
                        <span class="material-icons-outlined">logout</span>Logout
                    </a>
                </li>

            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <h2>DASHBOARD</h2>
            </div>

            <div class="main-cards">

                <div class="card">
                    <div class="card-inner">
                        <h2>USER LOGIN</h2>
                        <span class="material-icons-outlined">login</span>
                    </div>

                    <?php 
            
            $user= "SELECT * FROM `user_registration` ";
            $user_run= mysqli_query($conn,$user);

            if($total = mysqli_num_rows($user_run))
            {
               echo '<h1> '.$total.' </h1>';
            }
            else
            {
              echo  '<h1>No Data</h1>' ;
            }
            
            ?>

                </div>

            </div>

            <!-- Mesage Card -->


            <div class="main-cards mt-5">

                <div class="card">
                    <div class="card-inner">
                        <h2>User Message</h2>
                        <!-- <span class="material-icons-outlined">login</span> -->
                    </div>

                    <div class="mt-2">

                        <h3> <a href="contactalumni.php"> Message </a> </h3>

                    </div>


                </div>

            </div>






        </main>
        <!-- End Main -->

    </div>

    <!-- section-9 footer-->

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

    <!-- Footer -->

    <div class="ft">
        <?php @include 'footer.php';?>
    </div>




</body>
<!-- Custom JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

<script src="../js/dashboard.js"></script>



</html>