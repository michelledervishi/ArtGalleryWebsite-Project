<!DOCTYPE html>
<html>

<!-- CPS 630 | Assignment 2: Iteration 2 -->
<!-- Group 42: Judel, Michelle, Sara -->

<!-- Tested Browser Compatibility: Firefox, Chrome, IE11, Edge-->

<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/logo.jpg">
  <title> Artwork Shop </title>

  <!-- Import Stylesheets -->
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="scripts/display-sm.js"></script>
<script src="scripts/save.js"></script>

</head>

<body>

  <!-- Navigational Bar -->
  <nav class="navbar navbar-fixed-top sticky-top navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand">
      <img src="assets/logo.jpg" width="50">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a href="about.html" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Blogs</a>
        </li>
        <li class="nav-item">
          <a href="maintain.php" class="nav-link">Maintain</a>
        </li>
        <li class="nav-item">
          <button onClick="location.href='shoppingcart.php';" type="button" class="btn btn-outline-secondary" >
            <img src="assets/cart.svg" width=17px> Shopping Cart </img>
          </button>
        </li>
        <li class="nav-item">
            <form action="search.php" method="GET">
              <input type="text" class="form-control" placeholder="Search..." name="searchquery">
        </li>
        <li>
            <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
        </li>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Carousel -->
  <div id="artViewer" class="carousel slide" data-ride="carousel" style="overflow:hidden">

    <!-- Carousel Images -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block center" src="assets/paint2.jpeg" alt="artwork1">
        <div class="carousel-caption">
          <img src="assets/logo.jpg" width="150">
          <span class="subtitle align-middle d-none d-lg-inline"> Art and Gallery </span>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block center" src="assets/paint.jpg" alt="artwork2">
      </div>
    </div>

    <!-- Carousel Navigational Buttons -->
    <a class="carousel-control-prev" href="#artViewer" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#artViewer" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<?php
$servername = "127.0.0.1:8889";
$username = "root";
$password = "root";
$dbname = "assignment";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql = "SELECT cartid, items, price FROM shoppingcart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $totalcost = 0;
    echo "<h2>Current Cart:</h2> <br>";
    // output data of each row
    echo 
    "<table style=\"visibility:visible\">
        <tr>
        <th>Cart item</th>
        <th>Price (\$) </th>
        <th>Edit</th>
        </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["items"]. "</td><td>" . $row["price"]. "</td><td> <button onClick=\"location.href='remove.php?q=" . $row["cartid"] . "'\" class=\"btn btn-outline-danger btn-sm\">
        <span class=\"fa fa-trash-o\"></span>
      </a></td>";
        $totalcost += $row["price"];
    }
    echo "</table>";
    echo "<br><h3> Subtotal: <br>$" . $totalcost . "</h3><br>"; //before tax
    echo "<h3> Total: <br>$" . ($totalcost * 1.13) . "</h3><br>"; //after tax :)
    echo "<button class=\"btn btn-success btn-lg\">
    <span class=\"fa fa-money\">  Check out</span></button><br>";
    echo "<button  class=\"btn btn-outline-dark btn-lg\">
      We accept: <span class=\"fa fa-cc-paypal\"><b>  </b><span class=\"fa fa-cc-mastercard\"><b>  </b><span class=\"fa fa-cc-visa\"><b>  </b><span class=\"fa fa-cc-amex\"></span></span></span></span></button><br>";

} else {
    echo "0 results";
}
$conn->close();

?>
  <hr>
  

  <!-- Display Table -->
  <br>

  <table id="window" class="table table-bordered">
    <tbody>
      <tr>
        <td class="align-middle" id="info">
        </td>
        <td class="align-middle" width="20%">
          <img src="#" id="image"/>
        </td>
      </tr>
    </tbody>
  </table>

  <br> <br>
  <footer>
    Ryerson University - Department of Computer Science 2018
  </footer>
</div>

</body>


</html>
