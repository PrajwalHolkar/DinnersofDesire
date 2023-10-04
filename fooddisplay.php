<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NPOs</title>
    <link href="HeroBiz\assets\css\main.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style> body {
            background: url("img/whitebg.jpg");
            background-size: cover;
            margin: 0px;
            padding: 0px;
            position: absolute;

        }
          .h1{
           
    display: flex;
   /* border: 2px solid red; */
   background-color: grey;
   justify-content: center;
    /* margin: 23px 34px ; */
    margin: 5px 8px;
font-size: 20px;
font-weight: bold;
    padding: 8px 9px;
    width: 1500px;
    color: white;
    list-style: none;
    text-align: center;
        }
    .table{
        text-align:center;
    }
    td{
        text-align:center;
        font-size:20px;
    }
    th{
        width:200px;
    } 
   
h3{
    font-size:30px;
    font-weight:bold;
    text-align:center;
    text-decoration:underline;
}
.btn{
    background:#BAFFB4;
    border-radius:3px;
    font-size:19px;
    
    cursor: pointer;
}
 .btn:hover{
    background:green;
    border-radius:3px;
    font-size:19px;
    color: white;
    cursor: pointer;
} 
.btn1{
    background:#FF6464;
    border-radius:3px;
    font-size:19px;
    
    cursor: pointer;
}
.btn1:hover{
    background:#EB1D36;
    border-radius:3px;
    font-size:19px;
    color: white;
    
    cursor: pointer;
}
body{
    background:#F4F4F2;
}
#title{
    background:#FFFFFF;
    
}
section{
    padding: 34px;
}
h1{
    color:#66BFBF;
}
li:hover{
    
    color:#66BFBF;
    text-decoration:none;
}


</style>
<body>
    <section  id="title">
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

     
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Diners of Desire<span></span></h1>
      </a>

      <nav style id="navbar" class="navbar">
        <ul>

          <li class="dropdown"><a href="index.php">Home </i></a></li>
        
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->


    </div>
  </header>
  </section>
  
        <h3>Ordered History</h3>
    <table border="2">
        <tr class="table">
            <div class="row">
                <div class="col-md-1   col-sm-3">
                <th >Sr No</th>

                </div>
                <div class="col-md-1 col-sm-3">
                <th>FirstName</th>
                    
                    </div>
                    <div class="col-md-1 col-sm-3">
                    <th>LastName</th>
                    
                    </div>
                    <div class="col-md-1 col-sm-3">
                    <th>Phoneno</th>
                    
                    </div>
                    <div class="col-md-1 col-sm-3">
                    <th>order_date</th>
                    
                    </div>
                    <div class="col-md-1 col-sm-3">
                    <th>Pizza</th>
                    
                    </div>
                    <div class="col-md-1 col-sm-3">
                    <th>Burger</th>
                    </div> 
                    <div class="col-md-1 col-sm-3">
                    <th>Noodles</th>
            
                    </div>
                    <div class="col-md-1 col-sm-3">
                    <th>ShezwanRice</th>
                    </div>
                    <div class="col-md-1 col-sm-3">
                    <th>SamosaChat</th>
                    </div>
                    <!-- <div class="col-md-1 col-sm-3">
                    <th>Decline</th>
                    </div> -->
                    

            </div>

           
      






<?php
            $servername ="localhost:3307";
            $username ="root";
            $password ="";
            $database_name ="cinema_db";
            
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            
            // if($conn) 
            // {
            //      echo "Connection ok";
            
            // }
            // else{
            //     echo "connection failed";
            
            $query= "SELECT * FROM neworder1";
            $data = mysqli_query($conn,$query);
            $total = mysqli_num_rows($data);
            ?>

            <?php
           
            if($total !=0){
                while($result = mysqli_fetch_assoc($data))
                {
                    ?>
                   
                   <tr>
                    <td> <?php echo $result['id']; ?></td>
                    <td> <?php echo $result['firstname']; ?></td>
                    <td> <?php echo $result['lastname']; ?></td>
                    <td> <?php echo $result['phoneno']; ?></td>
                    <td> <?php echo $result['order_date']; ?></td>
                    <td> <?php echo $result['Pizza']; ?></td>
                    <td> <?php echo $result['Burger']; ?></td>
                    <td> <?php echo $result['Noodles']; ?></td>
                    <td> <?php echo $result['Shezwanrice']; ?></td>
                    <td> <?php echo $result['Samosachat']; ?></td>
                    <!-- <td>
                        <button class="btn">Pickup</button>
                    </td>
                    <td>
                        <button class="btn1">Decline</button>
                    </td> -->

                    </tr>
                    <?php
                }
            }

                else
                {
                 ?>
                    <tr><td>No record found</td></tr>
                    <?php
                }
                ?>
                      

            </table>
            
            </body>
            </html>
       