<?php
session_start();
require_once ('php/CreateDb.php');
require_once ('php/cmp.php');

$database = new CreateDb("Crunch", "employee");

$db = new CreateDb("Crunch","employee");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
    <link rel="stylesheet" href="emp.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <title>Crunch | Satisfy your craving</title>
</head>
<body>
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
          <form class="form-inline my-2 my-lg-0" action ="login/login-user.php">
            <a href="login/login-user.php"><button class="btn my-2 my-sm-0" type="submit" style="background: #d2fafb;border-radius: 20px;color: #2b7cc9;font-family: 'Montserrat';font-weight: 700;">Dashboard</button></a>
          </form>
        </div>
    </nav>
  </div> 
  <br>
  <div class="container">
    <p style="font-size: 50px;color: #2d2079;font-family: 'Montserrat';font-weight: 900;">Our Employees</p>
  </div>
  <br>
  <div class="container">
    <!--Item list starts here-->
    <div class="container py-2 cou">
        <br>

        <!--coupon cards start here-->
        <div class="row py-4">
        
            <?php 
                $empdata = $database->getemployee();
                while ($row = mysqli_fetch_assoc($empdata)){
                    @emp($row['emp_name'], $row['gender'], $row[dept_name]);
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