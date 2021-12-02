<?php
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "assignment";

$q = intval($_GET['q']);
$q = $q + 1;

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

try
    {

        $sql = "SELECT * FROM artwork WHERE artworkid = $q";

        $result = $conn->query($sql);

            $row = $result->fetch_assoc();

                $sql = "INSERT INTO shoppingcart (cartid,items,price) VALUES (" . $row["artworkid"] . ",'" .$row["title"] . "'," . $row["price"] . ")";
               if($conn->query($sql)){
                echo "Successfully added to cart! Redirecting...";
               }else {
                echo "Item already exists in cart. Redirecting...";
               }
               echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";

        $conn->close();
            }
    catch (Exception $e)
    {
        throw new Exception("Error getting shit.");
    }

    ?>

    
    