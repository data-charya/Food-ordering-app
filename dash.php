<?php require_once "./login/controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dash.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="/images/favicon.ico"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?php echo $fetch_info['name'] ?> | Dashboard</title>
</head>
<body>
    <!-- Side navigation -->
<div class="sidenav">
    <div class="container ml-5" style="justify-content:center;">
        <div class="card-title">
            <p style="font-family:'Fredoka One';font-size:80px;color:#fff;">Crunch</p>
        </div>
    </div>
    <div class="container py-2" style="background:#ff3b30;width:300px;height:auto;border-radius:20px;box-shadow: 5px 8px 18px #750f0a;">
        <div class="container my-2" style="background:#9e1f18;width:270px;height:auto;border-radius:20px">
            <a href="dash.php">Home</a>
        </div>
        <div class="container my2" style="background:#9e1f18;width:270px;height:auto;border-radius:20px">
            <a href="index.php" target="_blank">Cart</a>   
        </div>
        <div class="container my-2" style="background:#9e1f18;width:270px;height:auto;border-radius:20px">
            <a href="employee.php" target="_blank">Employees</a>
        </div>
        <div class="container my-2" style="background:#9e1f18;width:270px;height:auto;border-radius:20px">
            <a href="coupon.php" target="_blank">Coupons</a>
        </div> 
    </div>
</div>
<div class="container mt-4" style="width: 70vw;height: auto;background: #5856d6;border-radius: 20px;margin-left: 27rem;box-shadow: 5px 8px 18px #6665a8;">
    <div class="row">
        <div class="col">
            <p style="font-family:'Montserrat';font-weight:900;margin-top:5px;font-size:50px;color:rgb(255, 255, 255);">Hey <?php echo $fetch_info['name'] ?>!</p>
        </div>
        <div class="col mt-4" >
            <a class="crud" href="./login/logout-user.php"><button class="btn px-4 mx-5" style="font-family: 'Fredoka One';font-size: 20px;color: #fff;background: #000738;border-radius: 20px;border: none;color: #fff;font-family: 'Fredoka One';">Logout</button></a>
        </div>
    </div>
    
    
</div>
<div class="container mt-5 " style="background:#ff2d55;border-radius:20px;width:70vw;height:auto;justify-content:center;margin-left: 27rem;">
    <br>
    <div class="row row-cols-1 row-cols-md-3">
        
        <div class="col mb-4">
          <div class="card"  style="border-radius: 20px;background: #fd748d;border: 5px solid #d82848;width: auto;box-shadow: 5px 8px 18px #5f0515;">
            <div class="container mt-2" style="width: 15vw;height: 5vw;border-radius: 20px;background: #d82848;">
                <div class="row">
                    <div class="col mt-1">
                        <i class='fas fa-pizza-slice' style="font-size:40px;margin-top: 15px;color: #fff;"></i>
                    </div>
                    <div class="col mt-2">
                        <p style="font-family: 'Fredoka One';font-size: 20px;color: #fff;">Food Database</p>
                    </div>
                </div>   
            </div>
            <div class="card-body" >
              <h5 class="card-title mx-3" style="font-family: 'Fredoka One';font-size: 20px;color: #5f0515;">Manage Food Items</h5>
              <a class="crud" href="foodcrud.php" target="_blank"><button class="btn px-4 mx-5" style="font-family: 'Fredoka One';font-size: 20px;color: #fff;background: #5856d6;border-radius: 20px;border: none;">Manage</button></a>
            </div>
          </div>
        </div>

        <div class="col mb-4">
            <div class="card"  style="border-radius: 20px;background: #fd748d;border: 5px solid #d82848;box-shadow: 5px 8px 18px #5f0515;">
              <div class="container mt-2" style="width: 15vw;height: 5vw;border-radius: 20px;background: #d82848;">
                  <div class="row">
                      <div class="col mt-1">
                          <i class='fas fa-user-lock' style="font-size:40px;margin-top: 15px;color: #fff;"></i>
                      </div>
                      <div class="col mt-2">
                          <p style="font-family: 'Fredoka One';font-size: 20px;color: #fff;">User Database</p>
                      </div>
                  </div>   
              </div>
              <div class="card-body" >
                <h5 class="card-title mx-4" style="font-family: 'Fredoka One';font-size: 20px;color: #5f0515;">Manage Users</h5>
                <a class="crud" href="userscrud.php" target="_blank"><button class="btn px-4 mx-5" style="font-family: 'Fredoka One';font-size: 20px;color: #fff;background: #5856d6;border-radius: 20px;border: none;">Manage</button></a>
              </div>
            </div>
          </div>

          <div class="col mb-4">
            <div class="card"  style="border-radius: 20px;background: #fd748d;border: 5px solid #d82848;box-shadow: 5px 8px 18px #5f0515;">
              <div class="container mt-2" style="width: 15vw;height: 5vw;border-radius: 20px;background: #d82848;">
                  <div class="row">
                      <div class="col mt-1">
                          <i class='fas fa-utensils' style="font-size:40px;margin-top: 15px;color: #fff;"></i>
                      </div>
                      <div class="col mt-2">
                          <p style="font-family: 'Fredoka One';font-size: 20px;color: #fff;">Hotel Database</p>
                      </div>
                  </div>   
              </div>
              <div class="card-body" >
                <h5 class="card-title mx-4" style="font-family: 'Fredoka One';font-size: 20px;color: #5f0515;">Manage Hotels</h5>
                <a class="crud" href="hotelcrud.php" target="_blank"><button class="btn px-4 mx-5" style="font-family: 'Fredoka One';font-size: 20px;color: #fff;background: #5856d6;border-radius: 20px;border: none;">Manage</button></a>
              </div>
            </div>
          </div>
    </div>
    
            
          

</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>