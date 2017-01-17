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
require "include/topmenu_new.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

# refresh purchase session...
$_SESSION['purchase'] = "n";
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="58%" align="left" valign="top"><img src="images/Our-Mission.gif" width="195" height="71"><br>
                <table width="81%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td width="12%" align="right" valign="top"><img src="images/OpenQuote.gif" width="17" height="15"></td>
                    <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Increasing
                          test scores by helping students efficiently manage
                          valuable exam time. <img src="images/CloseQuote.gif" width="17" height="15"></strong></font></td>
                  </tr>
                </table>
              <div align="center">
                <div align="left">
                  <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Select
                  your Test:<br>
                  </strong></font><font size="4" face="Arial, Helvetica, sans-serif"><font size="2"><a href="testhome/act_test.php">ACT</a> | <a href="testhome/bar.php">BAR</a> | <a href="testhome/gmat_test.php">GMAT</a> | <a href="testhome/gre_test.php"> GRE</a> | <a href="testhome/lsat_test.php">LSAT</a> | <a href="testhome/mcat.php">MCAT</a> | <a href="testhome/sat_test.php">SAT</a> | <a href="testhome/other_test.php">OTHER</a></font></font><font size="3" face="Arial, Helvetica, sans-serif"><strong>                  </strong></font></p>
                  <p>		            <?
				
				//connect to database
				$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
				mysql_select_db($db) or die("Cannot select Database");

				
				
				$Now = date("Y-m-d");
				
				$sql = "SELECT * FROM tblNotice WHERE StartDate <= '$Now' AND EndDate >= '$Now' AND HomePage = 'y' AND Status = 'active' ORDER BY Priority ASC";
				$result = mysql_query($sql) or die("Cannot get notice");
				
				$Count = mysql_num_rows($result);
				
				if($Count > 0)
				{
				
						while($row = mysql_fetch_array($result))
						{
						$Notice = $row[Notice];
						
						
						?>
					      <br>
					      <? echo $Notice; ?><br>
					      <?
						}
				}
						?>
				    
			      </p>
                </div>
				
				<?
				
				/*
				?>
				
                <?
				*/
				?>
