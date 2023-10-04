<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    body{background-color:#FFEBEE}.card{width:400px;background-color:#fff;border:none;border-radius: 12px}label.radio{cursor: pointer;width: 100%}label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}label.radio span{padding: 7px 14px;border: 2px solid #eee;display: inline-block;color: #039be5;border-radius: 10px;width: 100%;height: 48px;line-height: 27px}label.radio input:checked+span{border-color: #039BE5;background-color: #81D4FA;color: #fff;border-radius: 9px;height: 48px;line-height: 27px}.form-control{margin-top: 10px;height: 48px;border: 2px solid #eee;border-radius: 10px}.form-control:focus{box-shadow: none;border: 2px solid #039BE5}.agree-text{font-size: 12px}.terms{font-size: 12px;text-decoration: none;color: #039BE5}.confirm-button{height: 50px;border-radius: 10px}
</style>
<body>
  

    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <div class="card px-1 py-4">
            
        <form class=""  action=" " method="POST">
            <div class="card-body">
                <h2 class="card-title mb-3">Food Ordering</h2>
                
                <h6 class="information mt-4">Please Enter the Quantity of following items</h6>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Pizza</label> <input class="form-control" type="number" placeholder="Pizza" name="qty" value="0"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <label for="name">Burger</label>  <div class="input-group"> <input class="form-control" type="number" placeholder="Burger" name="qty1" value="0"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <label for="name">Noddles</label><div class="input-group"> <input class="form-control" type="number" placeholder="Noddles" name="qty2" value="0"> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Shezwan Rice</label><input class="form-control" type="number" placeholder="Shezwan Rice" name="qty3" value="0"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <label for="name">Samosa Chat</label> <input class="form-control" type="number" placeholder="Samosa Chat" name="qty4" value="0"> </div>
                    </div>
                </div>
                <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> <small class="agree-text"> You can proceed further</small> <a href="#" class="terms"></a> </div>
                 <!-- <button class="btn btn-primary btn-block confirm-button">Confirm Order</button> -->
                 <div>
								 <button style="margin: 22px; padding: 12px;" type="submit" value="submit" name="submit" class="form-btn"   > Confirm Order</button>
							</div>
            </div>
            </form>
        </div>
    </div>

    
</body>
<?php

if(isset($_POST['submit']))
{
    $servername = "localhost:3307";  // Database server name, usually "localhost"
    $username = "root";     // MySQL username
    $password = "";     // MySQL password
    $dbname = "cinema_db";  // Name of the database to connect to

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $pizaa = $_POST['qty'];
    $burger = $_POST['qty1'];
    $noddle = $_POST['qty2'];
    $shezwan = $_POST['qty3'];
    $samosa = $_POST['qty4'];
    date_default_timezone_set('Asia/Kolkata');
    $order_date = date("Y-m-d");
    
    $sql = "SELECT bookingFName, bookingLName, bookingPNumber FROM bookingtable WHERE bookingID = (SELECT MAX(bookingID) FROM bookingtable)";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $contactno = $row["bookingPNumber"];
            $firstname = $row["bookingFName"];
            $lastname = $row["bookingLName"];

            // Insert data into the destination table
            $sql = "INSERT INTO neworder1 (firstname,lastname,phoneno,Pizza,Burger,Noodles,order_date,Shezwanrice,Samosachat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss", $firstname, $lastname, $contactno, $pizaa, $burger, $noddle, $order_date, $shezwan, $samosa);
    
            if ($stmt->execute() === TRUE) 
            {
                // echo "Data inserted successfully";
                header("Location: ../prediction.php");
                exit;
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
     else 
     {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
}
?>

<!-- 
    $query = "INSERT INTO neworder1 (Pizza,Burger,Noodles,order_date,Shezwanrice,Samosachat) VALUES ('$pizaa','$burger','$noddle','$order_date','$shezwan',' $samosa')";

    $data =  mysqli_query($conn,$query);
     }
    
    if($data){
    
        echo "<script> alert('Data submitted successfully'); window.location='../tokengenerate.php' </script>";
    }
    
    else{
        echo "<script> alert('Error');  </script>";
    } -->





  






</html>