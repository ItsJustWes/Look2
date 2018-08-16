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

	$installed_table_infos_ar = build_installed_table_infos_ar(0, 0);

	foreach ($installed_table_infos_ar as $installed_table){

		// get the array containg label ant other information about the fields
		$fields_labels_ar = build_fields_labels_array($prefix_internal_table.$installed_table['name_table'], '0');

		// drop (if present) the old internal table and create the new one.
		create_internal_table($prefix_internal_table.$installed_table['name_table']);

		for ($i=0; $i<count($fields_labels_ar); $i++){
			
			// copy the old value in the internal table
			$name_field_temp = addslashes($fields_labels_ar[$i]["name_field"]);
			$present_insert_form_field_temp = addslashes($fields_labels_ar[$i]["present_insert_form_field"]);
			$present_search_form_field_temp = addslashes($fields_labels_ar[$i]["present_search_form_field"]);
			$present_ext_update_form_field_temp = addslashes($fields_labels_ar[$i]["present_ext_update_form_field"]);
			$required_field_temp = addslashes($fields_labels_ar[$i]["required_field"]);
			$present_results_search_field_temp = addslashes($fields_labels_ar[$i]["present_results_search_field"]);
			$present_details_form_field_temp = addslashes($fields_labels_ar[$i]["present_details_form_field"]);
			$check_duplicated_insert_field_temp = addslashes($fields_labels_ar[$i]["check_duplicated_insert_field"]);
			$type_field_temp = addslashes($fields_labels_ar[$i]["type_field"]);
			$content_field_temp = addslashes($fields_labels_ar[$i]["content_field"]);
			$separator_field_temp = addslashes($fields_labels_ar[$i]["separator_field"]);
			$select_options_field_temp = addslashes($fields_labels_ar[$i]["select_options_field"]);
			$select_type_field_temp = addslashes($fields_labels_ar[$i]["select_type_field"]);
			$prefix_field = addslashes($fields_labels_ar[$i]["prefix_field"]);
			$default_value_field = addslashes($fields_labels_ar[$i]["default_value_field"]);
			$label_field_temp = addslashes($fields_labels_ar[$i]["label_field"]);
			$width_field_temp = addslashes($fields_labels_ar[$i]["width_field"]);
			$height_field_temp = addslashes($fields_labels_ar[$i]["height_field"]);
			$maxlength_field_temp = addslashes($fields_labels_ar[$i]["maxlength_field"]);
			$hint_insert_field_temp = addslashes($fields_labels_ar[$i]["hint_insert_field"]);
			$order_form_field_temp = addslashes($fields_labels_ar[$i]["order_form_field"]);
			$other_choices_field_temp = addslashes($fields_labels_ar[$i]["other_choices_field"]);
			$primary_key_field_field_temp = addslashes($fields_labels_ar[$i]["primary_key_field_field"]);
			$primary_key_table_field_temp  = addslashes($fields_labels_ar[$i]["primary_key_table_field"]);
			$primary_key_db_field_temp = addslashes($fields_labels_ar[$i]["primary_key_db_field"]);
			$linked_fields_field_temp = addslashes($fields_labels_ar[$i]["linked_fields_field"]);
			$linked_fields_order_by_field_temp = addslashes($fields_labels_ar[$i]["linked_fields_order_by_field"]);
			$linked_fields_order_type_field_temp = addslashes($fields_labels_ar[$i]["linked_fields_order_type_field"]);

			$sql = "insert into ".$quote.$prefix_internal_table.$installed_table['name_table'].$quote." (".$quote."name_field".$quote.", ".$quote."present_insert_form_field".$quote.", ".$quote."present_search_form_field".$quote.", ".$quote."required_field".$quote.", ".$quote."present_results_search_field".$quote.", ".$quote."present_details_form_field".$quote.", ".$quote."present_ext_update_form_field".$quote.", ".$quote."check_duplicated_insert_field".$quote.", ".$quote."type_field".$quote.", ".$quote."content_field".$quote.", ".$quote."separator_field".$quote.", ".$quote."select_options_field".$quote.", ".$quote."select_type_field".$quote.", ".$quote."prefix_field".$quote.", ".$quote."default_value_field".$quote.", ".$quote."label_field".$quote.", ".$quote."width_field".$quote.", ".$quote."height_field".$quote.", ".$quote."maxlength_field".$quote.", ".$quote."hint_insert_field".$quote.", ".$quote."order_form_field".$quote.", ".$quote."other_choices_field".$quote.", ".$quote."primary_key_field_field".$quote.", ".$quote."primary_key_table_field".$quote.", ".$quote."primary_key_db_field".$quote.", ".$quote."linked_fields_field".$quote.", ".$quote."linked_fields_order_by_field".$quote.", ".$quote."linked_fields_order_type_field".$quote.") values ('".$name_field_temp."', '".$present_insert_form_field_temp."', '".$present_search_form_field_temp."', '".$required_field_temp."', '".$present_results_search_field_temp."', '".$present_details_form_field_temp."', '".$present_ext_update_form_field_temp."', '".$check_duplicated_insert_field_temp."', '".$type_field_temp."', '".$content_field_temp."', '".$separator_field_temp."', '".$select_options_field_temp."', '".$select_type_field_temp."', '".$prefix_field."', '".$default_value_field."', '".$label_field_temp."', '".$width_field_temp."', '".$height_field_temp."', '".$maxlength_field_temp."', '".$hint_insert_field_temp."', '".$order_form_field_temp."', '".$other_choices_field_temp."', '".$primary_key_field_field_temp."', '".$primary_key_table_field_temp."', '".$primary_key_db_field_temp."', '".$linked_fields_field_temp."', '".$linked_fields_order_by_field_temp."', '".$linked_fields_order_type_field_temp."')";

			$res_insert = execute_db($sql, $conn);
		} // end for
	} // end foreach
	
	echo "<p>......DaDaBIK correctly upgraded!!";
} // end if ($upgrade === 1)
else{
	echo '<p>Please create a backup of your database before upgrading<form action="upgrade_4.1_rc2.php" method="post">';
	echo '<input type="hidden" name="upgrade" value="1">';
	echo '<input type="submit" value="Click this button to upgrade DaDaBIK">';
	echo '</form>';
} // end else

// include footer
include ("./include/footer_admin.php");
?>