<p><font size="3" face="Arial, Helvetica, sans-serif"><a href="legal/guarantee.php">Money-Back
      Guarantee!</a></font></p>
              </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr align="left" valign="top">
                    <td width="72%" valign="middle"><br>
                      <table width="272" border="1" align="center" cellpadding="4" cellspacing="0" bordercolor="#000000">
                        <tr>
                          <td width="260"><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $https;?>product.php">Order
                                        your  timer here for USA, Canada,
                                        or many other countries!</a></font></strong></font></p>
                          </td>
                        </tr>
                    </table>
                    </td>
                  </tr>
                </table>
                <p><font size="4" face="Arial, Helvetica, sans-serif"><strong>Information?</strong></font></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td><a href="timer/"><font size="2" face="Arial, Helvetica, sans-serif">Check
                          out our   timer, start here</font></a></td>
                  </tr>
                </table>
                <p><strong><font color="#000000" size="4" face="Arial, Helvetica, sans-serif">Testimonials</font></strong></p>
                <p><font color="#660066"><strong><font color="#9900CC" size="2" face="Arial, Helvetica, sans-serif">Some
                        of the testimonials may include references to using The
                        Silent Timer on their test. Check with your exam board
                        for current rules, as some tests may have changed their
                        regulations since.</font></strong></font></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="8">
                  <tr>
                    <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><SPAN class=000572515-14112005><FONT face=Arial size=2><em>&quot;I&nbsp;loved
                              the silent timer, both in studying for the Bar
                              exam and during the test. Before the silent timer,
                              I was having a problem budgeting my time. After
                              practicing with the timer for about 2 months, I
                              was able to finish my test with plenty of time
                              left over!"</em></FONT></SPAN></font></p>
                      <table width="288" border="0" align="left" cellpadding="1" cellspacing="0">
                        <tr>
                          <td width="41" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"></font></p></td>
                          <td width="243" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> <strong><em><font color="#333333">Patricia</font><font color="#333333"><br>
      Taking the BAR<br>
      Houston, Texas </font></em></strong></font></td>
                        </tr>
                      </table>
                    <p>&nbsp;</p></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><em>&quot;With
                            the addition of The Silent Timer, students will have
                            the best tool I've ever seen for optimizing their
                            time efficiency.&nbsp; Congratulations on such an
                            important breakthrough!&quot;</em></font></p>
                        <table width="288" border="0" align="left" cellpadding="1" cellspacing="0">
                          <tr>
                            <td width="41" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"></font></p></td>
                            <td width="243" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> <strong><em><font color="#333333">LSAT
                                      Instructor<br>
                  Major Test Prep Company<br>
                  Texas</font></em></strong></font></td>
                          </tr>
                        </table>
                        <p>&nbsp;</p></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><em>&quot;Although
                            I only received my Silent Timer two weeks before
                            the LSAT, it helped tremendously in my practice and
                            during the exam. It helped me find areas of the exam
                            where I needed to improve my timing and really DID
                            work! I scored a bit better than I expected to score,
                            and I attribute my success on the LSAT to hard work,
                            and The Silent Timer. If you consider the amount
                            of money you will be spending on Law School in general,
                            this is a no-brainer. Also, <a href="inventors.php">Erik</a> was
                            a really big help in talking me through the <a href="<? echo $https;?>product.php">ordering
                            process online</a>. Thanks!&quot;</em></font></p>
                        <table width="288" border="0" align="left" cellpadding="1" cellspacing="0">
                          <tr>
                            <td width="41" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"></font></p></td>
                            <td width="243" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> <strong><em><font color="#333333">Daniel</font><font color="#333333"><br>
                  Taking the LSAT<br>
                  New York, NY </font></em></strong></font></td>
                          </tr>
                        </table>
                        <p>&nbsp;</p></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><p>&quot;<em><font size="2" face="Arial, Helvetica, sans-serif">The <a href="timer/demo.php"><strong>online
                                version</strong></a> was so effective in helping
                                me manage my time during my practice exams that
                                I had a <a href="<? echo $https;?>product.php"><strong>Silent Timer</strong></a><strong> </strong>shipped
                                all the way to Australia! Now I will have this
                                powerful time management tool during my real
                                exam!</font></em>&quot;</p>
                        <table width="288" border="0" align="left" cellpadding="1" cellspacing="0">
                          <tr>
                            <td width="41" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"></font></p></td>
                            <td width="243" align="left" valign="top"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong><em>Ezra<br>
                  Taking the LSAT<br>
                  Surry Hills, Australia</em></strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                          </tr>
                        </table>
                        <p>&nbsp;</p>
                        <p><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"></font></p></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="stories/index.php">Read
                            More Testimonials &gt;</a></strong></font></td>
                  </tr>
                </table>
                <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="4">Your
                        Test Time</font><br>
                  </strong><font color="#000000" size="2">One of the reasons
                  standardized tests are so difficult is the<strong> time constraint</strong>.
                  An example from the LSAT is finishing 26 complicated Logical
                  Reasoning multiple-choice questions in 35 minutes. The average
                  test taker can<strong></strong><em><strong> not</strong></em> accomplish
                  this task. The same goes for all other standardized tests:<font color="#FF0000"><strong> test
                  takers can NOT </strong></font></font></font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><font size="2"><strong>finish
                  on time</strong></font></font><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><font color="#000000" size="2"><strong>.</strong></font></font></p>
                <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">In
                    fact, the time factor is probably the single most important
                    factor in determining whether you score acceptably high and
                    get into the school of your choice, or whether your scores
                    are unacceptable and you have to settle for a less satisfactory
                    school or a different avocation all together. The reason? <strong><font color="#333333">With
                    ample time, many of the exam questions can be answered correctly</font>.</strong> It&#8217;s
                    the ability to manage this time that is so crucial.</font></p>
                <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" size="3" face="Times New Roman, Times, serif">THE
                        SILENT TIMER</font></strong><font color="#000033" size="3" face="Times New Roman, Times, serif"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font><strong> </strong>is
                        a special testing timer to help you manage and keep track
                        of time on <a href="handbook/standardizedtest/index.php">standardized
                        tests</a> like the <strong><font color="#000000"><a href="testhome/sat.php">SAT</a></font></strong><font color="#000000">, <strong><a href="testhome/act.php">ACT</a></strong>, <strong><a href="testhome/lsat.php">LSAT</a></strong>, <strong><a href="testhome/mcat.php">MCAT</a></strong> and <strong><a href="testhome/bar.php">BAR</a></strong></font>.</font></p>
                <p><font size="2" face="Arial, Helvetica, sans-serif">The timer
                    has <a href="timer/functions.php">several features</a> to
                    help manage your  time:</font></p>
                <ul>
                  <li>
                    <div align="left"><a href="timer/functions.php#2"><font size="2" face="Arial, Helvetica, sans-serif">It
                          is silent</font></a><font size="2" face="Arial, Helvetica, sans-serif"> and
                          won't disturb others</font> </div>
                  </li>
                  <li>
                    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">It
                        keeps track of the total time left on your section</font></div>
                  </li>
                  <li>
                    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">It keeps
                        track of how many questions you have answered, and how
                        many remain</font></div>
                  </li>
                  <li>
                    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">It shows
                        the <a href="timer/functions.php#c">average time available
                        per question</a></font></div>
                  </li>
                  <li>
                    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">It keeps
                        track of the <a href="timer/functions.php#d">amount of
                        time left on the current question</a></font></div>
                  </li>
                  <li> 
                    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">A <a href="timer/functions.php#5">discreet,
                          flashing light</a> alerts you at halfway through, when
                          there is 1 minute remaining, and when too much time
                          is spent on one question</font></div>
                  </li>
                </ul>
                <p><font size="2" face="Arial, Helvetica, sans-serif"><em>*The
                      Silent Timer is best used as a practice tool to get your
                      mind used to the time contraints on exam day. It may not
                      be legal on all tests; check with your testing administration
                      to determine whether timers are allowed in the room on
                      test day.</em></font></p>
                <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="timer/demo.php">See
                      how it works for yourself, click here for an online Demo.</a></font></p>
              <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4">Order
                        your <font color="#000066" face="Times New Roman, Times, serif">SILENT
                        TIMER</font></font></strong></font><font size="4" face="Times New Roman, Times, serif"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <br>
                        </font><font size="2" face="Arial, Helvetica, sans-serif">It
                    is important to start practicing with it as soon as possible,
                    so that you will be more comfortable during your test. Don&#8217;t
                    wait to purchase <strong><font color="#000066" face="Times New Roman, Times, serif">THE
                    SILENT TIMER</font></strong><font color="#000033" face="Times New Roman, Times, serif"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font>; <a href="<? echo $https;?>product.php">get
                    it today</a>. The sooner you do, the sooner you will have
                    the peace of mind that you are fully prepared and ready to
                    conquer the world (or at least your test).</font></p>
                <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Get
                      in to your school of choice, raise your test scores with
                      good time management: <em>Timing Matters&#8482;</em>.</strong></font></p></td>
            <td width="42%" align="left" valign="top" bgcolor="#FFFFCC"><div align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="22" background="images/top_news_cap.gif"><div align="right">
                        <table width="100%" border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td width="10%"><div align="right"></div></td>
                            <td width="90%"><a href="<? echo $https;?>product.php"><strong><font size="2" face="Arial, Helvetica, sans-serif">Order
                                    your timer - Raise your scores!</font></strong></a></td>
                          </tr>
                        </table>
                    </div></td>
                  </tr>
                  <tr>
                    <td align="center" valign="top"><div align="center">
                        <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                                <tr>
                                  <td bgcolor="#CC0000"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong><font color="#FFFFFF">Buy
                                            our Test Timer</font></strong></font></font></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" bgcolor="#FFFFFF"><p align="center"><font size="6" face="Times New Roman, Times, serif"><strong><font color="#000066" size="5" face="Arial, Helvetica, sans-serif"><a href="product.php">ORDER
                                            YOUR TIMER</a></font></strong></font></p>
                                  <p align="left"><font size="2" face="Times New Roman, Times, serif"><strong><font color="#000066">THE
                                          SILENT TIMER</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">&#8482;</font></strong> is
                                          made for your test. It will improve
                                          your timing on the <a href="<? echo $https;?>product.php?t=LSAT">LSAT</a>, <a href="<? echo $https;?>product.php?t=MCAT">MCAT</a>, <a href="<? echo $https;?>product.php?t=SAT">SAT</a> and
                                  more.</font></p></td>
                                </tr>
                            </table></td>
                          </tr>
                        </table>
                        <br>
                        <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
                          <tr>
                            <td align="left" valign="top" bgcolor="#FFFFFF"><table width="0%" border="0" cellpadding="4" cellspacing="0" bordercolor="#000033">
                                <tr>
                                  <td bgcolor="#FFFFFF"><div align="center"><a href="gallery/index.php"><img src="timer/pics/home/<? echo rand(2,34);?>.jpg" alt="Silent Testing Timer for the LSAT, MCAT, SAT, ACT, GMAT, and GRE!" width="243" height="182" border="0"></a></div></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font face="Times New Roman, Times, serif">THE
                                          SILENT TIMER</font></strong><em>&#8482; is
                                          a revolutionary device that gives you
                                          an edge you need to score higher on
                                          your tests</em>. <a href="timer/demo.php">Try
                                          a Demo!</a></font></td>
                                </tr>
                              </table>
                                <div align="center"></div></td>
                          </tr>
                        </table>
                        <br>
                        <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                              <tr>
                                <td bgcolor="#003399"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong><font color="#FFFFFF">Latest
                                          News </font></strong></font></font></td>
                              </tr>
                              <tr>
                                <?	

   	
			$sql2 = "SELECT * FROM tblLinks WHERE Type = 'News' AND Status = 'active'";

			
								
			#find today's date
			$Day = date("d");
			
			if ((1&$Day))
				{
				
				$sql2 .= " AND Odd = 'n'";
				
				
				}
				
			elseif (!(1&$Day))
				{
				
				$sql2 .= " AND Odd = 'y'";
				
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
                                <p>
                                <td bgcolor="#FFFFFF"><font size="2"> <a href="<? echo $Link2; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif"><br>
                                          <? echo $Title2; ?></font></a> <font face="Arial, Helvetica, sans-serif">
                                          <?
		  if($Description2 <> "")
		  {
		  ?>
      - <? echo $Description2; ?><br>
      <?
		  }
		  ?>
      </font></font></td>
                                <p></p>
                              </tr>
                              <?
								}
								?>
								
								
                            </table></td>
                          </tr>
                        </table>
                        <br>
                        <table width="259" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                                <tr>
                                  <td bgcolor="#003399"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong><font color="#FFFFFF">Hot
                                            Topics </font></strong></font></font></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" bgcolor="#FFFFFF"><p><font size="2" face="Arial, Helvetica, sans-serif">February
                                        LSAT almost here! <a href="<? echo $https;?>product.php">How's
                                        your timing?</a></font></p>
                                      <p><font size="2" face="Arial, Helvetica, sans-serif">Have
                                          a story about how timing helped increase
                                          your score? <a href="mailto:info@silenttimer.com?subject=My%20Timer%20Story">Tell
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
		
        <p><font size="1" face="Arial, Helvetica, sans-serif">ACT and ACT Assessment
            are registered trademarks of ACT, Inc.<br>
        AP is a registered trademark
        of the College Entrance Examination Board<br>
        DAT and OAT are registered
        trademarks of the American Dental Association<br>
        <span class="bodyblack">GMAT
            is a registered trademark of the Graduate Management Admission Council</span><br>
            <span class="bodyblack">GRE
            is a registered trademark of the Educational Testing Service</span><br>
            <span class="bodyblack">LSAT
            is a registered trademark of the Law School Admission Council, Inc.</span><br>
            <span class="bodyblack">MCAT
            is a registered trademark of the Association of American Medical
            Colleges</span><br>
            <span class="bodyblack">PSAT/NMSQT is a trademark
            jointly owned by the College Entrance Examination Board and the National
            Merit Scholarship Corporation</span><br>
            <span class="bodyblack">SAT
            is a registered trademark of the College Entrance Examination Board</span><br>
            <span class="bodyblack">TOEFL
            is a registered trademark of the Educational Testing Service<br>
            USMLE
            is a joint program of The Federation of State Medical Boards of the
            United States, Inc. and the National Board of American Medical Examiners<br>
            The
            Princeton Review is a trademark of The Princeton Review, Inc. and
            has no connection with Princeton University.<br>
            Kaplan is a registered
        trademark of Kaplan, Inc.</span></font></p>
        <p><font size="1" face="Arial, Helvetica, sans-serif">None of the above
            entities is affiliated with Silent Technology LLC and none endorse
        any of the products or services described on this Web site.</font></p>
        <p>
          <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
          <map name="Map">
            <area shape="rect" coords="1,1,192,55" href="bn.php">
          </map>
        </p>
