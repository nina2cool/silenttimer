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
?>

<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sales 
- October 2004</strong></font> 
<form>
  <?

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-09-30 23:59:59' AND DateTime < '2004-10-02 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a1 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-01 23:59:59' AND DateTime < '2004-10-03 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a2 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-02 23:59:59' AND DateTime < '2004-10-04 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a3 = $row[Sum];
			}
			
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-03 23:59:59' AND DateTime < '2004-10-05 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a4 = $row[Sum];
			}
	
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-04 23:59:59' AND DateTime < '2004-10-06 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a5 = $row[Sum];
			}
	
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-05 23:59:59' AND DateTime < '2004-10-07 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a6 = $row[Sum];
			}
	
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-06 23:59:59' AND DateTime < '2004-10-08 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a7 = $row[Sum];
			}
	
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-07 23:59:59' AND DateTime < '2004-10-09 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a8 = $row[Sum];
			}
	
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-08 23:59:59' AND DateTime < '2004-10-10 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a9 = $row[Sum];
			}
	
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-09 23:59:59' AND DateTime < '2004-10-11 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a10 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-10 23:59:59' AND DateTime < '2004-10-12 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a11 = $row[Sum];
			}
			
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-11 23:59:59' AND DateTime < '2004-10-13 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a12 = $row[Sum];
			}
			
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-12 23:59:59' AND DateTime < '2004-10-14 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a13 = $row[Sum];
			}
			
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-13 23:59:59' AND DateTime < '2004-10-15 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a14 = $row[Sum];
			}
			
	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-14 23:59:59' AND DateTime < '2004-10-16 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a15 = $row[Sum];
			}		

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-15 23:59:59' AND DateTime < '2004-10-17 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a16 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-16 23:59:59' AND DateTime < '2004-10-18 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a17 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-17 23:59:59' AND DateTime < '2004-10-19 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a18 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-18 23:59:59' AND DateTime < '2004-10-20 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a19 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-19 23:59:59' AND DateTime < '2004-10-21 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a20 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-20 23:59:59' AND DateTime < '2004-10-22 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a21 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-21 23:59:59' AND DateTime < '2004-10-23 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a22 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-22 23:59:59' AND DateTime < '2004-10-24 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a23 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-23 23:59:59' AND DateTime < '2004-10-25 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a24 = $row[Sum];
			}			

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-24 23:59:59' AND DateTime < '2004-10-26 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a25 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-25 23:59:59' AND DateTime < '2004-10-27 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a26 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-26 23:59:59' AND DateTime < '2004-10-28 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a27 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-27 23:59:59' AND DateTime < '2004-10-29 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a28 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-28 23:59:59' AND DateTime < '2004-10-30 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a29 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-29 23:59:59' AND DateTime < '2004-10-31 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a30 = $row[Sum];
			}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-30 23:59:59' AND DateTime < '2004-11-01 00:00:00' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
				$a31 = $row[Sum];
			}			

?>

  <br>
  <table width="644" border="1" cellpadding="5" cellspacing="0" bordercolor="#33CCFF">
    <tr> 
      <td width="92">
<div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Sunday</font></div></td>
      <td width="92">
<div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Monday</font></div></td>
      <td width="92">
<div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Tuesday</font></div></td>
      <td width="92">
<div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Wednesday</font></div></td>
      <td width="92">
<div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Thursday</font></div></td>
      <td width="92">
<div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Friday</font></div></td>
      <td width="92">
<div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Saturday</font></div></td>
    </tr>
    <tr> 
      <td width="92">&nbsp;</td>
      <td width="92">&nbsp;</td>
      <td width="92">&nbsp;</td>
      <td width="92">&nbsp;</td>
      <td width="92">&nbsp;</td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">1<br>
        <strong><font size="2" face="Arial, Helvetica, sans-serif">#: <font color="#FF0000" size="3"><? echo $a1;
 ?></font></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">2<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a2;
 ?></font></strong> </font></td>
    </tr>
    <tr> 
      <td width="92"> 
        <p><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">3</font><br>
          <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
          </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a3;
 ?></font></strong></font> </p></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">4<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a4;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">5<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a5;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">6<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a6;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">7<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a7;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">8<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a8;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">9<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a9;
 ?></font></strong> </font></td>
    </tr>
    <tr> 
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">10<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a10;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">11<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a11;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">12<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a12;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">13<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a13;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">14<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a14;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">15<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a15;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">16<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a16;
 ?></font></strong> </font></td>
    </tr>
    <tr> 
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">17<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a17;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">18<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a18;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">19<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a19;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">20<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a20;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">21<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a21;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">22<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a22;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">23<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a23;
 ?></font></strong> </font></td>
    </tr>
    <tr> 
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">24<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a24;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">25<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a25;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">26<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a26;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">27<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a27;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">28<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a28;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">29<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a29;
 ?></font></strong> </font></td>
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">30<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a30;
 ?></font></strong> </font></td>
    </tr>
    <tr> 
      <td width="92"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif">31<br>
        <strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">#: 
        </font></strong></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><? echo $a31;
 ?></font></strong> </font></td>
      <td width="92">&nbsp;</td>
      <td width="92">&nbsp;</td>
      <td width="92"><font color="#0000FF">&nbsp;</font></td>
      <td width="92"><font color="#0000FF">&nbsp;</font></td>
      <td width="92"><font color="#0000FF">&nbsp;</font></td>
      <td width="92"><font color="#0000FF">&nbsp;</font></td>
    </tr>
  </table>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
            
<p>&nbsp;</p>
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
?>
