
<!DOCTYPE html>
<html>
<?php 
        $id = $_GET['id'];
        $link = mysqli_connect("localhost:3307", "root", "", "cinema_db");

        $movieQuery = "SELECT * FROM movieTable WHERE movieID = $id"; 
        $movieImageById = mysqli_query($link,$movieQuery);
        $row = mysqli_fetch_array($movieImageById);
?>
<head>
	<meta charset="utf-8">
	<title>Wizard-v6</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>

	
	
</head>




<body >
	<div class="page-content">
		<div style="text-align: center; " class="wizard-heading"> Booking Form</div>
		<div class="wizard-v6-content">
			<div class="wizard-form">
		        <form class="form-register" id="form-register" action=" " method="POST">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Booking Seat</h3>
			                		
			                	</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="first_name" name="fName" required>
											<span class="label">First Name</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="last_name" name="lName" required>
											<span class="label">Last Name</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="phone" name="pNumber" required>
											<span class="label">Phone Number</span>
										</label>
									</div>


									<div class="form-row form-row-date">
										<div class="form-holder form-holder-2">
											
											<select name="theatre" id="date" class="form-control">
												<option value="" disabled selected>Slots</option>
												<option value="9-10">9-10 am</option>               
							<option value="11-12">10-11 am</option>
							<option value="12-1">11-12 pm</option>
							<option value="1-2">12-1 pm</option>
							<option value="3-4">1-2 pm</option>
							<option value="4-5">2-3 pm</option>
							<option value="5-6">3-4 pm</option>
	
											</select>
											<select name="type" id="month" class="form-control">
												<option value="" selected>Seats</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
	
											
											
												
											
										</div>
									</div>


									
									
								</div>
								
								
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<input class="form-control" type="time" placeholder="Time" name="hour"  required>
										
									</div>

									<div class="form-holder form-holder-2">
										
										<input type="date"  placeholder="Date"  name="date" required>
									</div>
								</div>
							</div>

							<div>
								 <button style="margin: 22px; padding: 12px;" type="submit" value="submit" name="submit" class="form-btn"   onclick="location.href='FoodOrder.php'"> Book a Seat</button>
							</div>
							
			            </section>
						
			         
			            
			           
									
								</div>
							</div>
			            </section>
		        	</div>
		        </form>
				<?php
                    $fNameErr = $pNumberErr= "";
                    $fName = $pNumber = "";
            
                    if(isset($_POST['submit'])){
                     
            
                        $fName = $_POST['fName'];
                        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $fName)) {
                            $fNameErr = 'Name can only contain letters, numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$fNameErr');</script>";
                        }   
            
                        $pNumber = $_POST['pNumber'];
                        if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pNumber)) {
                            $pNumberErr = 'Phone Number can only contain numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$pNumberErr');</script>";
                        } 
                        
                        $insert_query = "INSERT INTO 
                        bookingTable (  movieName,
                                        bookingTheatre,
                                        bookingType,
                                        bookingDate,
                                        bookingTime,
                                        bookingFName,
                                        bookingLName,
                                        bookingPNumber)
                        VALUES (        '".$row['movieTitle']."',
                                         '".$_POST["theatre"]."',
                                        '".$_POST["type"]."',
                                        '".$_POST["date"]."',
                                        '".$_POST["hour"]."',
                                        '".$_POST["fName"]."',
                                        '".$_POST["lName"]."',
                                        '".$_POST["pNumber"]."')";
                        mysqli_query($link,$insert_query);
						header('Location:FoodOrder.php');
                        }
                    ?>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>