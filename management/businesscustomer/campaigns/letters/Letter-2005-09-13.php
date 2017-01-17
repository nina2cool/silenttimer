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
	//$CustomerID = $_GET['cust'];


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
				

				
				
	$sql = "SELECT * FROM tblBusinessCustomer WHERE State = '$State' AND CustomerType = 'Bookstore' AND NewBNStore = 'y' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			
			
			?><title>New B&N Letter</title> 
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
	

	
	if($State == "ZZ")
	{
		$State = $StateOther;
	}





	$Now = date("F d, Y");
		

	
?><title>B&amp;N New Store Letter</title>

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
<p><font size="3" face="Times New Roman, Times, serif"><br>
<? echo $Now; ?><br>
</font></p>
<p><font size="3" face="Times New Roman, Times, serif">  Trade Book
            Manager <br>
    <? echo $Chain; ?> - <? echo $Name; ?><br>
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
      </font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
      <?
	  }
	  else
	  {
	  ?>
	              
    <? echo $Address; ?><br>
                  </font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
                                </font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address3; ?><br>
          <?
	  }
	  ?>
          <? echo $City; ?>, <? echo $State; ?></font> <? echo $ZipCode; ?></font> <font size="3" face="Times New Roman, Times, serif"><br>
          <br>
          <br>
          </font>
</p>
<p><font size="3" face="Times New Roman, Times, serif"> Dear Trade Book Manager:</font></p>
<p> <font size="3" face="Times New Roman, Times, serif"> I
  would like to welcome you to our network of college stores! By now, you should
  have already received your first shipment of The Silent Timer&trade; (ISBN#
  0-9753503-0-7). This package contains the following materials/information to
help you maximize Timer sales in your bookstore:</font></p>
<ol>
  <li><font size="3" face="Times New Roman, Times, serif"><strong> A list of important test dates</strong> to give you a better idea
      of when you might expect to experience higher demand for our product</font></li>
  <li><font size="3" face="Times New Roman, Times, serif"><strong> Marketing/sales</strong> information for increasing sales</font></li>
  <li><font size="3" face="Times New Roman, Times, serif"><strong> Clip Strips </strong> for hanging products</font></li>
</ol>
<p><font size="3" face="Times New Roman, Times, serif"> Please note that The
    Silent Timer&trade; is
    not a book; it is a digital testing timer that helps improve pacing on standardized
    tests such as the LSAT, SAT, etc. Therefore, it should be stocked in the
  Test Prep Section along with the study aids for the various exams.</font></p>
<p><font size="3" face="Times New Roman, Times, serif">We have placed your store
    on our Retail Store list on our website at www.SilentTimer.com. Students
    come to our site looking for stores near them, so this helps drive sales
    into your store. Let us know if you prefer your store not be listed.</font></p>
<p><font size="3" face="Times New Roman, Times, serif">If you have not received
    your shipment yet, contact NACSCORP.</font></p>
<p><font size="3" face="Times New Roman, Times, serif"> If you have any questions, please feel free to call me at 800-552-0325. I
  look forward to working with you to keep your sales high and your students
  happy.<br>
  </font></p>
<p><font size="3" face="Times New Roman, Times, serif">Sincerely,<br>
  <br>
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
</p> 
for
Silent Technology LLC 
<?
}
?>


<DIV CLASS="PAGEBREAK"></DIV>

  <?
  
  	}#end of businesscustomer
  
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