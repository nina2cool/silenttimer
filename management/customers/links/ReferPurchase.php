<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT tblPurchase2.CustomerID, tblPurchase2.OrderDateTime, tblPurchase2.PromotionCodeID,
	 tblPurchase2.Subtotal, tblPurchase2.TestID, tblPurchase2.PurchaseID
	FROM tblPurchase2
	INNER JOIN tblFriend
	ON tblPurchase2.PromotionCodeID = tblFriend.PromotionCodeID
	WHERE tblPurchase2.Status = 'active' AND tblFriend.Type = 'receiver' AND tblFriend.PromotionCodeID <> ''
	GROUP BY tblPurchase2.PurchaseID";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase2.OrderDateTime DESC";
		$sortBy ="tblPurchase2.OrderDateTime";
		$sortDirection = "DESC";
	}
		
	$result = mysql_query($sql) or die("Cannot execute query!");
	$NumPurchased = mysql_num_rows($result);
	
	$sql3 = "SELECT * FROM tblFriend WHERE Status = 'active' AND Type = 'receiver'";
	$result3 = mysql_query($sql3) or die("Cannot execute query!");
	$NumReferred = mysql_num_rows($result3);

	$sql4 = "SELECT * FROM tblFriend WHERE Status = 'active' AND Type = 'sender'";
	$result4 = mysql_query($sql4) or die("Cannot execute query!");
	$Num = mysql_num_rows($result4);
	
	$PurchaseRate = $NumPurchased / $NumReferred * 100;

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Email
Referral Purchases</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&gt;
      <a href="Refer.php">View all referrals</a></font></p>
<ul>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?> people
      referred their friends</font></li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumReferred; ?> friends
      were referred</font></li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumPurchased; ?> friends
      purchased as a result of the email</font></li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PurchaseRate,2); ?> %
      purchase rate</font></li>
</ul>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
      <td class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong> Name
      of Purchaser</strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Test</strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Referred
              By</strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Promo
              Code</strong></font></div></td>
      <td class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Date
                 and Time</strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$CustomerID = $row[CustomerID];
				$TestID = $row[TestID];
				$Subtotal = $row[Subtotal];
				$PromoCode = $row[PromotionCodeID];
				$OrderDateTime = $row[OrderDateTime];
				$PurchaseID = $row[PurchaseID];
				
						$sql2 = "SELECT * FROM tblFriend WHERE PromotionCodeID = '$PromoCode' AND Type = 'sender'";
						$result2 = mysql_query($sql2) or die("Cannot execute query");
						
						while($row2 = mysql_fetch_array($result2))
						{
						$FriendID = $row2[FriendID];
						$Name = $row2[Name];
						$Note = $row2[Note];
						$FriendEmail = $row2[Email];
						$DateTime = $row2[DateTime];
						$Link = $row2[Link];
						}
				
				
						$sql5 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
						$result5 = mysql_query($sql5) or die("Cannot execute query");
						while($row5 = mysql_fetch_array($result5))
						{
						$Test = $row5[Name];
						}
				
						
						$sql6 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
						$result6 = mysql_query($sql6) or die("Cannot execute query");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$FirstName = $row6[FirstName];
						$LastName = $row6[LastName];
						}
						
				if($PromoCode == "") { $PromoCode = "-"; }
				
			  ?>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="../CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><strong><? echo $FirstName; ?> <? echo $LastName; ?></strong></a><br>
        pID: <? echo $PurchaseID; ?></font></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Test; ?></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="../CustomerInfo.php?cust=<? echo $PromoCode; ?>" target="_blank"><strong><? echo $Name; ?></strong></a><br>
      <? echo $DateTime; ?><br>
      </font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PromoCode; ?></font></div></td>
      <td> <div align="center"><font size="2"><strong><font color="#0000FF" face="Arial, Helvetica, sans-serif">$<? echo $Subtotal; ?></font></strong><font face="Arial, Helvetica, sans-serif">          <br>
        <? echo $OrderDateTime; ?></font></font></div></td>
    </tr>
    <?
			  	}
				
			  ?>
</table> 
		
            
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
