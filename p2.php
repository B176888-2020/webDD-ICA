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
        <h1 class="">Future Work - Improvement</h1>
        <hr class="col-md-12">
        <h2>“Plans for the drug administration mode”</h2> 
_CONTENTS1;


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
echo <<<_MAIN1
    <pre>
This is the catalogue retrieval Page
    </pre>
_MAIN1;
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
  echo "<pre>\nToo many results ",$rows," Max is 100\n</pre>\n";
} else  {
echo <<<_TABLESET
<table border="1">
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
    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td><img  src=\"data:image/gif;base64,%s\"></img></td></tr>\n",$row[0],$snm[$row[2]-1],$smilesrow[0],$convstr);

  }
  echo "</table>\n";
}
} else {
  echo "<pre>\nNo Query Given\n</pre>\n";
}
}

// Filter options
echo <<<_FILTER
   <form action="p2smilesex.php" method="post"><pre>
       Max Atoms      <input type="text" name="natmax"/>    Min Atoms    <input type="text" name="natmin"/>
       Max Carbons    <input type="text" name="ncrmax"/>    Min Carbons  <input type="text" name="ncrmin"/>
       Max Nitrogens  <input type="text" name="nntmax"/>    Min Nitrogens<input type="text" name="nntmin"/>
       Max Oxygens    <input type="text" name="noxmax"/>    Min Oxygens  <input type="text" name="noxmin"/>
                   <input type="submit" value="list" />
</pre></form>
_FILTER;

// Main Content 2
echo <<<_CONTENTE1
    <p>&nbsp;</p>
      <h3>References</h3>
        <p>[1] Sepantafar, Mohammadmajid, et al. “Engineered Hydrogels in Cancer Therapy and Diagnosis.” Trends in Biotechnology 35.11(2017).</p>
        <p>[2] Park, Semi , et al. "Benefits of Recurrent Colonic Stent Insertion in a Patient with Advanced Gastric Cancer with Carcinomatosis Causing Colonic Obstruction." Yonsei Medical Journal 50.2(2009).</p>
        <p>[3] English, Max A., et al. "Programmable CRISPR-responsive smart materials." Science 365.6455 (2019): 780-785.</p>
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
