<?php

$servername = "localhost";
$username = "david";
$password = "password";

$conn = new mysqli($servername, $username, $password);

$sqldat = "CREATE DATABASE phptest;";

$conn->query($sqldat);
$conn->close();

$dbname = "phptest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqltableinsert = "CREATE TABLE fulltest (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
school VARCHAR(50),
reg_date TIMESTAMP
)";

$conn->query($sqltableinsert);

function disTable($conn) {
    $sqlselect = "SELECT id,name,email,school FROM fulltest";
    $result = $conn->query($sqlselect);

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["school"] . "</td></tr>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>David's Database Test</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional fonts for this theme -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this theme -->
    <link href="css/agency.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="lib/jquery/jquery.min.js"></script>    
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- Temporary navbar container fix until Bootstrap 4 is patched -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    .ui-autocomplete{
        transform: translate(0.85em,13.5em);
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse" id="mainNav">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">DatabaseTest</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#database">Database</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Enter Details</h2>
                    <h3 class="section-subheading text-muted">Enter a new child into the database or update a current child</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter name" id="name" required data-validation-required-message="Please enter the name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter email" id="email" required data-validation-required-message="Please enter the email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group ui-front">
                                    <input type="text" class="form-control" placeholder="Enter school" id="school" required data-validation-required-message="Please enter the school." autocomplete="off">                                                                        
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Add to Database</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="database">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <p class="text-center text-muted">You may need to refresh (F5)</p>
                    <table class="table table-striped table-hover table-bordered">
  <thead class="thead-inverse">
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Email Address</th>
      <th>School</th>
    </tr>
  </thead>

  <tbody> 
  <?php disTable($conn);?>
  </tbody>
</table> 
                </div>
            </div>
        </div>
    </section>    

    <!-- Bootstrap core JavaScript -->
    <script src="lib/tether/tether.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Cusotm JavaScript for this theme -->
    <script src="js/agency.min.js"></script>
    <script>
    $(document).ready(function() {

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "davidsch.txt", false);
    xhttp.send();
    
    var str = xhttp.responseText;
    console.log(typeof str);

    console.log(xhttp.status);
    console.log(str[0]);
    
    var school = str.split(",");
    console.log(school);
    
    $( function() {    
    $( "#school" ).autocomplete({        
      source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( school, function( item ){
              return matcher.test( item );
          }) );
      }
    });
  });

    });
    </script>
    <?php $conn->close();?>
</body>

</html>