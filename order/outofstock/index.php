<?
// has http variable in it to populate links on page.
require "../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";


# ------------------------------------------------------------------------------------------------------------
#  Check Price
# ------------------------------------------------------------------------------------------------------------

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT Price FROM tblProduct WHERE ProductID = 1;";
	$result = mysql_query($sql) or die("Cannot execute query");
					
	while($row = mysql_fetch_array($result))
	{
		$price = $row[Price];
	}
	mysql_close($link);
# ------------------------------------------------------------------------------------------------------------
#  // END - Price check
# ------------------------------------------------------------------------------------------------------------

# ------------------------------------------------------------------------------------------------------------
#  Insert Pre-order!!!
# ------------------------------------------------------------------------------------------------------------
	if($Order)
		{
			
			$err = 0;
			$errmsg = "";
			
			If($txtFirstName == "")
			{
				$errmsg .= "First Name";
				$err = 1;
			}
			
			If($txtLastName == "")
			{
				If($errmsg != "")
				{
					$errmsg .= ", ";
				}
				
				$errmsg .= "Last Name";
				$err = 1;				
			}
			
			If($txtEmail == "")
			{
				If($errmsg != "")
				{
					$errmsg .= " and ";
				}
				
				$errmsg .= "Email";
				$err = 1;
			}
			
			
			If($err == 1)
			{
				$errmessage = "<p> <font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><em>";
				$errmessage .= "Please press your back button and correct the following errors: ";
				$errmessage .= $errmsg;
				$errmessage .= "</em></font>";
				echo $errmessage;
			}
			else
			{				
			
				$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
				mysql_select_db($db) or die("Cannot select Database");
				
				$now = date("Y-m-d H:i:s");
				$ip = $_SERVER["REMOTE_ADDR"];

				$query = "INSERT INTO tblPreOrder(firstName, lastName, state, email, test, testDate, date, ip) VALUES ('$txtFirstName', '$txtLastName', '$txtState', '$txtEmail', '$cboTest', '$txtTestDate','$now', '$ip')";
				mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik@proace.com");
			
				mail("info@silenttimer.com", "New Pre-Order", "$now\n\n$txtFirstName $txtLastName pre-ordered a timer!\n\nTest: $cboTest\n\nTest Date: $txtTestDate\n\nEmail: $txtEmail", "From:$txtFirstName $txtLastName<$txtOrderEmail>");
				
mail("$txtEmail", 
"Your Silent Timer Order", 
"$txtFirstName,

Thank you for ordering THE SILENT TIMER.  As soon as we get a new shipment in, you will be notified immediately.

If you would like to find out more information about our shipment, please email or call us.

Thank you,

The Silent Timer Team
Silent Technology LLC
http://www.SilentTimer.com
info@silenttimer.com
512.542.9981", 
"From: The Silent Timer Team<info@silenttimer.com>");

				mysql_close($link);
				header("location: thankyou.php");
			}

		} //end if order clicked...

# ------------------------------------------------------------------------------------------------------------
#  END: insert pre-order
# ------------------------------------------------------------------------------------------------------------

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
	
<?	
	# link to DB for this page to use...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
?>

<script>
	
	// ------------------------------------------------------------------------ #
	//         Error Checking          ---------------------------------------- #
	// ------------------------------------------------------------------------ #
		
	function CheckOrder()
	{
	
		//set error variable equal to 0
			var e = 0;
			var eText = "";
		
			
			// -- Shipping Address Info -- ##
		 
			// first name
			if(document.frmOrder.txtFirstName.value == "")
			{
				e = 1;
				eText = "First Name";	
			}
			
			// last name
			if(document.frmOrder.txtLastName.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Last Name";
				}
				else
				{
					eText = "Last Name";
				}
				
				e = 1;	
			}
			
			// email
			var email = 0;
			
			if(document.frmOrder.txtEmail.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Email";
				}
				else
				{
					eText = "Email";
				}
				
				e = 1;	
			}
			else
			{
				// ------ this checks to make sure it is a valid email address
	
				var str = document.frmOrder.txtEmail.value;
				var at="@";
				var dot=".";
				var lat=str.indexOf(at);
				var lstr=str.length;
				var ldot=str.indexOf(dot);
				
				if (str.indexOf(at)==-1)
				{
					email = 1;
				}

				if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
				{
					email = 1;
				}

				if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
				{
					email = 1;
				}

				if (str.indexOf(at,(lat+1))!=-1)
				{
					email = 1;
				}

				if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
				{
					email = 1;
				}

				if (str.indexOf(dot,(lat+2))==-1)
				{
					email = 1;
				}

				if (str.indexOf(" ")!=-1)
				{
					email = 1;
				}
	
				// ------ this checks to make sure it is a valid email address

				if (email == 1)
				{
					if(eText != "")
					{
						eText = eText + ", and Enter a Valid Email Address";
					}
					else
					{
						eText = "Enter a Valid Email Address";
					}
					
					e = 1;
				}

			}
						
			// if an error occurs, don't submit form, and tell them what to fill in.
			if (e == 1) 
			{
				alert("Please correct the following:\n\n" + eText + ".");
				return false;
			}
			else //if all is clear
			{
				return true;
			}
			
	}


		// ------------------------------------------------------------------------ #
		// / end    Error Checking         ---------------------------------------- #
		// ------------------------------------------------------------------------ #

	function MM_openBrWindow(theURL,winName,features)
	{
	 	window.open(theURL,winName,features);
	}

