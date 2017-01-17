<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>



<?


	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

$sql = "Select * FROM tblInternshipLocation WHERE NumPositions <> '0'";


	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	

?>
<?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Available 
  Internships </font></strong></p>
<p align="left"><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><strong>Read 
  Below BEFORE Sending Your Resume</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">For more information 
  about the internships available, <a href="<? echo $http;?>interns/description.php">click 
  here</a>.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">If you would 
  like to speak with the Internship Coordinator, contact <a href="<? echo $http;?>interns/contactus.php">Christina 
  Dilly</a>.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">When sending 
  your resume, it is <strong>required</strong> that you include the Application 
  Location Code (found in the table above) so that your resume can be processed 
  accurately.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Only one internship 
  slot is available per Application Location Code. Note that some universities 
  share an Application Location Code and therefore only one student will be selected 
  from those universities.</font></p>
<hr>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>We 
  have internships available in the following areas:</strong></font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="25%" bgcolor="#FFFFCC"> 
      <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Send 
        Your Resume Now</strong></font></div></td>
    <td width="35%" height="29" bgcolor="#FFFFCC"> 
      <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="/interns/cities.php?sort=tblInternshipLocation.LocationName&d=<? if ($sortBy=="tblInternshipLocation.LocationName") {echo $sd;} else {echo "ASC";}?>">School 
        Name</a></font></strong></font></div></td>
    <td width="35%" bgcolor="#FFFFCC"> 
      <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">City, 
        State</font></strong></font></div></td>
    <td width="15%" bgcolor="#FFFFCC"> 
      <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Application 
        Location Code</strong></font></div></td>
  </tr>

        <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$LocID = $row[LocationID];
				$LocationName = $row[LocationName];
				$City = $row[City];
				$State = $row[State];
											
			  ?>
  <tr> 
    <td width="25%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:jobs@silenttimer.com?subject=Internship Resume for loc=<? echo $LocID; ?>">Send 
        Resume for this Location</a></font></div></td>
    <td width="35%" height="29"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $LocationName; ?></strong></font></div></td>
    <td width="35%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $City; ?></strong></font>, 
        <font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $State; ?></strong></font> 
      </div></td>
    <td width="15%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $LocID; ?></strong></font></div></td>
  </tr>
  

  
      <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  
</table>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
