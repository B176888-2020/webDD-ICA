<?php
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

// Main Content
echo <<<_CONTENTS1
<div class="mycontainer" id="mycontentcon">
  <div class="row">

    <div class="col-md-9" id="mycontent">
      <div>
        <h1 class="">Future Work - Improvement</h1>
        <hr class="col-md-12">
        <p> In evaluation of the valuable statistics we obtained from our previous <strong>modelling</strong>, <strong>experiments</strong> and <strong>human practice integrations</strong>, we have thought deeper into the possibility of extending our project to an upper level and made plans for future researches and applications. </p>
        <h2>“Plans for the drug administration mode”</h2>
        <p>Both from our human practice work and further investigations into finding a more applicable method in drug delivery, we decided to alter our original drug dosing methods using enema or suppository and recommended a more promising and effective mode, hydrogel, in our drug administration. We compared the advantages and disadvantages of different kinds of drug dosing modes literatures-based, as shown in the table. </p>
        <p>As we can see, although suppository and enema can partly achieve local drug delivery, the administration time and area are too limited. Intestinal stents can meet the needs of long-term administration, but it is easily shifted and needs to be replaced regularly. In light of this, we recommended a recently emerged hydrogel-based drug delivery system, which relies on a physically and chemically crosslinked hydrogel to stably release drugs if it’s activated by particular molecules <sup>[3]</sup>. Although this method is still at experimental stage, its high biocompatibility, convenience and high efficiency make us more convinced that it will eventually be applied clinically. Therefore, we intended to test our system along with this drug dosing method in future verification examinations.</p>
        <p>&nbsp;</p>
        <img src="https://2019.igem.org/wiki/images/1/1f/T--SYSU-CHINA--FutureW.jpg" style="width:80%; position: relative; margin-left: 10%; margin-right: 10%;">
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
echo 'Currently selected Suppliers: ';
for($j = 0 ; $j < $rows ; ++$j)
{
    if($sact[$j] == 1) {
        echo $snm[$j] ;
        echo " ";
    }
}
echo  '<br><pre> <form action="p1.php" method="post">';
for($j = 0 ; $j < $rows ; ++$j)
{
    echo $snm[$j];
    echo' <input type="checkbox" name="supplier[]" value="';
    echo $snm[$j];
    echo'"/>';
    echo"\n";
}



echo <<<_CONTENTE1
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


// Submission Button
echo <<<_SUBMIT1
 <input type="submit" value="OK" />
</pre></form>
_SUBMIT1;

// Roll Up Button
include 'rollbutton.php';

// Footer
include 'footer.php';

// Tail for the HTML
echo <<<_TAIL1
<!-- ================ Bootstrap Core JavaScript ================ -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/jquery.min.js"></script>
<!-- <script src="../carousel/js/jquery.js"></script> -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/bootstrap.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/JS/holder.min.js"></script>

</body>
</html>
_TAIL1;

?>
