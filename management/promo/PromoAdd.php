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


	#connection to database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$Now = date("Y-m-d");
	
	if ($_POST['Add'] == "Add")
	{		
		# get information from previous screen...
		$PromotionCodeID = $_POST['PromotionCodeID'];
		$PromotionID = $_POST['PromotionID'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		$Amount = $_POST['Amount'];
		$AffiliateID = $_POST['AffiliateID'];
		
		# INSERT everything into tblCategory
		$sql = "INSERT INTO tblPromotionCode(PromotionCodeID, PromotionID, StartDate, EndDate, Amount, AffiliateID, Status, DateCreated) 
				VALUES ('$PromotionCodeID', '$PromotionID', '$StartDate', '$EndDate', '$Amount', '$AffiliateID', 'active', '$Now')";
		mysql_query($sql) or die("Cannot Insert New Promo Code, try again!");
	
		header("location: index.php");
	}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

?>


<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
    a Promotion Code </strong></font></p>
  <form action="" method="post" enctype="multipart/form-data" name="form1">
    <table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Promotion
              Code 
              ID </font></strong></td>
        <td><input name="PromotionCodeID" type="text" id="PromotionCodeID" value="<? echo $PromotionCodeID; ?>"> 
        </td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">PromotionID</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="PromotionID" class="text" id="PromotionID">
            <option value = "" selected>Please Select</option>
            <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblPromotion
								
								ORDER BY PromotionID";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
            <option value="<? echo $row[PromotionID];?>" <? if($row[PromotionID] == $PromotionID){echo "selected";}?>><? echo $row[PromotionID];?></option>
            <?
						}
					?>
          </select>
      usually &quot;percent&quot; or &quot;affiliate&quot; </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Affiliate
              ID </font></strong></td>
        <td><input name="AffiliateID" type="text" id="AffiliateID"></td>
      </tr>
      <tr>
        <td width="15%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Start
              Date </font></strong></td>
        <td width="85%"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="StartDate" type="text" id="BreedName3" size="15"> 
          0000-00-00</font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">End
              Date</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="EndDate" type="text" id="BreedName3" size="15"> 
          0000-00-00
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Amount</font></strong></td>
        <td><input name="Amount" type="text" id="Amount" value="0">
            <font size="2" face="Arial, Helvetica, sans-serif">use decimals for
            percents </font></td>
      </tr>
    </table>
    <p align="left">
      <input name="Add" type="submit" id="Add3" value="Add">
      <input type="reset" name="Reset" value="Reset">
    </p>
  </form>
  <p align="left">&nbsp;</p>
</div>



 <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
