<?
$Year = date("Y");
?>

				</td>
                <td width="42%" align="left" valign="top" bgcolor="#FFFFCC">
				
				<div align="center"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td height="22" background="<? echo $http; ?>images/top_news_cap.gif"><div align="right"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tr> 
                <td width="10%">&nbsp;</td>
                <td width="90%"><a href="<? echo $https; ?>order/"><strong><font size="2" face="Arial, Helvetica, sans-serif">Order 
                  your timer - Raise your scores!</font></strong></a></td>
              </tr>
            </table>
          </div></td>
      </tr>
      <tr> 
        <td align="center" valign="top"> <div align="center"> 
            <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr> 
                <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr> 
                      <td bgcolor="#CC0000"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Buy
                        a timer to time your test</strong></font></td>
                    </tr>
                    <tr> 
                      <td align="left" valign="top" bgcolor="#FFFFFF"> <p><font size="2" face="Arial, Helvetica, sans-serif">Get 
                          this special test timer to help improve your timing 
                          on <em><strong>important exams</strong></em> like the 
                          <strong><a href="<? echo $http; ?>testhome/lsat_test.php">LSAT</a></strong>, 
                          <strong><a href="<? echo $http; ?>testhome/mcat.php">MCAT</a></strong>, 
                          and <strong><a href="<? echo $http; ?>testhome/sat_test.php">SAT</a></strong>!</font></p>
                        <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>They're 
                          selling fast! <a href="<? echo $https; ?>order/"> Order 
                          Now</a>.</strong></font></p></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <br>
            <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr> 
                <td align="left" valign="top" bgcolor="#FFFFFF"> <table width="0%" border="0" cellpadding="4" cellspacing="0" bordercolor="#000033">
                    <tr> 
                      <td bgcolor="#FFFFFF"> <div align="center"><a href="http://silenttimer.com/timer/increase.php"><img src="<? echo $http; ?>timer/pics/home/<? echo rand(2,34);?>.jpg" alt="The Silent Timer Gallery" border="0"></a></div></td>
                    </tr>
                    <tr> 
                      <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font face="Times New Roman, Times, serif">THE 
                        SILENT TIMER</font></strong><em>&#8482; is a revolutionary 
                        device that gives you an edge you need to score higher 
                        on your tests</em>. <a href="<? echo $http; ?>timer/demo.php">Try 
                        a Demo!</a></font></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <br>
            <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr> 
                <td align="left" valign="top"> <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                          <td bgcolor="#003399"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Latest
                                News </strong></font></td>
                        </tr>
                        <tr>
						
		<?	
			// has database username and password, so don't need to put it in the page.
			//require "https://www.silenttimer.com/include/dbinfo.php";
					//connect to database
					
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");
				
			$sql2 = "SELECT * FROM tblLinks WHERE Type = 'News' AND Status = 'active'";

			#find today's date
			$Day = date("d");
			
			if ((1&$Day))
				{
				
				$sql2 .= " AND Odd = 'y'";
				
				
				}
				
			elseif (!(1&$Day))
				{
				
				$sql2 .= " AND Odd = 'n'";
				
				}
			
			
			$sql2 .= " GROUP BY Title";
			
			//sort results.....
			
			if($Priority <> '0')
			{
				$sql2 .= " ORDER BY Priority ASC, Title ASC";
			}
			else
			{
				$sql2 .= " ORDER BY Title ASC";
			}
		
		//echo $sql2;

		$result2 = mysql_query($sql2) or die("Cannot get links");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$Link2 = $row2[Link];
		$Description2 = $row2[Description];
		$Title2 = $row2[Title];
		
		
?>
						

                          <td align="left" valign="top" bgcolor="#FFFFFF"><p><br>
                              <font size="2"><a href="<? echo $Link2; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif"><? echo $Title2; ?></font></a> <font face="Arial, Helvetica, sans-serif">
                              <?
					  if($Description2 <> "")
					  {
					  ?>
			- <? echo $Description2; ?><br>
			<?
					  }
					  ?>
                              </font></font></p>
                            </td>
                        </tr>
						<?
						}
						
					
						?>
						
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <br>
            <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr> 
                <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr> 
                      <td bgcolor="#003399"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Hot
                        Topics </strong></font></td>
                    </tr>
                    
                    
