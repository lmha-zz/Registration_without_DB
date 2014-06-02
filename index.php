<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration without DB</title>
	<meta name="description" content="My registration without DB" >
	<link rel="stylesheet" type="text/css" href="css.css.php">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{

	})
	</script>

</head>
<body>
	<?php 
	if(isset($_SESSION['error']))
	{
		foreach($_SESSION['error'] as $key => $message)
		{
			?>
			<p><?= $message ?></p>
			<?php
		}
	}
	elseif (isset($_SESSION['registered']))
	{
		?>
		<p><?= $_SESSION['registered'] ?></p>
		<?php
	}
	?>
	<form action="process.php" method="post" enctype="multipart/form-data" data-ng-click="save(model)">
		<div>
			<input type="hidden" name="action" value="register">
			<label for="E-mail">Email: </label>
			<input type="email" name="E-mail" placeholder="Email">
			<label for="First Name">First Name: </label>
			<input type="text" name="First Name" placeholder="First Name">
			<label for="Last Name">Last Name: </label>
			<input type="text" name="Last Name" placeholder="Last Name">
			<label for="Password">Password: </label>
			<input type="password" name="Password" placeholder="Password">
			<label for="Confirm Password">Confirm Password: </label>
			<input type="password" name="Confirm Password" placeholder="Confirm Password">
			<label for="Birthday">Birthdate: </label>
			<input type="text" name="Birthday" placeholder="Birthdate in MM/DD/YYYY format">
		</div>
		<div>
			<label for="profile_picture">Uppload a profile picture: </label>
			<input type="file" name="Profile Picture">
		</div>
		<div>
			<input type="submit" value="submit">
		</div>
	</form>
</body>
</html>

<?php
session_destroy();

?>