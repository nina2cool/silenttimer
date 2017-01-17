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
              <td align="left" valign="top" class="box1"><div align="center"><a href="#"></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>index.php">&lt; 
                  Home</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>timer">About 
                  SILENT TIMER&#8482;</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>timer/functions.php">Timer 
                  Features</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>timer/why.php">Why 
                  Use a Timer?</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $https;?>order">Order 
                  Your Timer</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>legal/guarantee.php">Guaranteed 
                  Results</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>timer/demo.php">Online 
                  Demo</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>gallery/">Picture 
                  Gallery </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>handbook">Test 
                  Handbook</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>stories">Testimonials</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>timer/faq.php">FAQ</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>links.php">Testing 
                  Links</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>testdates.php">Test 
                  Dates </a></font></div></td>
            </tr>
      

	  
	        <tr>
	          <td align="left" valign="top" class="box1"><font size="2" face="Arial, Helvetica, sans-serif"><a href="news/index.php">News
              &amp; Press Releases</a></font></td>
            </tr>
	        <tr> 
              <td align="left" valign="top" class="box1"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>resell">Partner 
                  Opportunity</a></font></div></td>
            </tr>
 

            <tr>
  	   <?
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database 1");
		
		$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
		$result = mysql_query($sql) or die("Cannot execute query");

		while($row = mysql_fetch_array($result))
		
		{
				$Phone = $row[CellPhone];
		}
		
		mysql_close($link);
 ?>
              <td align="left" valign="bottom"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>1-<?php echo $Phone; ?></strong></font></div></td>
     
		
		    </tr>

            <tr> 
              <td align="left" valign="bottom"><p><font color="#FF00FF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                      <font color="#FFFFFF">Sign up for Silent Timer updates - NEW VERSION IS HERE! </font></strong></font></p>
                <form action="<?echo $PHP_SELF ?>" method="post" name="frmEmail" id="frmEmail">
                  <font color="#FFFFFF">
                  <input name="txtEmail" type="text" id="txtEmail" value = "Enter Email" size="10" onfocus='if(this.value == "Enter Email") this.value = ""' onblur='if(this.value == "") this.value = "Enter Email"'>
                  <input TYPE='submit' name="SubmitEmail" value="Go">
                  </font>
                </form>
                <p><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>The
                      Silent Watch is coming later this year...sign up for updates! </strong></font></p>
                <form action="<?echo $PHP_SELF ?>" method="post" name="frmEmail" id="frmEmail">
                  <input name="txtEmailWatch" type="text" id="txtEmailWatch" value = "Enter Email" size="10" onfocus='if(this.value == "Enter Email") this.value = ""' onblur='if(this.value == "") this.value = "Enter Email"'>
                  <input name="SubmitEmailWatch" TYPE='submit' id="SubmitEmailWatch" value="Go">
                </form>
                <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Add <a href="mailto:info@silenttimer.com">info@silenttimer.com</a> to your safe list, so our
                emails won't be filtered out.</font>                <?php

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
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p align="center"><a href="" onclick="Rcertify();return false;"><img src="<? echo $http; ?>pics/ReliabilitySeal3.gif" alt="BBBOnLine Reliability Seal" BORDER=0></a> 
                  <br>
                  <br>
                  <img src="<? echo $http; ?>order/pics/visa-mast-amex-grey.jpg"></p></td>
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

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=372705; 
var sc_partition=1; 
var sc_invisible=1; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c2.statcounter.com/counter.php?sc_project=372705&amp;amp;java=0&amp;amp;invisible=1" alt="free hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

</BODY>
</HTML>