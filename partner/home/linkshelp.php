<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Links Help";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company	
	$aID = $_SESSION['a'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
	}
	
	mysql_close($link);
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Create 
  Links</strong></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>How do I create 
  my own links to sell <font color="#000066" face="Times New Roman, Times, serif">SILENT TIMER</font>&#8482;s?</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr align="left" valign="top"> 
    <td width="9%"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong>Step 
      1</strong> </font></td>
    <td width="91%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Where 
      do you want to send your visitors?</strong><br>
      Decide where on <a href="http://www.SilentTimer.com/" target="_blank">SilentTimer.com</a> 
      you would like to send your students. Depending on how much you explain 
      the timer on your web site, you could send them straight to the <a href="http://www.SilentTimer.com/order">order 
      page</a>, to our <a href="http://www.SilentTimer.com/timer/demo.php">online 
      demo</a>, or to our <a href="http://www.silenttimer.com">home page</a>. 
      It is up to you to decide what might entice your viewers to purchase their 
      timer.<br>
      </font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong>Step 2</strong></font></td>
    <td><p><strong><font size="2" face="Arial, Helvetica, sans-serif">Create your 
        link<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">After 
        you find the page you to which you would like to send your visitors, it 
        is easy to add your affiliate code to it.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">First, you need to 
        know your partner code, which is <strong><font color="#CC0000"><? echo $aID;?></font></strong>. 
        Next, you put &quot;<strong><font color="#CC0000">?a=</font></strong>&quot; 
        and your code, after the link you have chosen. By adding &quot;<strong><font color="#CC0000">?a=<? echo $aID;?></font></strong>&quot; 
        to the link, we know the customer came from your site and will automatically 
        credit your account for the sale.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>Example</strong>:</em> 
        If you want to send visitors to our order page, the link from our site 
        is: http://www.silenttimer.com/order/.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Add your code to the 
        end, with the &quot;?a=&quot; before it. Your link from your web site 
        would look like this:</font></p>
      <p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>http://www.silenttimer.com/order/?a=<? echo $aID;?> 
        </strong></font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">This 
        works for any page on our site.</font><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
        <br>
        </strong></font></p>
      </td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong>Step 3</strong></font></td>
    <td><p><strong><font size="2" face="Arial, Helvetica, sans-serif">Put the 
        new link on your site<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">After 
        you create your link, all you need to do is put it on your site. When 
        visitors come from your link, you will get credit for their purchases.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">It will work best 
        to have a page on your site dedicated to explaining how important practicing 
        under timed conditions can be for scoring well on test day. <a href="linkexamples.php">Click 
        here</a> for some examples of what you can say on your page.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You can also download 
        pictures from our site to use on your pages. <a href="linkspictures.php">Click 
        here</a> to find some cool pictures to add to your site.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Add this link to your 
        site with a few pictures and some time pacing information, and you<strong> 
        will</strong> make sales.</font></p>
      </td>
  </tr>
</table>
<p><a href="javascript: history.go(-1)"><font size="2" face="Arial, Helvetica, sans-serif">&lt; 
  Back</font></a></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>How do I copy and 
  paste linking code?</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"> If you would like to use 
  our coding examples, you can copy and paste directly onto your site.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">For each link you want to 
  add, follow the steps below:</font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr align="left" valign="top"> 
    <td width="9%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Step 
      1</strong></font></td>
    <td width="91%"><font size="2" face="Arial, Helvetica, sans-serif">Find the 
      link you want to place on your web site.</font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Step 2</strong></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Press the &quot;Copy 
      Link&quot; button immediately below the creative for that link. The link 
      is automatically copied and ready to be pasted.</font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Step 3</strong></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"> Find the web page 
      on your site where you would like to add the link.</font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Step 4</strong></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Follow the same process 
      you use the create/update this page, and identify where in the page you 
      want to add the link.</font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Step 5</strong></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Click the cursor at 
      the exact place you want the link to appear, and press CTRL+V (simultaneously). 
      Please do not press more then once, as repeating the process will result 
      in the link being added multiple times.</font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Step 6</strong></font></td>
    <td> 
      <p><font size="2" face="Arial, Helvetica, sans-serif">Save and upload 
        your changes.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>Note:</em></strong> 
        If your web site is created using a web site authoring tool, or web content 
        management system, you might have to upload the changes to your web server 
        as well. Contact the web administrator at your site for help if necessary.</font></p></td>
  </tr>
</table>
<p><a href="javascript: history.go(-1)"><font size="2" face="Arial, Helvetica, sans-serif">&lt; 
  Back</font></a></p>
<p>&nbsp;</p>
			
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
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>