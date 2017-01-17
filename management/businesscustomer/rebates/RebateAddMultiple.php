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

// has top menu for this page in it, you can change these links in this folders include folder.
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
	
	$Now = date("Y-m-d");

	if ($_POST['Add'] == "Create Rebates")
	{		
		# get information from previous screen...
		$chkBorders = $_POST['chkBorders'];
		$chkBN = $_POST['chkBN'];
		$chkFollett = $_POST['chkFollett'];
		$chkChapters = $_POST['chkChapters'];
		$chkIndigo = $_POST['chkIndigo'];
		$chkIndependents = $_POST['chkIndependents'];
		$chkUS = $_POST['chkUS'];
		$chkCanada = $_POST['chkCanada'];
		$chkState = $_POST['chkState'];
		$State = $_POST['State'];
		$chkAll = $_POST['chkAll'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		

		
		
		
		
		
		$sql = "SELECT * FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType = 'Bookstore'";
		
		
		if($chkBorders == "y") {	$sql .= " AND tblBusinessCustomer.Chain = 'Borders'";	}
		if($chkBN == "y") {	$sql .= " AND tblBusinessCustomer.Chain = 'Barnes & Noble'";	}
		if($chkFollett == "y") {	$sql .= " AND tblBusinessCustomer.Chain = 'eFollett'";	}
		if($chkChapters == "y") {	$sql .= " AND tblBusinessCustomer.Chain = 'Chapters'";	}
		if($chkIndigo == "y") {	$sql .= " AND tblBusinessCustomer.Chain = 'Indigo Books'";	}
		if($chkIndependents == "y"){	$sql .= " AND tblBusinessCustomer.Chain = ''";	}
		if($chkUS == "y"){	$sql .= " AND tblBusinessCustomer.Country = 'US'";	}
		if($chkCanada == "y") {	$sql .= " AND tblBusinessCustomer.Country = 'CA'";	}
		if($chkState == "y"){	$sql .= " AND tblBusinessCustomer.State = '$State'";	}
		if($chkAll == "y") {	$sql .= "";	}


		$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			$BusinessCustomerID = $row[BusinessCustomerID];
			
			$M = date("m");
			$D = date("d");
			$Y = date("Y");			
			$PromotionCodeID = $BusinessCustomerID .$Y .$M .$D;
		
		
			$sql3 = "SELECT * FROM tblPromotionCode WHERE PromotionCodeID = '$PromotionCodeID'";
			$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
			$NumPromos = mysql_num_rows($result3);
			
			if($NumPromos > 0)
			
			{
			
			echo "<br>DUPLICATE REBATE ENTRY FOR #" .$BusinessCustomerID ." - GO TO REBATE/PROMO EDIT PAGE<br>"; }
			
			 
			else
			{
			
			//echo "<br>INSERTING NOW<br>";
			
			
			$sql2 = "INSERT INTO tblPromotionCode(BusinessCustomerID, PromotionID, PromotionCodeID, StartDate, EndDate, DateCreated, Status) 
			VALUES('$BusinessCustomerID', 'rebate', '$PromotionCodeID', '$StartDate', '$EndDate', '$Now', 'active');"; 
			echo "<br>Successful for " .$BusinessCustomerID .".";
			mysql_query($sql2) or die("Cannot Insert Rebate, try again!");
			
			}#end else for $Num
		}
	
			
			
			
			
		}#end if for "Add" button

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Create
      Rebates for Multiple Stores </strong></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">Start Date 
    <input name="StartDate" type="text" id="StartDate">
    </font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">End Date 
    <input name="EndDate" type="text" id="EndDate">
  </font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Only Check ONE box: </font></p>
  <blockquote>
    <p><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkBorders" type="checkbox" id="chkBorders" value="y">
      All Borders</font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkBN" type="checkbox" id="chkBN" value="y">
    All B&amp;N</font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkFollett" type="checkbox" id="chkFollett" value="y">
All Follett</font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkChapters" type="checkbox" id="chkChapters" value="y">
    All Chapters </font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkIndigo" type="checkbox" id="chkIndigo" value="y">
    All Indigo </font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkIndependents" type="checkbox" id="chkIndependents" value="y">
    All Independents </font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkUS" type="checkbox" id="chkUS" value="y">
    All U.S.</font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkCanada" type="checkbox" id="chkCanada" value="y">
    All Canada</font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkState" type="checkbox" id="chkState" value="y">
      Only in this state: 
      <select name="State" class="text" id="State">
        <option value = "" selected>Please Select</option>
        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblState
								WHERE Active = 'y'
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
        <option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>>
        <? echo $row[Name];?></option>
        <?
	  }
	  ?>
      </select>
      </font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="chkAll" type="checkbox" id="chkAll" value="y">
    All Stores</font></p>
  </blockquote>
  <p>
    <input name="Add" type="submit" id="Add" value="Create Rebates">
  </p>
</form>
<p>&nbsp;</p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../include/footerlinks.php";



// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>