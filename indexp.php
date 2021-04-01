<?php
// Session Methodology
session_start();

// Judgement for the inputs of user names
if(isset($_POST['fn']) && isset($_POST['sn'])) {

 //   --------------- The Shared Part For All Pages: Navbar and HEAD information --------------- //
// The HEAD information of the website and load the css style
echo <<<_HEAD1
<html lang="en">

<!-- Metadata and css style for all pages -->
<head>
    <title>Index-IDWD-ICA</title>
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

    $_SESSION['forname'] = $_POST['fn'];
    $_SESSION['surname'] = $_POST['sn'];
    $smask =  $_SESSION['supmask'];

    echo <<<_TAIL1
    <pre>
       Mask Value $smask
    </pre>
    </body>
</html>
_TAIL1;

}
else {
    // Error Transformation
    header('location: http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/complib.php');
}
?>
