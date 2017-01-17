<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
Customers</strong></font></p>
<hr noshade>
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><br>
    Select the First Letter of the Customer's
  Last Name. 
</font></div>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CustomerView.php?abc=a">A</a> </strong><font color="#FF0000">|</font><strong> <a href="CustomerView.php?abc=b">B</a></strong><font color="#FF0000"> |</font> <strong><a href="CustomerView.php?abc=c">C</a>          </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d">D</a>                    </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=e">E</a>                    </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=f">F</a>              </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=g">G</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=h">H</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=i">I</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=j">J</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=k">K</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=l">L</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=m">M</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=n">N</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=o">O</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=p">P</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=q">Q</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=r">R</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=s">S</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=t">T</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=u">U</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=v">V</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=w">W</a>            </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=x">X</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=y">Y</a>           </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d"></a></strong><strong><a href="CustomerView.php?abc=z">Z</a></strong></font></p>
<hr noshade>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Select the Type of Customers you want
      to view. </font></p>

<div align="center"><strong><font face="Arial, Helvetica, sans-serif">
  <font color="#FF0000" size="2">|</font><font size="2">
  <?
	$sql2 = "SELECT * FROM tblCustomerType";
	$result2 = mysql_query($sql2) or die("Cannot execute TypeID!");
	
	while($row2 = mysql_fetch_array($result2))
				{
				$Type = $row2['Type'];
				$TypeID = $row2['TypeID'];
?>
    
  </font></font>
  </strong>
  <strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerViewType.php?type=<? echo $TypeID; ?>"><? echo $Type; ?></a> <font color="#FF0000">|</font>  <?
}
?>
  <br>
    </font></strong></div>
<br>
<hr noshade>
<p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="Search.php" target="_blank">Detailed
Search Criteria</a></font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (opens new window)</font></p>
<form>
  <p align="center">&nbsp;</p>
  <p align="left">&nbsp;</p>
            
  <p align="center">
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
