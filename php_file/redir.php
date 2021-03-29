<?php
if(!(isset($_SESSION['forname']) &&
     isset($_SESSION['surname'])))
  {
  header('location: http://mscidwd.bch.ed.ac.uk/your_id/complib.php');
  }
?>
