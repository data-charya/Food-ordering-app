<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "crunch",
        $tablename = "fooditems",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             item_name VARCHAR (25) NOT NULL,
                             item_price FLOAT
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    public function getHotels(){
        $sql = "SELECT * FROM hotel";
        $hoteldata = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($hoteldata)>0){
            return $hoteldata;
        }
    }
    public function getHotel($searchq){
        $sql = "SELECT * FROM hotel WHERE hotel_name='$searchq'";
        $query = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($query)>0){
            return $query;
        }
    }

    public function getcoupons(){
        $sql = "SELECT * FROM coupons";
        $coupondata = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($coupondata)>0){
            return $coupondata;
        }
    }

    public function getemployee(){
        $sql = "SELECT emp_name,gender,dept_name FROM employee JOIN department where employee.dept_id = department.dept_id";
        $empdata = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($empdata)>0){
            return $empdata;
        }
    }
}





