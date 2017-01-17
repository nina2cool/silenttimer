
<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?	

	//grab variables to get purchase info from DB.
	$Table = $_GET['table'];
	$NoteID = $_GET['note'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	

	
	?>
		
<p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>For
      Adding</strong></font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Code
      for Adding to Table </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">
  <?
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
  
$<? echo $FieldName; ?> = $_POST['<? echo $FieldName; ?>'];<br>
  
<?
			}
?>
	  

  <br>
  $sql = &quot;INSERT INTO tbl(
  <?
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
  <? echo $FieldName; ?>, 
  <?
}
?>
  )
  <br>
  VALUES(
  
<?
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
  '$<? echo $FieldName; ?>', 
  <?
}
?>
  );"; <br>
  <br>
$result = mysql_query($sql) or die("Cannot insert into table"); </font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Create
      Table for User Input </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;form name=&quot;form1&quot; method=&quot;post&quot; action=&quot;&quot;&gt;<br>
&lt;table width=&quot;100%&quot; border=&quot;1&quot; cellpadding=&quot;5&quot; cellspacing=&quot;0&quot; bordercolor=&quot;#CCCCCC&quot;&gt;<br>
  <?	
	
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
		?>
&lt;tr&gt;<br>
&lt;td&gt;<? echo $FieldName; ?>&amp;nbsp;&lt;/td&gt;<br>
&lt;td&gt;&lt;input name=&quot;<? echo $FieldName; ?>&quot; type=&quot;text&quot; id=&quot;<? echo $FieldName; ?>&quot;&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
  <?
}
?>
&lt;/table&gt;<br>
&lt;/form&gt;</font></p>
<p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>For
      Editing
</strong></font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Code
for Adding to Table</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">
<?
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
$<? echo $FieldName; ?> = $_POST['<? echo $FieldName; ?>'];<br>
<?
			}
?>
<br>
$sql = "UPDATE tblCustomer SET 
<?
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
<? echo $FieldName; ?> = '$<? echo $FieldName; ?>', 
<?
}
?>
WHERE ";

<br>
<br>
$result = mysql_query($sql) or die("Cannot insert into table"); </font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Code
for Filling out the table </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">$sql2 = &quot;SELECT * FROM tblCustomer WHERE &quot;;<br>
  $result2 = mysql_query($sql2) or die(&quot;Cannot populate table&quot;);</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">while($row2 = mysql_fetch_array($result2))<br>
{</font></p>

<font size="2" face="Arial, Helvetica, sans-serif">
<?
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
$<? echo $FieldName; ?> = $row2[<? echo $FieldName; ?>];<br>
<?
}
?>
</font>
<p><font size="2" face="Arial, Helvetica, sans-serif">}</font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Create
Table for User Input</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;form name=&quot;form1&quot; method=&quot;post&quot; action=&quot;&quot;&gt;<br>
&lt;table width=&quot;100%&quot; border=&quot;1&quot; cellpadding=&quot;5&quot; cellspacing=&quot;0&quot; bordercolor=&quot;#CCCCCC&quot;&gt;<br>
<?	
	
		$sql = "DESCRIBE tblCustomer";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
		?>
&lt;tr&gt;<br>
&lt;td&gt;<? echo $FieldName; ?>&amp;nbsp;&lt;/td&gt;<br>
&lt;td&gt;&lt;input name=&quot;<? echo $FieldName; ?>&quot; type=&quot;text&quot; id=&quot;<? echo $FieldName; ?>&quot; value=&quot;&lt;?
echo $<? echo $FieldName; ?>; ?&gt;&quot;&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
<?
}
?>
&lt;/table&gt;<br>
&lt;/form&gt;</font></p>
<font size="2" face="Arial, Helvetica, sans-serif">
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>
</font>