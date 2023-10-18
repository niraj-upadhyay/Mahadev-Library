<?php require("conection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCC | pkd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- CSS -->
   
    <link rel="stylesheet" href="../css/header.css">


    
    <style>
    .card {
        background: #a82c48;
        color: white;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-info">

<!-- Header -->

<div class="tulika">
    <?php @include 'adminheader.php';?>
</div>


<?php

if(isset($_GET['delete'])){
  $sr = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `alumni` WHERE `sr` = $sr";
  $result = mysqli_query($conn, $sql);
}


 ?>

 <!-- Fetch Admin name -->


 

 <?php 
                    if(isset($_SESSION['Adminid'])){
                        
                        ?>

                        <!--Fetch admin Name -->

                      <?php
  
                    $sql="SELECT * FROM `admin_login`";
                    $find=mysqli_query($conn,$sql);
                    $num=mysqli_num_rows($find);
                
                    
                    if($num>0)
                    {
                  
                      while($row = mysqli_fetch_assoc($find)){
                  
                        $name = $row["yourname"];
                        $image = $row["image"];
                          
                  
                      }
                    }
                }
                      
                      ?>










    <div class="container" style="margin-top: 125px;">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Mahadev Library</h3>
                    </div>

                    <div class="card-body text-center">
                        <img src="../admin/<?= $image?>" alt="Profile Photo" class="rounded-circle" style="width: 200px">
                        <h4 class="mt-2">
                        <?php echo "$name"; ?>
                        </h4>

                    </div>
                </div>
            </div>
        </div>

        <!-- Search -->

        <div class="mt-4 mb-2 text-center">
            <input type="text" id="myInput" placeholder="Search..." onkeyup="searchFun()"  style="height: 40px;" >
        </div>


        <div class="table-responsive" id="no-more-tables">
            <div class="text-white fs-5">
                <?php date_default_timezone_set('Asia/Kolkata');
                 echo date('d M Y'); ?></div>
            <table class="table bg-warning mt-2" id="myTable">
                <thead class="bg-dark text-light">
                    <tr>
                        <th scope="col">Sr no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Job</th>
                        <th scope="col">image</th>
                        <th scope="col">Operation</th>

                    </tr>
                </thead>
                
                <tbody>

                <?php
            
            $sql = "SELECT * FROM `alumni`";
           $result = mysqli_query($conn, $sql);
           $sno = 0;
           while($row = mysqli_fetch_assoc($result)){
           $sno = $sno + 1;
           echo "
           <tr>
           <th scope='row'>". $sno."</th>
           <td>". $row['name']."</td>
           <td>". $row['job']."</td>
           <td>". $row['image']."</td>
           
            
           <td><button class='delete btn btn-sm btn-primary' id=d".$row['sr'].">Delete</button>  </td>
          
          
           </tr>";
           
    
       }
       ?>

            
                </tbody>
            </table>
        </div>



        <!-- Bitton -->

        <div class="mt-4 mb-4">
            <button type='button' class="btn btn-danger" onclick="location='logout.php'">LOG
                OUT</button>
            <button type='button' class="btn btn-warning" onclick="location='dashboard.php'">BACK</button>
        </div>

    </div>
    
    <!-- Footer -->

    <?php @include 'footer.php';?>

</body>
<!-- Search -->

<script>


const searchFun = () => {
    let filter = document.getElementById('myInput').value.toUpperCase();
    let myTable = document.getElementById('myTable');
    let tr = myTable.getElementsByTagName('tr');

    for (var i = 1; i < tr.length; i++) {
        let row = tr[i];
        let found = false; // Flag to track if the search term is found in any cell of this row

        // Loop through all the cells in this row
        for (var j = 0; j < row.cells.length; j++) {
            let td = row.cells[j];
            if (td) {
                let textValue = td.textContent || td.innerText;
                if (textValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break; // Break out of inner loop if found in any cell
                }
            }
        }

        // Show or hide the row based on whether the search term was found
        if (found) {
            row.style.display = ""; // Display matching row
        } else {
            row.style.display = "none"; // Hide non-matching row
        }
    }
}



</script>






<script>
//  Delete button


deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
        console.log("edit ");
        sr = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this user!")) {
            console.log("yes");

            window.location = `fetchalumni.php?delete=${sr}`;


            // TODO: Create a form and use post request to submit a form
        } else {
            console.log("no");
        }
    })
})
</script>


<!-- <script src="../js/index.js"></script> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>