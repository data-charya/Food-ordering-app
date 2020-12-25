<?php
function comp($item_name, $item_price, $id){
    $com = "
    <form action=\"index.php\" method=\"post\">
    <div class=\"container py-2 mb-3\" style=\"border-radius: 20px;width: 30vw;height: auto;background: #d4ebd0;box-shadow: 5px 8px 18px #56b0e1;\">
        <div class=\"row\">
            <div class=\"col\">
                <p style=\"font-family: 'Montserrat';font-weight: 900;font-size: 20px;color: #363062;\">$item_name</p>
                <p style=\"font-family: 'Montserrat';font-weight: 600;font-size: 15px;color: #7f74c2;\">Rs.$item_price</p>
            </div>
            <div class=\"col mt-4\">
                <button class=\"btn\" name =\"add\" type=\"submit\" style=\"border-radius: 20px;background: #000839;width: 8vw;height: 5vh;color: #fff;font-family: 'Montserrat';font-weight: 400;\">Add to Cart</button>
                <input type='hidden' name='id' value='$id'>
            </div>
        </div>
    </div>
    </form>
    ";

    echo $com;
}

function cartcomp($item_name,$item_price,$id){
    $cartcom = "
            <form action=\"index.php?action=remove&id=$id\" method=\"post\">
                <div class=\"container \" style=\"border-radius: 20px;width: auto;height: auto;background: #3f82fd;box-shadow: 5px 8px 12px #0d66a5;\">
                    <div class=\"row\">
                      <div class=\"col mt-md-2\">
                        <p style=\"font-family: 'Montserrat';font-weight: 700;font-size: 25px;color: #fff;\">$item_name</p>
                        <p style=\"font-family: 'Montserrat';font-weight: 600;font-size: 17px;color: #000738;\">Rs.$item_price</p>
                      </div>
                      <div class=\"col mt-md-4\">
                        <button type=\"submit\" class=\"btn rounded-pill\" name=\"remove\" style=\"font-family: 'Montserrat';font-weight:400;color: #fff;background: #000738;\">Remove</button>
                      </div>
                    </div>
                  </div> 
                  <br>  
            </form>
    ";
    echo $cartcom;
}

function hotels($hotelname,$hoteltype,$hotellocation,$hotelimage,$hotellink){
  $hot = "
  
  
          <!--Hotel Cards-->
          <div class=\"col-3 mx-4\" style=\"width: 15rem;height:20rem;background: #fff;border-radius: 20px;box-shadow: 5px 8px 18px #0b0d41;\">
              <div class=\"card mt-4\" style=\"width: 15rem;font-family: 'Montserrat';border: none;\">
                  <h5 class=\"card-title\" style=\"font-weight: 700;align-self: center;font-size: 25px;\">$hotelname</h5>
                  <img class=\"card-img-top \" src=\"$hotelimage\" style=\"border-radius: 20px;width: 200px;height: 100px;align-self: center;\">
                  <br>
                  <p class=\"card-text\" style=\"align-self: center;font-weight: 600;\">$hoteltype</p>
                  <p class=\"card-text\" style=\"align-self: center;font-weight: 400;\">$hotellocation</p>
                  <a href=\"$hotellink\" target=\"_blank\" class=\"btn btn-primary rounded-pill\" style=\"width: 150px;align-self: center;\">Take me Here</a>
              </div>
          </div>
          <!--End-->
  ";
  echo $hot;
}

function coup($value,$desc,$link){
  $coupon = "
            <div class=\"container py-2 mb-5\" style=\"border-radius: 20px;width: 20vw;height: auto;background: #31326f;box-shadow: 5px 8px 18px #084239;\">
              <div class=\"row\">
                  <div class=\"col\">
                      <p style=\"font-family: 'Montserrat';font-weight: 900;font-size: 120px;color: #fff;\">$value%</p>
                      <p style=\"font-family: 'Montserrat';font-weight: 800;font-size: 30px;color: #968dce;\">$desc</p>
                  </div>
                  <div class=\"col mt-4\">
                      <a href=\"$link\" target=\"_blank\"><button class=\"btn\" name =\"add\" type=\"submit\" style=\"border-radius: 20px;background: #000839;width: 10vw;height: 5vh;color: #fff;font-family: 'Montserrat';font-weight: 400;\">Alright let's go!</button></a>
                  </div>
              </div>
            </div>
  ";

  echo $coupon;
}


function emp($name,$gender,$dep){
  $work = "
            <div class=\"container py-3 mb-5\" style=\"border-radius: 20px;width: 20vw;height: auto;background: #27296d;box-shadow: 5px 8px 18px #141771;\">
              <div class=\"row\">
                  <div class=\"col\">
                    <div class=\"container py-2\" style=\"width:auto;height:auto;border-radius:20px;background:#5e63b6;\">
                      <br>
                      <p style=\"font-family: 'Montserrat';font-weight: 900;font-size: 40px;color: #fff;\">$name</p>
                    </div>
                      <p style=\"font-family: 'Montserrat';font-weight: 800;font-size: 25px;color: #a393eb;\">Gender : $gender</p>
                      <p style=\"font-family: 'Montserrat';font-weight: 800;font-size: 30px;color: #f5c7f7;\">$dep</p>
                  </div>
              </div>
            </div>
  ";

  echo $work;
}