//Group 42- Created by Sara Jahanzad, Judel Villardo, Michelle Dervishi

//Scripts to receive the databases for artwork, museums, and artists

function artData(val) {
  document.getElementById('window').style.visibility = "visible";

  $.get("../connect.php?type=1&q=" + val)
    .done(function (data) {
      var result = JSON.parse(data);
      var infobuilder = "";
      infobuilder += "\
    <a href=\"viewer.php?type=art&no=" + val + "\"> <h2>" + result[0]['title'] + "</h2> </a>\
    <b>Date of Production</b><br> " + result[0]['production'] + "<br><br>\
    <b>Artist</b><br>" + result[0]['artist'] + "<br><br>\
    ";


      document.getElementById('image').src = result[0]['smallpath'];
      document.getElementById('info').innerHTML = infobuilder;

    });
}

function museumData(val) {
  document.getElementById('window').style.visibility = "visible";

  $.get("../connect.php?type=2&q=" + val)
    .done(function (data) {
      var result = JSON.parse(data);
      var infobuilder = "";
      infobuilder += "\
      <a href=\"viewer.php?type=museum&no=" + val + "\"> <h2>" + result[0]['name'] + "</h2> </a>\
      <b>Established</b><br>" + result[0]['established'] + "<br><br>\
      <b>Location</b><br>" + result[0]['location'] + "<br><br>\
      ";

      document.getElementById('image').src = result[0]['path'];
      document.getElementById('info').innerHTML = infobuilder;

    });
}

function artistData(val) {
  document.getElementById('window').style.visibility = "visible";

  $.get("../connect.php?type=3&q=" + (val))
    .done(function (data) {
      var result = JSON.parse(data);
      var infobuilder = "";
      infobuilder += "\
          <a href=\"viewer.php?type=artist&no=" + val + "\"> <h2>" + result[0]['fullname'] + "</h2> </a>\
          <b>Date of Birth - Date of Death</b><br>" + result[0]['birthdate'] + " to " + result[0]['deathdate'] + "<br><br>\
          <b>Notable Works</b><br>" + result[0]['famouswork'] + "<br><br>\
          ";

      document.getElementById('image').src = result[0]['path'];
      document.getElementById('info').innerHTML = infobuilder;

    });
}


//Scripts to maintain the databases for artwork, museums, and artists

function artMaintain(val) {
  document.getElementById('window').style.visibility = "visible";

  $.get("../connect.php?type=1&q=" + val)
    .done(function (data) {
      var result = JSON.parse(data);
      var infobuilder = "";
      infobuilder += "\
          <form id=\"myForm\" action=\"update.php?type=art&q=" + val + "\" method=\"post\">\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Title:</label>\
            <input type=\"text\" name=\"title\"  class=\"form-control\" placeholder=\" " + result[0]['title'] + " \">\
        </div>\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Date of Production (Use only Year):</label>\
            <input type=\"text\"  name=\"production\" class=\"form-control\" placeholder=\" " + result[0]['production'] + " \">\
        </div>\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Medium:</label>\
            <input type=\"text\" name=\"medium\" class=\"form-control\" placeholder=\" " + result[0]['medium'] + " \">\
        </div>\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Dimensions:</label>\
            <input type=\"text\" name=\"dimensions\" class=\"form-control\" placeholder=\" " + result[0]['dimensions'] + " \">\
        </div>\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Location:</label>\
            <input type=\"text\" name=\"location\" class=\"form-control\" placeholder=\" " + result[0]['location'] + " \">\
        </div>\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Artist:</label>\
            <input type=\"text\" name=\"artist\" class=\"form-control\" placeholder=\" " + result[0]['artist'] + " \">\
        </div>\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Price (Use only numbers):</label>\
            <input type=\"text\"  name=\"price\" class=\"form-control\" placeholder=\" " + result[0]['price'] + " \">\
        </div>\
        <div class=\"form-group\">\
            <label for=\"artistName\" class=\"col-form-label\">Genre:</label>\
            <input type=\"text\" name=\"artgenre\" class=\"form-control\" placeholder=\" " + result[0]['artgenre'] + " \">\
        </div><div>\
        <button type=\"submit\" class=\"btn btn-outline-primary\">\
          <span class=\"fa fa-edit\"></span>Update</button>\
          <br>\
        <button type=\"submit\" class=\"btn btn-outline-danger\" formaction=\"delete.php?type=art&q= "+val+"\" > <span class=\"fa fa-trash-o\">Delete</span></input>\
        </form>\
        ";

        


      document.getElementById('image').src = result[0]['smallpath'];
      document.getElementById('info').innerHTML = infobuilder;

    });
}


