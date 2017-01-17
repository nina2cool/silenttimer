<?

	// has database username and password, so don't need to put it in the page.
	require "../../include/dbinfo.php";
	require "include/header.php";
	require "include/sidemenu.php";
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$Today = date("M d, Y");
	
	if ($_POST['NewTask'] == "Create")
	{
		$Name = $_POST['Name'];
		$Priority = $_POST['Priority'];
		
		$Type = $_POST['Type'];
		$Task = $_POST['Task'];
		
		$Now = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO tblTasks(Person, Task, Priority, Type, DateCreate, Status) 
				VALUES ('$Name', '$Task', '$Priority', '$Type', '$Now', 'active');";
		mysql_query($sql) or die("Cannot Insert New Task, try again!");

	}

	// buld SQL to fill urgent things that need to be done!
	$sql = "SELECT tblEmployee.FirstName, tblTasks.Task, tblTasks.TaskID, tblTasks.Percent, tblTasks.Type, tblTasks.Person 
			FROM tblTasks INNER JOIN tblEmployee ON tblTasks.Person = tblEmployee.EmployeeID
			WHERE tblTasks.Status = 'active' AND tblTasks.Priority = 'high' AND tblEmployee.Status = 'active';";

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>


<title>To Do List</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div align="center">
  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td><font size="3" face="Arial, Helvetica, sans-serif"><em>Today's Date:</em> <strong><font color="#003399"><? echo $Today; ?></font></strong></font></td>
      <td><div align="right">
        <form action="tasks.php" method="get" name="frmJump" id="frmJump">
          
            <div align="right">
  <select name="pID" id="pID">
                <option value="home" selected>Select Name</option>
                <?
					//get list of Company Reps!
					$sql = "SELECT EmployeeID, FirstName, LastName 
							FROM tblEmployee
							WHERE Status = 'active'
							ORDER BY FirstName;";
					//put SQL statement into result set for loop through records
					$result2 = mysql_query($sql) or die("Cannot get rep names!");
					while($row = mysql_fetch_array($result2))
					{
		
			  ?>
                <option value="<? echo $row[EmployeeID];?>"><? echo "$row[FirstName] $row[LastName]";?></option>
                <?
			  		}
			  ?>
              </select>
&nbsp;
      <input type="submit" name="Submit" value="Go">
            </div>
        </form>
      </div></td>
    </tr>
  </table>
  <p align="left"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong>High
  Priorities</strong></font></p>
  <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td width="16%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Name</font></strong></td>
      <td width="67%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Task</font></strong></td>
      <td width="7%"><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">%</font></strong></font></div></td>
      <td width="10%"><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></font></div></td>
    </tr>
    <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$tID = $row[TaskID];
				$fName = $row[FirstName];
				$task = $row[Task];
				$percent = $row[Percent];
				$type = $row[Type];
				$person = $row[Person];
				
			  ?>
    <tr class="info">
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="tasks.php?pID=<? echo $person;?>"><? echo $fName;?></a></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $task;?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $percent;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $type;?></font></div></td>
    </tr>
    <?
			  	}
			  ?>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><form action="" method="post" name="frmCreate" id="frmCreate">
          <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Create
                New Task</strong></font></p>
          <table width="100%"  border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Task</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <textarea name="Task" cols="50" id="textarea"></textarea>
              </font></td>
            </tr>
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Name</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="Name" id="select4">
                  <option>Select</option>
                  <?
					//get list of Company Reps!
					$sql = "SELECT EmployeeID, FirstName, LastName 
							FROM tblEmployee
							WHERE Status = 'active'
							ORDER BY FirstName;";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot get rep names!");
					while($row = mysql_fetch_array($result))
					{
							
			  ?>
                  <option value="<? echo $row[EmployeeID];?>" <? if($pID==$row[EmployeeID]){echo "selected";}?>><? echo "$row[FirstName] $row[LastName]";?></option>
                  <?
			  		}
			  ?>
                </select>
              </font></td>
            </tr>
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Priority</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="Priority" id="select5">
                  <option value="high">HI</option>
                  <option value="medium">MEDIUM</option>
                  <option value="low" selected>LOW</option>
                </select>
              </font></td>
            </tr>
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="Type" id="select6">
                  <option value="work" selected>Work</option>
                  <option value="personal">Personal</option>
                </select>
              </font></td>
            </tr>
          </table>
          <p>
            <input name="NewTask" type="submit" id="NewTask3" value="Create">
          </p>
      </form></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<?
		//close connection to database
		mysql_close($link);
		
		require "include/footer.php";
		
?>