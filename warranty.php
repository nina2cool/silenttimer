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
<?
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
		$result = mysql_query($sql) or die("Cannot execute query");

		while($row = mysql_fetch_array($result))
		
		{
				$TollPhone = $row[CellPhone];
				$Phone = $row[HomePhone];
				$Address = $row[Address];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Email = $row[Email];
		}
		
		mysql_close($link);



?>
			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Warranty</font></strong></p>
            
            <p><font face="Arial, Helvetica, sans-serif"><strong> <font size="2">Limited
                    Six-Month Warranty for The Silent Timer </font></strong></font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> Silent Technology
                LLC warrants The Silent Timer against manufacturing defects in
                material and workmanship under normal use for six (6) months
                from the date of purchase from SilentTimer.com or other authorized
                Silent Technology LLC retailers. EXCEPT AS PROVIDED HEREIN, SILENT
                TECHNOLOGY LLC, MAKES NO EXPRESS WARRANTIES AND NO IMPLIED WARRANTIES,
                INCLUDING THOSE OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
                PURPOSE, ARE LIMITED IN DURATION TO THE DURATION OF THE WRITTEN
                LIMITED WARRANTIES CONTAINED HEREIN. EXCEPT AS PROVIDED HEREIN,
                SILENT TECHNOLOGY LLC WILL HAVE NO LIABILITY OR RESPONSIBILITY
                TO CUSTOMER OR ANY OTHER PERSON OR<a> ENTITY
              WITH RESPECT TO ANY LIABILITY, LOSS OR DAMAGE CAUSED DIRECTLY OR
              INDIRECTLY BY USE OR PER</a> FORM ANCE OF THE PRODUCT OR RISING
              OUT OF ANY BREACH OF THIS WARRANTY, INCLUDING, BUT NOT LIMITED
              TO ANY DAMAGES RESULTING FROM INCONVENIENCE, LOSS OF TIME, DATA,
              PROPERTY, REVENUE, OR PROFIT, OR ANY INDIRECT, SPECIAL, INCIDENTAL,
              OR CONSEQUENTIAL DAMAGES, EVEN IF SILENT TECHNOLOGY LLC HAS BEEN
              ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. </font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> Some states do not allow limitations on how long an implied warranty
              lasts or the exclusion or limitation of incidental or consequential
              damages, so the above limitations or exclusions may not apply to
              you. </font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> In the event
                of a product defect during the warranty period, email <a href="mailto:info@silenttimer.com"> info@silenttimer.com </a> .
              You must be the original purchaser, and have your Order Number
              and sales receipt to receive warranty service. All instructions
              for warranty process are found on the web site. The warranty is
                only valid for The Silent Timer. Silent Technology LLC will,
                at its option, unless otherwise provided by law: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"> (a) correct the defect by product repair without charge for parts
              and labor; </font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> (b) replace the product with one of the same or similar design;
              or </font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> (c) refund the purchase price.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> All replaced parts and products, and products on which a refund
              is made, become the property of Silent Technology LLC. New or reconditioned
              parts and products may be used in the performance
              of warranty service. Repaired or replaced parts and products are
              warranted for the remainder of the original warranty period. You
              will be charged for repair or replacement of the product made after
              the expiration of the warranty period.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> This warranty
                does not cover: (a) damage or failure caused by or attributable
                to acts of God, abuse, accident, misuse, improper or abnormal
                usage, failure to follow instructions, improper installation
                or maintenance, alteration, lightning or other incidence of excess
              voltage or current; (b) any repairs other than those provided by
              a Silent Technology LLC Authorized Facility; (c) consumables such
              as fuses or batteries; (d) cosmetic damage; (e) transportation,
              shipping or insurance costs; or (f) costs of product removal, installation,
              set-up service adjustment or reinstallation; (g) products other
                than The Silent Timer. </font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> This warranty gives you specific legal rights, and you may also
              have other rights, which vary from state to state.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"> Silent Technology LLC <br>
  Austin , TX 78704</font></p>
<font size="2" face="Arial, Helvetica, sans-serif">July 2009</font>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Questions? Please <a href="../contactus.php">contact
            us</a>. </strong></font></p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>