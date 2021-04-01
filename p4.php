<?php
// --------------- The Shared Part For All Pages: Navbar and HEAD information --------------- //
// Start the page and ensure the login and redirect method.
session_start();
require_once 'login.php';
include 'redir.php';

// The HEAD information of the website and load the css style
echo<<<_HEAD1
<html lang="en">

<!-- Metadata and css style for all pages -->
<head>
    <!-- Title -->
    <title>Two Variable Correlations-IDWD-ICA</title>
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

// --------------- Features for Different Pages: Correlation --------------- //
// Main Content 1
echo <<<_CONTENTS1
<div class="mycontainer" id="mycontentcon">
  <div class="row">

    <div class="col-md-9" id="mycontent">
      <div>
        <h1 class="">Statistics and Correlation</h1>
        <hr class="col-md-12">
        <h2>Two Variable Statistics</h2> 
_CONTENTS1;

// Attributes Array
$dbfs = array("natm","ncar","nnit","noxy","nsul","ncycl","nhdon","nhacc","nrotb","mw","TPSA","XLogP");
$nms = array("n atoms","n carbons","n nitrogens","n oxygens","n sulphurs","n cycles","n H donors","n H acceptors","n rot bonds","mol wt","TPSA","XLogP");

// The Correlation Part
if(isset($_POST['tgval']) && isset($_POST['tgvalb']))
{
    $chosen = 0;
    $tgval = $_POST['tgval'];
    $tgvalb = $_POST['tgvalb'];
    for($j = 0 ; $j <sizeof($dbfs) ; ++$j) {
        if(strcmp($dbfs[$j],$tgval) == 0) $chosen = $j;
    }
    for($j = 0 ; $j <sizeof($dbfs) ; ++$j) {
        if(strcmp($dbfs[$j],$tgvalb) == 0) $chosenb = $j;
    }
    $db_server = mysql_connect($db_hostname,$db_username,$db_password);
    if(!$db_server) die("Unable to connect to database: " . mysql_error());
    mysql_select_db($db_database,$db_server) or die ("Unable to select database: " . mysql_error());
    $query = "select * from Manufacturers";
    $result = mysql_query($query);
    if(!$result) die("unable to process query: " . mysql_error());
    $rows = mysql_num_rows($result);
    $smask = $_SESSION['supmask'];
    $firstmn = False;
    $mansel = "(";
    for($j = 0 ; $j < $rows ; ++$j)
    {
        $row = mysql_fetch_row($result);
        $sid[$j] = $row[0];
        $snm[$j] = $row[1];
        $sact[$j] = 0;
        $tvl = 1 << ($sid[$j] - 1);
        if($tvl == ($tvl & $smask)) {
            $sact[$j] = 1;
            if($firstmn) $mansel = $mansel." or ";
            $firstmn = True;
            $mansel = $mansel." (ManuID = ".$sid[$j].")";
        }
    }
    $mansel = $mansel.")";
    $comtodo = "./python/correlate3.py ".$dbfs[$chosen]." ".$dbfs[$chosenb]." \"".$mansel."\"";
    echo '<p class="pstyle" sytle="color: #FFD465;"> <strong>';
    printf(" Correlation for %s (%s) vs %s (%s) <br />\n", $dbfs[$chosen],$nms[$chosen],$dbfs[$chosenb],$nms[$chosenb]);
    echo '</strong>';
    $rescor = system($comtodo);
    printf("\n");
    echo '</p>';

}

// Call the script and buttons
echo '<form action="p4.php" method="post"><pre style="width: 40%; font-family: monospace;">';
for($j = 0 ; $j <sizeof($dbfs) ; ++$j) {
    if($j == 0) {
        printf(' %15s <input type="radio" name="tgval" value="%s" checked"/> %15s <input type="radio" name="tgvalb" value="%s" checked"/>',$nms[$j],$dbfs[$j],$nms[$j],$dbfs[$j]);
    } else {
        printf(' %15s <input type="radio" name="tgval" value="%s"/>  %15s <input type="radio" name="tgvalb" value="%s"/>',$nms[$j],$dbfs[$j],$nms[$j],$dbfs[$j]);
    }
    echo "\n";
}
echo '<div class="text-center"><input class="btn btn-default hpstyle" role="button" type="submit" value="Select 2 options and Submit" /></input></div>';
echo '</pre></form>';

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

// --------------- Features for Different Pages: Correlation --------------- //

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
