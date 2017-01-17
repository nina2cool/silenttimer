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

	$NoticeID = $_GET['notice'];
	
	$Now = date("Y-m-d");
	
	if ($_POST['Update'] == "Update")
	{		
		# get information from previous screen...
		$Notice = $_POST['Notice'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		$HomePage = $_POST['HomePage'];
		$ProductPage = $_POST['ProductPage'];
		$Order2Page = $_POST['Order2Page'];
		$Status = $_POST['Status'];
		$Priority = $_POST['Priority'];
		$ReceiptPage = $_POST['ReceiptPage'];
		
		# INSERT everything into tblCategory
		$sql = "UPDATE tblNotice
		SET Notice = '$Notice',
		StartDate = '$StartDate',
		EndDate = '$EndDate',
		HomePage = '$HomePage',
		ProductPage = '$ProductPage',
		Order2 = '$Order2Page',
		Status = '$Status',
		Priority = '$Priority',
		ReceiptPage = '$ReceiptPage'
		WHERE NoticeID = '$NoticeID'";
		
		$result = mysql_query($sql) or die("Cannot update Notice, try again!");
	
		header("location: index.php");
	}



		$sql3 = "SELECT * FROM tblNotice WHERE NoticeID = '$NoticeID'";

		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query NoticeID!");
		
		while($row = mysql_fetch_array($result3))
		{
			$Notice = $row[Notice];
			$StartDate = $row[StartDate];
			$EndDate = $row[EndDate];
			$HomePage = $row[HomePage];
			$ProductPage = $row[ProductPage];
			$Order2Page = $row[Order2];
			$Status = $row[Status];
			$Priority = $row[Priority];
			$ReceiptPage = $row[ReceiptPage];
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
        Notice</strong></font></p>
  <form action="" method="post" enctype="multipart/form-data" name="form1">
    <table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="15%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Notice
              (in html) </font></strong></td>
        <td width="85%"><font size="2" face="Arial, Helvetica, sans-serif">
          <textarea name="Notice" cols="50" rows="5" id="Notice"><? echo $Notice; ?></textarea>
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Priority</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="Priority" type="text" id="BreedName3" value="<? echo $Priority; ?>" size="3">
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Start
              Date </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
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
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Home
              Page? </font></strong></td>
        <td><input name="HomePage" type="text" id="HomePage" value="<? echo $HomePage; ?>" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Product
              Page? </font></strong></td>
        <td><input name="ProductPage" type="text" id="ProductPage" value="<? echo $ProductPage; ?>" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Order
              2 Page? </font></strong></td>
        <td><input name="Order2Page" type="text" id="Order2Page" value="<? echo $Order2Page; ?>" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Receipt Page? </font></strong></td>
        <td><input name="ReceiptPage" type="text" id="ReceiptPage" value="<? echo $ReceiptPage; ?>" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="Status" type="text" id="Status" value="<? echo $Status; ?>" size="10">
</font></td>
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
