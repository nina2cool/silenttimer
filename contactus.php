<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
		$result = mysql_query($sql) or die("Cannot execute query");

		while($row = mysql_fetch_array($result))
		
		{
				$TollPhone = $row[CellPhone];
				$Phone = $row[HomePhone];
				$Address = $row[Address];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Email = $row[Email];
		}
		
		mysql_close($link);



?>
			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Contact 
              Us</font></strong></p>
			<table width="100%"  border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td><div align="right"><strong></strong></div></td>
                <td width="40%" bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">View
                our <a href="holiday.php">holiday shipping schedule</a>.</font></strong></div></td>
              </tr>
            </table>
			<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Feel free to 
  contact us with any questions you might have. Email is easiest, and we will 
  reply to you quickly.</font></p>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="73%"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Customer
            Service and General Questions </strong><br>
        <a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Online
            Chat (AOL Instant Messenger)<br>
        </strong><a href="aim:goim?screenname=SilentTimer&amp;message=Hello.">Silent 
      Timer</a> (click to send us an IM. We will respond if online.)</font></p>
      <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Normal 
        Business Hours<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Monday 
        through Friday<br>
        9:00 AM to 4:00 PM CST<br>
      (Check our <a href="holiday.php">holiday schedule</a> for shipping dates)</font></p>
    </td>
    <td width="27%"><div align="center">
        <p>&nbsp;</p>
      </div></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>