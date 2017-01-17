<?
//security for page
session_start();
require "../../include/dbinfo.php";

$Test = $_GET['test'];

if($Test != "")
{
	$Title = "The Silent Timer - Ulimate $Test Timing Tool";
}
else
{
	$Title = "The Silent Timer - Ulimate Test Timing Tool";
}
	
require "include/top.php";
?>

          
<p align="center"><font color="#CC0000" size="5" face="Arial, Helvetica, sans-serif"><em><strong><font size="4">*<u>Unconditionally</u></font></strong></em></font><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><em><strong> 
  guaranteed <br>
  to improve your <? if($Test != ""){echo "$Test ";}?>test score!</strong></em></font></p>
<p align="center"><font color="#000099" size="6" face="Arial, Helvetica, sans-serif"><strong>The Silent Timer</strong></font></p>
<p align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Custom 
  designed to optimize your <? if($Test != ""){echo "$Test ";}?>test time management.</strong></font></p>
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Only
  $29.95. Read more below.</strong></font></div>
<p align="center"><img src="images/3-timer-pics.jpg" width="522" height="134"></p>
        
<p align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $https;?>product.php<? if($Test != ""){echo "?t=$Test";}?>">Buy 
  your <? if($Test != ""){echo "$Test ";}?>timer now!</a></strong></font></p>
        
<p align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong><a href="test-timer.php">How 
  does it work? </a></strong></font></p>

<?
require "include/bottom.php";
?>