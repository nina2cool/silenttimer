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

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{

$Name = $_POST['Name'];
$Person = $_POST['Person'];
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
$URL = $_POST['URL'];
$AutoPay = $_POST['AutoPay'];
$Monthly = $_POST['Monthly'];
$Day = $_POST['Day'];
$Amount = $_POST['Amount'];
$Category = $_POST['Category'];
$Notes = $_POST['Notes'];
$Status = $_POST['Status'];

if($Person == "Both")
{
$Person = "";
}

$sql = "INSERT INTO tblBillCompany(Name, Person, UserName, Password, URL, AutoPay, Monthly, Day, Amount, Category, Notes, Status) 
VALUES('$Name', '$Person', '$UserName', '$Password', '$URL', '$AutoPay', '$Monthly', '$Day', '$Amount', '$Category', '$Notes', '$Status');"; 

$result = mysql_query($sql) or die("Cannot insert into table"); 

}

#Create Table for User Input
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Reports</strong></font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif">By Category (2005) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">By Company (2005) </font></td>
  </tr>
  <tr valign="top">
    <td><table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
	  
	  <?
	  
	  $sql = "SELECT Sum(tblBills.AmountPaid) as CategoryAmount, tblBillCompany.Category FROM tblBills INNER JOIN tblBillCompany
	  ON tblBills.Company = tblBillCompany.CompanyID
	  WHERE tblBills.Status <> 'open' AND tblBills.DatePaid >= '2005-01-01' AND tblBills.DatePaid <= '2006-01-01'
	  GROUP BY tblBillCompany.Category ORDER BY CategoryAmount DESC";
	 
	  $result = mysql_query($sql) or die("Cannot get category");
	  
	  while($row = mysql_fetch_array($result))
	  {
	  	$Category = $row[Category];
		$CategoryAmount = $row[CategoryAmount];
	  
	  
	  
	  ?>
	  
	  
        <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Category;?></font></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($CategoryAmount,2);?></font></div></td>
      </tr>
	  <?
	  
	  }
	  
	  ?>
    </table></td>
    <td><table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <?
	  
	  $sql2 = "SELECT Sum(tblBills.AmountPaid) as CompanyAmount, tblBillCompany.Name FROM tblBills INNER JOIN tblBillCompany
	  ON tblBills.Company = tblBillCompany.CompanyID
	  WHERE tblBills.Status <> 'open' AND tblBills.DatePaid >= '2005-01-01' AND tblBills.DatePaid <= '2006-01-01'
	  GROUP BY tblBillCompany.Name ORDER BY CompanyAmount DESC";
	 
	  $result2 = mysql_query($sql2) or die("Cannot get category");
	  
	  while($row2 = mysql_fetch_array($result2))
	  {
	  	$Company = $row2[Name];
		$CompanyAmount = $row2[CompanyAmount];
	  
	  
	  
	  ?>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Company;?></font></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($CompanyAmount,2);?></font></div></td>
      </tr>
      <?
	  
	  }
	  
	  ?>
    </table></td>
  </tr>
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif">By Person </font></td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="top">
    <td><table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <?
	  
	  $sql3 = "SELECT Sum(tblBills.AmountPaid) as PersonAmount, tblBillCompany.Person FROM tblBills INNER JOIN tblBillCompany
	  ON tblBills.Company = tblBillCompany.CompanyID
	  WHERE tblBills.Status <> 'open' AND tblBills.DatePaid >= '2005-01-01' AND tblBills.DatePaid <= '2006-01-01'
	  GROUP BY tblBillCompany.Person ORDER BY PersonAmount DESC";
	 
	  $result3 = mysql_query($sql3) or die("Cannot get category");
	  
	  while($row3 = mysql_fetch_array($result3))
	  {
	  	$Person = $row3[Person];
		$PersonAmount = $row3[PersonAmount];
	  
	  	if($Person == "")
		{
		$Person = "Both";
		}
	  
	  ?>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Person;?></font></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($PersonAmount,2);?></font></div></td>
      </tr>
      <?
	  
	  }
	  
	  ?>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<?

	$sql4 = "SELECT Sum(AmountPaid) as TotalPaid FROM tblBills
	  WHERE Status <> 'open'";
	 
	  $result4 = mysql_query($sql4) or die("Cannot get category");
	  
	  while($row4 = mysql_fetch_array($result4))
	  {
	  	$TotalPaid = $row4[TotalPaid];
	  }



	$sql5 = "SELECT Sum(AmountPaid) as Paid2005 FROM tblBills
	  WHERE Status <> 'open' AND DatePaid >= '2005-01-01' AND DatePaid <= '2006-01-01'";
	 
	  $result5 = mysql_query($sql5) or die("Cannot get category");
	  
	  while($row5 = mysql_fetch_array($result5))
	  {
	  	$Paid2005 = $row5[Paid2005];
	  }
	  
	  
	  $sql6 = "SELECT Sum(AmountPaid) as Paid2006 FROM tblBills
	  WHERE Status <> 'open' AND DatePaid >= '2006-01-01' AND DatePaid <= '2007-01-01'";
	 
	  $result6 = mysql_query($sql6) or die("Cannot get category");
	  
	  while($row6 = mysql_fetch_array($result6))
	  {
	  	$Paid2006 = $row6[Paid2006];
	  }


?>
<p><font size="2" face="Arial, Helvetica, sans-serif">Total Paid: $ <? echo number_format($TotalPaid,2); ?></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">2005 YTD: $ <? echo number_format($Paid2005,2); ?></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">2006 YTD: $ <? echo number_format($Paid2006,2); ?></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>  
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>