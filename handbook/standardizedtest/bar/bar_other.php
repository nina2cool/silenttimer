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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The MEE, MPT and 
  MPRE </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The second day of the BAR 
  exam is when locally crafted essays from a broader range of subject matters 
  may be used. Several states, however, have increasingly begun using two nationally 
  developed tests, the Multistate Essay Examination and the Multistate Performance 
  Test, to finish the BAR examination. Almost all jurisdictions are also requesting 
  Multistate Professional Responsibility Examination scores, which is separately 
  administered three times a year.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
  MEE</font></strong><br>
  </font><font size="2" face="Arial, Helvetica, sans-serif">This part of the two-day 
  BAR exam is a three-hour test with six questions; therefore, you should expect 
  to spend 30 minutes on each question. Areas covered include Agency and Partnership, 
  Commercial Paper, Conflict of Laws, Corporations, Descendents&#8217; Estates, 
  Family Law, Federal Civil Procedure, Sales, Secured Transactions and Trusts 
  and Future Interests. The major difference between the MEE and MBE is that the 
  MEE requires the applicant to display an ability to communicate in writing effectively.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
  MPT</font></strong><br>
  The MPT consists of three 90-minute skills questions covering legal and fact 
  analysis, problem solving, resolution of ethical dilemmas, organization and 
  management of a lawyering task and communication. Essential lawyering skills 
  in a realistic situation are tested in this part of the exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
  MPRE</font></strong><br>
  This 50 question, two hour multiple choice test is assembled and administered 
  by ACT, Inc. on behalf of the NBCE. Based on the law governing professional 
  conduct of lawyers, the exam is followed by 10 test center review items that 
  ask for applicants&#8217; reactions to the testing atmosphere.</font></p>
<p>&nbsp;</p>
			
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>