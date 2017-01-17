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


	//grab variables to get purchase info from DB.
	$CustomerID = $_GET['cust'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	$Now = date('Y-m-d h:m:s');

	
	#<Add button being pushed>
	if ($_POST['Update'] == "Update")
	{
		$PurchaseID = $_POST['PurchaseID'];
		
		
		$sql = "SELECT tblPurchase2.PurchaseID, tblPurchase2.Status, tblPurchaseDetails2.PurchaseID, tblPurchaseDetails2.PurchasePrice,
		tblPurchaseDetails2.ProductID, tblPurchaseDetails2.Quantity, tblPurchaseDetails2.Replacement, tblPurchase2.CustomerID
		FROM tblPurchase2
		INNER JOIN tblPurchaseDetails2
		ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
		WHERE tblPurchase2.PurchaseID = '$PurchaseID'";
		echo "<br>sql =" .$sql;
		
		$result = mysql_query($sql) or die("<br>Cannot get purchaseID");
		
		$Count = mysql_num_rows($result);
		echo "<br>count =" .$Count;
		
		/*
		if($Count > '1')
		{
		echo "<br>Cannot update replacement - multiple products.  Need to know which product was the replacement.";
		}
		else
		{
		*/
				while($row = mysql_fetch_array($result))
				{
				$PurchasePrice = $row[PurchasePrice];
				$CustomerID = $row[CustomerID];
				
						if($PurchasePrice <> "")
						{
						echo "<br>Purchase Price not zero - replacement?";
						
								$sql3 = "SELECT * FROM tblPurchase2 WHERE CustomerID = '$CustomerID'";
								echo "<br>sql3 =" .$sql3;
								$result3 = mysql_query($sql3) or die("<br>Cannot get multiple purchases for this customer");
								
								while($row3 = mysql_fetch_array($result3))
								{
								$Subtotal = $row3[Subtotal];
								$PurchaseID2 = $row3[PurchaseID];
								
										if($Subtotal == '0')
										{
											$sql2 = "UPDATE tblPurchaseDetails2
											SET Replacement = 'y'
											WHERE PurchaseID = '$PurchaseID2'";
											echo "<br>sql2 =" .$sql2;
											$result2 = mysql_query($sql2) or die("<br>Cannot update Replacement field");
											
											echo "<br>DONE!";
										}
										/*
										else
										{
										echo "<br>No other purchases available for this customer.";
										}
										*/
									}
													
							}
							else
							{
							$sql4 = "UPDATE tblPurchaseDetails2
							SET Replacement = 'y'
							WHERE PurchaseID = '$PurchaseID'";
							echo "<br>sql4 =" .$sql4;
							$result4 = mysql_query($sql4) or die("<br>Cannot update Replacement field");
							echo "<br>DONE!";
							}
			/*
				}
				*/
				
				
			}
		
		
		

	

		
		}

?>


<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Replacements</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Purchase ID </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="PurchaseID" type="text" id="PurchaseID" target="1">
      </font></td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <br>
    <input name="Update" type="submit" id="Update" value="Update">
    </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>