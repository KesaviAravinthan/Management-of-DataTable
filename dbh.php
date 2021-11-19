
<?php 

// $dbServerName = "localhost";
// $dbUserName = "root";
// $password = "";
// $dbName="hipster";


// $conn = mysqli_connect($dbServerName,$dbUserName,$password,$dbName,"3310");

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
//   }

  



$conn = mysqli_connect("localhost","root","","phplessons1","3310");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }