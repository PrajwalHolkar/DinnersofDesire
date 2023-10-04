<?php
// Connect to the database
$host = 'localhost:3306';
$user = 'root';
$password = 'Sh@101103';
$database = 'aids';
$conn = mysqli_connect($host, $user, $password, $database);

// Check if connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the image data from the database
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);

// Loop through each row in the result set
while ($row = mysqli_fetch_assoc($result)) {
  // Display the image
  echo '<img src="data:' . $row['type'] . ';base64,' . base64_encode($row['data']) . '"/>';
}

// Close the database connection
mysqli_close($conn);
?>
