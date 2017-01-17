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


	$BusinessCustomerID = $_GET['s'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
			
		$sql3 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
		$result3 = mysql_query($sql3) or die("Cannot get store info.  Please try again.");
		
								
				while($row3 = mysql_fetch_array($result3))
				{
					
					
					$Name = $row3[Name];
					$Address = $row3[Address];
					$Address2 = $row3[Address2];
					$Address3 = $row3[Address3];
					$City = $row3[City];
					$State = $row3[State];
					$ZipCode = $row3[ZipCode];
					$Country = $row3[Country];
					$Phone = $row3[Phone1];
					$Fax = $row3[Fax1];
					$Website = $row3[Website];
					$Chain = $row3[Chain];
					
					$CallFirst = $row3[CallFirst];
					$LSAT = $row3[LSAT];
					$SAT = $row3[SAT];
					$SpecialOrder = $row3[SpecialOrder];
					
					$Now = date("Y-m-d");
					
					$sql2 = "SELECT * from tblPromotionCode WHERE BusinessCustomerID = '$BusinessCustomerID' AND PromotionID = 'rebate' AND Status = 'active'";
						//echo "<br>sql = " .$sql3;
						$result2 = mysql_query($sql2) or die("Cannot execute query");
						//$Rebate = mysql_num_rows($result3);
						$Rebate = "n";
					
						while($row2 = mysql_fetch_array($result2))
						{
							$StartDate = $row2[StartDate];
							$EndDate = $row2[EndDate];
							$PromotionCodeID = $row2[PromotionCodeID];
						
						if($StartDate <= $Now AND $EndDate >= $Now) { $Rebate = "y"; } else { $Rebate = "n"; }
						
						}
					
					
					
				}

					
					if($SpecialOrder == "y")
					{
					$AvailabilityStatus = "Special Order";
					}
					else
					{
					$AvailabilityStatus = "In Stock";
					}
					
					

?>
<strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">
</font></strong>
<br>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr bgcolor="FFFF99">
    <td><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">
      <a name="Top"></a>
      <font size="4">
      <? if($Chain <> "") { ?><? echo $Chain; ?><br><? } ?>
        <? echo $Name; ?>
      </font> </font></strong></td>
    <td bgcolor="FFFF99"><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Availability
          Status:</strong><br> 
        <font color="#CC0000"><strong><? echo $AvailabilityStatus; ?></strong><br>
        </font><a href="#Status"><font size="1">What does this mean?
          </font></a>
    </font>            </p>
    </td>
  </tr>
</table>
<br>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr valign="top">
    <td width="50%" rowspan="4"><blockquote>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">
          <strong>Address:</strong><br>
          <?
	  if($Address2 <> "")
	  {
	  ?>
          <? echo $Address;?><br>
          <? echo $Address2;?></font> <font size="3" face="Arial, Helvetica, sans-serif">
          <?
	}
	else
	{
	?>
          <? echo $Address;?></font> <font size="3" face="Arial, Helvetica, sans-serif">
          <?
	}
	?>
          <br>
          <? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?> </font></p>
    </blockquote>      <font size="3">
      
	  <? if ($Country == "US") { ?>
      </font>
      <blockquote>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extmap%0D/*-http://maps.yahoo.com/maps_result?addr=<? echo $Address;?>&csz=<? echo $City;?>%2C+<? echo $State;?>+<? echo $ZipCode;?>&country=us" target="_blank">Map</a> | <a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extDD/*-http://maps.yahoo.com/dd?taddr=<? echo $Address;?>&tcsz=<? echo $City;?>%2C+<? echo $State;?>+<? echo $ZipCode;?>&tcountry=us" target="_blank">Driving
          Directions</a></font><font size="3">
          <? } ?>
        </font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">
          <? if($Website <> "") { ?>
                </font><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $Website; ?>" target="_blank"><img src="pics/VisitOnline.jpg" alt="Visit This Location Online" width="87" height="29" border="0"></a></font><font size="2" face="Arial, Helvetica, sans-serif">
          <? } else { ?>
          <? } ?>
                    </font></p>
      </blockquote>      <hr noshade>      
      <blockquote><font size="3">
        <? if($Phone <> "") { ?>
        </font>      </blockquote>      
      <blockquote>
        <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Telephone:<br>
        </strong><? echo $Phone; ?></font></p>
      </blockquote>
      <font size="3">
      <?
	}
	if($Fax <> "") { ?>
      </font>
      <blockquote>
        <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Fax:<br>
        </strong> <? echo $Fax; ?></font></p>
        <p><font size="3">
          <? } ?>
                  </font>
        </p>
        </p>
      </blockquote>
    </td>
    
	<? if($Rebate == "y") { ?>
	<td valign="middle"><div align="center">
      <table width="50%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#D5FFDF">
        <tr>
          <td><div align="center">
            <p><strong><em><font size="2" face="Arial, Helvetica, sans-serif"><a href="order/rebate.php?rebate=<? echo $BusinessCustomerID; ?>&z=4&code=<? echo $PromotionCodeID; ?>" target="_blank"><img src="order/pics/off2.jpg" alt="$5 Rebate!" width="57" height="47" border="0"></a><font color="#000000"><br>
    When you purchase at this location!<br>
            </font></font></em><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><a href="order/rebate.php?rebate=<? echo $BusinessCustomerID; ?>&z=4&code=<? echo $PromotionCodeID; ?>">Click
                here</a></font></strong></p>
            </div></td>
          </tr>
      </table>
      </div></td>
	  <? }
	  ?>
	  
	  
  </tr>
  <tr valign="top">
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td valign="middle" bgcolor="#768AC8"><strong><em><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Store
    Suggestions: </font></em></strong></td>
  </tr>
  
  
  
  
  <tr valign="top">
    <td>
	
	  <p><font size="2" face="Arial, Helvetica, sans-serif">
	  <? if($CallFirst == "y") { ?>
	  </font>
	  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Call the store
	        first to verify the availability of The Silent Timer&#8482;.</strong><br>
        </font></p>
	  <p><font size="2" face="Arial, Helvetica, sans-serif">
      <? if($Chain == "Borders") { ?>
      When calling, have the store clerk look up the BINC number:</font></p>
	  <ul>
	    
          <? if($LSAT == "y") { ?>
          <li><font size="2" face="Arial, Helvetica, sans-serif">The BINC number
              for <strong>The
          Silent Timer&#8482; LSAT</strong>  is 8026919.</font></li>
          <? } ?>
        
	    
          <? if($SAT == "y") { ?>
          <li><font size="2" face="Arial, Helvetica, sans-serif">The BINC number
              for <strong>The
          Silent Timer&#8482; SAT/ACT</strong>  is 8251756. </font></li>
          <? } ?>
	            
	     
      </ul>	  
	  <p><font size="2" face="Arial, Helvetica, sans-serif">
        <? } else { ?>
        When calling, have the store clerk look up the ISBN number:</font></p>
	  <ul>
	    
          <? if($LSAT == "y") { ?>
          <li><font size="2" face="Arial, Helvetica, sans-serif">The ISBN number
              for <strong>The
          Silent Timer&#8482; LSAT</strong>  is 0-9753503-0-7.</font></li>
          <? } ?>
        
	    
          <? if($SAT == "y") { ?>
          <li><font size="2" face="Arial, Helvetica, sans-serif">The ISBN number
              for <strong>The
          Silent Timer&#8482; SAT/ACT</strong>  is 0-9753503-1-5.</font> </li>
          <? } ?>
          <? } 
	
	} 
	?>
        
      </ul>	  <DIV>
        <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please
              note that this store does not sell the watch.</strong></font></p>
        <p align="right"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="#Tips">Additional Store Tips</a></font><FONT color="#ff0000" size=2 face=Arial><SPAN class=491151017-12102005><U><br>
        </U></SPAN></FONT></p>
        </DIV>
    </td>
  </tr>
</table>
<DIV>
  <hr noshade>
  <br>
  <FONT face=Arial size=2><SPAN class=491151017-12102005><FONT 
color=#ff0000><a name="Tips"></a><strong>IMPORTANT:</strong></FONT><strong>&nbsp;</strong>When calling any store,
make sure you mention to the bookseller that:</SPAN></FONT></DIV>
<DIV>
  <ul>
    <li> <FONT face=Arial size=2><SPAN class=491151017-12102005><STRONG>The Silent
            Timer&#8482; is NOT a book</STRONG>, but an electronic timer</SPAN></FONT></li>
    <li><FONT face=Arial size=2><SPAN class=491151017-12102005>It&nbsp;will be
          located near Test Prep Books in a small yellow box</SPAN></FONT></li>
  </ul>
</DIV>
<DIV>
  <p><FONT face=Arial size=2><SPAN 
class=491151017-12102005></SPAN></FONT><FONT face=Arial size=2><SPAN class=491151017-12102005>When
        you're at the store, </SPAN></FONT><font size="2" face="Arial, Helvetica, sans-serif">The
        Silent Timer&#8482;</font><FONT face=Arial size=2><SPAN class=491151017-12102005> should
        be located in the <strong>Test
        Prep/Study Aid</strong> Section.</SPAN></FONT></p>
  <p><FONT face=Arial size=2><SPAN class=491151017-12102005> If not, check behind
        the register and at the front of the store.</SPAN></FONT></p>
  <p><FONT face=Arial size=2><SPAN class=491151017-12102005>When in doubt, ask
        an employee for help (keeping the above suggestions in mind).</SPAN></FONT></p>
</DIV>
<p>&nbsp;</p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="Status"></a>Availability
            Status definitions:</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">In Stock - the store
          typically carries The Silent Timer&#8482; in stock. It is a good idea,
          however, to call first to make sure.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Special Order - the
          store does not carry The Silent Timer&#8482; on a regular basis, but
          can order it for you. It can take anywhere from 1 week to 5 weeks,
      depending on the store.</font></p>
    <p align="right"><font size="2" face="Arial, Helvetica, sans-serif">^ <a href="#Top">Back
    to Top</a> </font></p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p><br>
</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>