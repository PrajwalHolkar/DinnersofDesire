<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<h1>Order Confirmation</h1>
    <form action="order.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone" required><br><br>
		<label for="food">Select Food:</label>
		<select id="food" name="food" required>
			<option value="">--Select--</option>
			<option value="Burger">Burger</option>
			<option value="Pizza">Pizza</option>
			<option value="Taco">Noddles</option>
			
		</select><br><br>
		<label for="quantity">Quantity:</label>
		<input type="number" id="quantity" name="quantity" min="1" max="10" required><br><br>
		<button class="button button-lg button-gray-600" type="submit" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Place Order</button>
	</form>


	        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5  class="modal-title"  id="exampleModalLabel">Seats Available</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <?php
	// Connect to the database
    $host = 'localhost:3306';
    $username = 'root';
    $password = 'Sh@101103';
    $dbname = 'proj1';
    $conn = new mysqli($host, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieve the values submitted in the form
	if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["food"]) && isset($_POST["quantity"])){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$food = $_POST["food"];
		$quantity = $_POST["quantity"];
		$price = 0;

		// Determine the price of the selected food item
		switch ($food) {
			case 'Burger':
				$price = 50;
				break;
			case 'Pizza':
				$price = 150;
				break;
			case 'Taco':
				$price = 50;
				break;
			default:
				echo "Invalid food selection";
				exit;
		}

		// Calculate the total price
		$total = $price * $quantity;

		// Insert the order details into the database
		$sql = "INSERT INTO orders (name, email, phone, food, quantity, price, total)
				VALUES ('$name', '$email', '$phone', '$food', $quantity, $price, $total)";

		if (mysqli_query($conn, $sql)) {
			// Display the order details and total price
			echo "<h2>Order Confirmation</h2>";
			echo "<p><strong>Name:</strong> " . $name . "</p>";
			echo "<p><strong>Email:</strong> " . $email . "</p>";
			echo "<p><strong>Phone:</strong> " . $phone . "</p>";
			echo "<p><strong>Food:</strong> " . $food . "</p>";
			echo "<p><strong>Quantity:</strong> " . $quantity . "</p>";
			echo "<p><strong>Total Price:</strong> $" . $total . "</p>";
            // -----------------------
            echo "<form action='index.php' method='POST'>";
            echo "<input type='hidden' name='total' value='" . $total . "'>";
            echo "<input type='submit' value='Make Payment'>";
            echo "</form>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	mysqli_close($conn);
?>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
	
  

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>

</body>
</html>
