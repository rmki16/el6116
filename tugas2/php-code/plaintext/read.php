<?php

/**
 * Function to query information based on 
 * a parameter: in this case, location.
 *
 */

$time_start1 = microtime(true);

if (isset($_POST['submit'])) 
{
	
	try 
	{	
		require "config.php";
		require "common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT * 
						FROM users
						WHERE location = :location";

		$location = $_POST['location'];

		$statement = $connection->prepare($sql);
		$statement->bindParam(':location', $location, PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();
	}
	
	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
}

$time_end1 = microtime(true);

?>
<?php require "templates/header.php"; ?>
		
<?php

$time_start2 = microtime(true);
  
if (isset($_POST['submit'])) 
{
	if ($result && $statement->rowCount() > 0) 
	{ ?>
		
		<blockquote> The finding results: <b>location</b> <?php echo escape($_POST['location']); ?> <b>has been found</b>!</blockquote>
		
		<h2>Results</h2>

		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Age</th>
					<th>Location</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
	<?php 
		foreach ($result as $row) 
		{ ?>
			<tr>
				<td><?php echo escape($row["id"]); ?></td>
				<td><?php echo escape($row["firstname"]); ?></td>
				<td><?php echo escape($row["lastname"]); ?></td>
				<td><?php echo escape($row["email"]); ?></td>
				<td><?php echo escape($row["age"]); ?></td>
				<td><?php echo escape($row["location"]); ?></td>
				<td><?php echo escape($row["date"]); ?> </td>
			</tr>
		<?php 
		} ?>
		</tbody>
	</table>
	<?php 
	} 
	else 
	{ ?>
		<blockquote><b>No results</b> found for <?php echo escape($_POST['location']); ?>.</blockquote>
	<?php
	} 

$time_end2 = microtime(true);

$execution_time1 = ($time_end1 - $time_start1);
$execution_time2 = ($time_end2 - $time_start2);
$execution_time_total = ($execution_time1 + $execution_time2);

echo '<br><br><b> Execution Time (Searching at MySQL Database):</b> ' . $execution_time1. ' seconds';
echo '<br><br><b> Execution Time (Displaying Table at Browser):</b> ' . $execution_time2. ' seconds';
echo '<br><br><b> Total Execution Time:</b> ' . $execution_time_total. ' seconds';

}?> 

<h2>Find user based on location</h2>

<form method="post">
	<label for="location">Location</label>
	<input type="text" id="location" name="location">
	<input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
