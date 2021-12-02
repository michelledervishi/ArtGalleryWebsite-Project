<?php

//Group 42- Created by Sara Jahanzad, Judel Villardo, Michelle Dervishi
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "assignment";

$q = intval($_GET['q']);
$q = $q + 1;
$type = strval($_GET['type']);


$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

if($type == "art"){

    try
    {
                $sql = "DELETE FROM artwork WHERE artworkid=$q";

        if($conn->query($sql)){
                    echo "Successfully removed from Artwork Database! Redirecting...";

                    echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
        } else {
            echo "0 results found. <br>";
            echo "Unsuccessfully removed from Artwork Database! Redirecting to Home Page...";

             echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
        }
        $conn->close();
        
    }
    catch (Exception $e)
    {
        throw new Exception("Error getting ID");
    }
    
}else if ( $type == "museum") {

    try
    {
                $sql = "DELETE FROM museums WHERE museumid=$q";

        if($conn->query($sql)){
                    echo "Successfully removed from Museum Database! Redirecting...";

                    echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
        } else {
            echo "0 results <br>";
            echo "Unsuccessfully removed from Museum Database! Redirecting to Home Page...";

             echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
        }
        $conn->close();
        
    }
    catch (Exception $e)
    {
        throw new Exception("Error getting ID.");
    }
    
}else{
    try
    {
                $sql = "DELETE FROM artists WHERE artistid=$q";

        if($conn->query($sql)){
                    echo "Successfully removed from Artist Database! Redirecting...";

                    echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
        } else {
            echo "0 results <br>";
            echo "Unsuccessfully removed from Artist Database! Redirecting to Home Page...";

             echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
        }
        $conn->close();
        
    }
    catch (Exception $e)
    {
        throw new Exception("Error getting ID.");
    }


   
    
}





?>
