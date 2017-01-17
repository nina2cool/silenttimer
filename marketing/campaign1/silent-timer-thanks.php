<?
//security for page
session_start();
require "../../include/dbinfo.php";

$Title = "The Silent Timer - Come back soon!";
require "include/top.php";
?>
	
	 <div align="center"> 
        <div align="center"> 
          <p align="left"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><em><strong>*<u>Unconditionally</u> 
            guaranteed <br>
            to improve your test score!</strong></em></font></p>
          <div align="center"> 
            <p>&nbsp;</p>
            <p><font size="6" face="Arial, Helvetica, sans-serif"><strong>Thank 
              you for visiting</strong></font></p>
            <p><font size="6" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com">SilentTimer.com</a>!</font></p>
            <p>&nbsp;</p>
            <p><font size="5" face="Arial, Helvetica, sans-serif"><em>Good luck 
              on your test!</em></font><font size="1" face="Arial, Helvetica, sans-serif"><br>
              </font></p>
            </div>
        </div>
      </div>
      <div align="center"> 
        <div align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $https;?>product.php">Go 
          for it, buy your timer now!</a></strong></font></div>
        <p align="center">&nbsp;</p>
      </div>
<?
require "include/bottom.php";
?>