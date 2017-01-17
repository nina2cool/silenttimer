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

# set up link to DB

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];



	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


  
	$sql7 = "SELECT * FROM tblPrepClass";

					//sort results.....
				if ($sortBy != "")
				{
				$sql7 .= " ORDER BY $sortBy $sortDirection";
				}
				
				else
				{
				$sql7 .= " ORDER BY tblPrepClass.Name ASC";
				$sortBy ="tblPrepClass.Name";
				$sortDirection = "ASC";
				}
	
	
		$result7 = mysql_query($sql7) or die("Cannot execute query Prep Class!");
	
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Prep
Class Options </strong></font></p>
<table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">


  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Prep
          Class </font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Status</font></div></td>
  </tr>

  
  <?

			
					
					
					while($row7 = mysql_fetch_array($result7))
					{
						$PrepClass = $row7[Name];
						$Status = $row7[Status];
						
						
					
					
  
  ?>
    <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PrepClass; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?></font></td>
  </tr>
  <?
  }

  ?>
  
</table>
<p>&nbsp;</p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><a href="javascript:window.close();">Close 
  this Window</a></font></p>


<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);


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