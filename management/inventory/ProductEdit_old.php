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

// -------------------------- CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get customer info from DB.
	$pID = $_GET['p'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	  // -------- code to save values from form into tables, etc....
	// test below
		if ($_POST['Submit'] == "Save")
		{
			
		$ProductName = $_POST['ProductName'];
		$Description = $_POST['Description'];
		$Cost = $_POST['Cost'];
		$Price = $_POST['Price'];
		$NumInStock = $_POST['NumInStock'];
		$WebInventory = $_POST['WebInventory'];
		$ReOrderPoint = $_POST['ReOrderPoint'];
		$CategoryID = $_POST['Category'];
		$Weight = $_POST['Weight'];
		$Status = $_POST['Status'];
		$FreeShip = $_POST['FreeShip'];
		$Ship = $_POST['Ship'];
		$ISBN = $_POST['ISBN'];
		$ImageID = $_POST['ImageID'];


		$sql = "UPDATE tblProduct
			SET ProductName = '$ProductName', 
			Description = '$Description', 
			Cost = '$Cost', 
			Price = '$Price', 
			NumInStock = '$NumInStock',
			WebInventory = '$WebInventory',
			ReOrderPoint = '$ReOrderPoint',
			Status = '$Status',
			Weight = '$Weight',
			FreeShipping = '$FreeShip',
			Ship = '$Ship',
			ISBN = '$ISBN',
			CategoryID = '$CategoryID',
			ImageID = '$ImageID'
			WHERE ProductID = '$pID'";

		//echo $sql;
		mysql_query($sql) or die("Cannot update tblProduct");
			
			
		$goto = "ProductView.php";
		header("location: $goto");
			
	}  
// test above

	$sql = "SELECT * FROM tblProduct WHERE ProductID = $pID";
			
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$ProductName = $row[ProductName];
		$Description = $row[Description];
		$Cost = $row[Cost];
		$Price = $row[Price];
		$NumInStock = $row[NumInStock];
		$WebInventory = $row[WebInventory];
		$ReOrderPoint = $row[ReOrderPoint];
		$Category = $row[CategoryID];
		$Weight = $row[Weight];
		$Status = $row[Status];
		$FreeShip = $row[FreeShipping];
		$Ship = $row[Ship];
		$ISBN = $row[ISBN];
		$ImageID = $row[ImageID];
		
	

	
	}
	
?>
<script language="JavaScript" type="text/JavaScript">

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

</script>


			
<div id="Layer1" style="position:absolute; left:6px; top:235px; width:2px; height:11px; z-index:1"></div>
<font size="5" face="Arial, Helvetica, sans-serif"><font color="#000099"><strong>View
 / Edit Product Details</strong></font></font>
<form action="" method="post" name="form" id="form">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>Product 
        Information</strong></font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td width="25%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Product 
          Name&nbsp;</strong></font></div></td>
      <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="ProductName" type="text" id="ProductName" value="<? echo $ProductName; ?>" size="40" maxlength="50">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Description 
          &nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
      <textarea name="Description" cols="60" rows="5" id="Description"><? echo $Description; ?></textarea>
</strong></font></td>
    </tr>
    <tr>
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>ISBN</strong></font></div></td>
      <td><input name="ISBN" type="text" id="ISBN" value="<? echo $ISBN; ?>"></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> $
        <input name="Cost" type="text" id="Cost" value="<? echo number_format($Cost,2); ?>" size="30" maxlength="30">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Price&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> $
        <input name="Price" type="text" id="Price" value="<? echo number_format($Price,2); ?>" size="38" maxlength="100">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Number
          In Stock&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="NumInStock" type="text" id="NumInStock" value="<? echo $NumInStock; ?>" size="40" maxlength="150">
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
      <td><input name="ImageID" type="text" id="ImageID" value="<? echo $ImageID; ?>"></td>
    </tr>
    <tr>
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Weight
            (lbs) </strong></font></div></td>
      <td><input name="Weight" type="text" id="Weight" value="<? echo $Weight; ?>"></td>
    </tr>
    <tr>
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Free
            Shipping? (y/n)</strong></font></div></td>
      <td><input name="FreeShip" type="text" id="FreeShip" value="<? echo $FreeShip; ?>" size="1" maxlength="5"></td>
    </tr>
    <tr>
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
            Needed (y/n) </strong></font></div></td>
      <td><input name="Ship" type="text" id="Ship" value="<? echo $Ship; ?>" size="1" maxlength="5"></td>
    </tr>
    <tr>
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Web 
          Inventory</strong></font></div></td>
      <td><input name="WebInventory" type="text" id="WebInventory" value="<? echo $WebInventory; ?>" size="40" maxlength="150"></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Re-Order
          Point&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="ReOrderPoint" type="text" id="txtReOrderPoint2" value="<? echo $ReOrderPoint; ?>" size="40" maxlength="150">
        </strong></font></td>
    </tr>
    <tr>
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font></div></td>
      <td><input name="Status" type="text" id="Status" value="<? echo $Status; ?>"></td>
    </tr>
  </table>	 
        
  <p align="left"> 
    <input type="submit" name="Submit" value="Save">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit2" value="Reset">
  </p>
  
</form>
 
<? // -------------- END MY CODE -------------------

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// has links that show up at the bottom in it
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