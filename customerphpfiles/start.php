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
    $sql = 'SELECT custid, fullName, phone FROM customers';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customers</title>
    </head>
    <body>
        <div id="container">
		<form action="http://e5-cse-431s2-079.vmhost.psu.edu/startmodel.php" method="get" target="_blank">
         	<button type="submit">Models</button>
      		</form>
		<form action="http://e5-cse-431s2-079.vmhost.psu.edu/report.php" method="get" target="_blank">
         	<button type="submit">Report of Customer Orders</button>
      		</form>
		<form action="http://e5-cse-431s2-079.vmhost.psu.edu/startcolor.php" method="get" target="_blank">
         	<button type="submit">Option 1 Interior Colors</button>
      		</form>
            <h2>Current List of customers</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Full name</th>
                        <th>Phone</th>
                        <th>Delete?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['custid']) ?></td>
                            <td><?php echo htmlspecialchars($row['fullName']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo '<form action="/delete.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="custid" value="' . htmlspecialchars($row['custid']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br><h2>Insert a new customer:</h2>
		<form action="/insert.php" method="post">
			<table>
				<tr><td>Customer ID:</td><td><input type="text" id="custid" name="custid" value="?"></td></tr>
				<tr><td>Full name:</td><td><input type="text" id="fullName" name="fullName" value="?"></td></tr>
				<tr><td>Phone:</td><td><input type="text" id="phone" name="phone" value="?"></td></tr>
			</table>
			<input type="submit" value="INSERT">
		</form>

		<br><h2>Update customer:</h2>
        	<form action="/updatecustomer.php" method="post">
           	 	<table>
                <tr><td>Customer ID:</td><td><input type="text" id="custid" name="custid" value=""></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td>Full name:</td><td><input type="text" id="fullName" name="fullName" value=""></td></tr>
                <tr><td>phone:</td><td><input type="text" id="phone" name="phone" value=""></td></tr>
            	</table>
            <input type="submit" value="UPDATE">
        </form>
		<br>
		<br><br><br>
    </body>
</div>
</html>
