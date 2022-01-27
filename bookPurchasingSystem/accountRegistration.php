<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register to BECS</title>
</head>
<body>
  
    <div >
        <div >
            <h1 class="pheader"> BECS </h1>
   
   <div class="topnav">
  <a class="" href="index.html">Home</a>
  <a class="" href="prelogin.html">Login</a>
  
  <a class="" href=""></a>
  <div class="navbar">

 
  <div >
    
    
  </div>
</div>
 

  

  
            
</div>
<br>
            <h2>Registration</h2>
            <br>
        <hr>
<br>
            <form action="" method="post">             

                <div class="form-group">
                    <label for=""> User Name </label>
                    <input type="text" name="username" class="form-control" placeholder="Enter User Name" required>
                </div>

                <div class="form-group">
                    <label for=""> Email </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>

                <div class="form-group">
                    <label for=""> Password </label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for=""> Retype Password </label>
                    <input type="password" name="retypePassword" class="form-control" placeholder="Retype Password" required>
                </div>

                 <div class="form-group">
                    <label for=""> Address </label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                </div>

                 <div class="form-group">
                    <label for=""> City </label>
                    <input type="text" name="city" class="form-control" placeholder="Enter City" required>
                </div>

                 <div class="form-group">
                    <label for=""> State </label>
                    <input type="text" name="state" class="form-control" placeholder="Enter State" required>
                </div>

                <div class="form-group">
                    <label for=""> Zip Code </label>
                    <input type="number" name="zipcode" class="form-control" placeholder="Enter Zip Code" required>
                </div>

                <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                
            </form>
        </div>
    </div>
</body>
</html>

<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'registration');

if(isset($_POST['insert']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retypePassword'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state =$_POST['state'];
    $zipcode = $_POST['zipcode'];

    if($password == $retypePassword)
    {
        $query = "SELECT * FROM accountregistration WHERE email = '$email'";
        $query_run = mysqli_query($connection,$query);

        if(mysqli_num_rows($query_run)>0)
        {
            echo '<script type= "text/javascript"> alert("Email ID Already Exists...Try Another Email ID") </script>';
        }
        else
        {
        $query = "INSERT INTO accountregistration(`username`,`email`,`password`,`retypePassword`,`address`,`city`,`state`,`zipcode`) VALUES ('$username','$email','$password','$retypePassword','$address','$city','$state','$zipcode')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
        echo '<script type= "text/javascript"> alert("Sign Up Successful") </script>';
        }
        else
        {
        echo '<script type= "text/javascript"> alert("Registration Failed") </script>';
        }
        }
    }
    else{
        echo '<script type= "text/javascript"> alert("Password Does not Match") </script>';
    }
}


/*
if(isset($_POST['insert']))
{
   
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retypePassword'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state =$_POST['state'];
    $zipcode = $_POST['zipcode'];
    
 
    $query = "INSERT INTO accountregistration(`username`,`email`,`password`,`retypePassword`,`address`,`city`,`state`,`zipcode`) VALUES ('$username','$email','$password','$retypePassword','$address','$city','$state','$zipcode')"; 
    
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
*/
?>