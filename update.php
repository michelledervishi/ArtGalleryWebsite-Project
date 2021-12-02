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
    $array = array($_POST["title"],$_POST["production"],$_POST["medium"],$_POST["dimensions"],$_POST["location"],$_POST["artist"],$_POST["price"],$_POST["artgenre"]);

    try
    {
        if($type == "art") {
            $sql = "UPDATE artwork SET ";
            $updatekeys = array();
            for($i = 0; $i < sizeof($array); $i++){
                if (!empty($array[$i]) == 1) {
                    switch ($i) {
                        case 0:
                            array_push($updatekeys, "title='". $array[$i] .  "'");
                            break;
                        case 1:
                            array_push($updatekeys, "production='". $array[$i] .  "'");
                            break;
                        case 2:
                            array_push($updatekeys, "medium='". $array[$i] .  "'");
                            break;
                        case 3:
                            array_push($updatekeys, "dimensions='". $array[$i] .  "'");
                            break;
                        case 4:
                            array_push($updatekeys, "location='". $array[$i] .  "'");
                            break;
                        case 5:
                            array_push($updatekeys, "artist='". $array[$i] .  "'");
                            break;
                        case 6:
                            array_push($updatekeys, "price='". $array[$i] .  "'");
                            break;
                        case 7:
                            array_push($updatekeys, "artgenre='". $array[$i] .  "'");
                            break;
                    }
                }
            }
        $querystring = implode(",", $updatekeys);

        $sql .= $querystring . " WHERE artworkid=" . $q . "";

            if($conn->query($sql) == TRUE) {
                $conn->close();
                echo "Successfully updated! Redirecting...";
                echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
            }else {
                echo "Error: not updated.";
            }
        }
    } catch (Exception $e) {
        throw new Exception("Error with type. Redirecting...");
        echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
    }


}else if ( $type == "museum") {
    $array = array($_POST["name"],$_POST["established"],$_POST["location"],$_POST["address"],$_POST["history"],$_POST["involved"],$_POST["famousartwork"]);


    try
    {
        if($type == "museum") {
            $sql = "UPDATE museums SET ";
            $updatekeys = array();
            for($i = 0; $i < sizeof($array); $i++){
                if (!empty($array[$i]) == 1) {
                    switch ($i) {
                        case 0:
                            array_push($updatekeys, "name='". $array[$i] .  "'");
                            break;
                        case 1:
                            array_push($updatekeys, "established='". $array[$i] .  "'");
                            break;
                        case 2:
                            array_push($updatekeys, "location='". $array[$i] .  "'");
                            break;
                        case 3:
                            array_push($updatekeys, "address='". $array[$i] .  "'");
                            break;
                        case 4:
                            array_push($updatekeys, "history='". $array[$i] .  "'");
                            break;
                        case 5:
                            array_push($updatekeys, "involved='". $array[$i] .  "'");
                            break;
                        case 6:
                            array_push($updatekeys, "famousartwork='". $array[$i] .  "'");
                            break;
                        
                    }
                }
            }
        $querystring = implode(",", $updatekeys);

        $sql .= $querystring . " WHERE museumid=" . $q . "";

            if($conn->query($sql) == TRUE) {
                $conn->close();
                echo "Successfully updated! Redirecting...";
                echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
            }else {
                echo "Error: not updated. Redirecting...";
                echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
            }
        }
    } catch (Exception $e) {
        throw new Exception("Error with type.");
    }


}else {
    $array = array($_POST["fullname"],$_POST["residence"],$_POST["famouswork"],$_POST["genres"]);


    try
    {
        if($type == "artist") {
            $sql = "UPDATE artists SET ";
            $updatekeys = array();
            for($i = 0; $i < sizeof($array); $i++){
                if (!empty($array[$i]) == 1) {
                    switch ($i) {
                        case 0:
                            array_push($updatekeys, "fullname='". $array[$i] .  "'");
                            break;
                        case 1:
                            array_push($updatekeys, "residence='". $array[$i] .  "'");
                            break;
                        case 2:
                            array_push($updatekeys, "famouswork='". $array[$i] .  "'");
                            break;
                        case 3:
                            array_push($updatekeys, "genres='". $array[$i] .  "'");
                            break;
                    }
                }
            }
        $querystring = implode(",", $updatekeys);

        $sql .= $querystring . " WHERE artistid=" . $q . "";

            if($conn->query($sql) == TRUE) {
                $conn->close();
                echo "Successfully updated! Redirecting...";
                echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
            }else {
                echo "Error: not updated. Redirecting...";
                echo "<meta http-equiv=\"refresh\" content=\"2;url=maintain.php\"/>";
            }
        }
    } catch (Exception $e) {
        throw new Exception("Error with type.");
    }
    
    
}




    ?>
