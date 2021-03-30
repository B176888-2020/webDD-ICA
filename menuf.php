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

<!-- NAVBAR -->
<div class="navbar-wrapper">
  <div class="container">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container" style="padding-left: 0 !important;">
        <div class="navbar-header" style="width:300px; height: 50px; padding-left: 15px;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://2019.igem.org/Team:SYSU-CHINA">
            <img src="http://2019.igem.org/wiki/images/1/1f/T--SYSU-CHINA--title0.jpg" alt="logo"
                 style="left:30px; width: 300px; height: 50px; box-shadow: none;">
          </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right .navbar-fixed-top">
            <!-- TEAM -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Documentation
                <span class="caret" style="color: #FFD465;"></span>
              </a>
              <ul class="dropdown-menu" style="min-width:100%;">
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p4.php">P4</a></li>
                <li><a href="http://mscidwd.bch.ed.ac.uk/s2059232/webDD-ICA/p5.php">P5</a></li>
              </ul>
            </li>


          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>
_MENU1;

echo <<<_RollUpButton
<div class="scroll-top-wrapper ">
	<span class="scroll-top-inner">
		<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
	</span>
</div>
_RollUpButton;

?>
