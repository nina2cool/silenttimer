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



	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			


	


	#<Add button being pushed>
	if ($_POST['Submit'] == "Submit")
	{

		$PurchaseID = $_POST['PurchaseID'];
		
		$sql = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
		$result = mysql_query($sql) or die("Cannot get purchaseID");
		
		while($row = mysql_fetch_array($result))
		{
		$CustomerID = $row[CustomerID];
		}
		
		$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
		$result5 = mysql_query($sql5) or die("Cannot get products");
		
		while($row5 = mysql_fetch_array($result5))
		{
			$ProductID = $row5[ProductID];
			$Quantity = $row5[Quantity];
			
				$sql6 = "UPDATE tblProductNew SET WebInventory = WebInventory + $Quantity WHERE ProductID = '$ProductID'";
				$result6 = mysql_query($sql6) or die("Cannot update product table");
		}
		
			
		
		
		
		$sql2 = "DELETE FROM tblCustomer
			WHERE CustomerID = '$CustomerID'";
		
		//echo $sql2;
		
		mysql_query($sql2) or die("Cannot delete customerID");
		
		
		$sql3 = "DELETE FROM tblPurchase2
			WHERE PurchaseID = '$PurchaseID'";
		
		//echo $sql3;
		
		mysql_query($sql3) or die("Cannot delete PurchaseID");
		
		
		$sql4 = "DELETE FROM tblPurchaseDetails2
			WHERE PurchaseID = '$PurchaseID'";
		
		//echo $sql4;
		
		mysql_query($sql4) or die("Cannot delete PurchaseIDdetails");
		
		
		
		$goto = "NotShippedView.php";
		header("location: $goto");
		
		
		
		
	}
	
	
	
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

	
	
	//close connection to database
mysql_close($link);

?>
<p align="left">
  <SCRIPT LANGUAGE="JavaScript">
	function Check()
	{
		doyou = confirm("Are you sure you want to delete this order?");
		return doyou;
	}
  </script>
</p>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Cancel
       a Test Order</strong></font></p>
<form name="form1" method="post" action="" onSubmit="return Check();">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr> 
            <td width="16%"><font size="2" face="Arial, Helvetica, sans-serif">Purchase ID</font></td>
            <td width="84%"><input name="PurchaseID" type="text" id="PurchaseID"></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Submit" type="submit" id="Submit" value="Submit">
    </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>