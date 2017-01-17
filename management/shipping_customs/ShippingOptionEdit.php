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

	//grab variables to get purchase info and customer info from DB.
	$ShippingOptionID = $_GET['ship'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	// Save Button
	if ($_POST['Submit'] == "Save")
	{
			
		$ShipperID = $_POST['ShipperID'];
		$ShippingOption = $_POST['ShippingOption'];
		$Timeframe = $_POST['Timeframe'];
		$Description = $_POST['Description'];
		$Tracking = $_POST['Tracking'];
		$Nickname = $_POST['Nickname'];
		$Status = $_POST['Status'];
	
	$sql = "UPDATE tblShippingOption2
			SET 
			ShipperID = '$ShipperID',
			ShippingOption = '$ShippingOption',
			Timeframe = '$Timeframe',
			Description  = '$Description',  
			Tracking  = '$Tracking',
			Nickname = '$Nickname',
			Status = '$Status'
			WHERE ShippingOptionID = '$ShippingOptionID'";
		//echo $sql;
		mysql_query($sql) or die("Cannot update ShippingOptionID");
		
		
		header("Location: ShippingOptionView.php");

		
	}  
	
	
	//SQL to get data from purchase table
	$sql = "Select * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
				$ShipperID = $row[ShipperID];
				$ShippingOption = $row[ShippingOption];
				$Timeframe = $row[Timeframe];
				$Description = $row[Description];
				$Nickname = $row[Nickname];
				$Tracking = $row[Tracking];
				$Status = $row[Status];
	}
	
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";


// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


?>
			
<font color="#000099" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
Shipping Option <br>
<br>
</strong></font>
<form action="" method="post" name="form" id="form">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
                     <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Shipper</font></div></td>
                     <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                     </strong>
                         <select name="ShipperID" class="text" id="select6">
                           <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblShipper WHERE Status = 'active'";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
                           <option value="<? echo $row[ShipperID];?>" <? if($row[ShipperID] == $ShipperID){echo "selected";}?>><? echo $row[CompanyName];?></option>
                           <?
						}
					?>
                         </select>
                     <strong>                         </strong></font></td>
    </tr>

           		  <tr> 
                  		<td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Service
                  		      Type</font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="ShippingOption" type="text" id="ShippingOption" value="<? echo $ShippingOption; ?>" size="60">
                    	</strong></font></td>
           		  </tr>
           		   <tr> 
                  		<td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Timeframe</font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="Timeframe" type="text" id="Timeframe" value="<? echo $Timeframe; ?>" size="60">
                    	</strong></font></td>
          		 </tr>
           			<tr> 
                  		<td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Description
                  		      (in html)</font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                        <textarea name="Description" cols="60" id="Description"><? echo $Description; ?></textarea>
                    </strong></font></td>
           		</tr>
           		<tr> 
                  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nickname&nbsp;</font></div></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    <input name="Nickname" type="text" id="Nickname" value="<? echo $Nickname; ?>" size="15" maxlength="15">
                   </strong></font></td>
          	 </tr>
           		<tr>
           		  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Tracking</font></div></td>
           		  <td><font size="2" face="Arial, Helvetica, sans-serif">
           		      <select name="Tracking" id="Tracking">
                        <option value="y"<? if($Tracking == "y") { ?> selected<? } ?>>y</option>
                        <option value="n"<? if($Tracking == "n") { ?> selected<? } ?>>n</option>
                      </select>
       		      </font></td>
    </tr>
           		<tr>
           		  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status</font></div></td>
           		  <td><font size="2" face="Arial, Helvetica, sans-serif">
           		      <select name="Status" id="Status">
                        <option value="active"<? if($Status == "active") { ?> selected<? } ?>>active</option>
                        <option value="inactive"<? if($Status == "inactive") { ?> selected<? } ?>>inactive</option>
                      </select>
       		      </font></td>
    </tr>
 </table>	 
  <p> 
    <input type="submit" name="Submit" value="Save">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit2" value="Reset">
  </p>
</form>
            

 
<? // -------------- END MY CODE -------------------

mysql_close($link);

// has links that show up at the bottom in it
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";


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