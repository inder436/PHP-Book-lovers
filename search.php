<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Search Resultes </title>
  <link href="css/bookStyle.css" rel="stylesheet">
 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
<?php

require_once('auth.php');
require_once('header.php');
    ?>
  </header>
  <div class="container">
   
    <h1> Search Resultes </h1>
    
    <?php
require_once('db.php');
//convert search query into a list of words
$search_words = explode(' ', $_GET['keywords']);

//build our sql query
$query = "SELECT * FROM books WHERE ";

//start by setting to empty string
$where = '';

foreach($search_words as $word){
	$where = $where . "book_title LIKE '%$word%' OR ";
}

$where = substr($where, 0, strlen($where) -4);

$final_sql = $query . $where;



$cmd = $conn -> prepare($final_sql);
$cmd ->execute();

$results = $cmd -> fetchAll();

 echo '<table class="table table-striped">
            <thead>
                <th> Book Title </th>
                <th> Book Genre </th>
                <th> Book Review </th>
                <th> User Name </th>
				<th> Email </th>
				<th> Book Link </th>
            </thead>
          <tbody>';
foreach($results as $result){
	echo '<tr><td>'.$result['book_title'] .'</td><td>'. $result['book_genre']. '</td><td>'. $result['book_review']. '</td><td>' . $result['user_name']. '</td><td>'. $result['email']. '</td><td>'. $result['book_link']. '</td></tr>'; 
}
echo '</table>';
$cmd -> closeCursor();
require('footer.php'); 
?>
</body>
</html>