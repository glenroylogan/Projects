<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'book');

if(isset($_POST['delete']))
{
    $Barcode = $_POST['Barcode'];

    $query = "DELETE FROM manager_crud WHERE Barcode='$Barcode' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:displayBook.php");
        
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>

