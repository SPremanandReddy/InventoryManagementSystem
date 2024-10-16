<?php
    session_start();

    if(isset($_SESSION['user'])) header('location: dashboard.php');
   $error_message = ""; // Correct variable name
   if($_POST){
       include('database\connection.php');
       

       $username = $_POST['username'];
       $password = $_POST['password'];
       
       // Prepare the query with placeholders to prevent SQL injection
       $query = 'SELECT * FROM USERS WHERE users.email = ? AND users.password = ?';
       $stmt = $connection->prepare($query);
       $stmt->bind_param('ss', $username, $password);
       $stmt->execute();
       $result = $stmt->get_result();
       
       // Check if any result matches the credentials
       if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $_SESSION['user']=$user;
        header('Location: dashboard.php');
        exit();
           // Success logic (e.g., redirect or continue to the next page)
       } else {
           // Set the error message if no rows were returned
           $error_message = "Please make sure to enter the correct username and password.";
       }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS LOGIN INVENTORY MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body id="loginBody">
    <?php
     if(!empty($error_message)) { 
        ?>
        <div id="errorMessage" style="color: red; font-weight: bold;">
            <p>Error: <?= $error_message ?></p>
        </div>
    <?php
 } 
 ?>
    <div class="container">
        <div class="loginHeader">
            <h1>IMS</h1>
            <p>INVENTORY MANAGEMENT SYSTEM</p>
        </div>
        <div class="loginBody">
            <form action="login.php" method="POST">
                <div class="loginInputsContainer">
                    <label for="username">USERNAME</label>
                    <input placeholder="Enter Your Username..." type="text" name="username" id="username">
                </div>
                <div class="loginInputsContainer">
                    <label for="password">PASSWORD</label>
                    <input placeholder="Enter Your Password..." type="password" name="password" id="password">
                </div>
                <div class="loginButtonContainer">
                    <button type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
