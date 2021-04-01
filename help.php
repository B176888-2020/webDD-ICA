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
        <p>IDWD-ICA (Introduction to )</p>
        <p>&nbsp;</p>
        
        <hr id="userman" class="col-md-14">
        <h2>User Manual</h2>
            <h3>Search Suppliers</h3>
            <p>In the first page </p>
            <p>&nbsp;</p>
      
      <hr id="ref" class="col-md-14">
      <h2>References</h2>
        <p>[1] Sepantafar, Mohammadmajid, et al. “Engineered Hydrogels in Cancer Therapy and Diagnosis.” Trends in Biotechnology 35.11(2017).</p>
        <p>[2] Park, Semi , et al. "Benefits of Recurrent Colonic Stent Insertion in a Patient with Advanced Gastric Cancer with Carcinomatosis Causing Colonic Obstruction." Yonsei Medical Journal 50.2(2009).</p>
        <p>[3] English, Max A., et al. "Programmable CRISPR-responsive smart materials." Science 365.6455 (2019): 780-785.</p>
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
