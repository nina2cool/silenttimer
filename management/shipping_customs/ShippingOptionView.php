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
	
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select * FROM tblShippingOption2";


						//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblShippingOption2.ShippingOptionID ASC";
				$sortBy ="tblShippingOption2.ShippingOptionID";
				$sortDirection = "ASC";
			}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>

<script>
// this code hides and shows content on the page like the check ordering info...
	function visible(content)
	{
	  if (document.getElementById(content).style.display == "none") {
		document.getElementById(content).style.display = "";
		return true;
	  } else {
		document.getElementById(content).style.display = "none";
		return true;
	  }
	}
</script>

			<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Shipping
			      Options<br>
			</strong></font></p>
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
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ShippingOptionView.php?sort=tblShippingOption2.ShippingOptionID&d=<? if ($sortBy=="tblShippingOption2.ShippingOptionID") {echo $sd;} else {echo "ASC";}?>">Shipping Option ID </a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ShippingOptionView.php?sort=tblShippingOption2.ShipperID&d=<? if ($sortBy=="tblShippingOption2.ShipperID") {echo $sd;} else {echo "ASC";}?>">Shipper</a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ShippingOptionView.php?sort=tblShippingOption2.ShippingOption&d=<? if ($sortBy=="tblShippingOption2.ShippingOption") {echo $sd;} else {echo "ASC";}?>">Service</a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ShippingOptionView.php?sort=tblShippingOption2.Timeframe&d=<? if ($sortBy=="tblShippingOption2.Timeframe") {echo $sd;} else {echo "ASC";}?>">Timeframe</a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ShippingOptionView.php?sort=tblShippingOption2.Description&d=<? if ($sortBy=="tblShippingOption2.Description") {echo $sd;} else {echo "ASC";}?>">Description</a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ShippingOptionView.php?sort=tblShippingOption2.Nickname&d=<? if ($sortBy=="tblShippingOption2.Nickname") {echo $sd;} else {echo "ASC";}?>">Nickname</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{ 
				$ShippingOptionID = $row[ShippingOptionID];
				$ShipperID = $row[ShipperID];
				$ShippingOption = $row[ShippingOption];
				$Timeframe = $row[Timeframe];
				$Description = $row[Description];
				$Nickname = $row[Nickname];
				$Status = $row[Status];
				
							
							$sql2 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
							$result2 = mysql_query($sql2) or die("Cannot execute query - find shipper name!");
							while($row2 = mysql_fetch_array($result2))
							{
								$Shipper = $row2[Nickname];
								$Shipper2 = $row2[CompanyName];
								
								if($Shipper == "") { $Shipper = $Shipper2; }
								
							
								
			  ?>
    <tr> 
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShippingOptionEdit.php?ship=<? echo $ShippingOptionID; ?>"><strong><? echo $ShippingOptionID; ?></strong></a></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipper; ?></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShippingOption; ?></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Timeframe; ?></font></div></td>
      <td<? if($Description == "") { ?> bgcolor="#CC99FF"<? } ?>>
 
	  <input name="chkDetail" type="checkbox" id="chkDetail" onclick="visible('<? echo $ShippingOptionID; ?>');" value="y">
	  <font size="2" face="Arial, Helvetica, sans-serif">View </font>
					  
					  
					  								             		
			          <div style="display: none" id = "<? echo $ShippingOptionID; ?>">
			
			 <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Description; ?></font>
			  
			</div>  
			

					  
					  
					  
					  
					  </td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Nickname; ?></strong></font></div></td>
      </tr>
    <?
			  	}
				}
				
			  ?>
  </table> 

   <p>&nbsp;</p>
<p>&nbsp;</p>
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
