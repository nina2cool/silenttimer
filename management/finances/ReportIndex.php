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
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bill
Reports </strong></font>
<form name="form" method="post" action="Report.php">

  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td>      <input name="DateButton" type="checkbox" id="DateButton" value="y"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <SCRIPT LANGUAGE="JavaScript">
				var now = new Date();
				var calendar = new CalendarPopup("calendarDiv");
			  </SCRIPT>
        <select name="MonthBox" tabindex="14" id="MonthBox">
          <? $month = date("m"); ?>
          <option value = "" selected>Month</option>
          <option value="01" <? if($TestMonth == "01"){echo "selected";}?>>January</option>
          <option value="02" <? if($TestMonth == "02"){echo "selected";}?>>February</option>
          <option value="03" <? if($TestMonth == "03"){echo "selected";}?>>March</option>
          <option value="04" <? if($TestMonth == "04"){echo "selected";}?>>April</option>
          <option value="05" <? if($TestMonth == "05"){echo "selected";}?>>May</option>
          <option value="06" <? if($TestMonth == "06"){echo "selected";}?>>June</option>
          <option value="07" <? if($TestMonth == "07"){echo "selected";}?>>July</option>
          <option value="08" <? if($TestMonth == "08"){echo "selected";}?>>August</option>
          <option value="09" <? if($TestMonth == "09"){echo "selected";}?>>September</option>
          <option value="10" <? if($TestMonth == "10"){echo "selected";}?>>October</option>
          <option value="11" <? if($TestMonth == "11"){echo "selected";}?>>November</option>
          <option value="12" <? if($TestMonth == "12"){echo "selected";}?>>December</option>
        </select>
        <select name="YearBox" tabindex="14" id="YearBox">
          <? $Year = date("Y"); ?>
          <option value = "">Year</option>
          <option value="2003" <? if($Year == "2003"){echo "selected";}?>>2003</option>
          <option value="2004" <? if($Year == "2004"){echo "selected";}?>>2004</option>
          <option value="2005" selected <? if($Year == "2005"){echo "selected";}?>>2005</option>
          <option value="2006" <? if($Year == "2006"){echo "selected";}?>>2006</option>
        </select>
        </font><font size="2" face="Arial, Helvetica, sans-serif">
        <SCRIPT LANGUAGE="JavaScript">
				var now = new Date();
				var calendar = new CalendarPopup("calendarDiv");
			  </SCRIPT>
      </font></td>
    </tr>
    <tr>
      <td><p>          <input name="DateRange" type="checkbox" id="DateRange" value="y">
</p></td>
      <td><p><font size="2" face="Arial, Helvetica, sans-serif">Start Date
          <input name="StartDate" type="text" id="StartDate" value="2005-01-01">
</font><font size="2" face="Arial, Helvetica, sans-serif">End Date 
          <input name="EndDate" type="text" id="EndDate" value="2005-12-31"> 
      </font>          </p>
      </td>
    </tr>
    <tr>
      <td><input name="CompanyCheck" type="checkbox" id="CompanyCheck" value="y"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Company" tabindex="" id="Company" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblBillCompany ORDER BY Name";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
					$Person = $row3[Person];
				?>
          <option value="<? echo $row3[CompanyID]; ?>"><? echo $row3[Name]; ?> <? if ($Person <> ""){?>(<? echo $row3[Person]; ?>)<? } ?></option>
          <?
					}
				?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><input name="radioDate" type="radio" value="DatePaid"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Date Paid </font></td>
    </tr>
    <tr>
      <td><input name="radioDate" type="radio" value="DueDate" checked></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Due Date </font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input name="Create" type="submit" id="Create" value="Create">
</p>
</form>
  
  <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>