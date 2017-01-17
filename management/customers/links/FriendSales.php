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

	
	$sql = "SELECT * FROM tblFriendSale WHERE Status = 'active' GROUP BY CustomerID";

	//echo $sql;

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblFriendSale.CustomerID DESC";
		$sortBy ="tblFriendSale.CustomerID";
		$sortDirection = "DESC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	$Num = mysql_num_rows($result);


	$sql3 = "SELECT * FROM tblFriend WHERE Status = 'active' AND Type = 'receiver'";
	$result3 = mysql_query($sql3) or die("Cannot execute query!");
	$NumReferred = mysql_num_rows($result3);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Friend
Sales</strong></font></p>
<ul>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?> people
      have earned sales credits</font></li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="FriendSalesAdd.php"><strong>Add
      sales credit</strong></a></font></li>
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
      | DateTime</strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Valid
              Sales </strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Return
              Sales </strong></font></div></td>
      <td class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total
              Valid Sales </strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>More
              to Go </strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$CustomerID = $row[CustomerID];

								
								$sql5 = "SELECT tblPurchase2.PurchaseID, tblCustomer.FirstName, tblCustomer.LastName, tblPurchase2.OrderDateTime
								FROM tblCustomer
								INNER JOIN tblPurchase2
								ON tblCustomer.CustomerID = tblPurchase2.CustomerID
								WHERE tblPurchase2.Status = 'active' AND tblCustomer.CustomerID = '$CustomerID'";
								$result5 = mysql_query($sql5) or die("Cannot get cust info");
								while($row5 = mysql_fetch_array($result5))
								{
									$FirstName = $row5[FirstName];
									$LastName = $row5[LastName];
									$DateTimeOrdered = $row5[OrderDateTime];
								}
								
								
								$sql2 = "SELECT Count(Valid) as CountValid FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Status = 'active' AND Valid = 'y'";
								$result2 = mysql_query($sql2) or die("Cannot get valid count");
								
								while($row2 = mysql_fetch_array($result2))
								{
										$CountValid = $row2[CountValid];
								}
								
								
								$sql4 = "SELECT Count(Returned) as CountReturn FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Returned = 'y' AND Status = 'active'";
								$result4 = mysql_query($sql4) or die("Cannot get return count");
								
								while($row4 = mysql_fetch_array($result4))
								{
										$CountReturn = $row4[CountReturn];
								}
								
								$ValidSales = $CountValid - $CountReturn;
								//$TotalSales = $CountValid + $CountInvalid + $CountReturn;
							
								$More = 5 - $ValidSales;
								
								
								$sql6 = "SELECT DATE_FORMAT(EndDate, '%m/%d/%y') AS EndDate FROM tblPromotionCode WHERE PromotionCodeID = '$CustomerID' AND Type = 'friend'";
								$result6 = mysql_query($sql6) or die("Cannot get promo code end date");
								while($row6 = mysql_fetch_array($result6))
								{
									$EndDate = $row6[EndDate];
								}

												
			  ?>
  <tr<? if($More <= 0) { ?> bgcolor="#CCFFCC"<? } ?>> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $FirstName; ?> <? echo $LastName; ?></font></strong> <a href="../CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><font size="1">cust
          info</font></a><br>
      Promo
      Code: <? echo $CustomerID; ?> <a href="FriendSalesDetail.php?cust=<? echo $CustomerID; ?>"> <font size="1">sales details</font><br>
      </a>Expires <? echo $EndDate; ?><br>
      <font color="#CC00CC"><? echo $DateTimeOrdered; ?></font>
      </font></td>
	  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountValid; ?></font></div></td>
	  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountReturn; ?></font></div></td>
	  <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ValidSales; ?></font></strong></div></td>
      <td><div align="center"><strong><font color="#00CC33" size="2" face="Arial, Helvetica, sans-serif"><? echo $More; ?></font></strong></div></td>
  </tr>
			<?
			  	}
			  ?>
</table> 

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
