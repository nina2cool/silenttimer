<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

$PageTitle = "Add an Entry to Your Customer Contact Log";

//security check
If (session_is_registered('e'))
{

	// has database username and password, so don't need to put it in the page.
	require "include/dbinfo.php";
	
	$EmployeeID= $_SESSION['e'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$BusinessCustomerID = $_GET['c'];

	$sql = "SELECT tblBusinessCustomer.BusinessCustomerID, BusinessName, ContactName, OfficePhone1
			FROM tblBusinessCustomer INNER JOIN tblEmployeeCustomer 
			ON tblBusinessCustomer.BusinessCustomerID = tblEmployeeCustomer.BusinessCustomerID 
			WHERE EmployeeID = '$EmployeeID'";
		
		
		$Now = date("Y-m-d H:i:s");
	
	if ($_POST['NewEntry'] == "Add")
	{
		$ContactType = $_POST['ContactType'];
		$Log = $_POST['Log'];
		$Notes = $_POST['txtNotes'];
		$BusinessCustomerID = $row[BusinessCustomerID];
		$BusinessName = $row[BusinessName];
		$ContactName = $row[ContactName];
		
		
		$sql = "INSERT INTO tblBusinessContactLog(BusinessCustomerID, BusinessName, ContactName, DateTime, LogEntry, Notes) 
				VALUES ('$BusinessCustomerID', '$EmployeeID', '$BusinessName', '$ContactName', '$Now', '$LogEntry', '$Notes');";
		mysql_query($sql) or die("Cannot Insert New Log, try again!");

		$sql = "SELECT BusinessCustomerID from tblBusinessCustomer WHERE BusinessName = '$BusinessName' and ZipCode = '$ZipCode' and OfficePhone1 = '$OfficePhone1';";
		
		$result = mysql_query($sql) or die("Cannot execute query!");
				
				while($row = mysql_fetch_array($result))
				{
					$bcID = $row[BusinessCustomerID];
				}
		

		
	
		
	}
?>


<title></title>
<link href="../mgt/todo/style.css" rel="stylesheet" type="text/css">
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
    an Entry to Your Contact Log</strong></font></p>
  <p align="right"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="customers.php">Back 
    to Customer List</a></font></p>
  <table width="95%" border="0" cellspacing="0" cellpadding="10">
    <tr>
      <td>
<table width="100%" border="1" cellspacing="0" cellpadding="7">
          <tr>
            <td> 
              <form action="" method="post" name="frmCreate" id="frmCreate">
                <p><font size="2" face="Arial, Helvetica, sans-serif">Contact 
                  Type<br>
                  <select name="ContactType" size="1" id="ContactType">
                    <option value="Telephone">Telephone</option>
                    <option value="Email">Email</option>
                    <option value="In Person">In Person</option>
                    <option value="Fax">Fax</option>
                  </select>
                  </font></p>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Log Entry<br>
                  <textarea name="Log" cols="100%" rows="10" id="Log"></textarea>
                  </font> </p>
                <p>&nbsp;</p>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Notes:<br>
                  <textarea name="txtNotes" cols="100%" rows="5" id="txtNotes"></textarea>
                  </font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
                  </font></p>
                <p> 
                  <input name="NewEntry" type="submit" id="NewEntry" value="Add">
                </p>
              </form>
              
            </td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p><font size="3" face="Arial, Helvetica, sans-serif"></font></p>
</div>
<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

	//close connection to database
	mysql_close($link);
		
// finishes security for page
}
else
{
	$http .= "employee";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>