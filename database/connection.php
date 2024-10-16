<?php
$servername="localhost:3307";
$username="root";
$password="Thulash9@";
$database="inventory";


$connection = new mysqli($servername,$username,$password,$database);
 
try{
       if($connection->connect_error){
        throw new Exception("Connection failed".$connection->connect_error);
    }
}catch(Exception $error){
   $errorMessage = $error->getMessage();
}

?>