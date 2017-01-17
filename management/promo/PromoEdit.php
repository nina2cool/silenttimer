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

	$PromotionCodeID = $_GET['promo'];
	
	$Now = date("Y-m-d");
	
	if ($_POST['Update'] == "Update")
	{		
		# get information from previous screen...
		$PromotionID = $_POST['PromotionID'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		$Amount = $_POST['Amount'];
		$AffiliateID = $_POST['AffiliateID'];
		
		
		# INSERT everything into tblCategory
		$sql = "UPDATE tblPromotionCode
		SET PromotionID = '$PromotionID',
		StartDate = '$StartDate',
		EndDate = '$EndDate',
		Amount = '$Amount',
		AffiliateID = '$AffiliateID'
		WHERE PromotionCodeID = '$PromotionCodeID'";
		
		$result = mysql_query($sql) or die("Cannot update Promotion, try again!");
	
		header("location: index.php");
	}



		$sql3 = "SELECT * FROM tblPromotionCode WHERE PromotionCodeID = '$PromotionCodeID'";

		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query NoticeID!");
		
		while($row = mysql_fetch_array($result3))
		{
			$PromotionCodeID = $row[PromotionCodeID];
			$PromotionID = $row[PromotionID];
			$StartDate = $row[StartDate];
			$EndDate = $row[EndDate];
			$AffiliateID = $row[AffiliateID];
			$Amount = $row[Amount];
			$DateCreated = $row[DateCreated];
			$Status = $row[Status];
		}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

?>


<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
        Promo Code: <? echo $PromotionCodeID; ?></strong></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Date created: <? echo $DateCreated; ?></font></p>
  <form action="" method="post" enctype="multipart/form-data" name="form1">
    <table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
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
usually &quot;percent&quot; or &quot;affiliate&quot;     </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Affiliate
              ID </font></strong></td>
        <td><input name="AffiliateID" type="text" id="AffiliateID" value="<? echo $AffiliateID; ?>"></td>
      </tr>
      <tr>
        <td width="15%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Start
              Date </font></strong></td>
        <td width="85%"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="StartDate" type="text" id="BreedName3" value="<? echo $StartDate; ?>" size="15">
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">End
              Date</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="EndDate" type="text" id="BreedName3" value="<? echo $EndDate; ?>" size="15">
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Amount</font></strong></td>
        <td><input name="Amount" type="text" id="Amount" value="<? echo $Amount; ?>">
            <font size="2" face="Arial, Helvetica, sans-serif">use decimals for
            percents </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
        <td><input name="Status" type="text" id="Status" value="<? echo $Status; ?>"> 
          <font size="2" face="Arial, Helvetica, sans-serif">use decimals for percents </font></td>
      </tr>
    </table>
    <p align="left">
      <input name="Update" type="submit" id="Add3" value="Update">
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