<?
			$Today = date("Y-m-d");
			$sql9 = "SELECT * FROM tblTestDates WHERE Date > '$Today' ORDER BY Date ASC LIMIT 1";
			$result9 = mysql_query($sql9) or die("Cannot get test dates");
		
			while($row9 = mysql_fetch_array($result9))
			{
			$TestDate = $row9[Date];
			$TestID = $row9[TestID];
			}
			
			$sql8 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
			$result8 = mysql_query($sql8) or die("Cannot get test ID");
		
			while($row8 = mysql_fetch_array($result8))
			{
			$TestName = $row8[Name];
			}					   

				$TestPieces = explode("-",$TestDate);
				$Month = $TestPieces[1];
										   
				if ($Month == "1") { $MonthName = "January"; }
				if ($Month == "2") { $MonthName = "February"; }
				if ($Month == "3") { $MonthName = "March"; }
				if ($Month == "4") { $MonthName = "April"; }
				if ($Month == "5") { $MonthName = "May"; }
				if ($Month == "6") { $MonthName = "June"; }
				if ($Month == "7") { $MonthName = "July"; }
				if ($Month == "8") { $MonthName = "August"; }
				if ($Month == "9") { $MonthName = "September"; }
				if ($Month == "10") { $MonthName = "October"; }
				if ($Month == "11") { $MonthName = "November"; }
				if ($Month == "12") { $MonthName = "December"; }
	
?>
                    
                    
                    <tr> 
                      <td align="left" valign="top" bgcolor="#FFFFFF"> <p><font size="2" face="Arial, Helvetica, sans-serif"><? echo $MonthName; ?>
                                        <? echo $TestName; ?> is almost here! <a href="<? echo $http; ?>order/index.php">How's
                             your timing?</a></font></p>
                        <p><font size="2" face="Arial, Helvetica, sans-serif">Have 
                          a story about any timer you used on a test? <a href="mailto:info@silenttimer.com?subject=My%20Timer%20Story">Tell 
                          us about it</a>. You could get published!</font></p></td>
                    </tr>
                    
                    
                    
                  </table></td>
              </tr>
            </table>
          </div></td>
      </tr>
    </table>
  </div></td>
              </tr>
</table> 

<p align="center">
<script type="text/javascript"><!--
google_ad_client = "pub-4030514069891212";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_channel ="";
google_color_border = "CCCCCC";
google_color_bg = "FFFFFF";
google_color_link = "000000";
google_color_url = "666666";
google_color_text = "333333";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>


<p align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> <a href="<? echo $http; ?>index.php">Home</a> - <a href="<? echo $https;?>product.php">Products</a> - <a href="<? echo $http; ?>timer">Timer
      Info</a> - <a href="<? echo $http; ?>aboutus.php">About Us</a> - <a href="<? echo $http; ?>contactus.php">Contact
      Us</a> - <a href="<? echo $http; ?>timer/faq.php">FAQ</a> - <a href="<? echo $http; ?>timer/demo.php">Online
      Demo</a> - <a href="<? echo $http; ?>links.php">Testing Links</a> - <a href="<? echo $http; ?>books">Books
      and Study Guides<br>
       </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>location_search.php">Store
       Locator</a> - <a href="<? echo $http; ?>customerservice/">My Account</a> - <a href="<? echo $http; ?>email/">Refer
       a Friend</a> - <a href="<? echo $http; ?>resell/">Partner Opportunity</a> - <a href="<? echo $http; ?>sitemap.php">Site
Map</a></font></p>
				  
	
<p align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> <a href="<? echo $http; ?>legal/patentpending.php">Patent
      Pending</a> - <a href="<? echo $http; ?>legal/terms.php">Terms and Conditions</a> - <a href="<? echo $http; ?>legal/privacy.php">Privacy
      Policy</a> - <a href="http://www.silenttimer.com/timer/legal.php">Legal</a> <br>
&copy; 2002-<? echo $Year; ?> Silent Technology LLC <em>All Rights Reserved.</em></font></p>
<DIV>
  <div align="center">
    <p><font size="2" face="Arial, Helvetica, sans-serif">Test names and other
        trademarks are the property of the respective <a href="http://www.silenttimer.com/legal/terms.php#tm" target="_blank">trademark
        holders</a>.<br>
      </font><font size="2" face="Arial, Helvetica, sans-serif">None of the trademark
      holders are affiliated with Silent Technology LLC or this web site, and
      none endorse any of the products or services described on this Web site.</font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">Web site managed in
        partnership with Silent Technology LLC and <a href="http://www.proace.com" target="_blank">PROACE.</a></font></p>
  </div>
</DIV>
<DIV><div align="center"></div>
</DIV>
<div align="center">
<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=372705; 
var sc_partition=1; 
var sc_invisible=1; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c2.statcounter.com/counter.php?sc_project=372705&amp;amp;java=0&amp;amp;invisible=1" alt="free hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
<?
mysql_close($link);
?>