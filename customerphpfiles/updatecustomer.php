<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = '';
$password = '';
$host = 'localhost';
$dbname = 'project';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update customer</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Updating customer: " . $_POST["custid"] . "..."; 
				$sql = 'UPDATE customers SET fullName = "' . $_POST["fullName"] . '", phone = "' . $_POST["phone"] . '" where custid = "' . $_POST["custid"] . '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "Customer updated successfully";
				?>
				<p>You will be redirected in 3 seconds</p>
				<script>
					var timer = setTimeout(function() {
						window.location='start.php'
					}, 3000);
				</script>
			<?php
				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
			?>
		</p>
    </body>
</div>
</html>