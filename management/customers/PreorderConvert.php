<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$CustomerID = $_GET['cust'];
	$PurchaseID = $_GET['purch'];

	$Now = date("Y-m-d H:i:s");

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
						$sql2 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
						$result2 = mysql_query($sql2) or die("Cannot execute query!");
						
						while($row2 = mysql_fetch_array($result2))
						{
							$CompanyName = $row2[BusinessName];
							$FirstName = $row2[FirstName];
							$LastName = $row2[LastName];
							$Address = $row2[Address];
							$City = $row2[City];
							$State = $row2[State];
							$ZipCode = $row2[ZipCode];
							$Email = $row2[Email];
						}
						
		
	#Need to add second charge to tblPurchasePreorder, mark as Paid, move to Not Shipped List

	if ($_POST['Convert'] == "Convert")
	{
		$sql4 = "UPDATE tblPurchase2
		SET Preorder = 'n'
		WHERE PurchaseID = '$PurchaseID'";
		$result4 = mysql_query($sql4) or die("Cannot update to paid and move to not shipped page");
		
		$sql5 = "UPDATE tblPurchaseDetails2
		SET Status = 'active'
		WHERE PurchaseID = '$PurchaseID' AND Status = 'preorder'";
		$result5 = mysql_query($sql5) or die("Cannot update product info to not shipped page");		
		
		$goto = "PreorderView.php";
		header("location: $goto");
	}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



		

?>
<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Convert
to Regular Order </strong></font></p>
<p align="left">&nbsp;</p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><form name="form1" method="post" action="">
        <p><strong><font size="3" face="Arial, Helvetica, sans-serif">Customer:</font><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"> <font color="#FF0000"><? echo $CompanyName; ?> - <? echo $FirstName; ?> <? echo $LastName; ?></font><br>
        </font><font size="3" face="Arial, Helvetica, sans-serif">PurchaseID:</font><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"> <font color="#FF0000"><? echo $PurchaseID; ?><br>
        </font></font><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><font size="1" face="Arial, Helvetica, sans-serif">(view
        cust info) </font></a></strong> </p>
        <p>
          <input name="Convert" type="submit" id="Paid2" value="Convert">
          <font size="2" face="Arial, Helvetica, sans-serif">(moves to Not Shipped
          List) </font></p>
      </form></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="PreorderView.php">Back to
Preorder Customers</a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
