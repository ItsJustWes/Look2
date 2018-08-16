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
	// drop the old table
	$sql = "DROP TABLE IF EXISTS ".$quote.$users_table_name.$quote;
	$res_table = execute_db($sql, $conn);

	// create the new one
	$sql ="CREATE TABLE ".$quote.$users_table_name.$quote." (
	ID_user int(10) unsigned NOT NULL auto_increment,
	user_type_user varchar(50) NOT NULL,
	username_user varchar(50) NOT NULL,
	password_user varchar(32) NOT NULL,
	PRIMARY KEY  (ID_user),
	UNIQUE (username_user)
	) TYPE=InnoDB
	";

	$res_table = execute_db($sql, $conn);

	$sql = "INSERT INTO ".$quote.$users_table_name.$quote." (user_type_user, username_user, password_user) VALUES ('admin', 'root', '".md5('letizia')."')";

	$res_table = execute_db($sql, $conn);

	$sql = "INSERT INTO ".$quote.$table_list_name.$quote." (name_table, allowed_table, enable_insert_table, enable_edit_table, enable_delete_table, enable_details_table) VALUES ('".addslashes($users_table_name)."', '1', '1', '1', '1', '1')";

	$res_table = execute_db($sql, $conn);

	$table_internal_name_temp = $prefix_internal_table.$users_table_name;

	// drop (if present) the old internal table and create the new one.
	create_internal_table ($table_internal_name_temp);

	$sql = "INSERT INTO ".$quote.$table_internal_name_temp.$quote." VALUES ('ID_user', 'ID_user', 'text', 'alphanumeric', '0', '0', '0', '0', '1', '0', '0', '0', '', '', '', '', '', '', '', 'is_equal/contains/starts_with/ends_with/greater_than/less_then', '', '', '', '', '100', '', 1, '~')";
	$res_insert = execute_db($sql, $conn);
			
	$sql = "INSERT INTO ".$quote.$table_internal_name_temp.$quote." VALUES ('user_type_user', 'User type', 'select_single', 'alphanumeric', '1', '1', '1', '1', '1', '1', '0', '0', '~~admin~normal~', '', '', '', '', '', '', 'is_equal/contains/starts_with/ends_with/greater_than/less_then', '', '', '', '', '100', '', 2, '~')";
	$res_insert = execute_db($sql, $conn);

	$sql = "INSERT INTO ".$quote.$table_internal_name_temp.$quote." VALUES ('username_user', 'Username', 'text', 'alphanumeric', '1', '1', '1', '1', '1', '1', '0', '0', '', '', '', '', '', '', '', 'is_equal/contains/starts_with/ends_with/greater_than/less_then', '', '', '', '', '100', '', 3, '~')";
	$res_insert = execute_db($sql, $conn);

	$sql = "INSERT INTO ".$quote.$table_internal_name_temp.$quote." VALUES ('password_user', 'Password', 'text', 'alphanumeric', '0', '0', '1', '1', '1', '1', '0', '0', '', '', '', '', '', '', '', 'is_equal/contains/starts_with/ends_with/greater_than/less_then', '', '', '', '', '100', '', 4, '~')";
	$res_insert = execute_db($sql, $conn);
	
	echo "<p>......DaDaBIK correctly upgraded!!";
} // end if ($upgrade === 1)
else{
	echo '<p><form action="upgrade_3.2.php" method="post">';
	echo '<input type="hidden" name="upgrade" value="1">';
	echo '<input type="submit" value="Click this button to upgrade DaDaBIK">';
	echo '<p>Please note that this upgrade overwrite, if already existent, the table '.$users_table_name.'.';
	echo '</form>';
} // end else

// include footer
include ("./include/footer_admin.php");
?>