		  </td>
        </tr>
      </table>
	</TD>
		
    <TD align="left" valign="top"> <IMG SRC="<? echo $http; ?>images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
  </TR>
  <TR>
    <TD width="161" align="left" valign="top" background="<? echo $http; ?>images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr> 
              <td align="left" valign="top" class="box1">&nbsp;</td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>handbook/index.php">&lt; 
                  Home</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/index.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Test </font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/psat.php"><font size="2" face="Arial, Helvetica, sans-serif">PSAT 
                  Test </font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_II.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  II </font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_score.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Score </font></a></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="box1"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/handbook/standardizedtest/sat/sat_tips.php">SAT 
                Tips</a></font></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_prep_course.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Prep Course</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_practice.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Practice </font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_practice_test.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Practice Test</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_registration.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Registration</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_test_dates.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Test Dates</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_vocabulary.php"><font size="2" face="Arial, Helvetica, sans-serif">SAT 
                  Vocabulary </font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_st.php"><font size="2" face="Arial, Helvetica, sans-serif">THE 
                  SILENT TIMER</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="bottom"><p><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  Sign up for Silent Timer updates!</strong></font></p>
                <form action="<?echo $PHP_SELF ?>" method="post" name="frmEmail" id="frmEmail">
                  <input name="txtEmail" type="text" id="txtEmail" value = "Enter Email" size="10" onfocus='if(this.value == "Enter Email") this.value = ""' onblur='if(this.value == "") this.value = "Enter Email"'>
                  <input TYPE='submit' name="SubmitEmail" value="Go">
                </form>
                <?php

					if( $_POST['SubmitEmail'] == "Go")
					{
						
						If($txtEmail == "" || $txtEmail == "Enter Email")
						{
							print "
							
							<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>Please enter your email address! Try again.</strong></font></p>
							
							";
							
							echo"<SCRIPT> document.frmEmail.txtEmail.focus()</SCRIPT>";
						}
						else
						{	
							$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
							mysql_select_db($db) or die("Cannot select Database");			
						
							$now = date("Y-m-d H:i:s");

							$query = "INSERT INTO tblTimerContacts(email, date) VALUES ('$txtEmail','$now')";
							mysql_query($query) or die("Cannot insert email, please try again.");
						
							mail("info@silenttimer.com", "Timer Interest", "This email was submitted on $now...\n\nEmail: $txtEmail", "From:Timer Web Site User<$txtEmail>");
							
							mail("$txtEmail", "Thank you for your Silent Timer interest.", "Thank you for visiting the Silent Timer web site!\n\nWe will keep you updated on Silent Timer news, events, and testing information.\n\nIf you would like to contact us, please email info@silenttimer.com.\n\nThank you,\n\nThe Silent Timer Team", "From: The Silent Timer Team<info@silenttimer.com>");
			
							echo "<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>Thank you!</strong></font></p>";
							mysql_close($link);
						}
					
					}
				
				?>
              </td>
            </tr>
          </table></td>
          <td width="12">&nbsp;</td>
        </tr>
      </table>
	</TD>
    <TD align="left" valign="top"> <IMG SRC="<? echo $http; ?>images/spacer.gif" WIDTH=1 HEIGHT=396 ALT=""></TD>
	</TR>
</TABLE>

<DIV ID="calendarDiv" STYLE="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>

</BODY>
</HTML>