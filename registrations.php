<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration List</title>
	<?php ob_start();

	require_once('auth.php');

	$page_title = null;
	$page_title = 'Information Change';
	require_once('header.php'); 
	?>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	<main class="container">
		<?php
		ob_start();
		try {
		//access the database
		require_once('db.php');
		//set the SQL query
		$sql = "SELECT * FROM user";
		//prepare
		$cmd = $conn->prepare($sql);
		//execute
		$cmd->execute();
		//use fetchAll to store our results
		$user = $cmd->fetchAll();

		//echo out the table header
		echo '<table class="table table-striped">
				<thead>
					<th>Email</th>
					<th>Password</th>
					<th>Information change</th>
					<th>Delete</th>
					</thead>
					<tbody>';
			foreach ($user as $user) {
				echo '<tr><td>' . $user['username'] . '</td> <td>' . $user['password'] . '</td><td><a href="changeInfo.php?user_id=' . $user['user_id'] . '"> Information change </a></td><td><a href="delete-registration.php?user_id=' . $user['user_id'] . '"onclick="return confirm (\'Are you sure?\');"> Delete </a></td></tr>';
			}
				
			echo '</tbody></table>';

			//close the database connection

			$conn = NULL;

		}
		catch(Exception $e) {
			// send an email to the admin app
			mail('chenmou929@gmail.com', 'User Database Problems!', $e);
			header('location:error.php');
		}

		ob_flush();
		?>
	</main>

<?php require_once('footer.php'); ?>
</body>
</html>