</script>

		<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Out 
		  of Stock</strong></font>
		
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>We 
  are currently out of stock of <font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font>&#8482;, we will be receiving another shipment soon. If you 
  would like to find out more details, please <a href="mailto:info@silenttimer.com">email 
  us</a> or call (512) 258-8668.</strong></font></p>
<table width="300" border="1" cellpadding="4" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><div align="center">
        <table width="376" border="0" cellspacing="0" cellpadding="4">
          <tr> 
            <td width="368"><strong><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif">Expected 
              Delivery Date</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              January 13, 2004</font></strong></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">We will most 
              likely receive our shipment on this date, and will ship out to you 
              on <strong>Wednesday, January 14</strong>.</font></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Please put 
  your name on our <em>pre-order</em> list. This way, you will be emailed when 
  a timer is available, and you will get your </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><font face="Times New Roman, Times, serif">SILENT 
  TIMER</font><font color="#000000">&#8482;</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
  before other test takers. <strong>Make sure you get one, by signing up below</strong><font color="#000000"><strong>.</strong></font></font></p>
		
<p align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><font face="Times New Roman, Times, serif">THE 
		  SILENT TIMER</font><font color="#000000">&#8482;</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
		  will be ready for you soon! Good luck studying!</font></p>
		
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../../timer/demo.php">Check 
  out our online demo of our time management tool</a>, </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><font face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font><font color="#000000">&#8482;</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">. 
  You can use this while you are waiting for the real thing!</font></p>
		
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">You <strong>will 
  not</strong> be charged for your timer until you return and fill in our order 
  form. The price will be <font color="#003399"><strong>$<? echo $price;?></strong></font>. 
  Ground shipping is FREE! You can also get 2nd day or next day air for a few 
  dollars more.</font></p>
		<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Please 
		  enter all your information below. Fields marked with <strong><font color="#000066">*</font></strong> 
		  are required.</font></p>
		  
            <form action="<? echo $PHP_SELF;?>" method="post" name="frmOrder" id="frmOrder" onSubmit="return CheckOrder();">
              <table width="80%" border="0" cellspacing="0" cellpadding="5">
                <tr> 
                  
      <td width="33%"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong>First 
        Name</strong></font><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        <font color="#000066">*</font></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    <input name="txtFirstName" type="text" id="txtFirstName" size="20">
                    </font></td>
                  
      <td width="67%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Last 
        Name *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    <input name="txtLastName" type="text" id="txtLastName2">
                    </font></td>
                </tr>
                <tr align="left" valign="top"> 
                  
      <td colspan="2"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">State</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    
        			<select name="txtState" class="text">
					  <option value = "" selected>Please Select</option>
					  <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
						<option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>><? echo $row[Name];?></option>
					<?
						}
					?>
					</select>
				</font></td>
                </tr>
                <tr> 
                  
      <td colspan="2"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
        Address</font></strong></font><font color="#000033"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        *</font></strong><font size="2" face="Arial, Helvetica, sans-serif"></font></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    
        <input name="txtEmail" type="text" id="txtEmail" size="25">
                    </font></td>
                </tr>
              </table>
              <p><font size="2" face="Arial, Helvetica, sans-serif">Which test 
                will you be using <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><font face="Times New Roman, Times, serif">THE 
                SILENT TIMER</font><font color="#000000">&#8482;</font></strong></font><font color="#000033"></font> 
                for?<br>
                <select name="cboTest" id="cboTest">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[TestID]; ?>" <? if($row[TestID] == $TestID){echo "selected";}?>><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
                </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif">When is your 
                test date? (that you would like to have the timer for)<br>
                
				<SCRIPT LANGUAGE="JavaScript">
				var now = new Date();
				var calendar = new CalendarPopup("calendarDiv");
			  	</SCRIPT>
              	<a name="calendarPosition" id="calendarPosition"> </a>
				<input name="txtTestDate" type="text" id="txtTestDate" value="yyyy-mm-dd" size="20" onfocus='if(this.value == "yyyy-mm-dd") this.value = ""' onblur='if(this.value == "") this.value = "yyyy-mm-dd"'>
                <A HREF="#" onClick="calendar.select(document.forms[0].txtTestDate,'calendarPosition','yyyy-MM-dd'); return false;">Calendar PopUp</A> </font></p>
				
              
  <p> 
    <input name="Order" type="submit" id="Order" value="Order">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit3" value="Clear">
  </p>
  <p>&nbsp;</p>
  </form>

<?
	mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>