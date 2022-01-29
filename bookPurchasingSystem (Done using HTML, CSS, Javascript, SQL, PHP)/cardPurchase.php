<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="styles.css">

    <title>Document</title>
</head>
    <title>Search results</title>
</head>

<body>
   </head>
<body>
  
    <div >
        <div >
            <h1 class="pheader"> BECS </h1>
   
   <div class="topnav">
  <a class="" href="index.html">Home</a>
  <a class="mpage" href="index.html">LogOut</a>
  <div class="navbar">

 
  <div class="dropdown">
    <button class="dropbtn">
      
    </button>
    <div class="dropdown-content">
      
    </div>
  </div>
</div>
 
<div class="search-container">
    <form action="displayBook.php">
      <input type="text" placeholder="Search.." name="search">
      <button   type="submit">Search</button>
    </form>
  
  </div>
  

  
            
</div>
<br>
            <h2> ADD Card Purchase Data </h2>
            <hr>
            <form action="" method="post">
               <!-- <div class="form-group">
                    <label for=""> User Name </label>
                    <input type="text" name="username" class="form-control" placeholder="Enter User Name" required>
                </div>
                <div class="form-group">
                    <label for=""> Book Title </label>
                    <input type="text" name="Title" class="form-control" placeholder="Enter Title" required>
                </div> -->
                <div class="form-group">
                    <label for=""> Card Number </label>
                    <input type="number" name="cardNumber" class="form-control" placeholder="Enter Card Number" required>
                </div>

                 <div class="form-group">
                    <label for=""> CVV </label>
                    <input type="number" name="cvv" class="form-control" placeholder="Enter CVV" required>
                </div>  

                 <div class="form-group">
                    <label for=""> funds </label>
                    <input type="number" name="funds" class="form-control" placeholder="Enter Amount of funds" required>
                </div>  
                
                <div class="form-group">
                    <label for=""> Card Expiration Date </label>
                    <input type="date" name="expirationDate" class="form-control" placeholder="Enter Expiration Date" required>
                </div>  

                <button type="submit" name="insert" class="btn btn-primary"> Checkout </button>

                
                <!--<a href="displayPurchaseHistory.php" class="btn btn-danger"> View Purchase History </a> -->
            </form>
        </div>
    </div>
</body>
</html>


<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'creditCard');

if(isset($_POST['insert']))
{
    //$username = $_POST['username'];
    //$Title = $_POST['Title'];
    $cardNumber = $_POST['cardNumber'];
    $cvv = $_POST['cvv'];
    $funds = $_POST['funds'];    
    $expirationDate = $_POST['expirationDate'];

    //$query = "INSERT INTO card(`username`,`Title`,`cardNumber`,`cvv`,`funds`,`expirationDate`) VALUES ('$username','Title','$cardNumber','$cvv','$funds','$expirationDate')"; 
    $query = "INSERT INTO card(`cardNumber`,`cvv`,`funds`,`expirationDate`) VALUES ('$cardNumber','$cvv','$funds','$expirationDate')"; 
    

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved & Purchase Made"); </script>';
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>