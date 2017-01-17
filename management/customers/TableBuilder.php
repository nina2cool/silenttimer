<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


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
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;?</font><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  #Code
      for Adding to Table</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">#Double check the table
    names and spaces and commas in the code. Delete primary key IDs. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">// build connection to database<br>
  $link = mysql_connect($location, $user, $pass) or die(&quot;Cannot connect to
    server&quot;);<br>
  mysql_select_db($db) or die(&quot;Cannot select Database&quot;);</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">$Now = date(&quot;Y-m-d&quot;);</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"> If ($_POST['Add'] == &quot;Add&quot;)<br>
{</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">
  <?
		$sql = "DESCRIBE tblContact";
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
  $sql = &quot;INSERT INTO tblContact(<?
		$sql = "DESCRIBE tblContact";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
  <? echo $FieldName; ?>, 
  <?
}
?>)
  <br>
  VALUES(<?
		$sql = "DESCRIBE tblContact";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
  '$<? echo $FieldName; ?>', 
  <?
}
?>);"; <br>
  <br>
$result = mysql_query($sql) or die("Cannot insert into table"); </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">}</font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>#Create
Table for User Input<br> 
</strong></font><font size="2" face="Arial, Helvetica, sans-serif">?&gt;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;font color=&quot;#003399&quot; size=&quot;5&quot; face=&quot;Arial,
    Helvetica, sans-serif&quot;&gt;&lt;strong&gt;Add tblContact&lt;/strong&gt;&lt;/font&gt;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;form name=&quot;form1&quot; method=&quot;post&quot; action=&quot;&quot;&gt;<br>
&lt;table width=&quot;100%&quot; border=&quot;1&quot; cellpadding=&quot;5&quot; cellspacing=&quot;0&quot; bordercolor=&quot;#CCCCCC&quot;&gt;<br>
  <?	
		$sql = "DESCRIBE tblContact";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
		?>
&lt;tr&gt;<br>
&lt;td&gt;&lt;font size=&quot;2&quot; face=&quot;Arial, Helvetica, sans-serif&quot;&gt;<? echo $FieldName; ?>&lt;/font&gt;&lt;/td&gt;<br>
&lt;td&gt;&lt;font size=&quot;2&quot; face=&quot;Arial, Helvetica, sans-serif&quot;&gt;&lt;input
name=&quot;<? echo $FieldName; ?>&quot; type=&quot;text&quot; id=&quot;<? echo $FieldName; ?>&quot;&gt;&lt;/font&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
  <?
}
?>
&lt;/table&gt;<br>
</font><font size="2" face="Arial, Helvetica, sans-serif">&lt;p&gt;<br>
&lt;input name=&quot;Add&quot; type=&quot;submit&quot; id=&quot;Add&quot; value=&quot;Add&quot;&gt;<br>
&lt;/p&gt;<br>
&lt;/form&gt;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;?<br>
</font><font size="2" face="Arial, Helvetica, sans-serif">mysql_close($link);<br>
?&gt;</font></p>
<p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>For
      Editing
</strong></font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><font color="#000000">&lt;?</font></font></p>
<p><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif">$ID
      = $_GET['id'];</font></font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>#Code
  for Updating to Table</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">#Add the WHERE clause in
the sql statement, double check the table names. Delete primary key IDs. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">// build connection to database<br>
  $link = mysql_connect($location, $user, $pass) or die(&quot;Cannot connect to
    server&quot;);<br>
  mysql_select_db($db) or die(&quot;Cannot select Database&quot;);</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">$Now = date(&quot;Y-m-d&quot;);</font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">If ($_POST['Update'] == &quot;Update&quot;)<br>
{</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">
<?
		$sql = "DESCRIBE tblContact";
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
$sql = "UPDATE tblContact SET
<?
		$sql = "DESCRIBE tblContact";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
?>
<? echo $FieldName; ?> = '$<? echo $FieldName; ?>', 
<?
}
?>
WHERE ID = '$ID'"; <br>
<br>
$result = mysql_query($sql) or die("Cannot update table"); </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">}</font></p>
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>#Code
for Filling out the table</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">$sql2 = &quot;SELECT *
    FROM tblContact WHERE ID = '$ID'&quot;;<br>
  $result2 = mysql_query($sql2) or die(&quot;Cannot populate table&quot;);</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">while($row2 = mysql_fetch_array($result2))<br>
{</font></p>

<font size="2" face="Arial, Helvetica, sans-serif">
<?
		$sql = "DESCRIBE tblContact";
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
<p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>#Create
Table for User Input<br>
</strong></font><font size="2" face="Arial, Helvetica, sans-serif">?&gt;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;font color=&quot;#003399&quot; size=&quot;5&quot; face=&quot;Arial,
Helvetica, sans-serif&quot;&gt;&lt;strong&gt;Edit  this table&lt;/strong&gt;&lt;/font&gt;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;form name=&quot;form1&quot; method=&quot;post&quot; action=&quot;&quot;&gt;<br>
&lt;table width=&quot;100%&quot; border=&quot;1&quot; cellpadding=&quot;5&quot; cellspacing=&quot;0&quot; bordercolor=&quot;#CCCCCC&quot;&gt;<br>
<?	
	
		$sql = "DESCRIBE tblContact";
		$result = mysql_query($sql) or die("cannot do it");
		
		while($row = mysql_fetch_array($result))
		{
		$FieldName = $row[Field];
		?>
&lt;tr&gt;<br>
&lt;td&gt;&lt;font size=&quot;2&quot; face=&quot;Arial, Helvetica, sans-serif&quot;&gt;<? echo $FieldName; ?>&lt;/font&gt;&lt;/td&gt;<br>
&lt;td&gt;&lt;font size=&quot;2&quot; face=&quot;Arial, Helvetica, sans-serif&quot;&gt;&lt;input
name=&quot;<? echo $FieldName; ?>&quot; type=&quot;text&quot; id=&quot;<? echo $FieldName; ?>&quot; value=&quot;&lt;?
echo $<? echo $FieldName; ?>; ?&gt;&quot;&gt;&lt;/font&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
<?
}
?>
&lt;/table&gt;<br>
</font><font size="2" face="Arial, Helvetica, sans-serif">&lt;p&gt;<br>
&lt;input name=&quot;Update&quot; type=&quot;submit&quot; id=&quot;Update&quot; value=&quot;Update&quot;&gt;<br>
&lt;/p&gt;<br>
&lt;/form&gt;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt;?<br>
mysql_close($link);<br>
?&gt;</font></p>
<font size="2" face="Arial, Helvetica, sans-serif">
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);



}
?>
</font>