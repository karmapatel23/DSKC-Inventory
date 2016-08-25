<?php
###########################################################
/*
This software belongs to DSKC.TK modifying or usage of this file is strictly
prohibited without an explicit permission from the creator.
*/
###########################################################

/* Define MySQL connection details and database table name */ 
$SETTINGS["hostname"] = 'sql304.byethost7.com:3306';
$SETTINGS["mysql_user"] = 'b7_14337608';
$SETTINGS["mysql_pass"] = 'Wesharethis1';
$SETTINGS["mysql_database"] = 'b7_14337608_login';
$SETTINGS["USERS"] = 'php_users_login'; // this is the default table name that we used

/* Connect to MySQL */
$connection = mysql_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
$db = mysql_select_db($SETTINGS["mysql_database"], $connection) or die ('request "Unable to select database."');
?>