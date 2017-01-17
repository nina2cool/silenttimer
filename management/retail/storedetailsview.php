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
?>

<?
	
		//grab variables to get purchase info from DB.
	$RetailID = $_GET['retailID'];
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select * FROM tblRetailStore where RetailStoreID = '$RetailID'";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");


	while($row = mysql_fetch_array($result))
	{
				$StoreName = $row[Name];
				$ChainName = $row[Chain];
				$RetailType = $row[RetailType];
				$IncNumber = $row[IncNumber];
				$BNCBNumber = $row[BNCBNumber];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Country = $row[Country];
				$Phone1 = $row[Phone1];
				$Phone2 = $row[Phone2];
				$Fax1 = $row[Fax1];
				$Fax2 = $row[Fax2];
				$Email1 = $row[Email1];
				$Email2 = $row[Email2];
				$Website = $row[Website];
				$Directors = $row[Director];
				$Managers = $row[Manager];
				$TradeSupervisors = $row[TradeSupervisor];
				$Notes = $row[Notes];
				$Status = $row[Status];
				$Phone = $row[Phone1];
	}

?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $StoreName; ?></strong></font> 
<form>
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Retail 
        ID</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $RetailID; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Retail 
        Type</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $RetailType; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"> 
        <p align="left"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Store 
          Name</font></strong></font></p></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $StoreName; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Inc 
        Number</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $IncNumber; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Chain 
        Name</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ChainName; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">BNCB 
        Number</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BNCBNumber; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Address 
        1</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Address 
        2</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address2; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"> 
        <p align="left"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">City</font></strong></font></p></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">State</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Zip 
        Code</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Country</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"> 
        <p align="left"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone 
          1</font></strong></font></p></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Phone 
        2</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone2; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Fax 
        1</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Fax1; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Fax 
        2</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Fax2; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Email 
        1</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Email1; ?></font></strong></td>
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Email 
        2</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Email2; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Website</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Website; ?></font></strong></td>
      <td width="20%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"> 
        <p align="left"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Directors</font></strong></font></p></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Directors; ?></font></strong></td>
      <td width="20%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Managers</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Managers; ?></font></strong></td>
      <td width="20%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Trade 
        Supervisors</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TradeSupervisors; ?></font></strong></td>
      <td width="20%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Notes; ?></font></strong></td>
      <td width="20%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
    </tr>
    <tr> 
      <td width="20%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Status; ?></font></strong></td>
      <td width="20%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  </form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
