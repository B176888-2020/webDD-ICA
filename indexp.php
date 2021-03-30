<?php
 // Session Methodology
session_start();

// Judgement for the inputs of user names
if(isset($_POST['fn']) && isset($_POST['sn'])) {
echo <<<_HEAD1
    <html>
    <head>
    </head>
    <body>
_HEAD1;

    include 'menuf.php';
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
