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
			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">The
			      NEW &amp; IMPROVED Silent Timer! </font></strong></p>
            
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif">THE
        SILENT TIMER</font></strong><font color="#000033" face="Times New Roman, Times, serif"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font> has
    been a great success since our first products arrived on the market in September
    2003.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">Our customers
                have provided us with great feedback that has helped us in our
              new version that came out in April.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">The new version
                of <strong><font color="#000066" face="Times New Roman, Times, serif">THE
                SILENT TIMER</font></strong><font color="#000033" face="Times New Roman, Times, serif"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font> will have all of the
              features as the current model, with two main additions. The first
              is <strong>Auto Mode</strong>. Using Auto Mode automatically counts down the questions
              so you don&rsquo;t have to press the red button. This saves time
              and energy.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">The other great
                new feature is called <strong>Passage
                  Mode</strong>. Utilizing
              this mode helps for tests that have passages or logic game sections.
              You input the time it takes you to read a passage, the number of
              passages, and the number of questions. The timer will calculate
              your average time per question AFTER the time it takes to read
              the passages is taken out of the total time. This feature is great
                  for tests such as the LSAT that have reading comprehension
                  passages and logic games.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="timer/functions.php"><strong>READ MORE ABOUT
                THESE NEW FEATURES AND MORE</strong></a> </font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">Any orders
                received now will get the new and improved Silent Timer!</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">As always, if you have any questions or comments, please email
              us at <a href="mailto:info@silenttimer.com">info@silenttimer.com</a> or
            call us at 800-552-0325.</font></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>
              <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
            </p>
