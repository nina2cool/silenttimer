<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Test
      Prep Companies </strong></font></p>
<hr noshade>
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><br>
  Select the First Letter of the Test Prep Company's Name.</font></div>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="TestPrepView.php?abc=a">A</a> </strong><font color="#FF0000">|</font><strong> <a href="TestPrepView.php?abc=b">B</a></strong><font color="#FF0000"> |</font> <strong><a href="TestPrepView.php?abc=c">C</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=d">D</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=e">E</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=f">F</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=g">G</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=h">H</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=i">I</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=j">J</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=k">K</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=l">L</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=m">M</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=n">N</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=o">O</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=p">P</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=q">Q</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=r">R</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=s">S</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=t">T</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=u">U</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=v">V</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=w">W</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=x">X</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=y">Y</a> </strong><font color="#FF0000">|</font> <strong><a href="TestPrepView.php?abc=z">Z</a></strong></font></p>
<hr noshade>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Select the
Chain you want to view. </font></p>
<div align="center">
  <p><strong><font face="Arial, Helvetica, sans-serif"> <font color="#FF0000" size="2">|</font><font size="2">
    <?
	
	$sql2 = "SELECT * FROM tblBusinessCustomer WHERE CustomerType = 'Test Prep' AND Status = 'active' GROUP BY Chain ORDER BY Chain";
	$result2 = mysql_query($sql2) or die("Cannot execute TypeID!");
	
	while($row2 = mysql_fetch_array($result2))
				{
				$Chain = $row2[Chain];
				
				if($Chain == "") { $Chain = "Other"; }
				
				$ChainName = $Chain;
				
				if($Chain == "LSAT/GRE Workshops") { $ChainName = "Workshops"; }
				if($Chain == "Princeton Review") { $ChainName = "TPR"; }
				
?>
    </font></font> </strong> <strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestPrepViewChain.php?chain=<? echo $ChainName; ?>"><? echo $Chain; ?></a> <font color="#FF0000">|</font>
    <?
}
?>
  </font></strong></p>
</div>
<hr noshade>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestPrepViewInactive.php">View Inactive Test Prep Companies</a> </font></p>
<hr noshade>
<p align="left">&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);


// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../../include/footerlinks.php";


// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>