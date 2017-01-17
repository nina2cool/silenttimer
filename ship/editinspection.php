<?


$PageTitle = "Inspection Details";


	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";


	//grab variables to get purchase info and customer info from DB.
	$Serial = $_GET['c'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblInspection WHERE Serial = '$Serial'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$BatchID = $row[OrderShippedID];
		$ProductStatus = $row[ProductStatus];
		$RecipientID = $row[RecipientID];
		$ProductID = $row[ProductID];
		$Notes = $row[Notes];
	}
	
?>

<?  // -------- code to save values from form into tables, etc....
	
	if ($_POST['Update'] == "Update")
	{
		$Lock = $_POST['chkLock'];
		$Notes = $_POST['Notes'];
		
		$BatchID = $_POST['OrderShippedID'];
		$ProductStatus = $_POST['ProductStatus'];
		$RecipientID = $_POST['RecipientID'];
		$ProductID = $_POST['ProductID'];
		$Notes = $_POST['Notes'];
		if ($Lock != "locked")
		{
		
		$sql = "UPDATE tblInspection SET OrderShippedID = '$BatchID', ProductStatus = '$ProductStatus', RecipientID = '$RecipientID', ProductID = '$ProductID', Notes = '$Notes'
		WHERE Serial = '$Serial'";
		
		
		
		mysql_query($sql) or die("Cannot update timer information, please try again.");
		
		
		}	
	
	}
?>

 <p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Inspection 
  Details for Serial #<? echo $Serial; ?></strong></font></p>
<p align="right"><font size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="inspection2.php">Back 
  to Inspection Details</a></font></p>
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Inspection 
              Details </font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"><br>
              </font></strong></font></td>
            <td width="50%"><div align="right"><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="4"> 
                <input name="chkLock" type="checkbox" id="chkLock" value="locked" checked>
                <font color="#FF0000">Locked</font></font></strong></font></div></td>
          </tr>
        </table>
        
      </td>
                </tr>
                <tr> 
                  <td align="left" valign="top"> <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top">
<table width="32%" border="2" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#FFFFCC">
                <tr>
                  <td width="40%"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Serial 
                    Number: </strong></font><strong><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><? echo $Serial; ?></font></strong></td>
                </tr>
              </table>
              <br>
              <table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Batch 
                    ID </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Product 
                    Status </font></td>
                </tr>
                <tr> 
                  <td> <font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="OrderShippedID" type="text" id="OrderShippedID" value="<? echo $BatchID; ?>">
                    </font></td>
                  <td> <font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="ProductStatus" type="text" id="ProductStatus" value="<? echo $ProductStatus; ?>">
                    </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Recipient 
                    ID </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Product 
                    ID </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="RecipientID" type="text" id="RecipientID" value="<? echo $RecipientID; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="ProductID" type="text" id="ProductID" value="<? echo $ProductID; ?>">
                    </font></td>
                </tr>
              </table>
              <p><font size="2" face="Arial, Helvetica, sans-serif">Notes<br>
                <textarea name="Notes" cols="100%" rows="5" id="Notes"><? echo $Notes; ?></textarea>
                </font> </p>
              </td>
          </tr>
        </table>
                    
        <br>
        <p align="left"> 
          <input name="Update" type="submit" id="Update" value="Update">
          &nbsp;&nbsp; 
          <input type="reset" name="Submit2" value="Reset">
          <br>
        </p>
      </td>
                </tr>
              </table>
            <p>&nbsp;</p></form>
<p align="right"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="inspectionreport.php">Back 
  to Inspection Report</a></font></p>
<p align="right"><font size="3"><font color="#003399" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="ninahome.php">Back 
  to Shipping and Timer Tracking Home Page</a></font></font></p>
