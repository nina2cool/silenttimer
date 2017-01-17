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
              <td align="left" valign="top" class="box1"><div align="right"><a href="#"></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>partner/index.php">&lt; 
                  Home</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>partner/login.php"><font size="2" face="Arial, Helvetica, sans-serif">Log 
                  In</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>partner/signup.php"><font size="2" face="Arial, Helvetica, sans-serif">Sign 
                  Up</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>partner/about.php"><font size="2" face="Arial, Helvetica, sans-serif">About 
                  Program</font></a></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>partner/example.php"><font size="2" face="Arial, Helvetica, sans-serif">Example 
                  Links</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><a href="<? echo $http; ?>index.php"><font size="2" face="Arial, Helvetica, sans-serif">&lt; 
                  Silent Timer Home</font></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"></div></td>
            </tr>
            <tr> 
              <td align="left" valign="bottom"><p><font color="#FF00FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF"><br>
                      Sign up for Silent Timer updates.</font></strong></font></p>
                <form action="<?echo $PHP_SELF ?>" method="post" name="frmEmail" id="frmEmail">
                  <font color="#FFFFFF">
                  <input name="txtEmail" type="text" id="txtEmail" value = "Enter Email" size="10" onfocus='if(this.value == "Enter Email") this.value = ""' onblur='if(this.value == "") this.value = "Enter Email"'>
                  <input TYPE='submit' name="SubmitEmail" value="Go">
                  </font>
                </form>
                <p><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>The
                      Silent Watch is in the R&amp;D phase. Sign up for updates. </strong></font></p>
                <form action="<?echo $PHP_SELF ?>" method="post" name="frmEmail" id="frmEmail">
                  <font color="#FFFFFF">
                  <input name="txtEmailWatch" type="text" id="txtEmailWatch" value = "Enter Email" size="10" onfocus='if(this.value == "Enter Email") this.value = ""' onblur='if(this.value == "") this.value = "Enter Email"'>
                  <input name="SubmitEmailWatch" TYPE='submit' id="SubmitEmailWatch" value="Go">
                  </font>
                </form>
                <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  Add <a href="mailto:info@silenttimer.com">info@silenttimer.com</a> to
                  your safe list, so our emails won't be filtered out.</strong></font>
                    <font color="#FFFFFF"><strong>
                    <?php

					if( $_POST['SubmitEmail'] == "Go")
					{
						
						If($txtEmail == "" || $txtEmail == "Enter Email") 
						{
							print "
							
							<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>Please enter your email address! Try again.</strong></font></p>
							
							";
							
							echo"<SCRIPT>document.frmEmail.txtEmail.focus()</SCRIPT>";
						}
						else
						{	
							$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
							mysql_select_db($db) or die("Cannot select Database 2");			
						
							$now = date("Y-m-d H:i:s");
							$type = 'Timer';

							$query = "INSERT INTO tblTimerContacts(email, date, type) VALUES ('$txtEmail','$now', '$type')";
							mysql_query($query) or die("Cannot insert email, please try again.");
						
							mail("info@silenttimer.com", "$type Interest", "This email was submitted on $now...\n\nEmail: $txtEmail", "From:Timer Web Site User<$txtEmail>");
							
							mail("$txtEmail", "Thank you for your Silent Timer interest.", "Thank you for visiting the Silent Timer web site!\n\nWe will keep you updated on Silent Timer news, events, and testing information.\n\nIf you would like to contact us, please email info@silenttimer.com.\n\nThank you,\n\nThe Silent Timer Team", "From: The Silent Timer Team<info@silenttimer.com>");
			
							echo "<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>Thank you!</strong></font></p>";
							mysql_close($link);
						}
					
					}
				
				
				
							if( $_POST['SubmitEmailWatch'] == "Go")
					{
						
						If($txtEmailWatch == "" || $txtEmailWatch == "Enter Email") 
						{
							print "
							
							<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>Please enter your email address! Try again.</strong></font></p>
							
							";
							
							echo"<SCRIPT>document.frmEmail.txtEmail.focus()</SCRIPT>";
						}
						else
						{	
							$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
							mysql_select_db($db) or die("Cannot select Database 3");			
						
							$now = date("Y-m-d H:i:s");
							$type = 'Watch';

							$query = "INSERT INTO tblTimerContacts(email, date, type) VALUES ('$txtEmailWatch','$now', '$type')";
							mysql_query($query) or die("Cannot insert email, please try again.");
						
							mail("info@silenttimer.com", "$type Interest", "This email was submitted on $now...\n\nEmail: $txtEmailWatch", "From:Timer Web Site User<$txtEmailWatch>");
							
							mail("$txtEmailWatch", "Thank you for your Silent Watch interest.", "Thank you for visiting the Silent Timer web site!\n\nWe will keep you updated on Silent Watch news, events, and testing information.\n\nIf you would like to contact us, please email info@silenttimer.com.\n\nThank you,\n\nThe Silent Timer Team", "From: The Silent Timer Team<info@silenttimer.com>");
			
							echo "<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>Thank you!</strong></font></p>";
							mysql_close($link);
						}
					
					}
				
				
				
				?>
                    </strong></font>                                       </div></td>
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