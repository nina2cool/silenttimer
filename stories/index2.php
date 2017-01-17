<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

		//connect to database
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");

		
		
		$Now = date("Y-m-d");

?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Testimonials 
  &amp; Stories</strong></font></p>
<p><font color="#660066"><strong><font color="#9900CC" size="2" face="Arial, Helvetica, sans-serif">Some
        of the testimonials may include references to using The Silent Timer
        on their test. Check with your exam board for current rules, as some
tests may have changed their regulations since.</font></strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>

    <td width="84%">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="8">
    
	  <?
  
  		$sql = "SELECT Name, Testimonial, DATE_FORMAT(Date, '%m/%d/%Y') AS Date, Location, Test, Priority FROM tblTestimonial WHERE Status = 'active'";
		$result = mysql_query($sql) or die("Cannot get testimonials");
		
		while($row = mysql_fetch_array($result))
		{
			$Name = $row[Name];
			$Testimonial = $row[Testimonial];
			$Date = $row[Date];
			$Location = $row[Location];
			$Test = $row[Test];
			$Priority = $row[Priority];
			
				
			
  ?>
	
	    <tr>
          <td align="left" valign="top"><DIV><SPAN class=000572515-14112005></SPAN></DIV>
            <DIV>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><SPAN class=000572515-14112005><FONT face=Arial size=2><em>"<? echo $Testimonial; ?>"</em> <? if ($Date <> "00/00/0000") { ?><em>(<? echo $Date; ?>)</em> <? } ?>
              </FONT></SPAN></font></p>

		<? if($Test <> "")
		{
		?>

              <blockquote>
                <p><font size="2" face="Arial, Helvetica, sans-serif"><SPAN class=000572515-14112005><font size="2" face="Arial, Helvetica, sans-serif"><strong><em><font color="#333333"><? echo $Name; ?><br>
                  <font size="2" face="Arial, Helvetica, sans-serif"><strong><em><? echo $Test; ?></em></strong></font><br>
                <? echo $Location; ?></font></em></strong></font></SPAN></font></p>
              </blockquote>
		<?
		}
		else
		{
		?>
				 <blockquote>
				<p><font size="2" face="Arial, Helvetica, sans-serif"><SPAN class=000572515-14112005><font size="2" face="Arial, Helvetica, sans-serif"><strong><em><font color="#333333"><? echo $Name; ?><br>
				<? echo $Location; ?></font></em></strong></font></SPAN></font></p>
			  </blockquote>
			  
		<?
		}
		?>



            </DIV>
            </td>

		<?
		}
		?>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Bad 
        Dream...</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><img src="../pics/students/depressed.jpg" width="132" height="108" class="right">You 
        are in the middle of your test trying to finish the hardest section you 
        have ever taken. You glance at your timer to make sure you're on track, 
        and it lets out a loud beep that cuts through the silence in the testing 
        room. The proctor hadn't called time, and, in fact, there were 30 seconds 
        left on the actual clock. Everyone in the room is staring at you, you 
        don't finish the section, and the proctor glares at you and takes away 
        your timer. You feel horrible for the rest of the test AND you have no 
        timer.</font></p>
      <p><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Happy 
        Reality...</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><img src="../pics/students/happy_graduates.jpg" width="131" height="107" class="right">You 
        are finishing the hardest section on your test. Today's results could 
        mean getting into the college or grad school of your choice. Your <strong><font color="#000033">Silent 
        Timer</font></strong> flashes a red light to alert that you have 5 minutes 
        left. You glance at <strong><font color="#000033">The Silent Timer</font></strong>&#8482; 
        and find that you have 2 1/2 minutes for each of your last 2 questions. 
        As you bubble in your last answer, your timer counts down to zero, and 
        it makes NO NOISE. The proctor has yet to call time, and people around 
        you are frantically filling in bubbles. You manage your time well on the 
        rest of the test, and leave feeling great.</font></p>
    </td>
    <td width="16%" align="left" valign="top"> 
      <table width="200" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr> 
                <td bgcolor="#FF0000"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><font color="#FFFFFF"><strong>Tell 
                  your Story</strong></font></font></td>
              </tr>
              <tr> 
                <td align="left" valign="top" bgcolor="#FFFFFF"> <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Email 
                    us your timing story, or testimonials for using <font face="Times New Roman, Times, serif"><strong><font color="#000066">THE 
                    SILENT TIMER</font></strong></font><strong>&#8482;</strong>. 
                    Your story will go online for others to see! <a href="mailto:info@SilentTimer.com?subject=My%20Timer%20Story">Please 
                    email us.</a></font></p></td>
              </tr>
            </table></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
	
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
