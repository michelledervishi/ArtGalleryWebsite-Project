<!DOCTYPE html>

<html>

<!-- This is the viewer window that displays art/artist information -->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/logo.jpg">
  <title> Art Viewer </title>

  <!-- Import Stylesheets -->
  <link rel="stylesheet" type="text/css" href="viewer.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Import Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="scripts/display-lg.js"></script>
</head>

<body>

<div class="container-fluid viewer">
  <!-- Viewer -->
  <table id="window" class="table table-bordered">
    <tbody>
      <tr>
        <td class="align-middle" id="info">
        </td>
        <td class="align-middle" width="60%">
          <img src="#" id="image"/>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</body>

<?php
  $type = $_GET['type'];
  $q = $_GET['no'];

  if ($type == "art") {
    echo "<script> artData($q) </script>";
  } else if ($type == "museum") {
    echo "<script> museumData($q) </script>";
  } else {
    echo "<script> artistData($q) </script>";
  }
?>

</html>
