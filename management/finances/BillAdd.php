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

$CompanyID = $_GET['c'];

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{
$DateReceived = $_POST['DateReceived'];
$Company = $_POST['Company'];
$Amount = $_POST['Amount'];
$DueDate = $_POST['DueDate'];
$AmountPaid = $_POST['AmountPaid'];
$DatePaid = $_POST['DatePaid'];
$IsCheck = $_POST['IsCheck'];
$Online = $_POST['Online'];
$InPerson = $_POST['InPerson'];
$DateScheduled = $_POST['DateScheduled'];
$Notes = $_POST['Notes'];
$Status = $_POST['Status'];

$sql = "INSERT INTO tblBills(DateReceived, Company, Amount, DueDate, AmountPaid, DatePaid, IsCheck, Online, InPerson, DateScheduled, Notes, Status)
VALUES('$DateReceived', '$Company', '$Amount', '$DueDate', '$AmountPaid', '$DatePaid', '$IsCheck', '$Online', '$InPerson', '$DateScheduled', '$Notes', '$Status');";


$result = mysql_query($sql) or die("Cannot insert into table"); 

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a Bill</strong></font>

<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Date Received</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateReceived" type="text" id="DateReceived" value="<? echo $Now; ?>">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Company</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="Company" id="CompanyID">
    <option value="home" selected>Select Company</option>
    <?
					//get list of Company Reps!
					$sql7 = "SELECT * 
							FROM tblBillCompany
							WHERE Status = 'active'
							ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result7 = mysql_query($sql7) or die("Cannot get person names!");
					while($row7 = mysql_fetch_array($result7))
					{
					$Person = $row7[Person];
					
		
			  ?>
    <option value="<? echo $row7[CompanyID];?>" <? if($row7[CompanyID] == $CompanyID){echo "selected";}?>><? echo $row7[Name];?>
    <? if($Person <> ""){?>
    (<? echo $Person; ?>)
    <? } ?>
    </option>
    <?
			  		}
			  ?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Amount</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">$
  <input name="Amount" type="text" id="Amount" value="0" size="10">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Due Date</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DueDate" type="text" id="DueDate" value="0000-00-00"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Amount Paid</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">$</font><font size="2" face="Arial, Helvetica, sans-serif"><input name="AmountPaid" type="text" id="AmountPaid" value="0" size="10">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">DatePaid</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DatePaid" type="text" id="DatePaid" value="0000-00-00"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Paid by Check?</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="IsCheck" type="text" id="IsCheck" value="n" size="5" maxlength="1"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Paid Online?</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Online" type="text" id="Online" value="n" size="5" maxlength="1">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Paid in Person? </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="InPerson" type="text" id="InPerson" value="n" size="5" maxlength="1"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Date Scheduled</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateScheduled" type="text" id="DateScheduled" value="0000-00-00"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>

<td><font size="2" face="Arial, Helvetica, sans-serif">
  <textarea name="Notes" cols="40" rows="3" id="Notes"></textarea>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">  <select name="Status" id="Status">
    <option value="open" selected>open</option>
    <option value="paid">paid</option>
    <option value="auto">auto</option>
    <option value="cancel">cancel</option>
  </select>
</font></strong></td>
</tr>
</table>
<p>
<input name="Add" type="submit" id="Add" value="Add">
</p>
</form>
    <p>&nbsp;</p>
            <p>&nbsp;</p>
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