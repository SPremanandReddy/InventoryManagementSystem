<?php
include('connection.php');
$stmt = $connection->prepare("SELECT * FROM users ORDER BY created_at DESC");
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);
return $users;
?>