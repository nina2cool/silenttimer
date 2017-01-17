<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$Now = date("Y-m-d");
	
	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		$CustomerID = $_POST['CustomerID'];
		$ProductID = $_POST['ProductID'];
		$Subtotal = $_POST['Subtotal'];
		$Valid = $_POST['Valid'];
		$Return = $_POST['Return'];
		$Type = $_POST['Type'];
		$Status = $_POST['Status'];
		
		$sql3 = "INSERT INTO tblFriendSale(CustomerID, ProductID, Subtotal, Valid, Returned, Type, Status)
		VALUES('$CustomerID', '$ProductID', '$Subtotal', '$Valid', '$Return', '$Type', '$Status');";
		mysql_query($sql3) or die("Cannot insert Friend Sale information");
				
		$goto = "FriendSales.php";
		header("location: $goto");
	}

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
Sales Credit</strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Customer ID (<a href="../Search.php" target="_blank">look
          up before entering</a>)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="CustomerID" type="text" id="CustomerID" size="5" maxlength="4">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Date entered (only
          for mail-in rebates, not web or phone orders)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Date" type="text" id="Date" value="<? echo $Now; ?>" size="12">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Product</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="ProductID" class="text" id="ProductID">
          <option value = "" selected>Please Select</option>
          <?  
						$sql = "SELECT *
								FROM tblProductNew
								ORDER BY Nickname";
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[ProductID];?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Subtotal</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="Subtotal" type="text" id="Subtotal" size="10">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Valid?</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Valid" id="Valid">
          <option value="y" selected>yes</option>
          <option value="n">no</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Return?</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Return" id="Return">
          <option value="y">yes</option>
          <option value="n" selected>no</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Type" id="Type">
          <option value="web">web</option>
          <option value="rebate" selected>rebate</option>
          <option value="phone">phone</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status" id="Status">
          <option value="active" selected>active</option>
          <option value="inactive">inactive</option>
        </select>
      </font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input name="Add" type="submit" id="Add" value="Add">
  </p>
</form>
<p><br>
</p>
<p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
