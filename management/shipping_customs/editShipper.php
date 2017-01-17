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


//require "include/sidemenu.php";


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//grab variables to get purchase info and customer info from DB.
	$ShipperID = $_GET['ship'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	// Save Button
	if ($_POST['Submit'] == "Save")
	{
			
		$vCompanyName = $_POST['txtCompanyName'];
		$vContactPerson = $_POST['txtContactPerson'];
		$vPhone = $_POST['txtPhone'];
		$vEmail = $_POST['txtEmail'];
		$vInfo = $_POST['txtInfo'];
		$DomMain = $_POST['DomMain'];
		$DomOff = $_POST['DomOff'];
		$International = $_POST['International'];
		$POBox = $_POST['POBox'];
		$Military = $_POST['Military'];
		$Status = $_POST['Status'];
	
	$sql = "UPDATE tblShipper
			SET 
			CompanyName = '$vCompanyName',
			ContactPerson = '$vContactPerson',
			Phone = '$vPhone',
			Email  = '$vEmail',  
			Info  = '$vInfo',
			DomesticMainland = '$DomMain',
			DomesticOffshore = '$DomOff',
			International = '$International',
			POBox = '$POBox',
			Military = '$Military',
			Status = '$Status'
			WHERE ShipperID = '$ShipperID'";
		//echo $sql;
		mysql_query($sql) or die("Cannot update tblShipper");
	}  
	
	
	//SQL to get data from purchase table
	$sql = "SELECT * FROM tblShipper WHERE ShipperID = $ShipperID";
			
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$ContactPerson = $row[ContactPerson];
		$Phone = $row[Phone];
		$Email = $row[Email];
		$Info = $row[Info];
		$DomMain = $row[DomesticMainland];
		$DomOff = $row[DomesticOffshore];
		$International = $row[International];
		$POBox = $row[POBox];
		$Military = $row[Military];
		$Status = $row[Status];
	
	}
	

?>
			
<font color="#000099" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
Shipper Info<br>
<br>
</strong></font>
<form action="" method="post" name="form" id="form">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
                     <td width="25%"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Company
                           Name&nbsp;</font></div></td>
                     <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                     <input name="txtCompanyName" type="text" id="txtCompanyName" value="<? echo $CompanyName; ?>" size="40" maxlength="50">
                     </strong></font></td>
    </tr>

           		  <tr> 
                  		<td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contact
               		          Person&nbsp;</font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtContactPerson" type="text" id="txtContactPerson" value="<? echo $ContactPerson; ?>" size="40" maxlength="100">
                    	</strong></font></td>
           		  </tr>
           		   <tr> 
                  		<td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Phone&nbsp;</font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtPhone" type="text" id="txtPhone" value="<? echo $Phone; ?>" size="30" maxlength="30">
                    	</strong></font></td>
          		 </tr>
           			<tr> 
                  		<td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Email&nbsp;</font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    <input name="txtEmail" type="text" id="txtEmail" value="<? echo $Email; ?>" size="40" maxlength="100">
                    </strong></font></td>
           		</tr>
           		<tr> 
                  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Info&nbsp;</font></div></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    <input name="txtInfo" type="text" id="txtInfo" value="<? echo $Info; ?>" size="40" maxlength="150">
                   </strong></font></td>
          	 </tr>
           		<tr>
           		  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Domestic
   		                Mainland </font></div></td>
           		  <td><font size="2" face="Arial, Helvetica, sans-serif">
           		      <select name="DomMain" id="DomMain">
                        <option value="y"<? if($DomMain == "y") { ?> selected<? } ?>>y</option>
                        <option value="n"<? if($DomMain == "n") { ?> selected<? } ?>>n</option>
                      </select>
       		      </font></td>
    </tr>
           		<tr>
           		  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Domestic
   		                Offshore </font></div></td>
           		  <td><font size="2" face="Arial, Helvetica, sans-serif">
           		      <select name="DomOff" id="DomOff">
                        <option value="y"<? if($DomOff == "y") { ?> selected<? } ?>>y</option>
                        <option value="n"<? if($DomOff == "n") { ?> selected<? } ?>>n</option>
                      </select>
       		      </font></td>
    </tr>
           		<tr>
           		  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">International</font></div></td>
           		  <td><font size="2" face="Arial, Helvetica, sans-serif">
           		      <select name="International" id="International">
                        <option value="y"<? if($International == "y") { ?> selected<? } ?>>y</option>
                        <option value="n"<? if($International == "n") { ?> selected<? } ?>>n</option>
                      </select>
       		      </font></td>
    </tr>
           		<tr>
           		  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">POBox</font></div></td>
           		  <td><font size="2" face="Arial, Helvetica, sans-serif">
           		      <select name="POBox" id="POBox">
                        <option value="y"<? if($POBox == "y") { ?> selected<? } ?>>y</option>
                        <option value="n"<? if($POBox == "n") { ?> selected<? } ?>>n</option>
                      </select>
       		      </font></td>
    </tr>
           		<tr>
           		  <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Military</font></div></td>
           		  <td><font size="2" face="Arial, Helvetica, sans-serif">
           		      <select name="Military" id="Military">
                        <option value="y"<? if($Military == "y") { ?> selected<? } ?>>y</option>
                        <option value="n"<? if($Military == "n") { ?> selected<? } ?>>n</option>
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