<?php
// --------------- The Shared Part For All Pages: Navbar and HEAD information --------------- //
// Start the page and ensure the login and redirect method.
session_start();
include 'redir.php';

// The HEAD information of the website and load the css style
echo<<<_HEAD1
<html lang="en">

<!-- Metadata and css style for all pages -->
<head>
    <!-- Title -->
    <title>IDWD-ICA: Exit</title>
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

// Main Content 1
echo <<<_CONTENTS1
<div class="mycontainer" id="mycontentcon">
  <div class="row">

    <div class="col-md-9" id="mycontent">
      <div>
        <h1 id="options" class="">Exit</h1>
        <hr class="col-md-12">
      <h2>Thank you for your usage!</h2> 
_CONTENTS1;

$fn = $_SESSION['forname'];
echo <<<_MAIN1
    <pre>
    Goodbye!!! $fn;
    Or return to the login page.
    </pre>
    <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/complib.php" class="dropdown-toggle">Return</a>
_MAIN1;

$_SESSION = array();
if( session_id() != "" || isset($_COOKIE[session_name()]))
  setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();


// Main Content 2
echo <<<_CONTENTE1
    <p>&nbsp;</p>

        </div>
      <hr class="col-md-13">
    </div>
  </div>
</div>
</div>
_CONTENTE1;

// --------------- Features for Different Pages --------------- //

// --------------- The Shared Part For All Pages: Roll up button, Footer and JavaScirpt Files --------------- //
// Roll Up Button
include 'rollbutton.php';

// Footer
include 'footer.php';

// Tail for the HTML
echo <<<_TAIL1
</pre>
<!-- --------------- JQuery--------------- -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/jquery.min.js"></script>
<!-- --------------- JQuery tablesorter--------------- -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
$(function() {
  $("#myTable").tablesorter();
});
</script>

<!-- ---------------Bootstrap--------------- -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/bootstrap.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/holder.min.js"></script>

</body>
</html>
_TAIL1;

// --------------- The Shared Part For All Pages: Roll up button, Footer and JavaScirpt Files --------------- //


?>