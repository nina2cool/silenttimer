<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");			
	
	$Now = date("Y-m-d H:i:s");

	

?>
<p><strong><font size="5" face="Arial, Helvetica, sans-serif">Find Your Order 
  Number</font></strong></p>
<form name="form1" method="post" action="viewordernumber.php">

<?

		// Customer Table
		$FirstName = $_POST['txtFirstName'];
		$LastName = $_POST['txtLastName'];
		$ZipCode = $_POST['txtZipCode'];
		$Email = $_POST['txtEmail'];
	
		
		//check to see if customer already exists... if they don't add them..if they do, grab their CustomerID to use.
			$sql = "SELECT * FROM tblCustomer WHERE FirstName='$FirstName' AND LastName = '$LastName' AND ZipCode = '$ZipCode' AND Email = '$Email'";
			$result = mysql_query($sql) or die("Cannot execute query");
						
			while($row = mysql_fetch_array($result))
			{
				$cID = $row[CustomerID];

			}


?>
  <table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">First Name</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="FirstName" type="text" id="FirstName">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Last Name</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="LastName" type="text" id="LastName">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Email Address</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="Email" type="text" id="Email">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Zip Code</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="ZipCode" type="text" id="ZipCode">
        </font></td>
    </tr>
  </table>
  <p> 
    <input type="submit" name="Submit" value="Submit">
    <input type="reset" name="Submit2" value="Reset">

  </p>
</form>
<p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
