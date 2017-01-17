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

$BillID = $_GET['bill'];

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Update'] == "Update")
{

$DateReceived = $_POST['DateReceived'];
$Company = $_POST['Company'];
$Amount = $_POST['Amount'];
$DueDate = $_POST['DueDate'];
$AmountPaid = $_POST['AmountPaid'];
$DatePaid = $_POST['DatePaid'];
$DateScheduled = $_POST['DateScheduled'];
$Notes = $_POST['Notes'];
$Status = $_POST['Status'];
$chkCheck = $_POST['chkCheck'];
$chkOnline = $_POST['chkOnline'];
$chkPerson = $_POST['chkPerson'];


	if($chkCheck <> 'y') { $chkCheck = "n"; }
	if($chkOnline <> 'y') { $chkOnline = "n"; }
	if($chkPerson <> 'y') { $chkPerson = "n"; }


$sql = "UPDATE tblBills SET DateReceived = '$DateReceived', Company = '$Company', Amount = '$Amount', DueDate = '$DueDate', 
AmountPaid = '$AmountPaid', DatePaid = '$DatePaid', IsCheck = '$chkCheck', Online = '$chkOnline', InPerson = '$chkPerson', 
DateScheduled = '$DateScheduled', Notes = '$Notes', Status = '$Status' WHERE BillID = '$BillID'"; 

$result = mysql_query($sql) or die("Cannot update table"); 

	
	/*
	$goto = "BillView.php";
	header("location: $goto");
	*/
	?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>finances/BillView.php'>
	<?

}



#Code for Filling out the table

$sql2 = "SELECT * FROM tblBills WHERE BillID = '$BillID'";
//echo $sql2;
$result2 = mysql_query($sql2) or die("Cannot populate table");

while($row2 = mysql_fetch_array($result2))
{

$DateReceived = $row2[DateReceived];
$Company = $row2[Company];
$Amount = $row2[Amount];
$DueDate = $row2[DueDate];
$AmountPaid = $row2[AmountPaid];
$DatePaid = $row2[DatePaid];
$IsCheck = $row2[IsCheck];
$Online = $row2[Online];
$InPerson = $row2[InPerson];
$DateScheduled = $row2[DateScheduled];
$Notes = $row2[Notes];
$Status = $row2[Status];

			
			$sql3 = "SELECT * FROM tblBillCompany WHERE CompanyID = '$Company'";
			//echo $sql3;
			$result3 = mysql_query($sql3) or die("Cannot populate CompanyID");

			while($row3 = mysql_fetch_array($result3))
			{
			$CompanyName = $row3[Name];
			}
			
}





#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
Bill for <? echo $CompanyName; ?>
</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">DateReceived</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateReceived" type="text" id="DateReceived" value="<? echo $DateReceived; ?>"></font></td>
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
    <option value="<? echo $row7[CompanyID];?>" <? if($row7[CompanyID] == $Company){echo "selected";}?>><? echo $row7[Name];?>
    </option>
    <?
			  		}
			  ?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Amount</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Amount" type="text" id="Amount" value="<? echo $Amount; ?>">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">DueDate</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DueDate" type="text" id="DueDate" value="<? echo $DueDate; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">AmountPaid</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AmountPaid" type="text" id="AmountPaid" value="<? echo $AmountPaid; ?>">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">DatePaid</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DatePaid" type="text" id="DatePaid" value="<? echo $DatePaid; ?>"></font></td>
</tr>
<tr>
  <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">IsCheck
      
        <input name="chkCheck" type="checkbox" id="chkCheck" value="y" <? if($IsCheck == "y") { ?>checked<? } ?>>
  Online
      
    <input name="chkOnline" type="checkbox" id="chkOnline" value="y"<? if($Online == "y") { ?>checked<? } ?>>
  InPerson
      
    <input name="chkPerson" type="checkbox" id="chkPerson" value="y"<? if($InPerson == "y") { ?>checked<? } ?>>
  </font></div></td>
  </tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">DateScheduled</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateScheduled" type="text" id="DateScheduled" value="<? echo $DateScheduled; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Notes" type="text" id="Notes" value="<? echo $Notes; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="Status" id="Status">
  
    <option value="" <? if ($Status == ''){echo 'selected';}?>>select</option>
    <option value="open" <? if ($Status == 'open'){echo 'selected';}?>>open</option>
    <option value="paid" <? if ($Status == 'paid'){echo 'selected';}?>>paid</option>
    <option value="auto" <? if ($Status == 'auto'){echo 'selected';}?>>auto</option>
    <option value="cancel" <? if ($Status == 'cancel'){echo 'selected';}?>>cancel</option>
    </select>
</font></strong></td>
</tr>
</table>
<p>&nbsp;</p>
<p>
  <input name="Update" type="submit" id="Update" value="Update">
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