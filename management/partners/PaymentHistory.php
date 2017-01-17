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

	
	//grab variables to get customer info from DB.
	$AffID = $_GET['affiliate'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT * FROM tblAffiliatePayment WHERE AffiliateID = '$AffID'";
	
						//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblAffiliatePayment.DateTime DESC";
				$sortBy ="tblAffiliatePayment.DateTime";
				$sortDirection = "DESC";
			}


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
  Payment History for <u><? echo $AffID; ?></u></strong></font></p>
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
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date
              and Time</strong></font></div></td>
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Amount</strong></font></div></td>
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Payment
              Type </strong></font></div></td>
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Check
              Number </strong></font></div></td>
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Start
              Purchase ID</strong></font></div></td>
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>End
              Purchase ID</strong></font></div></td>
      <?

			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row4 = mysql_fetch_array($result))
				{
					$AffID = $row4['AffiliateID'];
					$Amount = $row4['Amount'];
					$DateTime = $row4['DateTime'];
					$PaymentType = $row4['PaymentType'];
					$CheckNumber = $row4['CheckNumber'];
					$Start = $row4['StartPurchase'];
					$End = $row4['EndPurchase'];
					
			  
			  
			  ?>
    <tr> 
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($Amount,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PaymentType; ?></font></div></td>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CheckNumber; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Start; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $End; ?></font></div></td>
    </tr>
    <?
			  	}
			  ?>
  </table> 
		
            
  <br>
  <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; 
        <a href="CurrentSales.php?aff=<? echo $AffID; ?>">View Sales</a></font></strong></p>
  <p align="left">&nbsp;</p>
  
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// has links that show up at the bottom in it.
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