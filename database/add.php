<?php
// Start the session.
session_start();

// Retrieve values from session and POST request
$table_name = $_SESSION['table'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$encrypted = password_hash($password, PASSWORD_DEFAULT);


// Include the database connection
include('connection.php'); // Assumes you have a connection.php file with $conn defined as the connection

// Adding the record using MySQLi
try {
    // Prepare the SQL statement with placeholders
    $stmt = $connection->prepare("INSERT INTO $table_name (first_name, second_name, email, password, created_at, updated_at)
                            VALUES (?, ?, ?, ?, NOW(), NOW())");
    
    // Bind the parameters to the placeholders
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $encrypted);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If successful, prepare a success response

        $response = [
            'success' => true,
            'message' => $first_name . ' ' . $last_name . ' successfully added to the system.'
        ];
    } else {

        $response = [
            'success' => false,
            'message' => 'Error adding ' . $first_name . ' ' . $last_name . ' to the system.'
        ];
        // If the execution failed, prepare an error response
        $response = [
            'success' => false,
            'message' => 'Error: Unable to add ' . $first_name . ' ' . $last_name . ' to the system.'

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

?>
