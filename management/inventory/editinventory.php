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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?	
	//grab variables to get product info from DB.
	$ProductID = $_GET['p'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	if ($_POST['Submit'] == "Save")
			{
				$ReOrderNew = $_POST['txtReOrderPoint'];
				$NumStock = $_POST['txtNumStock'];
				$RetailPrice = $_POST['txtRetailPrice'];
				$ISBN = $_POST['txtISBN'];
				$Weight = $_POST['Weight'];
				$Description = $_POST['Description'];
				$WebInventory = $_POST['WebInventory'];
				$Status = $_POST['Status'];
				$ImageID = $_POST['ImageID'];
				$CategoryID = $_POST['Category'];
				$ProductName = $_POST['ProductName'];
				$Cost = $_POST['txtCost'];
				$Price = $_POST['txtPrice'];

				
				
				$sql = "UPDATE tblProduct
				SET ReOrderPoint = '$ReOrderNew',
				NumInStock = '$NumStock',
				RetailPrice = '$RetailPrice',
				Cost = '$Cost',
				Price = '$Price',
				Weight = '$Weight',
				WebInventory = '$WebInventory',
				ProductName = '$ProductName',
				ImageID = '$ImageID',
				CategoryID = '$CategoryID',
				Description = '$Description',
				ISBN = '$ISBN',
				Status = '$Status'
				WHERE ProductID = $ProductID";
				mysql_query($sql);
			}
	
	//SQL to get data from product table
	$sql = "SELECT * FROM tblProduct WHERE ProductID = $ProductID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$ProductName = $row[ProductName];
		$Description = $row[Description];
		$cost = $row[Cost];
		$Price = $row[Price];
		$NumStock = $row[NumInStock];
		$ReOrder = $row[ReOrderPoint];
		$RetailPrice = $row[RetailPrice];
		$ISBN = $row[ISBN];
		$Status = $row[Status];
		$Weight = $row[Weight];
		$WebInventory = $row[WebInventory];
		$CatID = $row[CategoryID];
		$ImageID = $row[ImageID];

	}
?>
			<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Edit Product </strong></font></p>
            <form action="" method="post" name="form" id="form">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
                      <tr>
                        <td align="left" valign="top">
						  <table width="100%"  border="1" cellspacing="0" cellpadding="5">
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product Name </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="ProductName" type="text" id="ProductName" value="<? echo $ProductName; ?>">
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                                <textarea name="Description" cols="60" rows="4" id="Description"><? echo $Description; ?></textarea>
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">ISBN</font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="txtISBN" type="text" id="txtISBN" value="<? echo $ISBN; ?>">
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Cost<br>
                              </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                                <input name="txtCost" type="text" id="txtCost" value="<? echo $cost; ?>" size="10">
                              </strong></font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Price (online) <br>
                              </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                                <input name="txtPrice" type="text" id="txtPrice" value="<? echo $Price; ?>" size="10">
                              </strong></font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">In
                                    stock<br>
                              </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                                <input name="txtNumStock" type="text" id="txtNumStock" value="<? echo $NumStock; ?>" size="10">
                              </strong></font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Web Inventory </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="WebInventory" type="text" id="WebInventory" value="<? echo $WebInventory; ?>">
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#003399">ReOrder
                                      Point</font><br>
                              </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                                <input name="txtReOrderPoint" type="text" id="txtReOrderPoint" value="<? echo $ReOrder; ?>" size="14">
                              </strong></font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Retail
                                    Price (in the stores) <br>              
                                    </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="txtRetailPrice" type="text" id="txtRetailPrice" value="<? echo $RetailPrice; ?>">
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Category</font></strong></td>
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
                                  <option value="<? echo $row[CategoryID];?>" <? if($row[CategoryID] == $CatID){echo "selected";}?>><? echo $row[Name];?></option>
                                  <?
						}
					?>
                                </select>
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Image ID </font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="ImageID" type="text" id="ImageID" value="<? echo $ImageID; ?>">
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Weight (pounds)</font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="Weight" type="text" id="Weight" value="<? echo $Weight; ?>">
                              </font></td>
                            </tr>
                            <tr>
                              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="Status" type="text" id="Status" value="<? echo $Status; ?>">
                              </font></td>
                            </tr>
                          </table>
						  <p>&nbsp;</p>
							  <input type="Submit" name="Submit" value="Save">&nbsp;&nbsp; 
							  <input type="reset" name="Submit2" value="Reset">
                    
					    </td>
					  </tr>
			  </table>
            </form>
            
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>