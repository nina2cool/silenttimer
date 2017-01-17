<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

$PageTitle = "Silent Technology LLC Headquarters";

//security check
If (session_is_registered('e'))
{

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Contact 
  Headquarters</font></strong></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Silent 
  Technology LLC</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Erik McMillan, 
  CEO<br>
  Christina Dilly, VP, CFO</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <br>
  <strong>Mailing Address:</strong><br>
  P.O. Box 49163<br>
  Austin, TX 78765<br>
  <br>
  <strong>Physical Address:</strong><br>
  9009 N. FM 620, Suite 1207<br>
  Austin, TX 78726<br>
  <br>
  <strong>Phone Numbers:</strong><br>
  Austin Number: 512-258-8668<br>
  800 Number: 800-552-0325 (avoid, it charges us per minute)<br>
  Fax Number: 240-269-1272<br>
  <br>
  Erik&#8217;s Cell: 214-676-5170<br>
  Christina&#8217;s Cell: 214-417-5679</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email addresses:</strong><br>
  &#8226; General: <a href="mailto:info@silenttimer.com">info@silenttimer.com</a><br>
  &#8226; Erik: <a href="mailto:erik@silenttimer.com">erik@silenttimer.com</a><br>
  &#8226; Christina: <a href="mailto:nina@silenttimer.com">nina@silenttimer.com</a><br>
  &#8226; EBay Sales: <a href="mailto:ebay@silenttimer.com">ebay@silenttimer.com</a><br>
  </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Instant Messenger 
  Screen Name:</strong><br>
  SilentTimer<br>
  </font><font face="Arial, Helvetica, sans-serif"> </font> </p>
<p align="left">&nbsp;</p>
            

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";


// finishes security for page
}
else
{
	$http .= "employee";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>