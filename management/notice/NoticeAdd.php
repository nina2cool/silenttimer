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


	#connection to database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$Now = date("Y-m-d");
	
	if ($_POST['Add'] == "Add")
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
		$sql = "INSERT INTO tblNotice(Notice, StartDate, EndDate, HomePage, ProductPage, Order2, Status, Priority, ReceiptPage) 
				VALUES ('$Notice', '$StartDate', '$EndDate', '$HomePage', '$ProductPage', '$Order2Page', '$Status', '$Priority', '$ReceiptPage')";
		mysql_query($sql) or die("Cannot Insert New Notice, try again!");
	
		header("location: index.php");
	}


?>


<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
    a Notice</strong></font></p>
  <form action="" method="post" enctype="multipart/form-data" name="form1">
    <table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="15%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Notice
              (in html) </font></strong></td>
        <td width="85%"><font size="2" face="Arial, Helvetica, sans-serif">
          <textarea name="Notice" cols="50" rows="5" id="Notice"></textarea>
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Priority</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="Priority" type="text" id="BreedName3" size="3">
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Start
              Date </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="StartDate" type="text" id="BreedName3" value="<? echo $Now; ?>" size="15">
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">End
              Date</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="EndDate" type="text" id="BreedName3" value="<? echo $Now; ?>" size="15">
        </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Home
              Page? </font></strong></td>
        <td><input name="HomePage" type="text" id="HomePage" value="n" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Product
              Page? </font></strong></td>
        <td><input name="ProductPage" type="text" id="ProductPage" value="n" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Order
              2 Page? </font></strong></td>
        <td><input name="Order2Page" type="text" id="Order2Page" value="n" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Receipt Page? </font></strong></td>
        <td><input name="ReceiptPage" type="text" id="ReceiptPage" value="n" size="3"></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="Status" id="Status">
            <option value="active" selected>active</option>
            <option value="inactive">inactive</option>
          </select>
        </font></td>
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
