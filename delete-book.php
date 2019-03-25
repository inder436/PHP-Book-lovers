<?php ob_start(); 

$book_id = $_GET['book_id'];

//connect

require_once('db.php'); 

// set up sql query 

$sql = "DELETE FROM books WHERE book_id = :book_id";

//prepare 

$cmd = $conn->prepare($sql); 

//bind 

$cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);

//execute 

$cmd->execute(); 
echo "Book Delete";
// close the connection


$conn = NULL; 

header('location:books.php'); 


ob_flush(); 

?>