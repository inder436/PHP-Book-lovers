<?php
ob_start();

// auth check
require_once('auth.php');

//get the book id
$user_id = $_GET['user_id'];

//connect to the database
require_once ('db.php');

//set up the query

$sql = "DELETE FROM user WHERE user_id = :user_id";

//prepare
$cmd = $conn->prepare($sql);

//bind parameters
$cmd -> bindParam(':user_id', $user_id, PDO::PARAM_INT);

//execute

$cmd->execute();

//close the connection

$conn = null;				

header('location:registrations.php');
require_once('footer.php');
ob_flush();
?>