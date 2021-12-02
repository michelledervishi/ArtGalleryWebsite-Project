<?php

//Group 42- Created by Sara Jahanzad, Judel Villardo, Michelle Dervishi
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "assignment";

$q = intval($_GET['q']);

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

try
    {
                $sql = "DELETE FROM shoppingcart WHERE cartid=$q";

        if($conn->query($sql)){
                    echo "Successfully removed from cart! Redirecting...";

                    echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
        } else {
            echo "0 results <br>";
            echo "Unsuccessfully removed from cart! Redirecting to Home Page...";

             echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
        }
        $conn->close();
        
    }
    catch (Exception $e)
    {
        throw new Exception("Error getting ID.");
    }

?>