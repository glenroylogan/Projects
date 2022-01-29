<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <link rel="stylesheet" href="styles.css">

  
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
    <button class="dropbtn">ManagerBECS
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
<br>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'book');

$query = "SELECT * FROM manager_crud";
$query_run = mysqli_query($connection, $query);
?>
<table class="table table-bordered" style="background-color: white;">
    <thead class="table-dark">
        <tr>
            <th> Barcode </th>
            <th> Title </th>
            <th> Author </th>
            <th> Price</th>
            <th> Stock </th>
            <th> Reorder </th>
            <th> Promo Discount </th>
            <th> Promo Expiration Date </th>
            
            <th> EDIT </th>
            <th> DELETE </th>
        </tr>
    </thead>

<?php
    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
                <tbody>
                    <tr>
                        <th> <?php echo $row['Barcode']; ?> </th>
                        <th> <?php echo $row['Title']; ?> </th>
                        <th> <?php echo $row['Author']; ?> </th>
                        <th> <?php echo $row['Price']; ?> </th>
                        <th> <?php echo $row['Stock']; ?> </th>
                        <th> <?php echo $row['Reorder']; ?> </th>
                        <th> <?php echo $row['PromoDiscount']; ?> </th>
                        <th> <?php echo $row['PromoExpirationDate']; ?> </th>

                    <form action="updateBook.php" method="post">
                        <input type="hidden" name="Barcode" value="<?php echo $row['Barcode'] ?>">
                        <th> <input type="submit" name="edit" class="btn btn-success" value="EDIT"></th>
                    </form>

                    <form action="deleteBook.php" method="post">
                        <input type="hidden" name="Barcode" value="<?php echo $row['Barcode'] ?>">
                        <th> <input type="submit" name="delete" class="btn btn-danger" value="DELETE"> </th>
                    </form>

                    </tr>
                </tbody>
            <?php
        }
    }
    else
    {
        echo "No Record Found";
    }
?>
</table>
        </div>
    </div>
</body>
</html>

