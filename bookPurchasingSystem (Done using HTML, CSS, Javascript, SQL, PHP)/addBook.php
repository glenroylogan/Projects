<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Book</title>
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
    <button class="dropbtn">Manager
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="displayBook-manager.php">Add Promotion</a>
    </div>
  </div>
</div>
 
<div class="search-container">
    <form action="displayBook-manager.php">
      <input type="text" placeholder="Search.." name="search">
      <button   type="submit">Search</button>
    </form>
  
  </div>
  

  
            
</div>
<br>
            <h2>Add item to BECS Book Store </h2>
            <br>
        <hr>
<br>
            <form action="" method="post">
                <div >
                    <label for=""> Title :</label>
                    <input type="text" name="Title" class="form-control" placeholder="Enter Title" required>
                </div>
                <br>
                <div >
                    <label for=""> Author: </label>
                    <input type="text" name="Author" class="form-control" placeholder="Enter Author" required>
                </div>
                <br>
                <div >
                    <label for=""> Price: </label>
                    <input type="number" name="Price" class="form-control" placeholder="Enter Price" required>
                </div>
                <br>

                 <div >
                    <label for=""> Stock </label>
                    <input type="number" name="Stock" class="form-control" placeholder="Enter Stock Amount" required>
                </div>
                <br>

                 <div >
                    <label for=""> Reorder  :</label>
                    <input type="number" name="Reorder" class="form-control" placeholder="Enter Reorder Amount" required>
                </div>
                <br>

                 <div >
                    <label for=""> Discount :</label>
                    <input type="number" name="PromoDiscount" class="form-control" placeholder="Enter Discount" required>
                </div>
                <br>

                <div >
                    <label for=""> PromoExpirationDate : </label>
                    <input type="date" name="PromoExpirationDate" class="form-control" placeholder="Enter Expiration Date" required>
                </div>
                <br>
                <br>

                <button type="submit" name="insert" class="btn btn-primary"> Add </button>
                
            </form>
        </div>
    </div>
</body>
</html>



<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'book');

if(isset($_POST['insert']))
{
   
    $Barcode = $_POST['Barcode'];
    $Title = $_POST['Title'];
    $Author = $_POST['Author'];
    $Price = $_POST['Price'];
    $Stock = $_POST['Stock'];
    $Reorder = $_POST['Reorder'];
    $PromoDiscount =$_POST['PromoDiscount'];
    $PromoExpirationDate = $_POST['PromoExpirationDate'];

    $query = "INSERT INTO manager_crud(`Barcode`,`Title`,`Author`,`Price`,`Stock`,`Reorder`,`PromoDiscount`,`PromoExpirationDate`) VALUES ('$Barcode','$Title','$Author','$Price','$Stock','$Reorder','$PromoDiscount','$PromoExpirationDate')"; 
    
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>