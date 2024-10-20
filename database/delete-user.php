<?php
// $data = $_POST;
// $user_id = (int) $data['user_id'];
// $first_name = $data['f_name'];
// $last_name =  $data['l_name'];
// // Adding the record.
// try {
// $command = "DELETE FROM users WHERE id={$user_id}";
// include('connection.php');
// $conn->exec($command);
// echo json_encode([
//   'success'=>true,
//   'message'=>$first_name. ' '. $last_name.'successfully deleted. '
// ]);
// } catch (PDOException $e) {
// return json_encode([
// 'success' => false,
// 'message' => 'Error processing your request!'
// ]);
// }

?>

<?php
// $data = $_POST;
// $user_id = (int) $data['user_id'];
// $first_name = $data['f_name'];
// $last_name = $data['l_name'];

// // Adding the record using MySQLi.
// try {
//     // Include the connection file
//     include('connection.php'); // Ensure this file uses MySQLi connection

//     // Prepare the SQL command using a prepared statement to prevent SQL injection.
//     $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
    
//     // Bind the parameter (user_id) to the prepared statement
//     $stmt->bind_param("i", $user_id);

//     // Execute the query
//     if ($stmt->execute()) {
//         echo json_encode([
//             'success' => true,
//             'message' => $first_name . ' ' . $last_name . ' successfully deleted.'
//         ]);
//     } else {
//         echo json_encode([
//             'success' => false,
//             'message' => 'Error processing your request!'
//         ]);
//     }

//     // Close the statement
//     $stmt->close();
// } catch (Exception $e) {
//     echo json_encode([
//         'success' => false,
//         'message' => 'Error: ' . $e->getMessage()
//     ]);
// }

// $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
// $stmt->bind_param("i", $user_id);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows === 0) {
//     echo json_encode([
//         'success' => false,
//         'message' => 'User not found.'
//     ]);
//     exit;
// }

// Close the MySQLi connection
// $stmt->close();
// $connection->close();
?>


<?php
// $data = $_POST;

// if (!isset($data['user_id'], $data['f_name'], $data['l_name'])) {
//     echo json_encode([
//         'success' => false,
//         'message' => 'Missing required parameters.'
//     ]);
//     exit;
// }

// $user_id = (int) $data['user_id'];
// $first_name = $data['f_name'];
// $last_name = $data['l_name'];

// try {
    // Include the connection file
    // include('connection.php'); // Ensure this file uses MySQLi connection

    // // Check if the user exists before attempting to delete
    // $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
    // $stmt->bind_param("i", $user_id);
    // $stmt->execute();
    // $result = $stmt->get_result();

    // if ($result->num_rows === 0) {
    //     echo json_encode([
    //         'success' => false,
    //         'message' => 'User not found.'
    //     ]);
    //     $stmt->close();
    //     exit;
    // }

    // Prepare the SQL command to delete the user
    // $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    // $stmt->bind_param("i", $user_id);

    // Execute the query
    // if ($stmt->execute()) {
    //     echo json_encode([
    //         'success' => true,
    //         'message' => $first_name . ' ' . $last_name . ' successfully deleted.'
    //     ]);
    // } else {
    //     echo json_encode([
    //         'success' => false,
    //         'message' => 'Error processing your request!'
    //     ]);
    // }

    // Close the statement
//     $stmt->close();
// } catch (Exception $e) {
//     echo json_encode([
//         'success' => false,
//         'message' => 'Error: ' . $e->getMessage()
//     ]);
// }

// Close the MySQLi connection
// $connection->close();
?>


<?php
// $data = $_POST;

// if (!isset($data['user_id'], $data['f_name'], $data['l_name'])) {
//     echo json_encode([
//         'success' => false,
//         'message' => 'Missing required parameters.'
//     ]);
//     exit;
// }

// $user_id = (int) $data['user_id'];
// $first_name = $data['f_name'];
// $last_name = $data['l_name'];

// try {
    // Include the connection file
    // include('connection.php'); // Ensure this file uses MySQLi connection

    // Check if the user exists before attempting to delete
    // $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
    // $stmt->bind_param("i", $user_id);
    // $stmt->execute();
    // $result = $stmt->get_result();

    // if ($result->num_rows === 0) {
    //     echo json_encode([
    //         'success' => false,
    //         'message' => 'User not found.'
    //     ]);
    //     $stmt->close();
    //     exit;
    // }

    // Prepare the SQL command to delete the user
    // $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    // $stmt->bind_param("i", $user_id);

    // // Execute the query
    // if ($stmt->execute()) {
    //     echo json_encode([
    //         'success' => true,
    //         'message' => $first_name . ' ' . $last_name . ' successfully deleted.'
    //     ]);
    // } else {
    //     echo json_encode([
    //         'success' => false,
    //         'message' => 'Error processing your request!'
    //     ]);
    // }

    // Close the statement
//     $stmt->close();
// } catch (Exception $e) {
//     echo json_encode([
//         'success' => false,
//         'message' => 'Error: ' . $e->getMessage()
//     ]);
// }

// Close the MySQLi connection
// $conn->close();
?>

<?php
session_start();
$data = $_POST;

if (!isset($data['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Missing required parameters.'
    ]);
    exit;
}

$user_id = (int) $data['user_id'];
$first_name = $data['f_name'];
$last_name = $data['l_name'];

try {
    // Include the database connection file
    include('connection.php');

    // Check if the user exists before attempting to delete
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $check_stmt->bind_param("i", $user_id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows === 0) {
        echo json_encode([
            'success' => false,
            'message' => 'User not found.'
        ]);
        $check_stmt->close();
        exit;
    }
    $check_stmt->close();

    // Prepare the SQL command to delete the user
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => $first_name . ' ' . $last_name . ' successfully deleted.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'An error occurred while processing your request.'
        ]);
    }

    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}

$conn->close();
?>