function museumMaintain(val) {
  document.getElementById('window').style.visibility = "visible";

  $.get("../connect.php?type=2&q=" + val)
    .done(function (data) {
      var result = JSON.parse(data);
      var infobuilder = "";
      infobuilder += "\
            <form id=\"myForm\" action=\"update.php?type=museum&q=" + val + "\" method=\"post\">\
          <div class=\"form-group\">\
              <label for=\"artistName\" class=\"col-form-label\">Name:</label>\
              <input type=\"text\" name=\"name\" class=\"form-control\" placeholder=\"" + result[0]['name'] + " \">\
          </div>\
          <div class=\"form-group\">\
              <label for=\"artistName\" class=\"col-form-label\">Date Established:</label>\
              <input type=\"text\" name=\"established\" class=\"form-control\" placeholder=\"" + result[0]['established'] + " \">\
          </div>\
          <div class=\"form-group\">\
              <label for=\"artistName\" class=\"col-form-label\">Location:</label>\
              <input type=\"text\" name=\"location\" class=\"form-control\" placeholder=\" " + result[0]['location'] + " \">\
          </div>\
          <div class=\"form-group\">\
              <label for=\"artistName\" class=\"col-form-label\">Address:</label>\
              <input type=\"text\" name=\"address\" class=\"form-control\" placeholder=\" " + result[0]['address'] + " \">\
          </div>\
          <div class=\"form-group\">\
              <label for=\"artistName\" class=\"col-form-label\">Brief History:</label>\
              <input type=\"text\" name=\"history\" class=\"form-control\" placeholder=\" " + result[0]['history'] + " \">\
          </div>\
          <div class=\"form-group\">\
              <label for=\"artistName\" class=\"col-form-label\">Who was involved:</label>\
              <input type=\"text\" name=\"involved\" class=\"form-control\" placeholder=\" " + result[0]['involved'] + " \">\
          </div>\
          <div class=\"form-group\">\
              <label for=\"artistName\" class=\"col-form-label\">Famous Artwork:</label>\
              <input type=\"text\" name=\"famousartwork\" class=\"form-control\" placeholder=\"" + result[0]['famousartwork'] + " \">\
          </div>\
          <button type=\"submit\" class=\"btn btn-outline-primary\">\
          <span class=\"fa fa-edit\"></span>Update \
        </a></button><br>\
        <button type=\"submit\" class=\"btn btn-outline-danger\" formaction=\"delete.php?type=museum&q= "+val+"\" > <span class=\"fa fa-trash-o\">Delete</span></input>\
          </form>\
          ";



      document.getElementById('image').src = result[0]['path'];
      document.getElementById('info').innerHTML = infobuilder;

    });
}

function artistMaintain(val) {
  document.getElementById('window').style.visibility = "visible";

  $.get("../connect.php?type=3&q=" + val)
    .done(function (data) {
      var result = JSON.parse(data);
      var infobuilder = "";
      infobuilder += "\
              <form id=\"myForm\" action=\"update.php?type=artist&q=" + val + "\" method=\"post\">\
            <div class=\"form-group\">\
                <label for=\"artistName\" class=\"col-form-label\">Artist:</label>\
                <input type=\"text\" name=\"fullname\" class=\"form-control\" placeholder=\" " + result[0]['fullname'] + " \">\
            </div>\
            <div class=\"form-group\">\
                <label for=\"artistName\" class=\"col-form-label\">Residence:</label>\
                <input type=\"text\" name=\"residence\" class=\"form-control\" placeholder=\" " + result[0]['residence'] + " \">\
            </div>\
            <div class=\"form-group\">\
                <label for=\"artistName\" class=\"col-form-label\">Famous Work:</label>\
                <input type=\"text\" name=\"famouswork\" class=\"form-control\" placeholder=\" " + result[0]['famouswork'] + " \">\
            </div>\
            <div class=\"form-group\">\
                <label for=\"artistName\" class=\"col-form-label\">Genres:</label>\
                <input type=\"text\" name=\"genres\" class=\"form-control\" placeholder=\" " + result[0]['genres'] + " \">\
            </div>\
            <button type=\"submit\" class=\"btn btn-outline-primary\">\
          <span class=\"fa fa-edit\"></span>Update \
        </a></button><br>\
        <button type=\"submit\" class=\"btn btn-outline-danger\" formaction=\"delete.php?type=artist&q= "+val+"\" > <span class=\"fa fa-trash-o\">Delete</span></input>\
            </form>\
            ";

      document.getElementById('image').src = result[0]['path'];
      document.getElementById('info').innerHTML = infobuilder;

    });
}

