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
	// get all the tables installad
	$tables_names_ar = build_tables_names_array(0, 1);

	foreach ($tables_names_ar as $table_name){

		$sql = "ALTER TABLE ".$prefix_internal_table.$table_name." CHANGE type_field type_field ENUM( 'text', 'textarea', 'rich_editor', 'password', 'insert_date', 'update_date', 'date', 'select_single', 'generic_file', 'image_file', 'ID_user', 'unique_ID' ) DEFAULT 'text' NOT NULL";

		$res = execute_db($sql, $conn);

		$sql = "ALTER TABLE ".$prefix_internal_table.$table_name." CHANGE content_field content_field ENUM( 'alphabetic', 'alphanumeric', 'numeric', 'url', 'email', 'html', 'phone', 'city' ) DEFAULT 'alphanumeric' NOT NULL ";

		$res = execute_db($sql, $conn);

	} // end foreach
	
	echo "<p>......DaDaBIK correctly upgraded!!";
} // end if ($upgrade === 1)
else{
	echo '<p><form action="upgrade.php" method="post">';
	echo '<input type="hidden" name="upgrade" value="1">';
	echo '<input type="submit" value="Click this button to upgrade DaDaBIK">';
	echo '</form>';
} // end else

// include footer
include ("./include/footer_admin.php");
?>