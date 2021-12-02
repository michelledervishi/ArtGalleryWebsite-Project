<?php

//Group 42- Created by Sara Jahanzad, Judel Villardo, Michelle Dervishi
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "assignment";

$q = intval($_GET['q']);
$type = intval($_GET['type']);
$q = $q + 1;

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

try
    {

        if($type == 1){
            $sql = "SELECT a.*, b.smallpath, b.largepath FROM artwork a LEFT JOIN images b ON a.artworkid = b.artid WHERE a.artworkid = $q";
            $result = $conn->query($sql);
        }
        else if ($type == 2){
            $sql = "SELECT * FROM museums WHERE museumid = $q";
            $result = $conn->query($sql);
        }
        else if ($type == 3){
            $sql = "SELECT * FROM artists WHERE artistid = $q";
            $result = $conn->query($sql);
        }
        else {
            $sql = "SELECT * FROM shoppingcart";
            $result = $conn->query($sql);
        }
       



        $data = [];
		while($row = $result->fetch_assoc()) 
		{
            array_push($data, $row);
        }
        echo json_encode($data);
    }
    catch (Exception $e)
    {
        throw new Exception("Error getting shit.");
    }

?>