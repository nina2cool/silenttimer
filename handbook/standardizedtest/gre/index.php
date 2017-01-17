<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The GRE&reg; Test</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Pulling all-nighters to 
  study for that GPA-altering exam, time-consuming group projects out the wazoo 
  and monotonous lectures lasting for hours on end. Gotta love those undergrad 
  years. But wait&#8212;now you&#8217;re thinking about graduate school? Are you 
  crazy? Crazy about money maybe. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Not only have statistics 
  shown that a woman&#8217;s salary can double with a master&#8217;s while a man&#8217;s 
  can increase by 89 percent, but oftentimes your employer will pay for part or 
  sometimes all of your graduate degree. Attend graduate school for almost nothing 
  and then get a generous raise because of your new degree? Sounds like a good 
  deal.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Of course you don&#8217;t 
  just show up for grad school one day-- you must apply, and to do that you must 
  first take the GRE test. This exam evaluates candidates&#8217; analytical writing, 
  verbal and quantitative skills developed over a long period of time and not 
  specifically related to any field of study. Scores are intended to show how 
  well a candidate will perform in their first year of a graduate program.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The analytical writing section 
  assesses critical thinking and analytical writing skills. The verbal section 
  tests candidates&#8217; ability to analyze and evaluate written material and 
  interpret information from it, analyze relationships among component arts of 
  sentences, recognize relationships between words and concepts and reason with 
  words in solving problems. Lastly, the quantitative section is a combination 
  of arithmetic, algebra, geometry and data analysis&#8212;all concepts covered 
  in high school.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">There are two different 
  forms of the GRE test&#8212;<a href="gre_computer.php">a computer-adaptive test</a> 
  and a <a href="gre_paper.php">paper-based test</a>. In areas where computer-adaptive 
  tests aren&#8217;t available, candidates must take the paper-based test and 
  vice versa. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you&#8217;re wondering 
  whether you should take the GRE test or the GMAT exam, be aware that the GMAT 
  is specifically designed as an entrance exam for graduate business schools, 
  and the GRE test is a more general social sciences exam. The GRE test is used 
  more to get into humanities or liberal arts masters degree programs. Contact 
  your school of choice to find out which tests they prefer. </font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>

<?	
			# link to Database...
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");

   	
			$sql2 = "SELECT * FROM tblLinks WHERE Type = 'News' AND Status = 'active' GROUP BY Title";

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
<p><font size="2"><a href="<? echo $Link2; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif"><? echo $Title2; ?></font></a> <font face="Arial, Helvetica, sans-serif">
<?
		  if($Description2 <> "")
		  {
		  ?>
- <? echo $Description2; ?><br>
<?
		  }
		  }
		  ?>
</font></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for GRE Test<br>
  </strong>Click below to search for &quot;GRE test&quot; in the following search 
engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=GRE%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=GRE%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=GRE%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=GRE%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox.%2Faolcom%2Fjsp%2Fsearch.jsp&query=GRE%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=GRE%2Btest&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>