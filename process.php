<?php
session_start();

if(isset($_POST['action']) && $_POST['action'] == 'register')
{
	foreach ($_POST as $key => $value)
	{
		if(empty($value))
		{
			$_SESSION['error'][$key] = $key. " cannot be left blank.";
		}
		else
		{
			switch($key)
			{
				case 'E-mail':
				if(!filter_var($value, FILTER_VALIDATE_EMAIL))
				{
					$_SESSION['error'][$key] = $key. " is not a valid email.";
					$_SESSION['highlight'][$key] = "class='highlight'";
				}
				break;
				case 'First Name':
				case 'Last Name':
				if(is_numeric($value))
				{
					$_SESSION['error'][$key] = $key. ' cannot contain numbers.';
				}
				break;
				case 'Password':
				if (strlen($_POST['Password']) < 6) {
					$_SESSION['error'][$key] = 'Password needs to be more than 6 characters long.';
				}
				break;
				case 'Confirm Password':
				if($_POST['Confirm Password'] != $_POST['Password'])
				{
					$_SESSION['error'][$key] = 'Please confirm that your passwords match.';
				}
				break;
				case 'Birthday':
				$birth_date = explode('/',$value);
				if(!checkdate($birth_date[0],$birth_date[1],$birth_date[2]))
				{
					$_SESSION['error'][$key] = $key. 'is not a valid date.';
				}
				break;
				case 'Profile Picture':
				if($value == UPLOAD_ERR_OK)
				{
					$uploads_dir = '/uploads';
					$tmp_name = $_POST[$key];
					$name = $_POST[$key];
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
				}
				break;
			}
		}
	}
	if(!isset($_SESSION['error']))
	{
		$_SESSION['registered'] = "Thank you for submitting your information.";
	}
}

header("Location: index.php");
?>