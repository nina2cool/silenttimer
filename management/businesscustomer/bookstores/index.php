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


	$sql = "SELECT BusinessCustomerID FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType = 'Bookstore'";
	$result = mysql_query($sql) or die("Cannot get customer type count");
	
	$NumStores = mysql_num_rows($result);

	
?>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#E2F5E2">
  <tr>
    <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Bookstores</strong></font></td>
    <td><div align="right"><strong><font color="#9900CC" size="3" face="Arial, Helvetica, sans-serif">We
    are in <u><? echo $NumStores; ?></u> bookstores!</font></strong></div></td>
  </tr>
</table>
<br>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFCC">
      <?

$sql2 = "SELECT Count(Chain) as Count, Chain, CustomerType FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType = 'Bookstore' GROUP BY Chain ORDER BY Chain";
$result2 = mysql_query($sql2) or die("Cannot get customer type count");

while($row2 = mysql_fetch_array($result2))
{

$Count2 = $row2['Count'];
$Chain = $row2['Chain'];

				if($Chain == "") { $Chain = "Other"; }
				
				$ChainName = $Chain;
				
				if($Chain == "Barnes & Noble") { $ChainName = "BN"; }


?>
      <tr>
        <td width="52%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="BookstoreView.php?chain=<? echo $ChainName; ?>"><strong><? echo $Chain; ?></strong></a></font></td>
        <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Count2; ?></font></div></td>
      </tr>
      <?
  
  }
  
  ?>
    </table></td>
    <td width="50%"><hr noshade>
      <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="Search.php" target="_blank">Search
    for a bookstore</a></font></p>
    <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="BookstoreViewInactive.php">View
      Inactive Bookstores</a> </font></p>
    <hr noshade></td>
  </tr>
</table>
<div align="center"><br>
    <font size="2" face="Arial, Helvetica, sans-serif">
    Select the First Letter of the Bookstore's  Name. </font>
</div>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BookstoreView.php?abc=a">A</a> </strong><font color="#FF0000">|</font><strong> <a href="BookstoreView.php?abc=b">B</a></strong><font color="#FF0000"> |</font> <strong><a href="BookstoreView.php?abc=c">C</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=d">D</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=e">E</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=f">F</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=g">G</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=h">H</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=i">I</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=j">J</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=k">K</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=l">L</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=m">M</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=n">N</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=o">O</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=p">P</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=q">Q</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=r">R</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=s">S</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=t">T</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=u">U</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=v">V</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=w">W</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=x">X</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=y">Y</a> </strong><font color="#FF0000">|</font> <strong><a href="BookstoreView.php?abc=z">Z</a></strong></font></p>
<hr noshade>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Select the
State you want to view. </font></p>
<div align="center">
  <p><strong><font face="Arial, Helvetica, sans-serif"> <font color="#FF0000" size="2">|</font><font size="2">
    <?
	$sql3 = "SELECT State FROM tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status = 'active' GROUP BY State ORDER BY State";
	$result3 = mysql_query($sql3) or die("Cannot execute TypeID!");
	
	while($row3 = mysql_fetch_array($result3))
				{
				$State = $row3[State];
				
?>
    </font></font> </strong> <strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="BookstoreView.php?state=<? echo $State; ?>"><? echo $State; ?></a> <font color="#FF0000">|</font>
    <?
}
?>
  </font></strong></p>
</div>
<hr noshade>
<p align="center"><a href="NACSCORPimport.php"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Import NACSCORP Reports</strong></font></a></p>
<p>&nbsp;</p>
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