<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



// -- code to take updates, and enter them into the table. ---------------------------------->
if($_POST['Submit'] == "Update")
{
	$DateID = $_POST['DateID'];
	$aID = $_POST['aID'];
	$Date = $_POST['DateYear'] . "-" . $_POST['DateMonth'] . "-" . $_POST['DateDay'];

	# Make updates to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "UPDATE tblAffOfficeDeadlines 
			SET Date = '$Date'
			WHERE AffiliateID = '$aID' AND Date = '$DateID'";
	#echo "$sql <p>";
			
	mysql_query($sql) or die("Cannot insert deadline, please try again.");
	header("location: deadlines.php");

}

// if canceled......
if($_POST['Submit3'] == "Cancel")
{
	header("location: deadlines.php");
}

// ---------------------------------------------------------------------------------------//


// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company & deadline from last page...
	$aID = $_SESSION['a'];
	$date= $_GET['deadline'];
		
	# split date up for form
	$y = substr($date,0,4); // year
	$m = substr($date,5,2); // month
	$d = substr($date,8,2); // day
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td align="left" valign="top"><p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit 
        Deadline</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Change your date, 
        and click &quot;Update&quot; below. To cancel, click &quot;Cancel&quot;.</font></p>
      <form action="" method="post" name="editdate" id="editdate">
        <strong><font size="2" face="Arial, Helvetica, sans-serif">Deadline Date</font></strong> 
        <table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="22%"><select name="DateMonth">
                <option value="01" <? if($m == "01"){echo "selected";}?>>January</option>
                <option value="02" <? if($m == "02"){echo "selected";}?>>February</option>
                <option value="03" <? if($m == "03"){echo "selected";}?>>March</option>
                <option value="04" <? if($m == "04"){echo "selected";}?>>April</option>
                <option value="05" <? if($m == "05"){echo "selected";}?>>May</option>
                <option value="06" <? if($m == "06"){echo "selected";}?>>June</option>
                <option value="07" <? if($m == "07"){echo "selected";}?>>July</option>
                <option value="08" <? if($m == "08"){echo "selected";}?>>August</option>
                <option value="09" <? if($m == "09"){echo "selected";}?>>September</option>
                <option value="10" <? if($m == "10"){echo "selected";}?>>October</option>
                <option value="11" <? if($m == "11"){echo "selected";}?>>November</option>
                <option value="12" <? if($m == "12"){echo "selected";}?>>December</option>
              </select></td>
            <td width="13%"> <select name="DateDay">
                <? 
					  		for($i=1;$i<=31;$i++) // count out days in month...
							{
					  ?>
                <option value="<? echo $i;?>" <? if($d == $i){echo "selected";}?>><? echo $i;?></option>
                <?
					  		}
						
							$year = date("Y");
					  ?>
              </select></td>
            <td width="65%"> <select name="DateYear">
                <option value="<? echo $year;?>" <? if($y == $year){echo "selected";}?>><? echo $year;?></option>
                <option value="<? echo ($year+1);?>" <? if($y == ($year+1)){echo "selected";}?>><? echo ($year+1);?></option>
              </select> </td>
          </tr>
        </table>
        <p><br>
        </p>
        <table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            
			<input name="aID" type="hidden" value="<? echo $aID;?>">
			<input name="DateID" type="hidden" value="<? echo $date;?>">
			<td width="25%"><input type="submit" name="Submit" value="Update"> &nbsp;&nbsp; 
              <input type="reset" name="Submit2" value="Reset"> </td>
            <td width="75%"><div align="right">
                <input type="submit" name="Submit3" value="Cancel">
              </div></td>
          </tr>
        </table>
      </form>
      
    </td>
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p> 
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
	$http .= "tpr";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
</p>
