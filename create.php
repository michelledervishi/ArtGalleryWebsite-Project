<?php

//Group 42- Created by Sara Jahanzad, Judel Villardo, Michelle Dervishi
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "assignment";

$type = strval($_GET['type']);


$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

if($type == "art")
{
    $array = array($_POST["title"],$_POST["production"],$_POST["medium"],$_POST["dimensions"],$_POST["location"],$_POST["artist"],$_POST["price"],$_POST["artgenre"]);

    $sql = "SELECT * FROM artwork ORDER BY artworkid DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql = "INSERT INTO artwork (artworkid, title, production, medium, dimensions,location,artist,price,artgenre) VALUES (".($row["artworkid"] + 1).",'" .$array[0] ."','" .$array[1] ."','" .$array[2] . "','" .$array[3] . "','" .$array[4] . "','" .$array[5] . "'," .$array[6] . ",'" .$array[7] ."')";
    if( $result = $conn->query($sql)){
        echo "Successfully added to Artwork Database! Redirecting...";

        echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
    } else {
    echo "0 results found. <br>";
    echo "Unsuccessfully added to Artwork Database! Redirecting...";

    echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
    }
    $conn->close();

}
else if ( $type == "museum") 
{
    $array = array($_POST["name"],$_POST["established"],$_POST["location"],$_POST["address"],$_POST["history"],$_POST["involved"],$_POST["famousartwork"]);


    $sql = "SELECT * FROM museums ORDER BY museumid DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql = "INSERT INTO museums (museumid, name, established, location, address, history,involved,famousartwork) VALUES (".($row["museumid"] + 1).",'" .$array[0] ."','" .$array[1] ."','" .$array[2] . "','" .$array[3] . "','" .$array[4] . "','" .$array[5] . "','" .$array[6] ."')";
    if( $result = $conn->query($sql)){
        echo "Successfully added to Museum Database! Redirecting...";

        echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
    } else {
    echo "0 results found. <br>";
    echo "Unsuccessfully added to Museum Database! Redirecting...";

    echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
    }
    $conn->close();
    
}
else
{
    $array = array($_POST["fullname"],$_POST["residence"],$_POST["famouswork"],$_POST["genres"]);


    $sql = "SELECT * FROM artists ORDER BY artistid DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql = "INSERT INTO artists (artistid, fullname, residence, famouswork, genres) VALUES (".($row["artistid"] + 1).",'" .$array[0] ."','" .$array[1] . "','" .$array[2] . "','" .$array[3] ."')";
    if( $result = $conn->query($sql)){
        echo "Successfully added to Artist Database! Redirecting...";

        echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
    } else {
    echo "0 results found. <br>";
    echo "Unsuccessfully added to Artist Database! Redirecting...";

    echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\"/>";
    }
    $conn->close();
    
   

    
}




    ?>