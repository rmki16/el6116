<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit']))
{
	
	require "config.php";
	require "common.php";
	require "secretkey.php";
	
	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
/*		
		$new_user = array(
			"firstname" => $_POST['firstname'] . 'tambahan',
			"lastname"  => $_POST['lastname'],
			"email"     => $_POST['email'],
			"age"       => $_POST['age'],
			"location"  => $_POST['location']
		);
*/


/*
		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"users",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);
*/


		$encrypt_firstname = sprintf("aes_encrypt('%s','%s')", $_POST['firstname'], $key_firstname);
		$encrypt_lastname  = sprintf("aes_encrypt('%s','%s')", $_POST['lastname'],  $key_lastname);
		$encrypt_email     = sprintf("aes_encrypt('%s','%s')", $_POST['email'],     $key_email) ;
		$encrypt_age       = sprintf("aes_encrypt('%s','%s')", $_POST['age'],       $key_age);
		$encrypt_location  = sprintf("aes_encrypt('%s','%s')", $_POST['location'],  $key_location) ;




		$sql = sprintf(
				"INSERT INTO %s (%s, %s, %s, %s, %s) values (%s, %s, %s, %s, %s)",
				"users", "firstname", "lastname", "email", "age", "location",
				$encrypt_firstname, $encrypt_lastname, $encrypt_email, $encrypt_age, $encrypt_location
				
		);




		
		$statement = $connection->prepare($sql);
//		$statement->execute($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['age'],$_POST['location']);
		$statement->execute();
	}

	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
	
}
?>

<?php require "templates/header.php"; ?>

<?php 
if (isset($_POST['submit']) && $statement) 
{ ?>
	<blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php 
} ?>

<h2>Add a user</h2>

<form method="post">
	<label for="firstname">First Name</label>
	<input type="text" name="firstname" id="firstname">
	<label for="lastname">Last Name</label>
	<input type="text" name="lastname" id="lastname">
	<label for="email">Email Address</label>
	<input type="text" name="email" id="email">
	<label for="age">Age</label>
	<input type="text" name="age" id="age">
	<label for="location">Location</label>
	<input type="text" name="location" id="location">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
