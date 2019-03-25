<?php ob_start();

$page_title = null;
$page_title = 'Saving your Registration';
require_once('header.php');

// store the user inputs in variables
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

// validate the inputs
if (empty($username)) {
	echo 'Email is required<br />';
	$ok = false;
}



if (empty($password) || strlen($password) < 8) {
	echo 'Password is required with 8 characters minimum<br />';
	$ok = false;
}

if ($password != $confirm) {
	echo 'Passwords do not match<br />';
	$ok = false;
}

// proceed if the inputs are complete
if ($ok) {

	// hash the password so it's not stored in plain text in the database
	$hashed_password = hash('sha512', $password); 
	
	// connect to the database
	require_once('db.php');
		
	// set up the SQL INSERT command
	$sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
	
	// populate the Insert with parameter values
	$cmd = $conn->prepare($sql);
	$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
	$cmd->bindParam(':password', $hashed_password, PDO::PARAM_STR, 128);
	
	// execute the INSERT
	$cmd->execute();
	
	// disconnect
	$conn = null;
	echo 'User Saved';
}

require_once('footer.php');
?>

