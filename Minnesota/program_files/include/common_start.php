<?php
/*
***********************************************************************************
DaDaBIK (DaDaBIK is a DataBase Interfaces Kreator) http://www.dadabik.org/
Copyright (C) 2001-2007  Eugenio Tacchini

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

If you want to contact me by e-mail, this is my address: eugenio.tacchini@unicatt.it
***********************************************************************************
*/
?>
<?php
ob_start();

if (get_magic_quotes_gpc()==0){
	echo "<p><b>[00] Error:</b> you have to set magic_quotes_gpc to On in php.ini.";
	exit;
} // end if

if ($dbms_type != "" && $host != "" && $user != "" && $db_name != "" && $site_url != "" && $site_path != "") {

	/*
	// connect server
	$conn = connect_db($host, $user, $pass);

	// select the database
	select_db($db_name, $conn);
	*/

	/* 4.0 */
	$conn = connect_db($host, $user, $pass, $db_name);

	/* 4.0 */
	$conn->SetFetchMode(ADODB_FETCH_BOTH);

	/* 4.0 */
	if ($enable_sql_logging === 1) {
		$conn->LogSQL();
	} // end if

	/* 4.0 */
	/*
	$mysql_server_version = mysql_get_server_info($conn);

	$mysql_server_version_ar = explode('.', $mysql_server_version);

	// if something is not ok, I set the version to 3.21.0, I see this in PHPMyAdmin
	if (!isset($mysql_server_version_ar) || !isset($mysql_server_version_ar[0])) {
		$mysql_server_version_ar[0] = 3;
	}
	if (!isset($mysql_server_version_ar[1])) {
		$mysql_server_version_ar[1] = 21;
	}
	if (!isset($mysql_server_version_ar[2])) {
		$mysql_server_version_ar[2] = 0;
	}

	$mysql_server_version = (int)sprintf('%d%02d%02d', $mysql_server_version_ar[0], $mysql_server_version_ar[1], intval($mysql_server_version_ar[2])); // intval because it could be e.g. 3.23.41-nt

	if ($mysql_server_version >= 32306){
		$quote = "`";
	} // end if
	else{
		$quote = ""; // versions before 3.23.06 don't support back quote
	} // end else

	if ($mysql_server_version > 32300){
		$use_limit_in_update = 1;
	} // end if
	else{
		$use_limit_in_update = 0; // versions before 3.23.00 don't support limit in update statements
	} // end else 
	*/

	/* 4.0 */
	$use_limit_in_update = 0;
	$quote = $conn->nameQuote;

	if ($dbms_type === 'mssql' || $dbms_type === 'oci8po') { // hack for mssql and oracle
		$quote = '';
	} // end if

} // end if
else{
	echo "<p><b>[01] Error:</b> please specify host, username, database name, site url and site path in config.php.";
	exit;
} // end else

// tables present in the databse
$table_names_ar = build_tables_names_array(0, 0);

if (count($table_names_ar) == 0){ // no table
	echo "<p><b>[02] Error:</b> your database ".$db_name." is empty. No tables found. Please create some tables to manage before using DaDaBIK.";
	exit;
} // end if

ini_set('session.cookie_path', $site_path);
session_start();

if (!isset($_POST)){
	$_POST=$HTTP_POST_VARS;
}
if (!isset($_GET)){
	$_GET=$HTTP_GET_VARS;
}
if (!isset($_FILES)){
	$_FILES=$HTTP_POST_FILES;
}
if (!isset($_SESSION)){
	$_SESSION=$HTTP_SESSION_VARS;
}

// the var is set in check_login but check_login it's not included by e.g. admin, and it's useful for some functions (e.g. build_tables_names_array) to have it set
$current_user_is_administrator = 0;

?>