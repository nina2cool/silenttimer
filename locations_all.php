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
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="Top"></a>Listing
      of All Retail Locations</strong></font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Here is a list
          of stores that carry The Silent Timer&#8482;. Instead of ordering online,
          get your timer today from any of the following bookstores. AND, if
          a store doesn't have it in stock, they can order it for you!</font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><img src="images/rebate-green.jpg" alt="Rebate Available!" width="27" height="27" border="0"></font><font size="2" face="Arial, Helvetica, sans-serif"> means
            a mail-in rebate is available for this location.</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">This list is organized
            alphabetically by State, then by City. </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Click on the store
            name to view more information about the store.</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">You may want to
            call first to check their inventory.</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">See our <a href="timer/faq2.php?cat=13" target="_blank">Retail
              Store FAQ</a> if you have questions about the retail stores. </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please
              note that these stores only stock The Silent Timer&#8482;, not
              the watch.</strong></font></li>
      </ul>      
      <DIV></DIV>      
    </td>
    <td><div align="center">
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="location_search.php#Map"><img src="images/usmap4_small.jpg" alt="View US Map" width="180" height="121" border="0"><br>
  View US Map</a></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="location_search.php#Canada">Search
            by Canadian Province</a></font></p>
    </div></td>
  </tr>
</table>
<form name="form2" method="post" action="">
  <table width="50%"  border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="8%">&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Jump to
            a State: </strong></font></td>
      <td><select name="JumpState" id="JumpState" onChange="MM_jumpMenu('parent',this,0)">
          <option value="" selected>-SELECT A STATE-</option>
          <? 
					$sql3 = "SELECT * FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType = 'Bookstore' GROUP BY State ORDER BY State";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="http://www.silenttimer.com/locations_all.php#<? echo $row3[State]; ?>"><? echo $row3[State]; ?></option>
          <?
					}
				?>
        </select>
      </td>
    </tr>
  </table>
</form>
<script>
	function lockButton(buttonValue)
	{
		if (buttonValue == "Search by Zip Code")
		{
			document.form3.Search.value = "Searching...";
			return true;
			//alert(document.form3.Search.value);
		}
		else
		{
			alert ("Searching...");
			return false;
		}
	}
</script>
<form name="form3" method="post" action="storelocator-search.php" onSubmit=" return lockButton(document.form3.Search.value);">
  <table width="50%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="8%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><u>OR</u> </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Narrow by
            Zip Code: </font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font>
          <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr bordercolor="#CCCCCC">
              <td><font size="2" face="Arial, Helvetica, sans-serif"> <a name="ZipCode"></a>
                    <input name="radiobutton"  tabindex = "11" type="radio" value="ZipCode" checked>
              </font></td>
              <td><p><font size="2" face="Arial, Helvetica, sans-serif">By U.S.
                    Zip Code
                        <input name="txtZipCode" type="text" id="txtZipCode" tabindex = "1" value="<? echo $Zip; ?>" size="6" maxlength="5">
                </font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">Search
                      Radius:
                        <select name="Radius" id="select2" tabindex = "2">
                          <option value="200">200</option>
                          <option value="100">100</option>
                          <option value="75">75</option>
                          <option value="50">50</option>
                          <option value="25" selected>25</option>
                          <option value="20">20</option>
                          <option value="15">15</option>
                          <option value="10">10</option>
                          <option value="5">5</option>
                        </select>
                        <br>
                </font></p></td>
            </tr>
        </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Search" type="submit" tabindex = "3" id="Search" value="Search by Zip Code"></td>
    </tr>
  </table>
  <p>  
</form>
<p align="left"></p>
<p align="left">
  
</p>
<?

	$sql = "SELECT * FROM tblState WHERE Active = 'y' ORDER BY Name";
	$result = mysql_query($sql) or die("Cannot execute query");
			
			while($row = mysql_fetch_array($result))
			{
			$State = $row[State];
			$StateName = $row[Name];
			
			
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr bgcolor="#99CCFF">
    <td>
	<strong><font size="4" face="Arial, Helvetica, sans-serif"><a name="<? echo $State; ?>" id="<? echo $State; ?>"></a><? echo $StateName; ?></font></strong>
    </td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">^ <a href="#Top">Top</a></font> </div></td>
  </tr>
  <tr>
    <td colspan="2">

	<?
					$sql2 = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status = 'active' AND State = '$State' ORDER BY City, Name";
					$result2 = mysql_query($sql2) or die("Cannot execute query");
					
					$Count = mysql_num_rows($result2);
					
					
					if($Count == 0)
					{
					?>
					<font size="2" face="Arial, Helvetica, sans-serif"><br>
					None at this time.</font>
					<?
					}
					
					
					while($row2 = mysql_fetch_array($result2))
					{
						$Name = $row2[Name];
						$Address = $row2[Address];
						$Address2 = $row2[Address2];
						$Phone1 = $row2[Phone1];
						$Website = $row2[Website];
						$City = $row2[City];
						$State2 = $row2[State];
						$Chain = $row2[Chain];
						
						$BusinessCustomerID = $row2[BusinessCustomerID];
						
						
						
						$Now = date("Y-m-d");
				
				$sql3 = "SELECT * from tblPromotionCode WHERE BusinessCustomerID = '$BusinessCustomerID' AND PromotionID = 'rebate' AND Status = 'active'";
						//echo "<br>sql = " .$sql3;
						$result3 = mysql_query($sql3) or die("Cannot execute query");
						//$Rebate = mysql_num_rows($result3);
						$Rebate = "n";
					
						while($row3 = mysql_fetch_array($result3))
						{
							$StartDate = $row3[StartDate];
							$EndDate = $row3[EndDate];
							$PromotionCodeID = $row3[PromotionCodeID];
						
						if($StartDate <= $Now AND $EndDate >= $Now) { $Rebate = "y"; } else { $Rebate = "n"; }
						
						}

	
	if($Count > '0')
	{
	
	?>
	<p align="left">
    <table width="100%"  border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td>

            <p>
			
			<a href="store_info.php?s=<? echo $BusinessCustomerID; ?>"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? if($Chain <> "") { ?><? echo $Chain; ?> - <? } ?><? echo $Name; ?></strong></font></a><br>
            <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address;?></font><br>
            <? if($Address2 <> "") { ?><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address2;?></font><br><? } ?>
              <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City;?>, <? echo $State2;?></font></p>
            <hr noshade>            
          
	
    <td width="25%" valign="top">
	
	<?
	if($Rebate == 'y')
	{
	?>
	<div align="left"><a href="order/rebate.php?rebate=<? echo $BusinessCustomerID; ?>&z=4&code=<? echo $PromotionCodeID; ?>" target="_blank"><img src="images/rebate-green.jpg" alt="$5 Rebate!" width="50" height="50" border="0"></a>
		    <?
	}
	?>
	    
	</div></td>
    

	</tr>
	  </table>	  
 <?
 }
 }
 ?>

 <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">^ <a href="#Top">Top</a></font> </div></td>
  </tr>
  <?
	
	}
  	 //end of state loop
	 
  ?>

</table>
<p>&nbsp;</p>
<p align="left">&nbsp;</p>

<p align="left">&nbsp;</p>


    
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>