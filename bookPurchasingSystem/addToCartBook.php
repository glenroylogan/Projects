<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h2>PHP - CRUD : Display Books For Purchasing PHP  </h2>
            <hr>
    <!--
    <div class="row">
        <a href="addBook.php" class="btn btn-success" style="margin-left: 80%;"> ADD DATA </a>    
    </div> -->

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
            <th>Buy</th>
            
            <th> BUY </th>           
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
                        

                    <form action="cardPurchase.php" method="post">
                        <input type="hidden" name="Barcode" value="<?php echo $row['Barcode'] ?>">
                        <th> <input type="submit" name="BUY" class="btn btn-success" value="BUY" ></th>
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

