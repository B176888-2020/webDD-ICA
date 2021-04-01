<?php
echo <<<_MENU1
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
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p1.php#options">Selection</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p1.php#p1table">Summary Table</a></li>
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
                Stat & Corr
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p3.php">One Variable</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php">Two Variables</a></li>
              </ul>
            </li>
            
            <!-- Documentation and help pages -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/help.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Documents
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/help.php#overview">Overview</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/help.php#userman">User manual</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/help.php#ref">References</a></li>
              </ul>
            </li>
            
            <!-- Exit the web application -->
            <li class="dropdown">
              <a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php" class="dropdown-toggle">
                Sign out
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
