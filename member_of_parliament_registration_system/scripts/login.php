<?php
session_start();
$session_ID = md5(session_id()  . time());
$_SESSION['session_ID'] = $session_ID;

function userLogin($emailAddress,$password)
{
    if(!(CheckLoginInDB($emailAddress,$password)))
    {
        return false;
    }

    $connect = new PDO('mysql:host=localhost;dbname=MPMgmtDB;', 'comp2190SA', '2019Sem1');
    $connect->query("UPDATE Users SET last_login = now() WHERE email='$emailAddress'");
    
    echo "Login Successful.";
    header('Location: /620099685/p1.html');
}

function CheckLoginInDB($emailAddress,$password)
{
    $connect = new PDO('mysql:host=localhost;dbname=MPMgmtDB;', 'comp2190SA', '2019Sem1');
    $checkLoginQuery = "SELECT email, password_digest, salt FROM Users WHERE email='$emailAddress'";
    $stmt = $connect->query($checkLoginQuery);
    $result = $stmt->fetchALL(PDO ::FETCH_ASSOC);

    if ($result === [])
    {
        echo "Login Failed. Please ensure your email and password is correct";
        return false;   
    }
    else
    {
        if ($result[0]['password_digest'] == md5($result[0]['salt'].$password))
        {
            return true;
        }
        else
        {
            echo "Login Failed. Please ensure your email and password is correct";
            $connect = new PDO('mysql:host=localhost;dbname=MPMgmtDB;', 'comp2190SA', '2019Sem1');
            $connect->query("UPDATE Users SET failed_attempts = failed_attempts+1 WHERE email='$emailAddress'");
            return false;
        }        
    }
}

if( isset( $_POST['submit_form'] ) )
{
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    $hiddenField = $_SESSION['session_ID'];    
        
    userLogin($emailAddress,$password);
}
?>