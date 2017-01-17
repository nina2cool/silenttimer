<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	//grab variables to get purchase info from DB.
	$State = $_GET['state'];
	$ChainName = $_GET['chain'];
	
	if($ChainName == "TPR") { $ChainName = "Princeton Review"; }

	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql9 = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
	$result9 = mysql_query($sql9) or die("Cannot retrieve company info, please try again.");
	
		while($row9 = mysql_fetch_array($result9))
				{
				$CAddress = $row9['Address'];
				$CAddress2 = $row9['Address2'];
				$CCity = $row9['City'];
				$CState = $row9['State'];
				$CZipCode = $row9['ZipCode'];
				$CPhone = $row9['CellPhone'];
				$CFax = $row9['Fax'];
				$CEmail = $row9['Email'];
				}
				
			
				
	$sql = "SELECT * FROM tblBusinessCustomer WHERE State = '$State' AND Status = 'active' AND CustomerType = 'Test Prep' AND Chain = '$ChainName'";
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			
			?>
			<STYLE>
@media print { DIV.PAGEBREAK {page-break-before: always}}
</STYLE>
<?

			
			
			$Name = $row['Name'];
			$Chain = $row['Chain'];
			$FirstName = $row['ContactFirstName'];
			$LastName = $row['ContactLastName'];
			$Address = $row['Address'];
			$Address2 = $row['Address2'];
			$Address3 = $row['Address3'];
			$City = $row['City'];
			$State = $row['State'];
			$StateOther = $row['StateOther'];
			$ZipCode = $row['ZipCode'];
			$Email = $row['Email'];
			$TypeID = $row['Type'];
			$Phone = $row['Phone'];
			$Email = $row['Email'];
			$CountryID = $row['CountryID'];
			$CheckStore = $row['CheckStore'];
			$zipOne = $row[ZipCode];
	
	
	if($Chain == "Kaplan")
	{
	$Chain = "Kaplan Test Prep";
	}
	
	if($Chain == "Princeton Review")
	{
	$Chain = "The Princeton Review";
	}
	
	
	if($FirstName == '')
	{
	$FirstName = "Director";
	}
	



	$Now = date("F d, Y");
		

	
?><title>Princeton Review Letter</title>

<hr noshade>
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="22%"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../../images/Front_Logo_01.jpg" width="96" height="61"></font></td>
    <td width="39%"><div align="left"><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="2">Silent 
        Technology LLC<br>
        </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CAddress; ?> <?php echo $CAddress2; ?><br>
        <?php echo $CCity; ?>, <?php echo $CState; ?> <?php echo $CZipCode; ?><br>
        Office: <?php echo $CPhone; ?><br>
        Fax: <?php echo $CFax; ?></font></div></td>
    <td width="39%"><font size="6" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
<hr noshade>
<p>&nbsp;</p>
<p><font size="2" face="Times New Roman, Times, serif"><font size="3">Center
      Director <br>
    <? echo $Chain; ?><br>
    <?
	  if($Address2 == '' AND $Address3 == '')
	  {
	  ?>
    <? echo $Address; ?> <br>
    <?
	  }
	  elseif($Address3 == '')
	  {
	  ?>
    <? echo $Address; ?><br>
    </font></font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
    <?
	  }
	  else
	  {
	  ?>
	      
	  <? echo $Address; ?><br>
      </font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
      </font> <? echo $Address3; ?><br>
      <?
	  }
	  ?>
  <? echo $City; ?>, <? echo $State; ?></font> <font size="3" face="Times New Roman, Times, serif"><? echo $ZipCode; ?></font> </p>
<font size="3" face="Times New Roman, Times, serif"><br>
<? echo $Now; ?><br>
<br>
<br>
</font>
<p><font size="3" face="Times New Roman, Times, serif"> Dear Center Director:</font></p>
<p><font size="3" face="Times New Roman, Times, serif"><strong> <font size="4">Remember
        The Silent Timer&trade;?</font></strong> I
  wanted to let you know that we are now in additional Barnes &amp; Noble College
stores near you and your students!</font></p>
<p><font size="3" face="Times New Roman, Times, serif">With the LSAT coming up,
    many students are searching for timers to use on their exam. I am confident
    that The Silent Timer&trade;&rsquo;s pacing features
would be helpful for your students.</font></p>
<p><font size="3" face="Times New Roman, Times, serif">Enclosed is a list of <strong>Barnes &amp; Noble
      College</strong> Stores
  that carry our product. Please post the attached flier in your office to let
your teachers and students know where they can find The Silent Timer&trade;.</font></p>
<p><font size="3" face="Times New Roman, Times, serif">If you have any questions,
    please feel free contact me directly at (512) 340-0338. You can also visit
    our web site at <strong>www.SilentTimer.com</strong> to read
more about the product and all of its features.</font></p>
<p>&nbsp; </p>
<p><font size="3" face="Times New Roman, Times, serif">Sincerely,<br>
    <img width="236" height="54" src="../../images/Dina.jpg"><br>
</font>
  <font size="3" face="Times New Roman, Times, serif">
  <?
if($Address2 == '')
{
?>
  <br>
Dina Kushner<br>
Marketing Director, Silent Technology LLC </font></p>
<font size="3" face="Times New Roman, Times, serif">
<?
}
else
{
?>
<br>
Dina Kushner, Marketing Director
 
for
Silent Technology LLC </p>
<?
}

?>

<DIV CLASS="PAGEBREAK"></DIV>

<?


}#end of business customer loop
  
  
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);


// finishes security for page
}
else
{
?>
</font>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<font size="3" face="Times New Roman, Times, serif">
<?
}
?>
</font>