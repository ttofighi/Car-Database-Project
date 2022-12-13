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
        <title>Insert Customer</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Inserting new customer: " . $_POST["custid"] . " " . $_POST["fullName"] . " " . $_POST["phone"] . "..."; 
				$sql = 'INSERT INTO customers (custid, fullName, phone) ';
				$sql = $sql . 'VALUES ("'.$_POST["custid"] . '","' . $_POST["fullName"] . '","' . $_POST["phone"] . '")';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New record created successfully";
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
