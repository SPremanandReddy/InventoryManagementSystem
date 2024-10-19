<?php
// Start the session.
// session_start();
// $table_name = $_SESSION['table'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $encrypted = password_hash ($password, PASSWORD_DEFAULT);
// Adding the record.
// try {
// $command = "INSERT INTO
// $table_name(first_name, second_name, email, password, created_at, updated_at)
// VALUES
// ('".$first_name."' .'" .$last_name."', '".$email." ','".$encrypted."', NOW(), NOW())";
// include('connection.php');
// $connection->exec($command);
// $response = [
// 'success' => true,
// 'message' => $first_name.' '. $last_name.' successfully added to the system. '
// ];
// } catch (PDOException $e) {
// echo
// $response = [
// 'success' => false,
// 'message' => $first_name.' '. $last_name. 'successfully added to the system. '
// ];
// }
// $_SESSION['response']=$response;
// header('location: ../users-add.php');
?>




<?php
// Start the session.
session_start();
$table_name = $_SESSION['table'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$encrypted = password_hash($password, PASSWORD_DEFAULT);

// Adding the record using MySQLi.
try {
    // Include the connection file
    include('connection.php'); // Make sure this file uses MySQLi connection

    // Prepare the SQL command using prepared statements to prevent SQL injection.
    $stmt = $connection->prepare("INSERT INTO $table_name (first_name, second_name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");

    // Bind the parameters
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $encrypted);

    // Execute the query
    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => $first_name . ' ' . $last_name . ' successfully added to the system.'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error adding ' . $first_name . ' ' . $last_name . ' to the system.'
        ];
    }

    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ];
}

// Save the response to the session
$_SESSION['response'] = $response;

// Redirect to the users-add.php page
header('Location: ../users-add.php');
exit();
?>
