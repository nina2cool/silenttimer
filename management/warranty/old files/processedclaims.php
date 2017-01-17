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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


?> <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Manage Warranty 
Claims</strong></font>
<form name="form" method="post" action="viewwarranty.php">
		 <table width="100%" border="0" cellspacing="0" cellpadding="10">
			   <tr> 
				<td><table width="100%" border="0" cellspacing="0" cellpadding="2">
					<tr> 
					  <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
						<input type="radio" name="radioSelection" value="all">
						</font></strong></td>
					  <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">All</font></strong></td>
					</tr>
					</table></td>
			  </tr>				  
			  <tr> 
				<td><table width="100%" border="0" cellspacing="0" cellpadding="2">
					<tr> 
					  <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
						<input type="radio" name="radioSelection" value="purchaseID">
						</font></strong></td>
					  <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">PurchaseID</font></strong></td>
					</tr>
					<tr> 
					  <td><input name="txtPurchaseID" type="text" id="txtPurchaseID" size="20"></td>
					</tr>
				  </table></td>
			  </tr>
			  <tr> 
				<td><table width="100%" border="0" cellspacing="0" cellpadding="2">
					<tr> 
					  <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
						
              <input type="radio" name="radioSelection" value="datetimerequest">
						</font></strong></td>
					  <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
						of Claim</font></strong></td>
					</tr>
					<tr> 
					  <td><input name="txtDateTimeRequest" type="text" id="txtDateTimeRequest" size="20"></td>
					</tr>
				  </table></td>
			  </tr>
			  <tr> 
				<td><table width="100%" border="0" cellspacing="0" cellpadding="2">
					<tr> 
					  <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
						
              <input type="radio" name="radioSelection" value="claimtype">
						</font></strong></td>
					  
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">Claim 
              Type </font></strong></td>
					</tr>
					<tr> 
					  <td><input name="txtClaimType" type="text" id="txtClaimType" size="20"></td>
					</tr>
				  </table></td>
			  </tr>
			 
			  <tr> 
				<td><input type="submit" name="Submit" value="Get Warranty"></td>
			  </tr>
		 </table> 
            
</form>
   
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




