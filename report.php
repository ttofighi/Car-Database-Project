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
    $sql = 'SELECT c.custid, c.fullName, c.phone, v.model, o.orderid, v.vin FROM vehicles v, customers c, ordercust r, orders o WHERE c.custid = r.custid and r.orderid = o.orderid and o.vin = v.vin order by c.custid';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Report of Customer Orders</title>
    </head>
    <body>
		<form action="/startmodel.php" method="get" target="_blank">
         	<button type="submit">Models</button>
      		</form>
		<form action="/start.php" method="get" target="_blank">
         	<button type="submit">Customers</button>
      		</form>
	<h2>Report of Customer Orders</h2>
        <table border=1 cellspacing=5 cellpadding=5>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Full name</th>
			  <th>phone</th>
			  <th>model</th>
		        <th>Order ID</th>
			  <th>vin</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $q->fetch()): ?>
                    <tr>
				<td><?php echo htmlspecialchars($row['custid']) ?></td>
                        <td><?php echo htmlspecialchars($row['fullName']) ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
				<td><?php echo htmlspecialchars($row['model']); ?></td>
				<td><?php echo htmlspecialchars($row['orderid']); ?></td>
				<td><?php echo htmlspecialchars($row['vin']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>  
    </body>
</div>
</html>