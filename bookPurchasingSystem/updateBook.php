<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="styles.css">
    <title>Edit Book</title>
</head>
<body>
    <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'book');

    $Barcode = $_POST['Barcode'];

    $query = "SELECT * FROM manager_crud WHERE Barcode='$Barcode' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
<h1 class="pheader"> BECS </h1>
    <div >
        <div >
            
   
   <div class="topnav">
  <a class="" href="index.html">Home</a>
  <a class="mpage" href="index.html">LogOut</a>
  <div class="navbar">

 
  <div class="dropdown">
    <button class="dropbtn">Manager
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addBook.php">Add Book</a>
  
    </div>
  </div>
</div>
 
<div class="search-container">
    <form action="displayBook-manager.php">
      <input type="text" placeholder="Search.." name="search">
      <button  type="submit">Search</button>
    </form>
  
  </div>
  

  
  
  
</div>
  </div>

  </div>
</div>
  
</div>
            <h2>Edit item </h2>
            
</div>
      
        <br>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="Barcode" value="<?php echo $row['Barcode'] ?>">
            <div class="form-group">
                <label for=""> Title: </label>
                <input type="text" name="Title" class="form-control" value="<?php echo $row['Title'] ?>" placeholder="Enter First Name" required>
            </div>
            <br>
            <div class="form-group">
                <label for=""> Author: </label>
                <input type="text" name="Author" class="form-control" value="<?php echo $row['Author'] ?>" placeholder="Enter Last Name" required>
            </div>
            <br>
            <div class="form-group">
                <label for=""> Price :</label>
                <input type="number" name="Price" class="form-control" value="<?php echo $row['Price'] ?>" placeholder="Enter Price" required>
            </div>
<br>
             <div class="form-group">
                <label for=""> Stock :</label>
                <input type="number" name="Stock" class="form-control" value="<?php echo $row['Stock'] ?>" placeholder="Enter Stock Amount" required>
            </div>
<br>
             <div class="form-group">
                <label for=""> Reorder :</label>
                <input type="number" name="Reorder" class="form-control" value="<?php echo $row['Reorder'] ?>" placeholder="Enter Reorder Amount " required>
            </div>
<br>
             <div class="form-group">
                <label for=""> Discount: </label>
                <input type="number" name="PromoDiscount" class="form-control" value="<?php echo $row['Reorder'] ?>" placeholder="Enter Discount" required>
            </div>
<br>
             <div class="form-group">
                <label for=""> PromoExpirationDate:</label>
                <input type="date" name="PromoExpirationDate" class="form-control" value="<?php echo $row['Reorder'] ?>" placeholder="Enter Updated Expiration Date" required>
            </div>

<br><br>
            <button type="submit" name="update" class="btn btn-primary"> Edit</button>

           
        </form>


