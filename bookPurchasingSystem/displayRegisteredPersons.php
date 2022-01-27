<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles.css">
    
    <title>Manager Registrar View</title>
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
      <button  ;" type="submit">Search</button>
    </form>
  
  </div>
  

  
            
</div>
<br>
            <h2>Registrar </h2>
            <br>
        <hr>
    
    <div >
        
        <button  onclick="window.location='accountRegistration.php';">Add More Persons</button>
    </div>
<br>
<br>
    <div class="row">
         
         <button  onclick="window.location='displayPurchaseHistory.php';">View Purchasing History</button>
    </div>
    
<br>

<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'registration');

$query = "SELECT * FROM accountregistration";
$query_run = mysqli_query($connection, $query);
?>
<br>
<table class="table table-bordered" style="background-color: white;">
    <thead class="table-dark">
        <tr>
            <th> ID </th>
            <th> User Name </th>
            <th> Email </th>
            <th> Password </th>
            <th> Address </th>
            <th> City</th>
            <th> State </th>
            <th> Zip Code </th>         
                       
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
                        <th> <?php echo $row['ID']; ?> </th>
                        <th> <?php echo $row['username']; ?> </th>
                        <th> <?php echo $row['email']; ?> </th>
                        <th> <?php echo $row['password']; ?> </th>
                        <th> <?php echo $row['address']; ?> </th>
                        <th> <?php echo $row['city']; ?> </th>
                        <th> <?php echo $row['state']; ?> </th>
                        <th> <?php echo $row['zipcode']; ?> </th>                      

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
