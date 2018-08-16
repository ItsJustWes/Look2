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

// include config, functions, common and header
include ("./include/config.php");

// hack for oracle, all field names fetched in lower case
if ($dbms_type === 'oci8po') {
	define('ADODB_ASSOC_CASE', 0); 
} // end if

include('./include/adodb/adodb.inc.php'); 
include ("./include/functions.php");
include ("./include/common_start.php");
include ("./include/check_installation.php");
include ("./include/check_table.php");
include ("./include/header_admin.php");

// variables:

if (isset($_POST["upgrade"])){
	$upgrade = (int)$_POST["upgrade"];
} // end if
else{
	$upgrade = "";
} // end else


if ($upgrade === 1){
	$data_dictionary = NewDataDictionary($conn);

	// add the new field
	$fields = "
		alias_table C(255) DEFAULT '' NOTNUL
		)
	";
	$res = add_table_column_db($conn, $data_dictionary, $table_list_name, $fields);

	// put the table name in the alias
	$sql = "SELECT name_table FROM ".$table_list_name;

	$res = execute_db($sql, $conn);
	while ($row = fetch_row_db($res)) {
		$name_table = $row['name_table'];
		$sql = "UPDATE ".$table_list_name." SET alias_table = '".$name_table."' WHERE name_table = '".$name_table."'";

		$res_2 = execute_db($sql, $conn);
	} // end while

	
	echo "<p>......DaDaBIK correctly upgraded!!";
} // end if ($upgrade === 1)
else{
	echo '<p><form action="upgrade_4.1.php" method="post">';
	echo '<input type="hidden" name="upgrade" value="1">';
	echo '<input type="submit" value="Click this button to upgrade DaDaBIK">';
	echo '</form>';
} // end else

// include footer
include ("./include/footer_admin.php");
?>