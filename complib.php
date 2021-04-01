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
    <title>IDWD-ICA: Login</title>
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

$db_server = mysql_connect($db_hostname,$db_username,$db_password);
if(!$db_server) die("Unable to connect to database: " . mysql_error());
mysql_select_db($db_database,$db_server) or die ("Unable to select database: " . mysql_error());     
$query = "select * from Manufacturers";
     $result = mysql_query($query);
     if(!$result) die("unable to process query: " . mysql_error());
     $rows = mysql_num_rows($result);
     $mask = 0;
     mysql_close($db_server);
     for($j = 0 ; $j < $rows ; ++$j)
     {
       $mask = (2 * $mask) + 1;
     }
$_SESSION['supmask'] = $mask;

echo <<<_EOP
<script>
   function validate(form) {
   fail = ""
   if(form.fn.value =="") fail = "Must Give Forname "
   if(form.sn.value == "") fail += "Must Give Surname"
   if(fail =="") return true
       else {alert(fail); return false}
   }
</script>
<form action="indexp.php" method="post" onSubmit="return validate(this)">
  <pre>
       First Name<input type="text" name="fn"/>
       Second Name <input type="text" name="sn"/>
                   <input type="submit" value="go" />
</pre></form>
_EOP;

// --------------- The Shared Part For All Pages: Roll up button, Footer and JavaScirpt Files --------------- //
// Roll Up Button
include 'rollbutton.php';

// Footer
include 'footer.php';

// Tail for the HTML
echo <<<_TAIL1
</pre>
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
