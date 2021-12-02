//Group 42- Created by Sara Jahanzad, Judel Villardo, Michelle Dervishi


function artData(val) {

  $.get( "../connect.php?type=1&q="+val)
  .done(function( data ) {
    var result = JSON.parse(data);
    var infobuilder="";
    infobuilder += "\
    <h2>"+result[0]['title'] +"</h2>\
    <b>Date of Production</b><br>"+result[0]['production'] +"<br><br>\
    <b>Medium</b><br>"+ result[0]['medium']+"<br><br>\
    <b>Dimensions</b><br>"+result[0]['dimensions']+"<br><br>\
    <b>Location</b><br>"+ result[0]['location']+"<br><br>\
    <b>Artist</b><br>"+ result[0]['artist']+"<br><br>\
    <b>Price</b><br>$"+ result[0]['price']+"<br><br>\
    <b>Genre</b><br>"+ result[0]['artgenre']+"<br><br>\
    <a href=\"cart.php?q=" + val + "\"  class=\"btn btn-outline-primary\">\
        <img src=\"assets/cart.svg\" width=17px> Add to Shopping Cart </img>\
      </a><br><br>\
      <a href=\"index.php\" class=\"btn btn-outline-dark fa fa-home\">\
      <span class=\"fa fa-home\"></span>Return to Home \
            </a>\
      ";

    document.getElementById('image').src=result[0]['smallpath'];
    document.getElementById('info').innerHTML=infobuilder;

  });

}
function museumData(val) {

  $.get( "../connect.php?type=2&q="+val)
  .done(function( data ) {
    var result = JSON.parse(data);
    var infobuilder="";
    infobuilder += "\
    <h2>"+result[0]['name'] +"</h2>\
    <b>Established</b><br>"+result[0]['established'] +"<br><br>\
    <b>Location</b><br>"+ result[0]['location']+"<br><br>\
    <b>Address</b><br>"+result[0]['address']+"<br><br>\
    <b>Involved</b><br>"+ result[0]['involved']+"<br><br>\
    <b>History</b><br>"+ result[0]['history']+"<br><br>\
    <b>Famous Artworks</b><br>"+ result[0]['famousartwork']+"<br><br>\
    <a href=\"index.php\" class=\"fa fa-home btn btn-outline-dark\">\
    <span class=\"fa fa-home\"></span>Return to Home \
            </a>\
      ";

    document.getElementById('image').src=result[0]['path'];
    document.getElementById('info').innerHTML=infobuilder;

  });

}
function artistData(val) {

  $.get( "../connect.php?type=3&q="+val)
  .done(function( data ) {
    var result = JSON.parse(data);
    var infobuilder="";
    infobuilder += "\
    <h2>"+result[0]['fullname'] +"</h2>\
    <b>Date of Birth</b><br>"+result[0]['birthdate'] +"<br><br>\
    <b>Date of Death</b><br>"+ result[0]['deathdate']+"<br><br>\
    <b>Residence</b><br>"+result[0]['residence']+"<br><br>\
    <b>Famous Work</b><br>"+ result[0]['famouswork']+"<br><br>\
    <b>Genres</b><br>"+ result[0]['genres']+"<br><br>\
    <a href=\"index.php\" class=\"btn btn-outline-dark\">\
    <span class=\"fa fa-home\"></span>Return to Home \
            </a>\
      ";

    document.getElementById('image').src=result[0]['path'];
    document.getElementById('info').innerHTML=infobuilder;

  });

}
 