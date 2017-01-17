<?
# ----------------------------------------------------------------------------
#           CODE TO DEFINE SESSION HANDLING TO MYSQL DATABASE
# ----------------------------------------------------------------------------

# Session Table
$sess_table = "tblSessions";
# Session Table
$sess_db = "silenttimer";
# Retrieve the session maximum lifetime (found in php.ini)
$lifetime = get_cfg_var("session.gc_maxlifetime");




#=============
# function: mysql_session_open()
# purpose: Opens a persistent server connection and selects the database.
#=============

function mysql_session_open($session_path, $session_name)
{
	mysql_pconnect("localhost", "silenttimer", "2559") or die("Can't connect to Silent Timer database! ");
	
	mysql_select_db("silenttimer") or die("Can't select Silent Timer sessions database");
}
# end mysql_session_open()



#=============
# function: mysql_session_close()
# purpose: Doesn't actually do anything since the server connection is 
#    persistent. Keep in mind that although this function 
#    doesn't do anything in my particular implementation, I 
#    still must define it.
#=============

function mysql_session_close()
{
	return 1;
} 
# end mysql_session_close()





#=============
# function: mysql_session_select()
# purpose: Reads the session data from the database
#=============

function mysql_session_select($SID)
{
	global $sess_db;
	global $sess_table;
	
	$query = "SELECT value FROM $sess_table WHERE SID = '$SID' AND expiration > ". time();
	
	$result = mysql_query($query);

}
# end mysql_session_select()






#=============
# function: mysql_session_write()
# purpose: This function writes the session data to the database. If that SID // already exists, then the existing data will be updated.
#=============

function mysql_session_write($SID, $value)
{
	global $sess_db;
	global $sess_table;
	global $lifetime;
	
	$expiration = time() + $lifetime;
	
	$query = "INSERT INTO $sess_table VALUES('$SID', '$expiration', '$value')";
	
	$result = mysql_query($query);
	
	if (!$result)
	{
		$query = "UPDATE $sess_table SET expiration = '$expiration', value = '$value' WHERE SID = '$SID' AND expiration >". time();
	
		$result = mysql_query($query);
	}

}
# end mysql_session_write()






#=============
# function: mysql_session_destroy()
# purpose: deletes all session information having input SID (only one row)
#=============

function mysql_session_destroy($sessionID)
{
	global $sess_table;
	
	$query = "DELETE FROM $sess_table WHERE SID = '$sessionID'";
	$result = mysql_query($query);

}
# end mysql_session_destroy()





#=============
# function: mysql_session_garbage_collect()
# purpose: deletes all sessions that have expired.
#=============

function mysql_session_garbage_collect($lifetime)
{
	global $sess_table;
	
	$query = "DELETE FROM $sess_table WHERE sess_expiration < ".time() - $lifetime;
	
	$result = mysql_query($query);
	
	return mysql_affected_rows($result);
	
}
# end mysql_session_garbage_collect()

?>