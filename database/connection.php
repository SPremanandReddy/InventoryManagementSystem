<?php
$servername="localhost:3307";
$username="root";
$password="Thulash9@";
$database="inventory";



try{
    $connection = new mysqli($servername,$username,$password,$database);
    if($connection->connect_error){
        throw new Exception("Connection failed".$connection->connect_error);
    }
}catch(Exception $error){
   $errorMessage = $error->getMessage();
}

?>