function artNew() {

    document.getElementById('window').style.visibility = "visible";
    //document.write("Test");
        var infobuilder = "";

        infobuilder += "\
                <form id=\"myForm\" action=\"create.php?type=art\" method=\"post\">\
                <div class=\"form-group\">\
                  <label for=\"artName\" class=\"col-form-label\">Artwork Title:</label>\
                  <input type=\"text\" name=\"title\" class=\"form-control\" placeholder=\"Title of Artwork \" \">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artName\" class=\"col-form-label\">Data of Production:</label>\
                  <input type=\"text\" name=\"production\" class=\"form-control\" placeholder=\"Date of Production \" \">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artName\" class=\"col-form-label\">Medium:</label>\
                  <input type=\"text\" name=\"medium\" class=\"form-control\" placeholder=\"Medium\">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artName\" class=\"col-form-label\">Dimensions of Artwork:</label>\
                  <input type=\"text\" name=\"dimensions\" class=\"form-control\" placeholder=\"Dimensions of Artwork (E.g. 10cm x 15cm) \">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artName\" class=\"col-form-label\">Location:</label>\
                  <input type=\"text\" name=\"location\" class=\"form-control\" placeholder=\"Location of Artwork\">\
              </div>\
              <div class=\"form-group\">\
              <label for=\"artName\" class=\"col-form-label\">Artist:</label>\
              <input type=\"text\" name=\"artist\" class=\"form-control\" placeholder=\"Artist of Artwork\">\
                </div>\
              <div class=\"form-group\">\
              <label for=\"artName\"       class=\"col-form-label\">Price:</label>\
              <input type=\"text\" name=\"price\"       class=\"form-control\" placeholder=\"Value of Artwork in $ (E.g. 1500)\">\
                </div>\
                <div class=\"form-group\">\
                <label for=\"artName\" class=\"col-form-label\">Genre of Artwork:</label>\
                <input type=\"text\" name=\"artgenre\" class=\"form-control\" placeholder=\"Genre\">\
            </div>\
              <button type=\"submit\" class=\"btn btn-outline-success\">\
            <span class=\"fa fa-edit\"></span>Create \
          </a></button><br>\
              </form>\
              ";  
        // document.getElementById('image').src = result[0]['path'];
        document.getElementById('info').innerHTML = infobuilder;
  

  }

  function museumNew() {

    document.getElementById('window').style.visibility = "visible";
    //document.write("Test");
        var infobuilder = "";

        infobuilder += "\
                <form id=\"myForm\" action=\"create.php?type=museum\" method=\"post\">\
              <div class=\"form-group\">\
                  <label for=\"museumName\" class=\"col-form-label\">Museum:</label>\
                  <input type=\"text\" name=\"name\" class=\"form-control\" placeholder=\"Name of Museum \" \">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artistName\" class=\"col-form-label\">Established:</label>\
                  <input type=\"text\" name=\"established\" class=\"form-control\" placeholder=\"Established\">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"museumName\" class=\"col-form-label\">Location:</label>\
                  <input type=\"text\" name=\"location\" class=\"form-control\" placeholder=\"Location \">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"museumName\" class=\"col-form-label\">Address:</label>\
                  <input type=\"text\" name=\"address\" class=\"form-control\" placeholder=\"Address\">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"museumName\" class=\"col-form-label\">History:</label>\
                  <input type=\"text\" name=\"history\" class=\"form-control\" placeholder=\"Breif History\">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"museumName\" class=\"col-form-label\">Individuals/Groups Involved:</label>\
                  <input type=\"text\" name=\"involved\" class=\"form-control\" placeholder=\"People Involved\">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"museumName\" class=\"col-form-label\">Famous Artwork:</label>\
                  <input type=\"text\" name=\"famouswork\" class=\"form-control\" placeholder=\"Famous Artwork\">\
              </div>\
              <button type=\"submit\" class=\"btn btn-outline-success\">\
            <span class=\"fa fa-edit\"></span>Create \
          </a></button><br>\
              </form>\
              ";  
        // document.getElementById('image').src = result[0]['path'];
        document.getElementById('info').innerHTML = infobuilder;
  

  }

function artistNew() {

    document.getElementById('window').style.visibility = "visible";
    //document.write("Test");
        var infobuilder = "";

        infobuilder += "\
                <form id=\"myForm\" action=\"create.php?type=artist\" method=\"post\">\
              <div class=\"form-group\">\
                  <label for=\"artistName\" class=\"col-form-label\">Artist:</label>\
                  <input type=\"text\" name=\"fullname\" class=\"form-control\" placeholder=\"Full Name \" \">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artistName\" class=\"col-form-label\">Residence:</label>\
                  <input type=\"text\" name=\"residence\" class=\"form-control\" placeholder=\"Residence\">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artistName\" class=\"col-form-label\">Famous Work:</label>\
                  <input type=\"text\" name=\"famouswork\" class=\"form-control\" placeholder=\"Famous Pieces of Work \">\
              </div>\
              <div class=\"form-group\">\
                  <label for=\"artistName\" class=\"col-form-label\">Genres:</label>\
                  <input type=\"text\" name=\"genres\" class=\"form-control\" placeholder=\"Genre of Art\">\
              </div>\
              <button type=\"submit\" class=\"btn btn-outline-success\">\
            <span class=\"fa fa-edit\"></span>Create \
          </a></button><br>\
              </form>\
              ";  
        // document.getElementById('image').src = result[0]['path'];
        document.getElementById('info').innerHTML = infobuilder;
  

  }
  
  

