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
          echo "<script>window.location = 'index.php'</script>";
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
              echo "<script>window.location = 'index.php'</script>";
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
    <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <title>Crunch | Satisfy your craving</title>
</head>
<body>
  <div class="container mt-md-2" style="width:100vw;height: 10vw;background: #7579e7;border-radius: 20px;">
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark" style="font-family: 'Montserrat';font-weight: 700;font-size: 25px;color: #fff;">
        <a class="navbar-brand" href="index.php" style="font-family: 'Fredoka One';font-size: 70px;color: #000738;">Crunch</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="employee.php">Employees</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="coupon.php">Coupons</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action ="login/login-user.php">
            <a href="login/login-user.php"><button class="btn my-2 my-sm-0" type="submit" style="background: #d2fafb;border-radius: 20px;color: #2b7cc9;font-family: 'Montserrat';font-weight: 700;">Dashboard</button></a>
          </form>
        </div>
    </nav>
  </div> 
  <div class="container mt-md-2 pb-4" style="background:#9ab3f5;width: auto;height: auto;border-radius: 20px;">
    <div class="row mt-md-2">
        <div class="col mt-3">
            <form method="POST" action="index.php">
                <input class="mt-md-2" name="search" type="text" placeholder="    Search by hotel name.." style="font-family: 'Montserrat';font-weight: 400;padding: 5px;border-radius: 20px;border: none;outline: none;width: 30vw;">
                <button type="submit" class="btn" style="border-radius: 20px;background:#7579e7;"><i class="fa fa-search" style="color: #fff;"></i></button>
            </form>
        </div>
    </div>
    <br>
    <div class="container py-4 Hotels" style="border-radius:20px;background:#484baa;width:auto;height:auto;">
        <div class="container-fluid" style="border-radius: 20px;height: auto;">
            <marquee scrollamount="10" >
                <div class="row flex-row flex-nowrap ">
            
                    <?php
                        
                        
                        if (isset($_POST['search']))
                        {
                            $con = mysqli_connect("localhost", "root", "");
                            $searchq = $_POST['search'];
                            $searchq = preg_replace("#[^a-z]#i","",$searchq);
                            $query = $database->getHotel($searchq);
                            $count = mysqli_num_rows($query);
                            $output = '';
                            if($count == 0)
                            {
                                $output = 'There were no search results!';
                            }else
                            {
                                while ($row = mysqli_fetch_assoc($query))
                                    {
                                        hotels($row['hotel_name'], $row['hotel_type'],$row['hotel_location'], $row['hotel_img'], $row['hotel_address']);
                                    }
                            }
                        
                            
                            //end
                        }
                        else
                        {
                            $hoteldata = $database->getHotels();
                            while ($row = mysqli_fetch_assoc($hoteldata))
                            {
                                hotels($row['hotel_name'], $row['hotel_type'],$row['hotel_location'], $row['hotel_img'], $row['hotel_address']);
                            }
                        }
                    ?>
                    
                </div>
            </marquee>
            </div>
        </div>
    </div> 
    </div>
  </div> 
  <br>
  <div class="container">
    <div class="row">
        <div class="col">
            <!--Item list starts here-->
            <div class="container py-2 Myscroll">
                <br>
                <!--Item cards start here-->
                <?php
                $result = $database->getData();
                    while ($row = mysqli_fetch_assoc($result)){
                        comp($row['item_name'], $row['item_price'], $row['id']);
                    }
                ?>
                <!--Ends here-->
            </div>
            <!--Item list ends here-->
        </div>
        <!--cart-->
        <div class="col">
            <div class="container py-4" style="width: 25vw;height: auto;background: #339cda;border-radius: 20px;box-shadow: 5px 8px 18px #888888;">
                <br>
                <div class="container" style="border-radius: 20px;width: auto;height: 10vh;background: #bbe1fa;">
                    <div class="row">
                        <div class="col">
                            <i class='fas fa-shopping-cart' style="font-size:40px;margin-top: 15px;color: #000738;"></i>
                        </div>
                        <div class="col mt-1">
                            <p style="font-family: 'Montserrat';font-weight: 700;color:#040e57;font-size: 40px;">Cart</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container py-2 cartscroll" style="border-radius: 20px;width: auto;height: 30vh;background: #a3d3f5;overflow-y:scroll;-ms-overflow-style: none;scrollbar-width: none;">
                  <br>
                  <?php

                        $total = 0;
                        if (isset($_SESSION['cart'])){
                            $proid = array_column($_SESSION['cart'], 'id');
                        
                            $result = $db->getData();
                            while ($row = mysqli_fetch_assoc($result)){
                                foreach ($proid as $id){
                                    if ($row['id'] == $id){
                                        cartcomp($row['item_name'],$row['item_price'], $row['id']);
                                        $total = $total + (int)$row['item_price'];
                                    }
                                }
                            }
                        }
                        else{
                            echo "<h5 >Cart is Empty</h5>";
                        }

                ?>

                </div>
                <br>
                <div class="container" style="border-radius: 20px;width: auto;height: auto;background: #bbe1fa;">
                  <div class="py-4">
                    <h6 style="font-family:'Montserrat';font-weight:800;color: #0f4c75;">PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details" style="font-family:'Montserrat';font-weight:800;color: #0f4c75;">
                        <div class="col-md-6" style="font-family:'Montserrat';font-weight:800;color: #0f4c75;">
                            <?php
                                if (isset($_SESSION['cart'])){
                                    $count  = count($_SESSION['cart']);
                                    echo "<h6 style=\"font-family:'Montserrat';font-weight:800;\">Price ($count items)</h6>";
                                }else{
                                    echo "<h6 style=\"font-family:'Montserrat';font-weight:800;\">Price (0 items)</h6>";
                                }
                            ?>
                            <h6 style="font-family:'Montserrat';font-weight:800;">Delivery Charges</h6>
                            <hr>
                            <h6 style="font-family:'Montserrat';font-weight:800;">Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6> <span>&#8377;</span><?php echo $total; ?></h6>
                            <h6 class="text-success" style="font-family:'Montserrat';font-weight:800;">FREE</h6>
                            <hr>
                            <h6> <span>&#8377;</span><?php
                                echo $total;
                                ?></h6>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--cart ends here-->
    </div>
  </div>
  
<br>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>