<?php
session_start();
require_once ('php/CreateDb.php');
require_once ('php/cmp.php');

$database = new CreateDb("Crunch", "Fooditems");

$db = new CreateDb("Crunch","Fooditems");

if (isset($_POST['add'])){
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "id");

      if(in_array($_POST['id'], $item_array_id)){
          echo "<script>alert('Product is already added in the cart..!')</script>";
          echo "<script>window.location = 'home.php'</script>";
      }else{

          $count = count($_SESSION['cart']);
          $item_array = array(
              'id' => $_POST['id']
          );

          $_SESSION['cart'][$count] = $item_array;
      }

  }else{

      $item_array = array(
              'id' => $_POST['id']
      );

      // Create new session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
  }
}


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed !')</script>";
              echo "<script>window.location = 'home.php'</script>";
          }
      }
  }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="/images/favicon.ico"/>
    <link rel="stylesheet" href="/css/coupon.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <title>Crunch | Satisfy your craving</title>
</head>
<body >
  <div class="container mt-md-2" style="width:100vw;height: 10vw;background: #7579e7;border-radius: 20px;">
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark" style="font-family: 'Montserrat';font-weight: 700;font-size: 25px;color: #fff;">
        <a class="navbar-brand" href="index.php" style="font-family: 'Fredoka One';font-size: 70px;color: #2d2079;">Crunch</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="employee.php">Employee</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="coupon.php">Coupons</a>
            </li>
          </ul>
        </div>
    </nav>
  </div> 
  <br>
  <div class="container">
    <p style="font-size: 50px;color: #2d2079;font-family: 'Montserrat';font-weight: 900;">Here's some coupons for you!</p>
  </div>
  <br>
  <div class="container">
    <!--Item list starts here-->
    <div class="container py-2 cou">
        <br>

        <!--coupon cards start here-->
        <div class="row py-4">
        
            <?php 
                $coupondata = $database->getcoupons();
                while ($row = mysqli_fetch_assoc($coupondata)){
                    coup($row['coupon_value'], $row['coupon_desc'], $row['coupon_link']);
                }
            ?>
        </div>
        
        <!--Ends here-->
    </div>
    <!--Item list ends here-->
  </div>
<br>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>