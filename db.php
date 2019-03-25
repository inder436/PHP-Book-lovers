<?php
   
   $conn = new PDO("mysql:host=localhost:3306;dbname=localdb", 'root','');
    //set up the error mode for exception handling 
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
    