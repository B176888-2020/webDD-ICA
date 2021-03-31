<?php
echo <<<_MENU1
   <br> Your options are </br>
    <!-- 
    <table width ="70%" border="0" cellspacing="0" align="center"> <tr>
   <td bgcolor="#DCEFFE"><div align="center">
    <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p1.php"> Select Suppliers </a>
    </div></td>
   <td bgcolor="#DCEFFE"><div align="center">
    <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p2.php"> Search Compounds </a>
    </div></td>
   <td bgcolor="#DCEFFE"><div align="center">
   <td bgcolor="#DCEFFE"><div align="center">
    <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p3.php"> Stats </a>
    </div></td>
   <td bgcolor="#DCEFFE"><div align="center">
   <td bgcolor="#DCEFFE"><div align="center">
    <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php"> Correlations </a>
    </div></td>
   <td bgcolor="#DCEFFE"><div align="center">
    <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php"> Exit </a>
    </div></td>
    </tr></table>
-->

<!-- Nav bar -->
<div class="navbar-wrapper">
  <div class="container">
    <!-- Nav bar head and mehod-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container" style="padding-left: 0 !important;">
        <div class="navbar-header" style="width:300px; height: 50px; padding-left: 15px;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p1.php" 
          style="padding: 5%; color: #FFD465; text-align: center; font-size: 30px; font-family: sans-serif;">
            IDWD-ICA 
          </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right .navbar-fixed-top">
            <!-- Nav Bar objects -->
            <!-- Select the suppliers -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p1.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Suppliers
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php">P4</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php">P5</a></li>
              </ul>
            </li>
            
            <!-- Search compounds -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p2.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Compounds
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php">P4</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php">P5</a></li>
              </ul>
            </li>
            
            <!-- Show statistics -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p3.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Statistics
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php">P4</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php">P5</a></li>
              </ul>
            </li>
            
            <!-- Correlations methods -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Correlations
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php">P4</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php">P5</a></li>
              </ul>
            </li>
            
            <!-- Documentation and help pages -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/help.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Documents
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php">P4</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php">P5</a></li>
              </ul>
            </li>
            
            <!-- Exit the web application -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Exit
              </a>
            </li>


          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>
_MENU1;

?>
