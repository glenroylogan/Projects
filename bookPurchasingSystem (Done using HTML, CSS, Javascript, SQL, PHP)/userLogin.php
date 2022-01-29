<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Log In</title>
</head>
<body>
  
    <div >
        <div >
            <h1 class="pheader"> BECS </h1>
   
   <div class="topnav">
  <a class="mpage" href="../index.html">Home</a>
  <div class="navbar">
  <a class="mpage" href="accountRegistration.php">Register</a>
  <a class="mpage" href="../index.html"></a>
 
  <div class="dropdown">
    <button class="dropbtn">
      
    </button>
      </div>
    <a class="mpage" href="../index.html"></a>
  </div>

 

  

  
            
</div>
<br>
            <h2>Log In </h2>
            <br>
        <hr>
<br>

 <form action="" method="post">             

                <div class="form-group">
                    <label for=""> User Name </label>
                    <input type="text" name="username" class="form-control" placeholder="Enter User Name" required>
                </div>                
<br>
                <div class="form-group">
                    <label for=""> Password </label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>      
                <br>
                <button type="submit" name="insert" class="btn btn-primary"> Login </button>
                

            </form>
</body>
</html>
<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'registration');

if(isset($_POST['insert']))
{
    $username = $_POST['username'];
    //$email = $_POST['email'];
    $password = $_POST['password'];
    //$retypePassword = $_POST['retypePassword'];
    //$address = $_POST['address'];
    //$city = $_POST['city'];
    //$state =$_POST['state'];
    //$zipcode = $_POST['zipcode'];

    if($username == $username AND $password == $password)
    {
        $query = "SELECT * FROM accountregistration WHERE username = '$username' AND password = '$password'";
        $query_run = mysqli_query($connection,$query);

       

        if(mysqli_num_rows($query_run)>0)
        {
            
            echo '<script type= "text/javascript"> alert("Login Successful") </script>';
            header("Location:displayBook.php");
           
        }
        
        else
        {
        $query = "SELECT FROM accountregistration(`username`,`password`) VALUES ('$username','$password')";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
        echo '<script type= "text/javascript"> alert("Login Failed Please Try Again") </script>';
        }      
              
        }
    }
   
    
}

?>
