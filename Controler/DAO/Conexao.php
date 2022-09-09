<?php
     $hostname = "localhost";
     $username = "root";
     $password = "";
     $database = "login";

     $mysqli = new mysqli($hostname, $username,$password,$database);

    if ($mysqli->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

     
    
    


?>