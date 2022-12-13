<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = '';
$password = '';
$host = 'localhost';
$dbname = 'project';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT model, price, miles, transmission, runson, option1ex, option2ex, color1ex, 
color2ex, option1in, option2in FROM modelinfo';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Models</title>
    </head>
    <body>
        <div id="container">
	<form action="http://e5-cse-431s2-079.vmhost.psu.edu/start.php" method="get" target="_blank">
         	<button type="submit">Customers</button>
      		</form>
		<form action="http://e5-cse-431s2-079.vmhost.psu.edu/report.php" method="get" target="_blank">
         	<button type="submit">Report of Customer Orders</button>
      		</form>
		<form action="http://e5-cse-431s2-079.vmhost.psu.edu/startcolor.php" method="get" target="_blank">
         	<button type="submit">Option 1 Interior Colors</button>
      		</form>
            <h2>Current List of models</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Miles</th>
				<th>Transmission</th>
				<th>Runs on</th>
				<th>Option 1 Exterior</th>
				<th>Option 2 Exterior</th>
				<th>Option 1 Color Exterior</th>
				<th>Option 2 Color Exterior</th>
				<th>Option 1 Interior</th>
				<th>Option 2 Interior</th>
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['model']) ?></td>
                            <td><?php echo htmlspecialchars($row['price']); ?></td>
                            <td><?php echo htmlspecialchars($row['miles']); ?></td>
				    <td><?php echo htmlspecialchars($row['transmission']); ?></td>
				    <td><?php echo htmlspecialchars($row['runson']); ?></td>
                            <td><?php echo htmlspecialchars($row['option1ex']); ?></td>
                            <td><?php echo htmlspecialchars($row['option2ex']); ?></td>
                            <td><?php echo htmlspecialchars($row['color1ex']); ?></td>
                            <td><?php echo htmlspecialchars($row['color2ex']); ?></td>
                            <td><?php echo htmlspecialchars($row['option1in']); ?></td>
                            <td><?php echo htmlspecialchars($row['option2ex']); ?></td>
                            <td><?php echo '<form action="/deletemodel.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="model" value="' . htmlspecialchars($row['model']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br><h2>Insert a new model:</h2>
		<form action="/insertmodel.php" method="post">
			<table>
				<tr><td>Model:</td><td><input type="text" id="model" name="model" value="?"></td></tr>
				<tr><td>Price:</td><td><input type="text" id="price" name="price" value="?"></td></tr>
				<tr><td>Miles:</td><td><input type="text" id="miles" name="miles" value="?"></td></tr>
				<tr><td>Transmission:</td><td><input type="text" id="transmission" name="transmission" value="?"></td></tr>
				<tr><td>Runs on:</td><td><input type="text" id="runson" name="runson" value="?"></td></tr>
				<tr><td>Option 1 Exterior:</td><td><input type="text" id="option1ex" name="option1ex" value="?"></td></tr>
				<tr><td>Option 2 Exterior:</td><td><input type="text" id="option2ex" name="option2ex" value="?"></td></tr>
				<tr><td>Option 1 Color Exterior:</td><td><input type="text" id="color1ex" name="color1ex" value="?"></td></tr>
				<tr><td>Option 2 Color Exterior:</td><td><input type="text" id="color2ex" name="color2ex" value="?"></td></tr>
				<tr><td>Option 1 Interior:</td><td><input type="text" id="option1in" name="option1in" value="?"></td></tr>
				<tr><td>Option 2 Interior:</td><td><input type="text" id="option2in" name="option2in" value="?"></td></tr>
			</table>
			<input type="submit" value="INSERT">
		</form>
		<br><h2>Update model:</h2>
        	<form action="/updatemodel.php" method="post">
           	 	<table>
                <tr><td>Model:</td><td><input type="text" id="model" name="model" value="?"></td></tr>
				<tr><td>Price:</td><td><input type="text" id="price" name="price" value="?"></td></tr>
				<tr><td>Miles:</td><td><input type="text" id="miles" name="miles" value="?"></td></tr>
				<tr><td>Transmission:</td><td><input type="text" id="transmission" name="transmission" value="?"></td></tr>
				<tr><td>Runs on:</td><td><input type="text" id="runson" name="runson" value="?"></td></tr>
				<tr><td>Option 1 Exterior:</td><td><input type="text" id="option1ex" name="option1ex" value="?"></td></tr>
				<tr><td>Option 2 Exterior:</td><td><input type="text" id="option2ex" name="option2ex" value="?"></td></tr>
				<tr><td>Option 1 Color Exterior:</td><td><input type="text" id="color1ex" name="color1ex" value="?"></td></tr>
				<tr><td>Option 2 Color Exterior:</td><td><input type="text" id="color2ex" name="color2ex" value="?"></td></tr>
				<tr><td>Option 1 Interior:</td><td><input type="text" id="option1in" name="option1in" value="?"></td></tr>
				<tr><td>Option 2 Interior:</td><td><input type="text" id="option2in" name="option2in" value="?"></td></tr>
            	</table>
            <input type="submit" value="UPDATE">
        </form>
		<br>
		<br><br><br>
    </body>
</div>
</html>
