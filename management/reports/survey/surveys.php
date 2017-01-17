<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Survey Reports 
</strong></font> 
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">From 
              here you may: view sales, inventory, survey, and warranty reports.</font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">You 
              can limit your reports using dates, and other criteria.</font></p>
            
			<form name="form" method="post" action="viewreport.php">
                <table width="100%" border="0" cellspacing="0" cellpadding="10">
                  <tr> 
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"> 
                            <div align="center"> 
                              <label> 
                              <input type="checkbox" name="chkTime" value="time">
                              </label>
                            </div></td>
                          <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Time
                            Period </font></strong></td>
                          <td width="18%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">From</font></strong></td>
                          <td width="52%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">To</font></strong></td>
                        </tr>
                        <tr> 
                          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <select name="cboTime" id="cboTime">
                              <option value="all" selected>All</option>
                              <option value="today">Today</option>
                              <option value="week">Week</option>
                              <option value="month">Month</option>
                              <option value="year">Year</option>
                              <option value="other">Enter Time</option>
                            </select>
                            </font></td>
                          <td align="left" valign="top"> <input name="txtFromDate" type="text" id="txtFromDate" size="10"></td>
                          <td align="left" valign="top"> <input name="txtToDate" type="text" id="txtToDate" size="10"></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr> 
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <input type="checkbox" name="chkState" value="state">
                            </font></strong></td>
                          
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">State</font></strong></td>
                        </tr>
                        <tr> 
                          <td>
						   <select name="cboState" id="cboState2">
						   <?    
								// build combo box for the test options from the database.
								
								// build connection to database
								$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
								mysql_select_db($db) or die("Cannot select Database");
								// SQL to get data from test table
								$sql5 = "SELECT DISTINCT State FROM tblCustomer";
								//put SQL statement into result set for loop through records
								$result5 = mysql_query($sql5) or die("Cannot execute query5!");
								
								while($row = mysql_fetch_array($result5))
								{

						  	?>
                                  <option value="<? echo $row[State]; ?>" <? if ($row[State] == $state) {echo "selected";} ?>><? echo $row[State]; ?></option>
                             <?
							 	}
								mysql_close($link);
							?>
						  
						  
						  </select>
						  </td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr> 
                    <td height="67"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <input type="checkbox" name="chkCity" value="city">
                            </font></strong></td>
                          
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">City</font></strong></td>
                        </tr>
                        <tr> 
                          <td>
						   <select name="cboCity" id="cboCity2">
						   <?    
								// build combo box for the test options from the database.
								
								// build connection to database
								$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
								mysql_select_db($db) or die("Cannot select Database");
								// SQL to get data from test table
								$sql6 = "SELECT DISTINCT City FROM tblCustomer";
								//put SQL statement into result set for loop through records
								$result6 = mysql_query($sql6) or die("Cannot execute query6!");
								
								while($row = mysql_fetch_array($result6))
								{

						  	?>
                                  <option value="<? echo $row[City]; ?>" <? if ($row[City] == $city) {echo "selected";} ?>><? echo $row[City]; ?></option>
                             <?
							 	}
								mysql_close($link);
							?>
						  
						  
						  </select>
						  </td>
                        </tr>
                      </table></td>
                  </tr>
				  <tr> 
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <input type="checkbox" name="chkTest" value="test">
                            </font></strong></td>
                          
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test</font></strong></td>
                        </tr>
                        <tr> 
                          <td>
						  <select name="cboTest" id="cboTest2">
						   <?    
								// build combo box for the test options from the database.
								
								// build connection to database
								$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
								mysql_select_db($db) or die("Cannot select Database");
								// SQL to get data from test table
								$sql7 = "SELECT * FROM tblTests";
								//put SQL statement into result set for loop through records
								$result7 = mysql_query($sql7) or die("Cannot execute query7!");
								
								while($row = mysql_fetch_array($result7))
								{

						  	?>
                                  <option value="<? echo $row[TestID]; ?>" <? if ($row[TestID] == $TestID) {echo "selected";} ?>><? echo $row[Name]; ?></option>
                             <?
							 	}
								mysql_close($link);
							?>
						  
						  
						  </select></td>
                        </tr>
                      </table></td>
                  </tr>
				  <tr> 
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <input type="checkbox" name="chkPrepClass" value="prepclass">
                            </font></strong></td>
                          
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">Prep Class</font></strong></td>
                        </tr>
                        <tr> 
                          <td>
						  <select name="cboPrepClass" id="cboPrepClass2">
						   <?    
								// build combo box for the test options from the database.
								
								// build connection to database
								$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
								mysql_select_db($db) or die("Cannot select Database");
								// SQL to get data from test table
								$sql8 = "SELECT DISTINCT PrepClass FROM tblCustomer";
								//put SQL statement into result set for loop through records
								$result8 = mysql_query($sql8) or die("Cannot execute query8!");
								
								while($row = mysql_fetch_array($result8))
								{

						  	?>
                                  <option value="<? echo $row[PrepClass]; ?>" <? if ($row[PrepClass] == $prepclass) {echo "selected";} ?>><? echo $row[PrepClass]; ?></option>
                             <?
							 	}
								mysql_close($link);
							?>
						  
						  
						  </select>
						  </td>
                        </tr>
                      </table></td>
                  </tr>
				  <tr> 
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <input type="checkbox" name="chkSchool" value="school">
                            </font></strong></td>
                          
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">School</font></strong></td>
                        </tr>
                        <tr> 
                          <td><input name="txtSchool" type="text" id="txtSchool2" size="30"></td>
                        </tr>
                      </table></td>
                  </tr>
				  <tr> 
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <input type="checkbox" name="chkReferrecBy" value="referredby">
                            </font></strong></td>
                          
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">Referred By</font></strong></td>
                        </tr>
                        <tr> 
                          <td><input name="txtReferredBy" type="text" id="txtReferredBy2" size="25"></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr> 
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr> 
                          <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            <input type="checkbox" name="chkProduct" value="product">
                            </font></strong></td>
                          
            <td width="205"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
                        </tr>
                        <tr> 
                          <td>
						   <select name="cboProduct" id="cboTest2">
						   <?    
								// build combo box for the test options from the database.
								
								// build connection to database
								$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
								mysql_select_db($db) or die("Cannot select Database");
								// SQL to get data from test table
								$sql9 = "SELECT ProductName, ProductID FROM tblProduct";
								//put SQL statement into result set for loop through records
								$result9 = mysql_query($sql9) or die("Cannot execute query9!");
								
								while($row = mysql_fetch_array($result9))
								{

						  	?>
                                  <option value="<? echo $row[ProductID]; ?>" <? if ($row[ProductID] == $ProductID) {echo "selected";} ?>><? echo $row[ProductName]; ?></option>
                             <?
							 	}
								
							?>
						  
						  
						  </select>
						  </td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr> 
                    <td><input type="submit" name="Submit" value="Get Reports"></td>
                  </tr>
                </table>
              </form>

				
				
				
				
				
				<p align="left">&nbsp;</p>
				<p align="left">&nbsp;</p>
				<p align="left">&nbsp;</p>
				<p align="left">&nbsp;</p>



  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);
// has side menu, and bottom HTML TAGS - found in local folder
require "../include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../include/footerlinks.php";


// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>