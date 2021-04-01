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
    <title>IDWD-ICA: Suppliers</title>
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

// --------------- Features for Different Pages: Select Suppliers --------------- //
// Main Content 1
echo <<<_CONTENTS1
<div class="mycontainer" id="mycontentcon">
  <div class="row">

    <div class="col-md-9" id="mycontent">
      <div>
        <h1 id="options" class="">Select Suppliers</h1>
        <hr class="col-md-12">
        <h2>Supplier Options</h2> 
_CONTENTS1;


// Server and database variables
$db_server = mysql_connect($db_hostname,$db_username,$db_password);
if(!$db_server) die("Unable to connect to database: " . mysql_error());
mysql_select_db($db_database,$db_server) or die ("Unable to select database: " . mysql_error());
$query = "select * from Manufacturers";
$result = mysql_query($query);
// Error Trap
if(!$result) die("unable to process query: " . mysql_error());
// Extract vars
$rows = mysql_num_rows($result);
$smask = $_SESSION['supmask'];
//
for($j = 0 ; $j < $rows ; ++$j) {
    $row = mysql_fetch_row($result);
    $sid[$j] = $row[0];
    $snm[$j] = $row[1];
    $sact[$j] = 0;
    $tvl = 1 << ($sid[$j] - 1);
    if($tvl == ($tvl & $smask)) {
        $sact[$j] = 1;
    }
}
if(isset($_POST['supplier']))
{
    $supplier = $_POST['supplier'];
    $nele = sizeof($supplier);
    for($k = 0; $k <$rows; ++$k) {
        $sact[$k] = 0;
        for($j = 0 ; $j < $nele ; ++$j) {
            if(strcmp($supplier[$j],$snm[$k]) == 0) $sact[$k] = 1;
        }
    }
    $smask = 0;
    for($j = 0 ; $j < $rows ; ++$j)
    {
        if($sact[$j] == 1) {
            $smask = $smask + (1 << ($sid[$j] - 1));
        }
    }
    $_SESSION['supmask'] = $smask;
}

echo '<p class="pstyle" sytle="color: #FFD465;"> <strong> Currently selected Suppliers: </strong>';
for($j = 0 ; $j < $rows ; ++$j)
{
    if($sact[$j] == 1) {
        echo $snm[$j] ;
        echo " ";
    }
}
echo '</p>';

echo  '<pre style="width: 25%;"><form action="p1.php" method="post">';
for($j = 0 ; $j < $rows ; ++$j)
{
    echo $snm[$j];
    echo' <input type="checkbox" name="supplier[]" value="';
    echo $snm[$j];
    echo'"/>';
    echo"\n";
}
// Submission Button
echo <<<_SUBMIT1
 <div class="text-center"><input class="btn btn-default hpstyle" role="button" type="submit" value="Select and Submit" /></input></div>
</pre></form>
_SUBMIT1;

// Show the table of the selected supplier
$dbfs = array("catn","natm","ncar","nnit","noxy","nsul","ncycl","nhdon","nhacc","nrotb","mw","TPSA","XLogP");
$nms = array("catid","n atoms","n carbons","n nitrogens","n oxygens","n sulphurs","n cycles","n H donors","n H acceptors","n rot bonds","mol wt","TPSA","XLogP");
$rowid = array(11,1,2,3,4,5,6,7,8,9,12,13,14);

if(!$result) die("unable to process query: " . mysql_error());
$manrows = mysql_num_rows($result);
$manarray = array();
$manid = array();

// Content 2
echo <<<_CONTENTS2
    <hr id="p1table" class="col-md-14">
    <h2>Manufacturer Summary Table</h2> 
_CONTENTS2;

for($j = 0 ; $j < $rows ; ++$j)
{
    if($sact[$j] == 1) {
        $chosen = $j + 1;
    }
}
echo '<p class="pstyle" sytle="color: #FFD465;"> <strong> Currently selected Suppliers: </strong>';
echo $snm[$chosen-1];
echo '(Since it takes time to show the multiple large data sets, only the last choice will be displayed)</p>';

// Generate the table for the last choice
for($j = 0 ; $j < $manrows ; ++$j)
{
    $row = mysql_fetch_row($result);
    $manarray[$j] = $row[1];
    $manid[$j] = $j + 1;
}
$query = "select * from Compounds where ManuID = ".$chosen;
$result = mysql_query($query);
if(!$result) die("unable to process query: " . mysql_error());
$resrows = mysql_num_rows($result);

echo "<table id=\"myTable\" class=\"tablesorter\" width =\"100%\" border=\"2\" cellspacing=\"1\" align=\"center\"><thead><tr>";
for($k = 0 ; $k < sizeof($dbfs) ; ++$k) {
    echo "<th>".$nms[$k]."</th>";
}
echo "</tr>\n</thead>\n<tbody>\n";
for($j = 0 ; $j < $resrows ; ++$j)
{
    $row = mysql_fetch_row($result);
    echo "<tr>";
    for($k = 0 ; $k < sizeof($dbfs) ; ++$k) {
        echo "<td>".$row[$rowid[$k]]."</td>";
    }
    echo "</tr>\n";
}
echo "</tbody>\n</table>\n";



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
