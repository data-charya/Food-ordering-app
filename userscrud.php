<?php

require_once ("./php/component.php");
require_once ("./php/useroperation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <title>Crunch Dashboard</title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
    <div class="container text-center">
        <a href="dash.php" style="text-decoration: none;"><h1 class="py-4 text-light rounded" style="background:#FF8800;font-size:40px"><p style="font-family: 'Fredoka One', cursive">Users Dashboard</p></h1></a>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50" style="font-family:'Montserrat';">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge' style=\"color:#fff\"></i>","ID", "id",setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-user-circle' style=\"color:#fff\"></i>","User Name", "name",""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-at' style=\"color:#fff\"></i>","User Email", "email",""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-key' style=\"color:#fff\"></i>","User Password", "password",""); ?>
                </div>
                <div class="row">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-qrcode' style=\"color:#fff\"></i>","Code", "code",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-flag' style=\"color:#fff\"></i>","Status", "status",""); ?>
                    </div>
                </div>
                </div>
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success rounded-pill","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary rounded-pill","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-info border rounded-pill","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger rounded-pill","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn();?>
                </div>
            </form>
        </div>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data rounded-pill">
            <table class="table table-dark" style="border-radius:20px;">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                   if(isset($_POST['read'])){
                       $result = getData();

                       if($result){

                           while ($row = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['email']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['password']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['code']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></td>
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                               </tr>

                   <?php
                           }

                       }
                   }


                   ?>
                </tbody>
            </table>
        </div>


    </div>
</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../php/user.js"></script>
</body>
</html>