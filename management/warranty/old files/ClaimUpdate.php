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
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
 
	//declare an integer as a counter
	$x = 0;
	
	//connection to db
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * FROM tblCustomerClaims2 WHERE Reason2 = ''";
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
		while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row[PurchaseID];
				$x += 1;
				}			
		 
?>
	<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Update Claims </strong></font> </p>
	
	<p>
	<strong>
	<font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">
	<? echo(" **$x** New Claims.") ?>
	</font>
	</strong>
	</p>
   
<?
	
	If ($_POST['Update'] == "Update")
	{
		$Reason2New = $_POST['Reason2New'];
		$ClaimID = $_POST['ClaimID'];
			
			$sql = "UPDATE tblCustomerClaims2
			SET Reason2 = '$Reason2New'
			WHERE tblCustomerClaims2.ClaimID = '$ClaimID'";
			
			//put SQL statement into result set for loop through records
			$result = mysql_query($sql) or die("Cannot execute query!");

			
	}
	
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql2 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblPurchase2.PurchaseID, tblPurchase2.CustomerID,
	tblCustomerClaims2.ClaimType, tblCustomerClaims2.Reason, tblCustomerClaims2.RequestDate, tblCustomerClaims2.PurchaseID, tblCustomerClaims2.ClaimID,
	tblCustomerClaims2.DateToReturn, tblCustomerClaims2.SignedForm, tblCustomerClaims2.SignForm, tblCustomerClaims2.Reason2
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblCustomerClaims2
	ON tblPurchase2.PurchaseID = tblCustomerClaims2.PurchaseID
	WHERE tblCustomerClaims2.Reason2 = ''";
	
	//echo $sql2;
		
	//sort results.....
	if ($sortBy != "")
	{
		$sql2 .= " ORDER BY $sortBy $sortDirection";
	}
	else
	{
		$sql2 .= " ORDER BY tblCustomerClaims2.RequestDate DESC";
		$sortBy ="tblCustomerClaims2.RequestDate";
		$sortDirection = "DESC";
	}
	
	//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");

?>
		
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			  ?>
  <tr bgcolor="#FFFFCC"> 
    <td class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php?sort=tblProblems.PurchaseID&d=<? if ($sortBy=="tblProblems.PurchaseID") {echo $sd;} else {echo "ASC";}?>
				">Claim ID</a></font></strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">Customer 
        Name </a></font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblProblems.ProblemDetails&d=<? if ($sortBy=="tblProblems.ProblemDetails") {echo $sd;} else {echo "ASC";} ?>">Reason</a></strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Reason2</strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Reason
            2 </strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblProblems.SubmitType&d=<? if ($sortBy=="tblProblems.SubmitType") {echo $sd;} else {echo "ASC";} ?>">Claim 
        Type </a></strong></font></div></td>
    <td class=sort><div align="center"><strong></strong></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result2))
				{
				$PurchaseID = $row[PurchaseID];
				$CustomerID = $row[CustomerID];
				$LastName = $row[LastName];
				$FirstName = $row[FirstName];
				$Reason = $row[Reason];
				$DateToReturn = $row[DateToReturn];
				$ClaimType = $row[ClaimType];
				$RequestDate = $row[RequestDate];
				$ClaimID = $row[ClaimID];
				$SignedForm = $row[SignedForm];
				$SignForm = $row[SignForm];
				$Reason2 = $row[Reason2];

				
				$Now = date("Y-m-d");
				
				if($ClaimType == "Replacement" AND $DateToReturn < $Now AND $DateToReturn <> "0000-00-00")
				{
				$PastDue = "yes";
				}
				else
				{
				$PastDue = "-";
				}
				
				if($ClaimType == "Replacement" AND $SignForm == "y" AND $SignedForm == "n")
				{
				$Form = "yes";
				}
				else
				{
				$Form = "-";
				}
				
			  ?>
 <form name="form1" method="post" action=""> <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ClaimEdit.php?claim=<? echo $ClaimID; ?>"><strong><? echo $ClaimID; ?></strong></a></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $FirstName; ?> 
        <? echo $LastName; ?></a></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason2; ?></font></div></td>
    <td><div align="left">
      <select name="Reason2New" id="Reason2New">
        <option value="" <? if($Reason2 == "") {?>selected<? } ?>></option>
		<option value="Bad top button" <? if($Reason2 == "Bad top button") { ?>selected<? } ?>>Bad top button</option>
		<option value="Bought in store instead" <? if($Reason2 == "Bought in store instead") { ?>selected<? } ?>>Bought in store instead</option>
		<option value="Can’t use on test" <? if($Reason2 == "Can’t use on test") { ?>selected<? } ?>>Can’t use on test</option>
		<option value="Didn’t like/want product" <? if($Reason2 == "Didn’t like/want product") { ?>selected<? } ?>>Didn’t like/want product</option>
		<option value="Duplicate order" <? if($Reason2 == "Duplicate order") { ?>selected<? } ?>>Duplicate order</option>
		<option value="Keypad not working" <? if($Reason2 == "Keypad not working") { ?>selected<? } ?>>Keypad not working</option>
		<option value="Missing LCD segments" <? if($Reason2 == "Missing LCD segments") { ?>selected<? } ?>>Missing LCD segments</option>
		<option value="New battery" <? if($Reason2 == "New battery") { ?>selected<? } ?>>New battery</option>
		<option value="Other manufacturing defect" <? if($Reason2 == "Other manufacturing defect") { ?>selected<? } ?>>Other manufacturing defect</option>
		<option value="Power problem" <? if($Reason2 == "Power problem") { ?>selected<? } ?>>Power problem</option>
		<option value="Random shut off" <? if($Reason2 == "Random shut off") { ?>selected<? } ?>>Random shut off</option>
		<option value="Scratched/broken LCD" <? if($Reason2 == "Scratched/broken LCD") { ?>selected<? } ?>>Scratched/broken LCD</option>
		<option value="Shipping error – arrived late" <? if($Reason2 == "Shipping error – arrived late") { ?>selected<? } ?>>Shipping error – arrived late</option>
		<option value="Shipping error – didn’t arrive" <? if($Reason2 == "Shipping error – didn’t arrive") { ?>selected<? } ?>>Shipping error – didn’t arrive</option>
		<option value="Shipping error – other" <? if($Reason2 == "Shipping error – other") { ?>selected<? } ?>>Shipping error – other</option>
		<option value="Timer stopped working" <? if($Reason2 == "Timer stopped working") { ?>selected<? } ?>>Timer stopped working</option>
		<option value="Won’t turn on" <? if($Reason2 == "Won’t turn on") { ?>selected<? } ?>>Won’t turn on</option>
		<option value="Wrong address" <? if($Reason2 == "Wrong address") { ?>selected<? } ?>>Wrong address</option>


      </select>
      <input name="ClaimID" type="text" id="ClaimID" value="<? echo $ClaimID; ?>" size="3" maxlength="3">
    </div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ClaimType; ?><strong></a></strong></font></div></td>
    <td><div align="center">
      
        <input name="Update" type="submit" id="Update" value="Update">
      
      <font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
  </tr></form>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>

   
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";


// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>