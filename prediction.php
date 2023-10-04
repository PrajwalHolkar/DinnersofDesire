<?php
$db_host = "localhost:3307";
$db_name = "cinema_db";
$db_user = "root";
$db_pass = "";

// create a PDO instance
$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// prepare the SQL query
$sql = "SELECT order_date, Pizza, Burger, Noodles, Shezwanrice, Samosachat,
               AVG(Pizza) OVER (ORDER BY order_date ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) AS SMA,
               AVG(Burger) OVER (ORDER BY order_date ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) AS SMA1,
               AVG(Noodles) OVER (ORDER BY order_date ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) AS SMA2,
               AVG(Shezwanrice) OVER (ORDER BY order_date ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) AS SMA3,
               AVG(Samosachat) OVER (ORDER BY order_date ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) AS SMA4
        FROM neworder1";

// execute the SQL query
$stmt = $dbh->query($sql);

// update the avgpizza column with the calculated SMA values
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $date = $row['order_date'];
    $sma = $row['SMA'];
    $sma1 = $row['SMA1'];
    $sma2 = $row['SMA2'];
    $sma3 = $row['SMA3'];
    $sma4 = $row['SMA4'];

    // prepare the SQL update statement
    $update_sql = "UPDATE neworder1 SET prePizza = :sma, preBurger = :sma1, preNoodles = :sma2, preShezwan = :sma3, preSamosa = :sma4 WHERE id = (SELECT MAX(id) FROM neworder1)";

    // execute the update statement with the current date and SMA value
    $update_stmt = $dbh->prepare($update_sql);
    $update_stmt->bindParam(':sma', $sma, PDO::PARAM_STR);
    $update_stmt->bindParam(':sma1', $sma1, PDO::PARAM_STR);
    $update_stmt->bindParam(':sma2', $sma2, PDO::PARAM_STR);
    $update_stmt->bindParam(':sma3', $sma3, PDO::PARAM_STR);
    $update_stmt->bindParam(':sma4', $sma4, PDO::PARAM_STR);
    $update_stmt->execute();
}

header('Location: tokengenerate.php');
?>