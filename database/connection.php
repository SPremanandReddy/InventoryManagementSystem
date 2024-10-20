<?php
$servername="localhost";
$username="root";
$password="";
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