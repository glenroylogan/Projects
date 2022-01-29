<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles.css">
    
    <title>Display Purchase History</title>
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
      <a href="addBook.php">Add Book</a>
    </div>
  </div>
</div>
 
<div class="search-container">
    <form action="displayBook-manager.php">
    <form >
      <input type="text" placeholder="Search.." name="search">
      <button   type="submit">Search</button>
    </form>
  
  </div>
  

  
            
</div>
<br>
            <h2>Current Purchase History of Registered Persons Data in PHP  </h2>
            <hr>
    
    <div >
        <br>
          
    </div>
    
<br>

<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'registration');
$connection1 = mysqli_connect("localhost","root","");
$db1 = mysqli_select_db($connection1, 'book');


$query = "SELECT * FROM accountregistration";
$query_run = mysqli_query($connection, $query);
$query1 = "SELECT * FROM manager_crud";
$query_run1 = mysqli_query($connection1, $query1);

?>
<table class="table table-bordered" style="background-color: white;">
    <thead class="table-dark">
        <tr>
            <th> ID </th>
            <th> User Name </th>
            <th> Book Barcode </th>
            <th> Title </th>
            <th> Author </th>
            <th> Price</th>                 
                       
        </tr>
    </thead>

<?php
    if($query_run AND $query_run1)
    {
        while($row = mysqli_fetch_array($query_run) AND $row1 = mysqli_fetch_array($query_run1))
        {
            ?>
                <tbody>
                    <tr>
                        <th> <?php echo $row['ID']; ?> </th>
                        <th> <?php echo $row['username']; ?> </th>
                        <th> <?php echo $row1['Barcode']; ?> </th>
                        <th> <?php echo $row1['Title']; ?> </th> 
                        <th> <?php echo $row1['Author']; ?> </th> 
                        <th> <?php echo $row1['Price']; ?> </th>                                           

                    </tr>
                </tbody>
            <?php
        }
    }
    else
    {
        echo "No Registered Persons Found";
    }   
?>
</table>
        </div>
    </div>
</body>
</html>

