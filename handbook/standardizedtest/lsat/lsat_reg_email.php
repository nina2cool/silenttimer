<?
// has http variable in it to populate links on page.
require "../../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

?>


<HTML>
<HEAD>
<META NAME='GENERATOR' Content='Microsoft DHTML Editing Control'>
<TITLE>LSAT Registration Information</TITLE>
</HEAD>
<BODY>
 
<P><font size='2'><a href='http://www.silenttimer.com'><img src='http://www.silenttimer.com/timer/pics/Logo.jpg' alt='The Silent Timer' width='100' height='65' border='0'></a>&nbsp; 
      <a href='http://www.silenttimer.com/product.php'><font face='Arial, Helvetica, sans-serif'>Purchase your 
LSAT Timer Here</font></a></font></P>
<DIV>
<HR style='WIDTH: 954px; HEIGHT: 5px' color=#031298 SIZE=5>
</DIV>
<P><font face='Arial, Helvetica, sans-serif'>$FirstName,</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for looking to us for
    help registering for your LSAT test.&nbsp; We 
hope this information will be useful in your quest to take one of the most 
difficult standardized exams. Good luck with studying and pursuing&nbsp;your
law degree.</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What is the LSAT?</STRONG></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAT is a 101 question
    test with five multiple choice sections.&nbsp; The 
  sixth section, the essay portion, is not scored but is sent to the various schools 
  you apply to.&nbsp; The LSAT consists of two logical reasoning sections, one
  reading comprehension section, one logic games section and one unscored experimental
  section, which can be any of the previously mentioned sections. The sixth section
  is the unscored essay portion. The five multiple choice sections are each 35
  minutes long, and the essay portion is 30 minutes long.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Read more here:<BR>
  <br>
  <a href='http://silenttimer.com/handbook/standardizedtest/lsat/index.php'>http://silenttimer.com/handbook/standardizedtest/lsat/index.php</a></font><font face='Arial, Helvetica, sans-serif'><a href='http://silenttimer.com/handbook/standardizedtest/lsat/index.php'><U><br>
    <br>
    </U></a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>How do I
register for the LSAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Registering for the LSAT is quite
    easy. There is an online form that only takes a few minutes.&nbsp; You can
    also register on the telephone or via mail. Email LSAC at LSACinfo@LSAC.org
if you need help.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Online Registration: <a href='http://www.lsac.org/'>http://www.lsac.org/</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Telephone or Mail Registration: Call weekdays at (215) 
968-1001 between 8:30 A.M. and 7:00 P.M. ET, September-March, and between 
8:30A.M. and 4:45 P.M. ET, April-August. LSAC's busiest day is Monday, so you 
can avoid delays if you call later in the week. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>When should I 
take the LSAT?</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Many law schools require
    that the LSAT be taken by December for&nbsp;admission the following fall.&nbsp; However,
taking the test earlier-in June or October-is often advised. </font></P>
<P><font size='2' face='Arial'><STRONG><U>U.S. Registration Fees:</U></STRONG> </font></P>
<?

			# link to Database...
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");


			$sql8 = "SELECT * FROM tblTests WHERE TestID = '1'";
			$result8 = mysql_query($sql8) or die("Cannot get test ID");
		
			while($row8 = mysql_fetch_array($result8))
			{
			$RegistrationFee = number_format($row8[RegistrationFee],2);
			$LateRegistrationFee = number_format($row8[LateRegistrationFee],2);
			}		


?>


<P><FONT size='2' face='Arial'>On-time registrants: 
  $<? echo $RegistrationFee; ?><BR>
  Late registrants: 
  $<? echo $RegistrationFee; ?> + $<? echo $LateRegistrationFee; ?> late registration fee<BR>
  <BR>
  <STRONG><U>Test Dates and Registration Deadlines:</U></STRONG></FONT></P> 
<?

$now = date("Y-m-d");
	$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info, DATE_FORMAT(RegistrationDate, '%M %d') AS RegistrationDate FROM tblTestDates WHERE TestID = '1' AND Date >= '$now' AND RegistrationDate <> '0000-00-00' ORDER BY Date ASC";
	
	echo $sql;
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				$RegistrationDate = $row[RegistrationDate];
?>



<P><FONT color=#ff0000 size='2' face='Arial, Helvetica, sans-serif'><STRONG>*&nbsp; <? echo $Date; ?><? if($Information <> "") { ?> <? echo $Info; ?><? } ?></STRONG></STRONG></FONT><font size='2' face='Arial, Helvetica, sans-serif'><BR>
  <font size="2" face="Arial, Helvetica, sans-serif">Regular registration receipt deadline is <FONT 
