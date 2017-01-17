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

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

	
	if ($_POST['Add'] == "Add")
	{
		$ProductName = $_POST['ProductName'];
		$Description = $_POST['Description'];
		$Cost = $_POST['Cost'];
		$Price = $_POST['Price'];
		$NumInStock = $_POST['NumInStock'];
		$WebInventory = $_POST['WebInventory'];
		$ReOrderPoint = $_POST['ReOrderPoint'];
		$Weight = $_POST['Weight'];
		$ISBN = $_POST['ISBN'];
		$CategoryID = $_POST['Category'];
		$FreeShip = $_POST['FreeShip'];
		$Ship = $_POST['Ship'];
		$Status = $_POST['Status'];
		$ImageID = $_POST['ImageID'];
					
		
		$sql = "INSERT INTO tblProduct(ProductName, Description, Cost, Price, NumInStock, WebInventory, ReOrderPoint, Weight, ISBN, CategoryID, FreeShipping, Ship, Status, ImageID) 
				VALUES ('$ProductName', '$Description', '$Cost', '$Price', '$NumInStock', '$WebInventory', '$ReOrderPoint', '$Weight', '$ISBN', '$CategoryID', '$FreeShip', '$Ship', '$Status', '$ImageID');";
		mysql_query($sql) or die("Cannot Insert New Product, try again!");


		$goto = "ProductView.php";
		header("location: $goto");

	}
?>


<title></title>
<link href="../mgt/todo/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
    a Product</strong></font></p>
  <form action="" method="post" name="frmCreate" id="frmCreate">
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399" bgcolor="#FFFFCC">
      <tr> 
        <td><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>New Product 
          Information</strong></font></td>
      </tr>
    </table>
    <br>
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="25%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Product
                Name&nbsp;</strong></font></div></td>
        <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input name="ProductName" type="text" id="ProductName" size="40" maxlength="50">
        </strong></font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Description &nbsp;</strong></font></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <textarea name="Description" cols="60" rows="5" id="Description"></textarea>
        </strong></font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>ISBN</strong></font></div></td>
        <td><input name="ISBN" type="text" id="ISBN"></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost&nbsp;</strong></font></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> $
                <input name="Cost" type="text" id="Cost" size="30" maxlength="30">
        </strong></font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Price&nbsp;</strong></font></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> $
                <input name="Price" type="text" id="Price" size="38" maxlength="100">
        </strong></font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Number
                In Stock&nbsp;</strong></font></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input name="NumInStock" type="text" id="NumInStock" size="40" maxlength="150">
        </strong></font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Category</strong></font></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="Category" class="text" id="Category">
            <option value = "" selected>Please Select</option>
            <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT CategoryID, Name
								FROM tblCategory
								WHERE Status = 'active'
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
            <option value="<? echo $row[CategoryID];?>" <? if($row[CategoryID] == $Category){echo "selected";}?>><? echo $row[Name];?></option>
            <?
						}
					?>
          </select>
        </font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Image
              ID </strong></font></div></td>
        <td><input name="ImageID" type="text" id="ImageID"></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Weight
                (lbs) </strong></font></div></td>
        <td><input name="Weight" type="text" id="Weight"></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Free
                Shipping? (y/n)</strong></font></div></td>
        <td><input name="FreeShip" type="text" id="FreeShip" size="1" maxlength="5"></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
                Needed (y/n) </strong></font></div></td>
        <td><input name="Ship" type="text" id="Ship" size="1" maxlength="5"></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Web
                Inventory</strong></font></div></td>
        <td><input name="WebInventory" type="text" id="WebInventory" size="40" maxlength="150"></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Re-Order
                Point&nbsp;</strong></font></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input name="ReOrderPoint" type="text" id="txtReOrderPoint2" size="40" maxlength="150">
        </strong></font></td>
      </tr>
      <tr>
        <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font></div></td>
        <td><input name="Status" type="text" id="Status" value="active"></td>
      </tr>
    </table>
    <p align="left"> 
      <input name="Add" type="submit" id="Add" value="Add">
      <input type="reset" name="Reset" value="Reset">
    </p>
  </form>
  <p align="left">&nbsp;</p>
  <p><font size="3" face="Arial, Helvetica, sans-serif"></font></p>
</div>
<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder

require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
</font> 
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<font face="Arial"> 
<?
}
?>
</font>