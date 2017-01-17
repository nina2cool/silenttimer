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

			<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>The
			       Inventors</strong></font></p>
            
            <table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr> 
    <td width="89%" align="left" valign="top"><div align="justify"> 
        <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Erik McMillan</strong></font> 
          <br>
          <font size="2" face="Arial, Helvetica, sans-serif">Erik is CEO of Silent
           Technology LLC and one of the inventors of <strong><font color="#000066" face="Times New Roman, Times, serif">THE
            SILENT TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong>.
          He started the company in 2002, working hard to bring a much-needed
            product to students around the world. Erik has taken the <a href="handbook/standardizedtest/sat/index.php">SAT</a>, <a href="handbook/standardizedtest/lsat/index.php">LSAT</a>,
           and hundreds of college exams. He understands how improving your time
           management will decrease your stress level and increase your test
          scores.</font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif">Erik's brother,
            Jerry McMillan, taught the <a href="handbook/standardizedtest/sat/index.php">SAT</a> 
          and <a href="handbook/standardizedtest/lsat/index.php">LSAT</a> for 
          <a href="http://www.review.com">The Princeton Review</a> in Austin,
           TX. Jerry's in depth knowledge of testing strategies, along with time
           pacing methodologies, makes him an important advisor to Silent Technology.</font></p>
        </div></td>
    <td width="11%"><a href="gallery/owners/erik/face_big.jpg" target="_blank"><img src="gallery/owners/erik/face.jpg" alt="Erik McMillan" width="100" height="133" border="0"></a></td>
  </tr>
</table>
<font size="2" face="Arial, Helvetica, sans-serif"><strong> <br>
  </strong></font>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr> 
    <td width="11%"><a href="gallery/owners/mark/face_big.jpg" target="_blank"><img src="gallery/owners/mark/face.jpg" alt="Mark Blecher" width="100" height="133" border="0"></a></td>
    <td width="89%" align="left" valign="top"><div align="justify"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Mark 
        Blecher</strong><br>
        Mark is one of the inventors of <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
        SILENT TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong>.
        Mark has been involved with the company since conception, and continues
        to be a strong influence today. Mark is an <a href="http://www.eco.utexas.edu/" target="_blank">Economics</a> 
        alumnus of <a href="http://www.utexas.edu" target="_blank">The University 
        of Texas at Austin</a> with a masters degree in Accounting. Mark's knowledge 
        of standardized tests, his experience in test taking, and commitment to 
        higher education have played an important role in Silent Technology's 
        success.</font> </div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr> 
    <td width="89%" align="left" valign="top"> <div align="justify"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Christina
            McMillan </strong></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif">Christina is 
        President  of Silent Technology LLC. She joined the team in 2003 and
        is an integral part of the success of the <strong><font color="#000066" face="Times New Roman, Times, serif">THE
         SILENT TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong>.
          She is an alumna of <a href="http://www.utexas.edu" target="_blank">The
           University of Texas at Austin</a>, with a bachelor of science in <a href="http://www.ce.utexas.edu" target="_blank">Architectural
            Engineering</a>. She brings problem-solving and analytical skills
            vital  to any business. Christina understands the need for performing
            well on  tests and showing schools your level of intelligence and
            dedication.</font></div></td>
    <td width="11%"><a href="gallery/owners/nina/face_big.jpg" target="_blank"><img src="gallery/owners/nina/face.jpg" alt="Christina McMillan" width="100" height="133" border="0"></a></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
