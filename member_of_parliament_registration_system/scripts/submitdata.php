<?php
if( isset( $_POST['submit_form'] ) )
{
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $Constituency = $_POST['Constituency'];
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    $hiddenField = $_POST['hiddenField'];

    

    
    $salt = mt_rand();
    $password_digest = md5($salt.$password);

    $connect = new PDO('mysql:host=localhost;dbname= MPMgmtDB;', 'comp2190SA', '2019Sem1');
    $insertData = "INSERT INTO Users (first_name,last_name,Constituency,email,Yrs_service,password_digest,salt)
    VALUES ('$fName','$lName','$Constituency','$emailAddress',0,'$password_digest','$salt')";
    
    $stmt = $connect->query($insertData);


    

    $stmt = $connect->query("SELECT * FROM Users");
    $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);

    $htmlTableFormat = '<div>
		<table>
        <thead>
            <tr>
            <th>First Name</th><th>Last Name</th><th>Constituency</th>
            <th>Email</th><th>Hash</th><th>Years of Service</th>           
            </tr>
        </thead><tbody>';
        foreach ($results as $row) 
        {
            $htmlTableFormat .=  '<tr><td>' . $row['first_name'] .'</td><td>'. $row['last_name'] . '</td><td>' . $row['Constituency'] .'</td>
                                  <td>' . $row['email'] .'</td><td>'. $row['Hash'] . '</td><td>' . $row['Yrs_service'] .'</td>;
                                  
        }
        $htmlTableFormat .= '</tbody></table></div>';	
        echo $htmlTableFormat;	
        
}

?>