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

#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 

		// build connection to database
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$Now = date("Y-m-d");
		
		If ($_POST['Add'] == "Add")
		{
		
		$BusinessCustomerID = $_POST['BusinessCustomerID'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		
		$M = date("m");
		$D = date("d");
		$Y = date("Y");
		
		$PromotionCodeID = $BusinessCustomerID .$Y .$M .$D;
		
		//echo $PromotionCodeID;
		
		
		
		$sql = "INSERT INTO tblPromotionCode(BusinessCustomerID, PromotionID, PromotionCodeID, StartDate, EndDate, DateCreated, Status) 
		VALUES('$BusinessCustomerID', 'rebate', '$PromotionCodeID', '$StartDate', '$EndDate', '$Now', 'active');"; 
		
		//echo $sql;
		
		$result = mysql_query($sql) or die("Cannot insert into table"); 


		
}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
Rebate
</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Store</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="BusinessCustomerID" class="text" id="BusinessCustomerID">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblBusinessCustomer
								WHERE Status = 'active' AND CustomerType = 'Bookstore'
								ORDER BY Chain, Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[BusinessCustomerID];?>" <? if($row[BusinessCustomerID] == $BusinessCustomerID){echo "selected";}?>><? if($row[Chain] <> "") { ?><? echo $row[Chain]; ?> - <? } ?><? echo $row[Name];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
  <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Start
        Date </font></strong></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="StartDate" type="text" id="BreedName3" size="15">
    0000-00-00</font></td>
</tr>
<tr>
  <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">End
        Date</font></strong></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="EndDate" type="text" id="BreedName3" size="15">
    0000-00-00 </font></td>
</tr>
</table>
<p>
<input name="Add" type="submit" id="Add" value="Add" target="3">
</p>
</form>

<p>OR</p>
<p><a href="RebateAddMultiple.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Add Multiple Rebates </font></strong></font></a></p>
<p>OR</p>
<p><a href="../../promo/index.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Edit
          Rebates</font></strong></font></a></p>
<p>OR</p>
<p><a href="RebateEditMultiple.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Edit
Multiple Rebates</font></strong></font></a></p>
<p>OR</p>
<p><a href="RebateCustomerAdd.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Add
          Rebates for Customers</font></strong></font></a></p>
<p>&nbsp;</p>
<?
mysql_close($link);


// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../../include/footerlinks.php";


}
?>