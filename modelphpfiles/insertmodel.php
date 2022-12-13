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
        <title>Insert model</title>
    </head>
    <body>
                <p>
                        <?php
                                echo "Inserting new model: " . $_POST["model"] . " " . $_POST["price"] . " " . $_POST["miles"] . " " . $_POST["transmission"] . " " . $_POST["runson"] . " " . $_POST["option1ex"] . " " . $_POST["option2ex"] . " " . $_POST["color1ex"] . " " . $_POST["color2ex"] . " " . $_POST["option1in"] . " " . $_POST["option2in"] . "...";
                                $sql = 'INSERT INTO modelinfo (model, price, miles, transmission, runson, option1ex, option2ex, color1ex, color2ex, option1in, option2in) ';
                                $sql = $sql . 'VALUES ("'.$_POST["model"] . '","' . $_POST["price"] . '","' . $_POST["miles"] . '","' . $_POST["transmission"] . '","' . $_POST["runson"] . '","' . $_POST["option1ex"] . '","' . $_POST["option2ex"] . '","' . $_POST["color1ex"] . '","' . $_POST["color2ex"] . '","' . $_POST["option1in"] . '","' . $_POST["option2in"] . '")';
                                try {
                                        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $conn->exec($sql);
                                        echo "New record created successfully";
                        ?>
                                <p>You will be redirected in 3 seconds</p>
                                <script>
                                        var timer = setTimeout(function() {
                                                window.location='startmodel.php'
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
