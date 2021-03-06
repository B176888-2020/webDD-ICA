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
    <title>Compounds-IDWD-ICA</title>
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

// --------------- Features for Different Pages: Select and Filter --------------- //
// Main Content 1
echo <<<_CONTENTS1
<div class="mycontainer" id="mycontentcon">
  <div class="row">

    <div class="col-md-9" id="mycontent">
      <div>
        <h1 class="">Select Compounds</h1>
        <hr class="col-md-12">
        <h2> Filter for the targeted compounds </h2> 
_CONTENTS1;

// Get the POST session
function get_post($var)
{
    return mysql_real_escape_string($_POST[$var]);
}

// Filter options
echo <<<_FILTER
   <form action="p2.php" method="post"><div class="text-center"><pre>
       Max Atoms      <input type="text" name="natmax"/>    Min Atoms    <input type="text" name="natmin"/>
       Max Carbons    <input type="text" name="ncrmax"/>    Min Carbons  <input type="text" name="ncrmin"/>
       Max Nitrogens  <input type="text" name="nntmax"/>    Min Nitrogens<input type="text" name="nntmin"/>
       Max Oxygens    <input type="text" name="noxmax"/>    Min Oxygens  <input type="text" name="noxmin"/>
        <div class="text-center"><input class="btn btn-default hpstyle" role="button" type="submit" style="width:20%;" value="Filter and List" /></input></div>
</pre></div></form>
_FILTER;

echo <<<_CONTENTS2
    <hr class="col-md-14">
    <h2>Filtering Result</h2> 
_CONTENTS2;

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
$setpar = isset($_POST['natmax']);

if($setpar) {
$firstsl = False;
$compsel = "select catn,id,ManuID from Compounds where (";
if (($_POST['natmax'] != "") && ($_POST['natmin']!="")) {
  $compsel = $compsel."(natm > ".get_post('natmin')." and  natm < ".get_post('natmax').")";
  $firstsl = True;
}
if (($_POST['ncrmax']!="") && ($_POST['ncrmin']!="")) {
  if($firstsl) $compsel = $compsel." and ";
  $compsel = $compsel."(ncar > ".get_post('ncrmin')." and  ncar < ".get_post('ncrmax').")";
  $firstsl = True;
}
if (($_POST['nntmax']!="") && ($_POST['nntmin']!="")) {
  if($firstsl) $compsel = $compsel." and ";
  $compsel = $compsel."(nnit > ".get_post('nntmin')." and  nnit < ".get_post('nntmax').")";
  $firstsl = True;
}
if (($_POST['noxmax']!="") && ($_POST['noxmin']!="")) {
  if($firstsl) $compsel = $compsel." and ";
  $compsel = $compsel."(noxy > ".get_post('noxmin')." and  noxy < ".get_post('noxmax').")";
  $firstsl = True;
}
if($firstsl) {
$compsel = $compsel.") and ".$mansel;
echo "<pre>";
echo "The Query used for this search was";
echo "\n";
echo $compsel;
echo "\n";
echo "</pre>";
$result = mysql_query($compsel);
if(!$result) die("unable to process query: " . mysql_error());
$rows = mysql_num_rows($result);
if($rows > 100) {
  // Warning for too many outputs
  echo "<pre>\nToo many results ",$rows," Max is 100\n</pre>\n";
} else  {
  // Generate the Table
echo <<<_TABLESET
<table id="p2t" class="tablesorter" border="1" style="width: 100%;">
<tr>
<th>Cataloge ID</th>
<th>manufacturer</th>
<th>Smiles String</th>
<th>Structure</th>
</tr>
_TABLESET;

  for($j = 0 ; $j < $rows ; ++$j)
  {
    $row = mysql_fetch_row($result);
    $cid = $row[1];
    $compselsmi = "select smiles from Smiles where cid = ".$cid;
    $resultsmi = mysql_query($compselsmi);
    $smilesrow = mysql_fetch_row($resultsmi);
    $convurl = "https://cactus.nci.nih.gov/chemical/structure/".urlencode($smilesrow[0])."/image";
    $convstr = base64_encode(file_get_contents($convurl));
    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td><img src=\"data:image/gif;base64,%s\"/></td></tr>\n",$row[0],$snm[$row[2]-1],$smilesrow[0],$convstr);

  }
  echo "</table>\n";
}
} else {
  echo "<pre>\nNo Query Given\n</pre>\n";
}
}



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
  $("#p2t").tablesorter();
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
