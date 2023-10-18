<?php require("conection.php"); ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <!-- <link rel="icon" type="image/x-icon" href="image/fevicon.png"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--Css -->
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
  $sql = "DELETE FROM `fee` WHERE `sr` = $sr";
  $result = mysqli_query($conn, $sql);
}


 ?>


<!-- Edit -->


<div class="modal fade" id="sinupModal" tabindex="-1" aria-labelledby="sinupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success text-center" id="sinupModalLabel">Edit Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">


                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Phone</label>
                        <input type="email" class="form-control" id="email" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Email</label>
                        <input type="password" class="form-control" id="password" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="month" class="form-label">Month</label>
                        <input type="password" class="form-control" id="month" name="month" required>
                    </div>

                    <div class="mb-3">
                        <label for="rupee" class="form-label">Rupee</label>
                        <input type="password" class="form-control" id="rupee" name="rupee" required>
                    </div>

                    <div class="mb-3">
                        <label for="status1" class="form-label">Fee status</label>
                        <input type="password" class="form-control" id="status1" name="status" required>
                    </div>


                    <button type="submit" class="btn btn-primary" name="sinup">Submit</button>
                </form>


            </div>

        </div>
    </div>
</div>


<!-- Fetch -->



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
                    <div class="card-header">
                        <h3 style="text-align:center;">Mahadev Library</h3>
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

        <div class="mt-4 text-center">
            <input type="text" id="myInput" placeholder="Search..." onkeyup="searchFun()"  style="height: 40px;" >
        </div>


        <div class="table-responsive" id="no-more-tables">
            <div class="text-white fs-5">
                <?php date_default_timezone_set('Asia/Kolkata');
                 echo date('d M Y'); ?></div>

            <table class="table bg-light mt-2" id = "myTable">
                <thead class="bg-dark text-light">
                    <tr>
                        <th scope="col">Sr no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Month</th>
                        <th scope="col">Rupees</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Date</th>
                        <th scope="col">Operation</th>

                    </tr>
                </thead>

                <tbody>

                <?php
            
            $sql = "SELECT * FROM `fee`";
           $result = mysqli_query($conn, $sql);
           $sno = 0;
           while($row = mysqli_fetch_assoc($result)){
           $sno = $sno + 1;
           $id=$row['sr'];
           $name=$row['name'];
           $phone=$row['phone'];
           $email=$row['email'];
           $month=$row['month'];
           $rupee=$row['rupee'];
           $status=$row['status'];
           $dt=$row['dt'];
           ?>

                    <tr>  

                    <?php  
                    if($status==='paid'){
                    ?>

                         <td scope='row' style="display: none;"><?php echo $id ?></td>
                        <td scope='row' class="bg-success text-light"  ><?php echo $sno ?></td>


                        <td class="bg-success text-white"> 
                            <?php echo $name ?> 
                        </td>
                        <td class="bg-success text-white"> 
                            <?php echo $phone ?> 
                        </td>
                        <td class="bg-success text-white"> 
                            <?php echo $email ?> 
                        </td>
                        <td class="bg-success text-white"> 
                            <?php echo $month ?>
                         </td>
                        <td class="bg-success text-white"> 
                            <?php echo $rupee ?>
                         </td>
                        <td class="bg-success text-white">
                             <?php echo $status ?> 
                        </td>
                        <td class="bg-success text-white"> 
                            <?php echo $dt ?> 
                        </td>
                       

                        <td class="bg-success text-light"><a class='edit btn btn-sm btn-primary' href="update.php?updateid=<?php echo $id ?>" class='text-light'>Edit</a> <button class='delete btn btn-sm btn-primary mt-lg-0 mt-1 mt-md-1 mx-1' id='<?php echo $id ?>'>Delete</button> </td>
                  <?php  } else
                  { ?>
                    

                    <td scope='row' style="display: none;"><?php echo $id ?></td>
                        <td scope='row' class="bg-warning text-dark"><?php echo $sno ?></td>


                        <td class="bg-warning text-dark"> 
                            <?php echo $name ?> 
                        </td>
                        <td class="bg-warning text-dark"> 
                            <?php echo $phone ?> 
                        </td>
                        <td class="bg-warning text-dark"> 
                            <?php echo $email ?> 
                        </td>
                        <td class="bg-warning text-dark"> 
                            <?php echo $month ?>
                         </td>
                        <td class="bg-warning text-dark"> 
                            <?php echo $rupee ?>
                         </td>
                        <td class="bg-warning text-dark">
                             <?php echo $status ?> 
                        </td>
                        <td class="bg-warning text-dark"> 
                            <?php echo $dt ?> 
                        </td>
                       

                        <td class="bg-warning text-light"><a class='edit btn btn-sm btn-primary' href="update.php?updateid=<?php echo $id ?>" class='text-light'>Edit</a> <button class='delete btn btn-sm btn-primary mt-lg-0 mt-1 mt-md-1 mx-1' id='<?php echo $id ?>'>Delete</button> </td>



















                 <?php } ?>


                    </tr>





       <?php }

       ?>

                </tbody>
            </table>
        </div>



        <div class="mt-4 mb-4">
            <button type='button' class="btn btn-danger" onclick="location='logout.php'">LOG
                OUT</button>
            <button type='button' class="btn btn-warning" onclick="location='dashboard.php'">BACK</button>
        </div>

    </div>


    <!-- Footer -->

     <div class="ft">
        <?php @include 'footer.php';?>
    </div>

    

</body>


<!-- Search Table JavaScript -->
<script>
const searchFun = () => {
    let filter = document.getElementById('myInput').value.toUpperCase();
    let myTable = document.getElementById('myTable');
    let tr = myTable.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        let row = tr[i];
        let found = false; // Flag to track if the search term is found in any cell of this row

        // Loop through all the cells in this row
        for (let j = 0; j < row.cells.length; j++) {
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




</html>




















<!-- Optional JavaScript -->




<!-- Delete -->

<script>

deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
        console.log("edit ");
        sr = e.target.id;
        if (confirm("Are you sure you want to delete this user!")) {
            console.log("yes");
            console.log(sr);

            window.location = `Feefetch.php?delete=${sr}`;


            // TODO: Create a form and use post request to submit a form
        } else {
            console.log("no");
        }
    })
})
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



</html>