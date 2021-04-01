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

// --------------- Features for Different Pages: Statistics --------------- //
// Main Content 1
echo <<<_CONTENTS1
<div class="mycontainer" id="mycontentcon">
  <div class="row">

    <div class="col-md-9" id="mycontent">
      <div>
        <h1 class="">Statistics</h1>
        <hr class="col-md-12">
        <h2>“Plans for the drug administration mode”</h2> 
_CONTENTS1;

// Attributes Array
$dbfs = array("natm","ncar","nnit","noxy","nsul","ncycl","nhdon","nhacc","nrotb","mw","TPSA","XLogP");
$nms = array("n atoms","n carbons","n nitrogens","n oxygens","n sulphurs","n cycles","n H donors","n H acceptors","n rot bonds","mol wt","TPSA","XLogP");

if(isset($_POST['tgval']))
   {
     $chosen = 0;
     $tgval = $_POST['tgval'];
     for($j = 0 ; $j <sizeof($dbfs) ; ++$j) {
       if(strcmp($dbfs[$j],$tgval) == 0) $chosen = $j;
     }
     echo '<p class="pstyle" sytle="color: #FFD465;"> <strong>';
     printf(" Statistics for %s (%s)<br />\n",$dbfs[$chosen],$nms[$chosen]);
     echo '</strong></p>';
     //Your mysql and statistics calculation goes here
     $db_server = mysql_connect($db_hostname,$db_username,$db_password);
     if(!$db_server) die("Unable to connect to database: " . mysql_error());
     mysql_select_db($db_database,$db_server) or die ("Unable to select database: " . mysql_error());

     // Statistics part
     $query = sprintf("select AVG(%s), STD(%s) from Compounds",$dbfs[$chosen],$dbfs[$chosen]);
     $result = mysql_query($query);
     if(!$result) die("unable to process query: " . mysql_error());
     $row = mysql_fetch_row($result);
     echo '<p class="pstyle" sytle="color: #FFD465;">';
     printf(" Average %f  Standard Dev %f <br />\n",$row[0],$row[1]);
     echo '</p>';

     // Figure part
     $query = "select * from Manufacturers";
     $result = mysql_query($query);
     if(!$result) die("unable to process query: " . mysql_error());
     $rows = mysql_num_rows($result);
     $smask = $_SESSION['supmask'];
     $firstmn = False;
     $mansel = "(";
     for($j = 0 ; $j < $rows ; ++$j) {
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
     $comtodo = "./python/histog.py ".$dbfs[$chosen]." \"".$nms[$chosen]."\" \"".$mansel."\"";
     $output = base64_encode(shell_exec($comtodo));

     echo <<<_imgput
     <pre>
     <img src="data:image/png;base64,$output" />                                              
     </pre>
_imgput;
   }

echo '<pre style="width: 25%;"><form action="p3.php" method="post">';
for($j = 0 ; $j <sizeof($dbfs) ; ++$j) {
  if($j == 0) {
     printf(' %15s <input type="radio" name="tgval" value="%s" checked"/>',$nms[$j],$dbfs[$j]);
  } else {
     printf(' %15s <input type="radio" name="tgval" value="%s"/>',$nms[$j],$dbfs[$j]);
  }
  echo "\n";
}

echo '<div class="text-center"><input class="btn btn-default hpstyle" role="button" type="submit" value="Select and Plot" /></input></div>';
echo '</form></pre>';


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

// --------------- Features for Different Pages: Statistics --------------- //

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
