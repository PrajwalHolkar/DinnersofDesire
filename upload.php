<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
    @media (min-width: 768px)
.p-md-5 {
    padding: 3rem!important;
}

@media (min-width: 768px)
.m-md-3 {
    margin: 1rem!important;
}
.bg-body-tertiary {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-tertiary-bg-rgb),var(--bs-bg-opacity))!important;
}
.text-center {
    text-align: center!important;
}
.p-3 {
    padding: 1rem!important;
}
.position-relative {
    position: relative!important;
}
.overflow-hidden {
    overflow: hidden!important;
}
@media (min-width: 992px)
.p-lg-5 {
    padding: 3rem!important;
}

.my-5 {
    margin-top: 3rem!important;
    margin-bottom: 3rem!important;
}
.mx-auto {
    margin-right: auto!important;
    margin-left: auto!important;
}
@media (min-width: 768px)
.col-md-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
}
.fw-normal {
    font-weight: 400!important;
}

.display-4 {
    font-size: calc(1.475rem + 2.7vw);
    font-weight: 300;
    line-height: 1.2;
}
.fw-normal {
    font-weight: 400!important;
}

.lead {
    font-size: 1.25rem;
    font-weight: 300;
}
.btn-outline-secondary {
    --bs-btn-color: #6c757d;
    --bs-btn-border-color: #6c757d;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #6c757d;
    --bs-btn-hover-border-color: #6c757d;
    --bs-btn-focus-shadow-rgb: 108,117,125;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #6c757d;
    --bs-btn-active-border-color: #6c757d;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #6c757d;
    --bs-btn-disabled-bg: transparent;
    --bs-btn-disabled-border-color: #6c757d;
    --bs-gradient: none;
}
.btn {
    --bs-btn-padding-x: 0.75rem;
    --bs-btn-padding-y: 0.375rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 1rem;
    --bs-btn-font-weight: 400;
    --bs-btn-line-height: 1.5;
    --bs-btn-color: var(--bs-body-color);
    --bs-btn-bg: transparent;
    --bs-btn-border-width: var(--bs-border-width);
    --bs-btn-border-color: transparent;
    --bs-btn-border-radius: var(--bs-border-radius);
    --bs-btn-hover-border-color: transparent;
    --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15),0 1px 1px rgba(0, 0, 0, 0.075);
    --bs-btn-disabled-opacity: 0.65;
    --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
    display: inline-block;
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    font-family: var(--bs-btn-font-family);
    font-size: var(--bs-btn-font-size);
    font-weight: var(--bs-btn-font-weight);
    line-height: var(--bs-btn-line-height);
    color: var(--bs-btn-color);
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
    background-color: var(--bs-btn-bg);
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
a {
    color: rgba(var(--bs-link-color-rgb),var(--bs-link-opacity,1));
    text-decoration: underline;
}
.product-device {
    position: absolute;
    right: 10%;
    bottom: -30%;
    width: 300px;
    height: 540px;
    background-color: #333;
    border-radius: 21px;
    transform: rotate(30deg);
}
.product-device-2 {
    top: -25%;
    right: auto;
    bottom: 0;
    left: 5%;
    background-color: #e5e5e5;
}
.product-device::before {
    position: absolute;
    top: 10%;
    right: 10px;
    bottom: 10%;
    left: 10px;
    content: "";
    background-color: rgba(255, 255, 255, .1);
    border-radius: 5px;
}
img{
    height: 200px;
}
  </style>
  <body>
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">Scan and Pay</h1>

      <img src="ishita qr.jpg" alt="">
      <br><br><br>
      
      
      <form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="image">
  <button type="submit" name="submit">Upload</button>
</form>

<?php
// connect to database
$host = 'localhost:3306';
$username = 'root';
$password = 'Sh@101103';
$dbname = 'aids';

$conn = mysqli_connect($host, $username, $password, $dbname);

// check if form submitted
if (isset($_POST['submit'])) {
  $file = $_FILES['image'];

  // get file properties
  $fileName = mysqli_real_escape_string($conn, $file['name']);
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = mysqli_real_escape_string($conn, $file['type']);

  // check if file uploaded successfully
  if ($fileError === 0) {
    // read file data
    $fileData = addslashes(file_get_contents($fileTmpName));

    // insert image into database
    $sql = "INSERT INTO images (name, type, data) VALUES ('$fileName', '$fileType', '$fileData')";
    if(mysqli_query($conn, $sql)){
        echo "Image uploaded successfully.";
    }else{
        echo "Error uploading image: " . mysqli_error($conn);
    }
  } else {
    echo "Error uploading image.";
  }
}
?>


   

    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>