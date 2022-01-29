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
  <a class="mpage" href="prelogin.html">Login</a>
  <div class="navbar">

 
  <div class="dropdown">
    <button class="dropbtn">
      
    </button>
    <div class="dropdown-content">
      
    </div>
  </div>
</div>
 
<div class="search-container">
    <form action="displayBook-notlog.php"
      <input type="text" placeholder="Search.." name="search">
      <button onclick="window.location='/managerBookDatabase/displayBook.php'"  type="submit">Search</button>
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
            
            <th> Title </th>
            <th> Author </th>
            <th> Price</th>
         
            
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
                        <th> <?php echo $row['Title']; ?> </th>
                        <th> <?php echo $row['Author']; ?> </th>
                        <th> <?php echo $row['Price']; ?> </th>
                        
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


</table>
        </div>
    </div>
</body>
</html>

