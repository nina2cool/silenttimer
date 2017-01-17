<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Contact Us";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
		$result = mysql_query($sql) or die("Cannot execute query");

		while($row = mysql_fetch_array($result))
		
		{
				$TollPhone = $row[CellPhone];
				$Phone = $row[HomePhone];
				$Address = $row[Address];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Email = $row[Email];
		}
		
		mysql_close($link);

?>
			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Contact 
              Us</font></strong></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Feel free
    to contact us with any questions you might have. Email is easiest, and we
    will reply to you quickly. If you have any suggestions,
  please let us know.</font></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Call us anytime,
or email <a href="mailto:partner@silenttimer.com?subject=Partner%20Site%20Suggestions">partner@silenttimer.com</a>.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Contact
      Names<br>
  </strong>Erik McMillan<br>
  Christina McMillan</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Phone<br>
</strong><font size="3"><font size="2"><?php echo $Phone; ?></font></font></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong><br>
  Silent Technology LLC<br>
  Partner Program<br>
  <?php echo $Address; ?></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?></font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>