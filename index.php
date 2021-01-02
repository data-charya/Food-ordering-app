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
  <link rel="shortcut icon" type="image/jpg" href="/images/favicon.ico" />
  <link rel="stylesheet" href="/css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <title>Crunch | Satisfy your craving</title>
</head>

<body style="background-image: url('/images/wall.jpg');">
  <div class="container mt-md-2"
    style="width:100vw;height: 10vw;background: #7579e7;border-radius: 20px;box-shadow: 5px 8px 25px #131544;">
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark"
      style="font-family: 'Montserrat';font-weight: 700;font-size: 25px;color: #fff;">
      <a class="navbar-brand" href="index.php"
        style="font-family: 'Fredoka One';font-size: 70px;color: #000738;">Crunch</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        
      </div>
    </nav>
  </div>
  <br>
  <div class="container mt-md-2 pb-4"
    style="background:#9ab3f5;width: auto;height: auto;border-radius: 20px;box-shadow: 5px 10px 25px #25345f;">
    <div class="row mt-md-2">
      <div class="col mt-3">
        <form method="POST" action="index.php">
          <input class="mt-md-2" name="search" type="text" placeholder="    Search by hotel name.."
            style="font-family: 'Montserrat';font-weight: 400;padding: 5px;border-radius: 20px;border: none;outline: none;width: 30vw;">
          <button type="submit" class="btn" style="border-radius: 20px;background:#7579e7;"><i class="fa fa-search"
              style="color: #fff;"></i></button>
        </form>
      </div>
      <div class="col mt-4">
        <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#dev"
          style="float: right;background: #484baa;font-family: 'Montserrat';font-weight: 400;">
          Meet the Dev's
        </button>
      </div>
    </div>
    <br>
    <div class="container py-4 Hotels" style="border-radius:20px;background:#484baa;width:auto;height:auto;">
      <div class="container-fluid" style="border-radius: 20px;height: auto;">
        <marquee scrollamount="10">
          <div class="row flex-row flex-nowrap ">

            <?php
                        
                        
                        if (isset($_POST['search']))
                        {
                            $con = mysqli_connect("localhost", "root", "");
                            $searchq = $_POST['search'];
                            $searchq = preg_replace("#[^a-z]#i","",$searchq);
                            $query = $database->getHotel($searchq);
                            @$count = mysqli_num_rows($query);
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
        <div class="row">
          <div class="container mb-4"
            style="border-radius:20px;background:#484baa;width:400px;height:100px;box-shadow: 5px 10px 25px #25345f;">
            <p
              style="font-family: 'Montserrat';font-weight: 700;color:#e1e3f3;font-size: 40px;text-align: center;margin-top: 20px;">
              Menu</p>
          </div>
        </div>
        <div class="row">
          <!--Item list starts here-->
          <div class="container py-2 Myscroll" style="box-shadow: 5px 10px 25px #25345f;">
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

      </div>
      <!--cart-->
      <div class="col">
        <div class="container py-4"
          style="width: 25vw;height: auto;background: #339cda;border-radius: 20px;box-shadow: 5px 8px 18px #0b3d5a;">
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
          <div class="container py-2 cartscroll"
            style="border-radius: 20px;width: auto;height: 30vh;background: #104eaa;overflow-y:scroll;-ms-overflow-style: none;scrollbar-width: none;">
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
                            echo "<p style=\"font-family:'Montserrat';font-weight: 700;font-size: 25px;text-align:center;color:#fff;margin-top:50px;\">Cart is Empty</p>";
                        }

                ?>

          </div>
          <br>
          <div class="container" style="border-radius: 20px;width: auto;height: auto;background: #bbe1fa;">
            <div class="py-4">
              <h6 style="font-family:'Montserrat';font-weight:800;color: #0f4c75;">Order Details</h6>
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
                  <h6> <span>&#8377;</span>
                    <?php echo $total; ?>
                  </h6>
                  <h6 class="text-success" style="font-family:'Montserrat';font-weight:800;">FREE</h6>
                  <hr>
                  <h6> <span>&#8377;</span>
                    <?php
                                echo $total;
                                ?>
                  </h6>
                </div>
              </div>

            </div>
          </div>
          <div class="container mt-4" style="border-radius: 20px;height: 80px;">
            <center>
              <button type="button" class="btn mt-3 rounded-pill px-4" data-toggle="modal" data-target="#order"
                style="background: #040e57;font-family: 'Montserrat';font-weight: 700;font-size: 25px;color: #fff;width: auto;height: auto;">
                Order
              </button>
              <!-- Modal -->
              <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="orderTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-body">
                      <!--Card-->
                      <div class="card card-cascade narrower" style="border-radius: 20px;background: #484f88;">
                        <div class="container mt-3 py2"
                          style="border-radius: 20px;width: 400px;height: auto;background: #0c1555;">
                          <br>
                          <h2 class="text-white pb-2">Order Now</h2>
                        </div>
                        <!--Card image-->
                        <div class="gradient-card-header blue-gradient">

                        </div>
                        <!--/Card image-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                          <div class="container"
                            style="border-radius: 20px;width: 200px;height: auto;background: #19247a;">
                            <h4 class="text-white py-2">Select Location</h4>
                          </div>
                          <br>
                          <!--Google map-->
                          <div id="map-container-google-8" class="z-depth-1-half map-container-5"
                            style="height: 300px;">
                            <iframe
                              src="https://maps.google.com/maps?q=BlueberryPlatinum,Mangalore&t=&z=13&ie=UTF8&iwloc=&output=embed"
                              frameborder="0"
                              style="border:0;width: 400px;height: 300px;border-radius: 20px;box-shadow: 5px 10px 20px #1a0b2c;"
                              allowfullscreen></iframe>
                          </div>
                          <div class="container mt-3"
                            style="border-radius: 20px;width: 400px;height: 5rem;background: #000738;">
                            <br>
                            <h6 class="text-white" style="margin-top: 5px;">Location: Blueberry Platinum,Mangalore</h6>
                          </div>
                          <div class="container mt-3"
                            style="border-radius: 20px;width: 400px;height: auto;background: #ffffff;">
                            <br>
                            <h4 class="text" style="margin-top: 5px;color: #19247a;">Payment Gateway</h4>
                            <div class="container mt-3 py2"
                              style="border-radius: 20px;width: 300px;height: auto;background: #19247a;">
                              <br>
                              <h4 class="text-white pb-4">Amount : <span>&#8377;</span>
                                <?php echo $total; ?>
                              </h4>
                            </div>
                            <div class="razorpay-embed-btn" data-url="https://pages.razorpay.com/pl_GIMPZ5hpU3LQYB/view"
                              data-text="Pay Now" data-color="#528FF0" data-size="small">
                              <script>
                                  (function () {
                                    var d = document; var x = !d.getElementById('razorpay-embed-btn-js')
                                    if (x) {
                                      var s = d.createElement('script'); s.defer = !0; s.id = 'razorpay-embed-btn-js';
                                      s.src = 'https://cdn.razorpay.com/static/embed_btn/bundle.js'; d.body.appendChild(s);
                                    } else {
                                      var rzp = window['__rzp__'];
                                      rzp && rzp.init && rzp.init()
                                    }
                                  })();
                              </script>
                            </div>
                          </div>
                          <div class="container mt-3 py-3"
                            style="border-radius: 20px;width: 400px;height: auto;background: #000738;">
                            <h6 class="text-white mt-3 py-2" style="margin-top: 5px;">Alrighty,You're good to go!</h6>
                            <button class="btn btn-success rounded-pill px-4" id="order">Place Order</button>
                          </div>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert"
                          style="display:none;width:300px;">
                          <center>
                            <p><strong>Your Order has been placed ! </strong> Your order is on the way.</p>
                          </center>
                          <button type="button" class="close" data-dismiss="alert" id="x">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!--/.Card content-->
                      </div>
                      <!--/.Card-->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </center>
          </div>
        </div>

      </div>
      <!--cart ends here-->
    </div>
  </div>

  <br>
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="dev" tabindex="-1" aria-labelledby="dev" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 20px;"">
                <div class=" modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Meet the Dev's</h5>
      </div>
      <div class="modal-body" style="background:#0a0b25">
        <div class="card-deck" style="padding-left: 20px;padding-right: 20px;">
          <div class="card " style="border: none;box-shadow:  5px 5px 20px #232571">
            <img class="card-img-top"
              src="https://avatars1.githubusercontent.com/u/62848565?s=460&u=720456e69554e95661703a6ad9360c92a715b478&v=4"
              alt="Card image cap">
            <div class="card-body">
              <center>
                <h5 class="card-title">Shanwill Pinto</h5>
                <p class="card-text">
                  <a href="https://www.linkedin.com/in/shanwill-pinto-b286b7184/" target="_blank"><button
                      class="btn rounded-circle" style="background: #007bb5;color: #fff;"><i
                        class="fab fa-linkedin-in"></i></button></i></a>
                  <a href="https://www.instagram.com/Swo._.osh/" target="_blank"><button class="btn rounded-circle"
                      style="background: #E1306C;color: #fff;"><i class="fab fa-instagram"></i></button></i></a>
                  <a href="https://github.com/data-charya" target="_blank"><button class="btn rounded-circle"
                      style="background: #000;color: #fff;"><i class="fab fa-github"></i></button></i></a>
                </p>
                <p class="card-text"><small class="text-muted">Full Stack Developer</small></p>
              </center>
            </div>
          </div>
          <div class="card" style="border: none;box-shadow:  5px 5px 20px #232571">
            <img class="card-img-top"
              src="https://media-exp1.licdn.com/dms/image/C4E03AQGLE-5aP0_Kag/profile-displayphoto-shrink_200_200/0/1596508313297?e=1614211200&v=beta&t=SLWVdU06bZq3f_0k8zJmssVJBOzBSe_ymcArjcVvjOM"
              alt="Card image cap">
            <div class="card-body">
              <center>
                <h5 class="card-title">Shifali B.S</h5>
                <p class="card-text">
                  <a href="https://www.linkedin.com/in/shifali-b-s-5178a01a3/" target="_blank"><button
                      class="btn rounded-circle" style="background: #007bb5;color: #fff;"><i
                        class="fab fa-linkedin-in"></i></button></i></a>
                  <a href="#" target="_blank"><button class="btn rounded-circle"
                      style="background: #E1306C;color: #fff;"><i class="fab fa-instagram"></i></button></i></a>
                  <a href="#" target="_blank"><button class="btn rounded-circle"
                      style="background: #000;color: #fff;"><i class="fab fa-github"></i></button></i></a>
                </p>
                <p class="card-text"><small class="text-muted">Web Developer</small></p>
              </center>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
</body>
<script>
  $(document).ready(function () {
    $("#order").click(function () {
      $("#alert").attr("style", "display:flex");
    });
    $("#x").click(function () {
      $("#alert").attr("style", "display:none");
      console.log("Hello raksharaj");
    });
  }); 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>