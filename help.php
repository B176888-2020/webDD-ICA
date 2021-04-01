<?php
// --------------- The Shared Part For All Pages: Navbar and HEAD information --------------- //
// Start the page and ensure the login and redirect method.
session_start();
require_once 'login.php';
include 'redir.php';

// The HEAD information of the website and load the css style
echo <<<_HEAD1
<html lang="en">

<!-- Metadata and css style for all pages -->
<head>
    <title>Help-IDWD-ICA</title>
    <!-- Define the Encoding system -->
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
    <link href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/CSS/bootstrap.css" rel="stylesheet">
    <!-- Customise CSS -->
    <link href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/CSS/carousel.css" rel="stylesheet">
</head>
<body>
_HEAD1;

// Nav Bar
include 'menuf.php';

// --------------- The Shared Part For All Pages: Navbar and HEAD information  --------------- //

// --------------- Features for Different Pages: Help Page --------------- //
// Main Content
echo <<<_CONTENTS1
<div class="mycontainer" id="mycontentcon">
  <div class="row">

    <div class="col-md-9" id="mycontent">
      <div>
        <h1 id="overview" class="">Document</h1>
        <hr class="col-md-12">
        <h2>Overview</h2> 
        <p>IDWD-ICA (Introduction to web site and database design for drug discovery) is a web application to filter and select the molecular compounds with the requests of chosen suppliers or compound attributes. With the selected data set stored in MySQL database, IDWD-ICA also provides primary statistics analysis and visualisation about the compound attributes and correlationship. IDWD-ICA is developed based on the LAMP techniques stack and techniques from Bootstrap and JQuery also help to make the website more user-friendly. Wish this prototype application can help you in your further research and web development.  </p>
        <p>&nbsp;</p>
        
        <hr id="userman" class="col-md-14">
        <h2>User Manual</h2>
            <h3>Login in and Exit</h3>
            <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/complib.php" class="dropdown-toggle">Login Entry</a>
            <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php" class="dropdown-toggle">Exit Entry</a>
            <p> </p>
            
            <h3>Search Suppliers</h3>
            <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p1.php" class="dropdown-toggle">Start-Searching Suppliers</a>
            <p>In the first page </p>
            
            <h3>Filter Compounds</h3>
            <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p2.php" class="dropdown-toggle">Start-Filtering Compounds</a>
            <p>In the first page </p>
            
            <h3>Statistics and Visualisation</h3>
            <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p3.php" class="dropdown-toggle">Start-Statistics and Visualisation of one variable</a>
            <p>In the first page </p>
            
            <h3>Correlation between two attributes</h3>
            <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php" class="dropdown-toggle">Start-Calculate the correlation between two attributes</a>
            <p>In the first page </p>
            
            <p>&nbsp;</p>
      
      <hr id="ref" class="col-md-14">
      <h2>References</h2>
        <p>1. M.O., Jacob Thornton, and Bootstrap. Bootstrap. URL: https://getbootstrap.com/docs/5.0/getting-started/introduction</p>
        <p>2. Course Materials in MSc Course "Introduction to web site and database design for drug discovery"</p>
        <p>3. js.foundation, J. F.-. jQuery. URL: https://jquery.com/</p>
        <p>4. Daylight Theory: SMILES. URL: https://www.daylight.com/dayhtml/doc/theory/theory.smiles.html.</p>
        <p>5. NCI/CADD Group Chemoinformatics Tools and User Services. URL: https://cactus.nci.nih.gov/</p>
      </div>

      <hr class="col-md-13">
    </div>
  </div>
</div>
</div>
_CONTENTS1;
// --------------- Features for Different Pages: Help Page --------------- //

// --------------- The Shared Part For All Pages: Roll up button, Footer and JavaScirpt Files --------------- //
// Roll Up Button
include 'rollbutton.php';

// Footer
include 'footer.php';

// Tail for the HTML
echo <<<_TAIL1
<!-- --------------- Bootstrap Core JavaScript --------------- -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/jquery.min.js"></script>
<!-- <script src="../carousel/js/jquery.js"></script> -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/bootstrap.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/holder.min.js"></script>

</body>
</html>
_TAIL1;

// --------------- The Shared Part For All Pages: Roll up button, Footer and JavaScirpt Files --------------- //
?>
