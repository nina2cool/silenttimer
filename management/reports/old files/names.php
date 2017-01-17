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
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong># of 
People with First Name</strong></font> 
<form>
  <?

	$sql = "SELECT Count(FirstName) as Count, FirstName FROM tblCustomer GROUP BY FirstName ORDER BY Count DESC, FirstName ASC";
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");


?>
  <div align="right"></div>
  <br>
  <table width="294" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
	//sort results.....
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
      <td width="130" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Name</font></strong></font></div></td>
      <td width="130" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"># 
      of People</font></strong></font></div></td>
      <!--          <td width="17%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblProduct.ProductName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";} ?>">Product</a></strong></font></div></td>
                <td width="6%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.NumOrdered&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">#</a></font></strong></font></div></td>
                <td width="11%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Total</a></strong></font></div></td>
                <td width="22%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.DateTime&d=<? if ($sortBy=="tblPurchase.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
                    Time </a></strong></font></div></td>
                <td width="12%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.Shipped&d=<? if ($sortBy=="tblPurchase.Shipped") {echo $sd;} else {echo "ASC";} ?>">Shipped?</a></strong></font></div></td>
              </tr>
        
		-->
      <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$FirstName = $row['FirstName'];
		$Num = $row['Count'];
	

	?>
    <tr> 
      <!--					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="management/managepurchases/editpurchases.php?p=<? echo $pID; ?>&c=<? echo $cID; ?>"><strong>Details</strong></a></font></div></td> -->
      <!--	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $pID; ?></strong></font></div></td> -->
      <td width="130"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></strong></div></td>
      <td width="130"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></strong></div></td>
      <!--					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numOrdered; ?></strong></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo $total; ?></strong></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $dt; ?></strong></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="#"><strong><? echo $shipped; ?></strong></a></font></div></td>  -->
    </tr>
    <?
	}
	
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
