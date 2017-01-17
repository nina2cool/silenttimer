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
?>

<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
Sales by State</strong></font> 
<form>
  <?

	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.State, Count(tblCustomer.State) as StateCount, tblCustomer.Type, 
	tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.Status, tblPurchaseDetails2.PurchaseID, 
	Sum(tblPurchaseDetails2.Quantity) as Quantity, tblPurchaseDetails2.ProductID 
	FROM tblCustomer 
	INNER JOIN tblPurchase2 ON tblCustomer.CustomerID = tblPurchase2.CustomerID 
	INNER JOIN tblPurchaseDetails2 ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID 
	WHERE tblPurchase2.Status = 'active' AND tblPurchaseDetails2.ProductID = '1' OR tblPurchase2.Status = 'active' 
	AND tblPurchaseDetails2.ProductID = '11' OR tblPurchase2.Status = 'active' AND tblPurchaseDetails2.ProductID = '14' 
	GROUP BY State ORDER BY StateCount DESC";
	$result = mysql_query($sql) or die("Cannot retrieve state info, please try again.");

	

?>
  <div align="right"><br>
    <a href="StatesPrint.php" target="_blank"><font size="3" face="Arial, Helvetica, sans-serif">Printable 
    Version </font></a> </div>
  <br>
  <table width="440" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
    <tr bgcolor="#CCCCCC"> 
      <td width="130" class=sort> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../reports/states.php?sort=tblState.State&d=<? if ($sortBy=="tblState.State") {echo $sd;} else {echo "ASC";} ?>">State</a></font></strong></div></td>
      <td width="130" class=sort> 
        <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">#
          of Sales (without bulk) </font></strong></div></td>
      <td width="130" class=sort> 
        <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
          of Total Sales</font></strong></div></td>
      <?
   
while($row = mysql_fetch_array($result))

		$StateCount = $row[StateCount];
		$Quantity = $row[Quantity];
		$State = $row[State];
		
		




	?>
    <tr> 
      <td width="130"> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></strong></div></td>
      <td width="130"> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $StateCount; ?></font></strong></div></td>
      <td width="130" bgcolor="#FFFFCC"> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></strong></div></td>
    </tr>
    <?
	}
	
			  	
				//close connection to database
				mysql_close($link);
			  ?>
  </table>
  <p>&nbsp;</p>
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";



// finishes security for page
?>