color=#0f0f0f><EM><STRONG><? echo $RegistrationDate; ?></STRONG></EM></FONT></font><FONT 
color=#0f0f0f size="2" face="Arial, Helvetica, sans-serif">.</FONT><FONT 
color=#0f0f0f><EM><STRONG><BR><? } ?>
  </STRONG></EM></FONT><BR>
<P><font size='2' face='Arial, Helvetica, sans-serif'><FONT color=#0f0f0f><EM><STRONG>  </STRONG></EM></FONT><BR>
  Visit this link for all up-to-date LSAT Test Dates and Registration: <BR>
  <a href='http://www.lsac.org/LSAC.asp?url=/lsac/test-dates-deadlines.asp'>http://www.lsac.org/LSAC.asp?url=/lsac/test-dates-deadlines.asp</a></font><font face='Arial, Helvetica, sans-serif'><a href='http://www.lsac.org/LSAC.asp?url=/lsac/test-dates-deadlines.asp'><br>
  <br>
  </a>------------------------------------------------------------------------ 
  </font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>I want to
take the LSAT on a Monday for religious reasons. What do I do?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAT is administered on Mondays or Tuesdays following the 
Saturday exams. The June exam is only on Monday. To request a Saturday Sabbath 
observers administration, you must obtain a letter on official stationery from your minister or rabbi confirming your religious affiliation. 
</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>Where do
I take the LSAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAC has many approved testing centers. Visit their website at<u> <a href='http://www.lsac.org/LSAC.asp?url=lsac/testing-locations.asp'>http://www.lsac.org/LSAC.asp?url=lsac/testing-locations.asp</a> 
  </u> to download <br>
  PDF's of the locations.</font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
  ------------------------------------------------------------------------</font></P>
<P><FONT color=#0000a0 face='Arial, Helvetica, sans-serif'><STRONG>What is an
      LSAC Account?&nbsp; <BR>
</STRONG><FONT 
color=#0f0f0f><BR>
  <font size='2'>The Law School Admissions Council (LSAC) requires that you sign up for an account 
  with them in order to:</font></FONT></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Register for the LSAT (Law School Admission Test)<BR>
  * Receive your LSAT score early by e-mail<BR>
  * Register for the LSDAS (Law School Data Assembly Service)<br>
  * Purchase publications, videos, and test preparation materials<br>
  * Purchase the LSACD electronic law school applications and apply online to 
  law schools<br>
  * Register for law school forums<br>
  * Have 24-hour file access</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Create a free LSAC account online here:</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'><a href='http://www.lsac.org/'>http://www.lsac.org</a></font><a href='http://www.lsac.org/'><font face='Arial, Helvetica, sans-serif'><U>/</U></font></a><font face='Arial, Helvetica, sans-serif'><U><br>
  <br>
  </U></a>------------------------------------------------------------------------ 
</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>I still need 
help!</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Call LSAC at (215) 968-1001. They will be able to help you with any questions you have about the LSAT. </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAC/LSAT web address: <a href='http://www.lsac.org/'>http://www.lsac.org/</a><br>
  The LSAC/LSAT email address: LSACinfo@lsac.org</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#000099' face='Arial, Helvetica, sans-serif'><strong>How should 
  I prepare for the LSAT?</strong></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Study, study, study! The best way to prepare for the LSAT is to take as many 
  timed tests as you possibly can. The LSAT is not only about answering the questions 
  correctly, but answering them quickly. There are many books on the market that 
  can help you study. They have test questions, strategies, and techniques. Go 
  to your local bookstore and find their test prep section. To improve your pacing 
  skills, consider buying a silent timer such as the one found on our website.</font></P>
<P> <FONT color='#000099' size=4 face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/product.php'><strong>Purchase 
  your LSAT Timer Here</strong></a></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also find many study aids on the internet. Test preparation courses 
  may also be a good idea. There are many companies out there dedicated to helping 
  students prepare.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAC website sells real LSAT tests and other materials at reasonable prices: 
    <A 
href='https://os.lsac.org/Release/Shop/Shop_Books.aspx?po=Y'><U><FONT 
color=#0000ff 
size=2><br>
    </U></A> <a href='https://os.lsac.org/Release/Shop/Shop_Books.aspx?po=Y#prep'>https://os.lsac.org/Release/Shop/Shop_Books.aspx?po=Y#prep</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for visiting our site. If you have any questions, please feel free 
  to email us.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The SilentTimer.com Team<br>
    <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a> <br>
    <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a></font></P>
</BODY>
</HTML>