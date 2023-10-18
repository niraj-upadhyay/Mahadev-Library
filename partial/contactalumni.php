<?php  @include 'conection.php';?>




<?php

if(isset($_GET['delete'])){
  $sr = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `contact` WHERE `sr` = $sr";
  $result = mysqli_query($conn, $sql);
}


 ?>


<?php
            
            $sql = "SELECT * FROM `contact`";
           $result = mysqli_query($conn, $sql);
           
           while($row = mysqli_fetch_assoc($result)){
           
           $id=$row['sr'];

           }


?>


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
            
            flex-wrap: wrap;
        }
    }
    </style>



</head>

<body class=" bg-info">

    <div class="tulika">
        <?php @include 'adminheader.php';?>
    </div>

    <div class="mt-5 pt-3">

        <div class="container mt-5">

            <div class="p-3 mt-2 bg-warning rounded-3 text-white text-center ">
                <h3>Message</h3>
            </div>

            <div class="mt-4 text-center">
            <input type="text" id="myInput" placeholder="Search..." onkeyup="searchFun()"  style="height: 40px;" >
            </div>





            <div class="row justify-content-center gy-2">

                <?php

$select_products = mysqli_query($conn, "SELECT * FROM `contact`");
if(mysqli_num_rows($select_products) > 0){
while($fetch = mysqli_fetch_assoc($select_products)){

    // $id=$row['sr'];

?>

                <div class="col-md-4">

                    <div class="card border-4 border-primary " style="width: 22rem; background-color: aquamarine;">

                        <div class="card-header text-center  border-4 border-primary">

                            <h2 class="good"> Mahadev Library</h2>

                        </div>

                        <div class="card-body ">

                            <h4 class="card-subtitle mb-2 text-body-dark mt-2 font-weight-bold">Name : &nbsp;
                                &nbsp;&nbsp; <strong><?php echo $fetch['name'];?> </strong></h4>

                            <h4 class="card-subtitle mb-2 text-body-dark mt-2">phone : &nbsp;&nbsp;&nbsp; <?php echo $fetch['phone'];?>
                            <h4 class="card-subtitle mb-2 text-body-dark mt-2">Message : &nbsp; <?php echo $fetch['message'];?></h4>
                            <h4 class="card-subtitle mb-2 text-body-dark mt-2">Date : &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo $fetch['dt'];?> </h4>

                            <div class="text-center">
                            <!-- <button type="button" class="btn btn-warning" >Delete</button> -->
                            <button class='delete btn btn btn-warning mt-lg-0 mt-1 mt-md-1' onclick="deleteCard(<?php echo $id ?>)">Delete</button>
                            </div> 

                        </div>


                    </div>



                </div>

                <?php
         };
      };
      ?>

               
            </div>
        </div>

        <!-- Footer -->

        <div class="mt-4">
            <?php @include 'footer.php';?>
        </div>

    </div>


</body>

<!--Searchbar -->
<script>
const searchFun = () => {
    let filter = document.getElementById('myInput').value.toUpperCase();
    let cards = document.querySelectorAll('.card');

    cards.forEach((card) => {
        let name = card.querySelector('.card-body h4 strong').textContent.toUpperCase();
        let phone = card.querySelector('.card-body h4:nth-child(3)').textContent.toUpperCase();
        let message = card.querySelector('.card-body h4:nth-child(4)').textContent.toUpperCase();
        
        
        if (name.includes(filter) || phone.includes(filter) || message.includes(filter)) {
            card.style.display = ''; 
        } else {
            card.style.display = 'none'; 
        }
    });
}
</script>

 
<!-- Delete -->


<script>
function deleteCard(cardId) {
    if (confirm("Are you sure you want to delete this card?")) {
        fetch(`contactalumni.php?delete=${cardId}`)
            .then(response => {
                if (response.ok) {
                    // Remove the card from the DOM
                    const cardToRemove = document.querySelector(`#card_${cardId}`);
                    if (cardToRemove) {
                        cardToRemove.remove();
                    }
                } else {
                    console.error('Error deleting card:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error deleting card:', error);
            });
    }
}

</script>






<!-- Own Js -->
<!-- <script src="../js/index.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>