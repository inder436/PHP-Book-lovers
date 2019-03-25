<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>All The Books </title>
 <!-- Latest compiled and minified CSS -->
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Anton|Lobster" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
  <header>
  	<?php

    //authentication

    require_once('auth.php');
		require_once('header.php');
    ?>
  </header>
  <div class="container">
   
    <h1> We Are Book lovers! </h1>
    
    <?php
    
    ob_start(); 
    
    try {

    
    //access the database
    
    require_once('db.php');
 
    //set up our SQL query 
    
    $sql = "SELECT * FROM books";
    
    //prepare
    
    $cmd = $conn->prepare($sql);
    
    //run that query 
    
    $cmd->execute(); 
    
    //use fetchAll to store results 
    
    $books = $cmd->fetchAll(); 
    
    //echo out table header 
    
    echo '<table class="table table-striped">
            <thead>
                <th> Book Title </th>
                <th> Book Genre </th>
                <th> Book Review </th>
                <th> User Name </th>
                <th> Email </th>
                <th> Book Link </th>
                <th> Edit? </th>
                <th> Delete? </th>
            </thead>
          <tbody>';
    
    //loop through data and create a new table row for each record 
    
    foreach ($books as $book) {
      echo '<tr>
      <td>' . $book['book_title'] . '</td>
      <td>' . $book['book_genre'] . '</td>
      <td>' . $book['book_review'] . '</td>
      <td>' . $book['user_name'] . '</td>
      <td>' . $book['email'] . '</td>
      <td>' . $book['book_link'] . '</td>
      <td><a href="add_book.php?book_id=' . $book['book_id'] . '">Edit</a></td>
      <td><a href="delete-book.php?book_id=' . $book['book_id'] . '"onclick="return confirm(\'Are you sure?\');"> Delete </a></td></tr>';
    }
    
    echo '</tbody></table>';
    
    //close the database connection 
    
    $conn = NULL; 
      
    }
    catch(Exception $e) {
      //send an email to the app admin 
      mail('chenmou929@gmail', 'Book Database Problems!!!', $e);
      
      header('location:error.php');
      
    }
    
    ob_flush(); 

    ?>
  
  </div>
  <?php require_once('footer.php'); ?>
</body>
</html>