<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title class="mctitle">Book Lovers</title>

<!-- Latest compiled and minified CSS -->


<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Anton|Lobster" rel="stylesheet">
  
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
  //initializing variables 
  $book_id = null;
  $book_title = null; 
  $book_genre = null; 
  $book_review = null; 
  $user_name = null; 
  $email = null; 
  $book_link = null; 
  
  if(!empty($_GET['book_id']) && (is_numeric($_GET['book_id']))) {
    
    //grab the book id from the URL string 
    
    $book_id = $_GET['book_id'];
    
    //connect to the db.php
    require('db.php');
    
    //set up your query 
    $sql = "SELECT * FROM books WHERE book_id = :book_id";
    
    //prepare 
    $cmd = $conn->prepare($sql);
    
    //bind 
    $cmd->bindParam(':book_id', $book_id);
    
    //execute 
    $cmd->execute(); 
    
    //use fetchAll method to store info in an array 
    $books = $cmd->fetchAll(); 
    
    //loop through array using foreach and set variables
    foreach ($books as $book) {
      $book_title = $book['book_title'];
      $book_genre = $book['book_genre'];
      $book_review = $book['book_review'];
      $user_name = $book['user_name']; 
      $email = $book['email'];
      $book_link = $book['book_link'];
    }
    
    //close the database connection 
    
    $conn = null; 
  }
 
?>
 
  <div class="container">
     <h1> Book Lovers </h1>
     
     <form method="post" action="save_book.php">

      <div class="form-group">
         <label> Book Title: </label>
         <input type="text" name="book_title" class="form-control"  value="<?php echo $book_title ?>">
       </div> 

       <div class="form-group">
         <label> Book Genre: </label>
         <input type="text" name="book_genre" class="form-control"  value="<?php echo $book_genre ?>">
       </div>

       <div class="form-group">
         <label> Book Review: </label>
         <input type="text" name="book_review" class="form-control"  value="<?php echo $book_review ?>">
       </div>
 
      <div class="form-group">
         <label> User Name: </label>
         <input type="text" name="user_name" class="form-control" value="<?php echo $user_name ?>">
       </div> 
       
      <div class="form-group">
         <label> Email: </label>
         <input type="text" name="email" class="form-control"  value="<?php echo $email ?>">
       </div> 

       <div class="form-group">
         <label> Book Link: </label>
         <input type="text" name="book_link" class="form-control"  value="<?php echo $book_link ?>">
       </div>
      
      <input name="book_id" type="hidden" value="<?php echo $book_id ?>">
      
      <input type="submit" value="Submit book" class="btn btn-primary">
          
     </form>

  </div>
</body>

<footer>  <?php require_once('footer.php'); ?> </footer>

</html>