
<?php 
@include 'conection.php';
session_start();

if(isset($_SESSION['loggedin'])){
    
$email= $_SESSION['email'];
$sql="SELECT * FROM `user_registration` WHERE `email`='$email'";
$find=mysqli_query($conn,$sql);
$num=mysqli_num_rows($find);
if($num>0)
{
  while($row = mysqli_fetch_assoc($find)){
    $image = $row["image"];
    $name = $row["username"];
  }
}

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyFee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- <link rel="icon" type="image/x-icon" href="image/fevicon.png">  -->

     <!-- OWN CSS -->
     <link rel="stylesheet" href="../css/header.css">

  


    <style>
    .card {
        background: #a82c48;
        color: white;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-info">


<div class="niraj">
    <?php @include 'userheader1.php';?>
</div>



    <div class="container" style="margin-top: 128px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Mahadev Library</h3>
                    </div>
                   
                    <div class="card-body text-center">
                        <img src="../Niraj/<?= $image?>" alt="Profile Photo" class="rounded-circle"
                            style="width: 200px">
                        <h4 class="mt-2">
                           <?php echo $name ?>
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
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Month</th>
                        <th scope="col">Rupees</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                 if(isset($_SESSION['loggedin']))
                 {
                    $email= $_SESSION['email'];
                   $sql="SELECT * FROM `fee` WHERE `email`='$email'";
                   $result=mysqli_query($conn,$sql);
                   
                   $sno = 0;
                   while($row = mysqli_fetch_assoc($result))
                   {
                     $sno = $sno + 1;
                     echo "
                  <tr>
                  <th scope='row'>". $sno."</th>
                  <td>". $row['name']."</td>
                  <td>". $row['phone']."</td>
                  <td>". $row['email']."</td>
                  <td>". $row['month']."</td>
                  <td class='bg-danger text-white'> ₹ ". $row['rupee']."</td>
                  <td class='bg-success text-white'>". $row['status']."</td>
                  <td>". $row['dt']."</td>
                 </tr>";



                   }


                 }

                ?>
                  


                </tbody>
            </table>
        </div>
        <div class="mt-4 mb-4">
            <button type='button' class="btn btn-danger" onclick="location='logout.php'">LOG
                OUT</button>
            <button type='button' class="btn btn-warning" onclick="location='../index.php'">BACK</button>
        </div>

    </div>

 <!-- footer -->

 <div class="footerg">
        <?php @include 'footer.php';?>
 </div>


</body>

<!-- Searchbar -->

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




<!-- <script src="js/javascript1.js"></> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
