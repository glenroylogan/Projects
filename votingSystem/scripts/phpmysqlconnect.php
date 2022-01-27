<?php
require_once 'dbconfig.php';
if( isset( $_POST['submit'] ) )
{     
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "Connected to $dbname at $host successfully.";       
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }   

    $clerk_id = $_POST['clerk_id'];
    $constituency_id = $_POST['constituency_id'];
    $poll_division_id = $_POST['poll_division_id'];
    $polling_station_code = $_POST['polling_station_code'];
    $candidate1Votes = $_POST['candidate1Votes'];
    $candidate2Votes = $_POST['candidate2Votes'];
    $rejectedVotes = $_POST['rejectedVotes'];
    $totalVotes = $_POST['totalVotes'];
    //$hiddenField = $_POST['hiddenField'];
    //$recordDigest = $_POST['record_digest'];     
    //$salt = mt_rand();
    //$record_digest = md5($salt.$recordDigest);
  
    $insertData = "INSERT INTO StationVotes (constituency_id,clerk_id,poll_division_id ,polling_station_code,candidate1Votes,candidate2Votes,rejectedVotes,totalVotes)
    VALUES ('$constituency_id',' $clerk_id','$poll_division_id',' $polling_station_code',' $candidate1Votes',' $candidate2Votes','$rejectedVotes','$totalVotes')";

    echo "Entries Added Successfully!";   
    
    $retrieveData = $conn->query($insertData);  
    $retrieveData = $conn->query("SELECT * FROM StationVotes");
    $results = $retrieveData ->fetchALL(PDO ::FETCH_ASSOC);

    $htmlTableFormat = '<div>
		<table>
        <thead>
            <tr>
            <th>Clerk ID:</th>
            <th>Constituency ID:</th>
            <th>Polling Division ID:</th>
            <th>Polling Station:</th>
            <th>Votes for Candidate 1:</th>
            <th>Votes for Candidate 2:</th>
            <th>Rejected Ballots:</th> 
            <th>Total Number of Votes:</th>            
            </tr>
        </thead><tbody>';
        foreach ($results as $row) 
        {
            $htmlTableFormat .=  '<tr><td>' . $row['constituency_id'] .'</td><td>'. $row['clerk_id'] . '</td><td>' . $row['poll_division_id'] .'</td>
            <td>' . $row['polling_station_code'] .'</td><td>'. $row['candidate1Votes'] . '</td><td>' . $row['candidate2Votes'] .'</td><td>' . $row['rejectedVotes'] .'</td>            
            <td>' . $row['totalVotes'] .'</td><td></td>';
                                  
        }
        $htmlTableFormat .= '</tbody></table></div>';	
        echo $htmlTableFormat;	
}
?>  
        
