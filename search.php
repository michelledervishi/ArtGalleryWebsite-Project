<?php

$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "assignment";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$query = $_GET['searchquery']; 
    // gets value sent over search form
     
    $min_length = 3;
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
         
        $results = 0;

        $raw_results = ("SELECT artworkid FROM artwork WHERE title LIKE '%".$query."%' ");
        $results = $conn->query($raw_results);
            
        if(mysqli_num_rows($results) > 0){ 
             
            while($row = mysqli_fetch_array($results)){
                echo "Successfully found query! Redirecting...";

                echo "<meta http-equiv=\"refresh\" content=\"1;url=viewer.php?type=art&no=" . ($row['artworkid'] -1) . "\"/>";
            }
             
        }
        else{ 

            $raw_results = ("SELECT * FROM museums WHERE name LIKE '%".$query."%' ");
            $results = $conn->query($raw_results);

            if(mysqli_num_rows($results) > 0){ 
             
                while($row = mysqli_fetch_array($results)){
                    echo "Successfully found query! Redirecting...";

                    echo "<meta http-equiv=\"refresh\" content=\"2;url=viewer.php?type=museum&no=" . ($row['museumid']-1) . "\"/>";
                }
            }
            else{
                    $raw_results = ("SELECT * FROM artists WHERE fullname LIKE '%".$query."%' ");
                    $results = $conn->query($raw_results);

                    if(mysqli_num_rows($results) > 0){ 
             
                        while($row = mysqli_fetch_array($results)){
                            echo "Successfully found query! Redirecting...";

                            echo "<meta http-equiv=\"refresh\" content=\"2;url=viewer.php?type=artist&no=" . ($row['artistid']-1) . "\"/>";
                        }
                    }
                    else {
                    echo "No results found. Redirecting...";
                    echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php\"/>";
                    }
            }

        }
    }   else{ // if query length is less than minimum
        echo "Minimum length of query is ".$min_length. ".Redirecting to Home Page...";
        echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php\"/>";
    }

?>