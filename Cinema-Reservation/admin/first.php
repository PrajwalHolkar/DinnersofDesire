
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction</title>
 </head>

 <style>
    .container11{
        text-align: center;
        justify-content: center;
        border: 2px solid black;
        margin: 250px;

    }

 </style>
 <body>
    <div class="container11">
        <H1>Quantity Prediction</H1>

<?php 
 $servername = "localhost:3307";  // Database server name, usually "localhost"
 $username = "root";     // MySQL username
 $password = "";     // MySQL password
 $dbname = "cinema_db";  // Name of the database to connect to

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
//  if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//  }
//  echo "Connected successfully";

$sql = "SELECT prePizza AS pizza FROM neworder1
WHERE id = (SELECT MAX(id) FROM neworder1);
 ";
$sql1 = "SELECT preBurger AS burger FROM neworder1
WHERE id = (SELECT MAX(id) FROM neworder1);
 ";
$sql2 = "SELECT preNoodles AS noodles FROM neworder1
WHERE id = (SELECT MAX(id) FROM neworder1);
 ";
$sql3 = "SELECT preShezwan AS shezwan FROM neworder1
WHERE id = (SELECT MAX(id) FROM neworder1);
 ";
$sql4 = "SELECT preSamosa AS samosa FROM neworder1
WHERE id = (SELECT MAX(id) FROM neworder1);
 ";

// Performing queries
$pizza_result = $conn->query($sql);
$burger_result = $conn->query($sql1);
$noodle_result = $conn->query($sql2);
$shezwan_result = $conn->query($sql3);
$samosa_result = $conn->query($sql4);

// Checking if the queries returned results
if($pizza_result->num_rows > 0 && $burger_result->num_rows > 0 && $noodle_result->num_rows > 0 && $shezwan_result->num_rows > 0 && $samosa_result->num_rows > 0) {
    // Fetching the average values
    $pizza_avg = $pizza_result->fetch_assoc()['pizza'];
    $burger_avg = $burger_result->fetch_assoc()['burger'];
    $noodle_avg = $noodle_result->fetch_assoc()['noodles'];
    $shezwan_avg = $shezwan_result->fetch_assoc()['shezwan'];
    $samosa_avg = $samosa_result->fetch_assoc()['samosa'];


    // Outputting the results
    echo "Pizza : " . (int)$pizza_avg . "<br>";
    echo "Burger : " . (int)$burger_avg . "<br>";
    echo "Noodle : " . (int)$noodle_avg . "<br>";
    echo "Shezwan Rice : " . (int)$shezwan_avg . "<br>";
    echo "Samosa Chat : " . (int)$samosa_avg . "<br>";
} else {
    // If no results were returned
    echo "No data found";
}

?>
    </div>
    
    </body>
    </html>