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
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>DaDaBIK - http://www.dadabik.org/</title>
<link rel="stylesheet" href="css/styles_screen.css" type ="text/css" media="screen">
<link rel="stylesheet" href="css/styles_print.css" type ="text/css" media="print">
<meta name="Generator" content="DaDaBIK 4.2 - http://www.dadabik.org/">
<script language="JavaScript">
<!--
function fill_cap(city_field){

	temp = 'document.contacts_form.'+city_field+'.value';

	city = eval(temp);
	cap=open("fill_cap.php?city="+escape(city),"schermo","toolbar=no,directories=no,menubar=no,width=170,height=250,resizable=yes");
}
//-->
</script>

<script language="javascript" type="text/javascript" src="include/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "specific_textareas",
	theme : "advanced",
	editor_selector : "rich_editor"
});
</script>


<script language="Javascript">
//opens a js popup with customizable options. Popup will close and open
//again upon call from pwd-generator link
var mywindow;
function generic_js_popup(url,name,w,h){
	if (mywindow!=null && !mywindow.closed){
	mywindow.close();
	}
var options;
options = "resizable=yes,toolbar=0,status=1,menubar=0,scrollbars=1, width=" + w + ",height=" + h + ",left="+(screen.width-w)/2+",top="+(screen.height-h)/6; 
mywindow = window.open(url,name,options);
mywindow.focus();
}

function enable_disable_input_box_insert_edit_form(null_checkbox_prefix, year_field_suffix, month_field_suffix, day_field_suffix)
// goal: set the status (disabled|enabled) of each input element of the insert|edit form, depending on the status (checked|not checked) of the corresponding null value checkbox (if it exists)
// input: null_checkbox_prefix, year_field_suffix, month_field_suffix, day_field_suffix
{
	var count = document.getElementById('dadabik_main_form').length;
	var null_checkbox_prefix_length = null_checkbox_prefix.length;

	// for each element of the form
	for (i=0;i<count;i++)
	{
		// if the element is a null value checkbox element
		if (document.getElementById('dadabik_main_form').elements[i].name.substr(0,null_checkbox_prefix_length) == null_checkbox_prefix){

			// check if the field is a date field type

			var year_field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length) + year_field_suffix;
				
			var a = new Array;
			a = document.getElementsByName(year_field_name);

			if (a[0]){ // if the relative year field exists
				field_type_is_date = 1;
			} // end if
			else {
				field_type_is_date = 0;
			} // end else

			if (field_type_is_date == 1){
				// get the name of the relative input controls

				var month_field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length) + month_field_suffix;

				var day_field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length) + day_field_suffix;

				// and set the relative input controls enabled/disabled depending on the null value checkbox status (checked|not checked)
				var a = new Array;
				a = document.getElementsByName(year_field_name);
				
				var b = new Array;
				b = document.getElementsByName(month_field_name);

				var c = new Array;
				c = document.getElementsByName(day_field_name);


				if (document.getElementById('dadabik_main_form').elements[i].checked == true){
					a[0].disabled = true;
					b[0].disabled = true;
					c[0].disabled = true;
				} // end if
				else{
					a[0].disabled = false;
					b[0].disabled = false;
					c[0].disabled = false;
				} // end else
			} // end if
			else {
				// get the name of the relative input control
				var field_name = document.getElementById('dadabik_main_form').elements[i].name.substr(null_checkbox_prefix_length);

				// and set the relative input control enabled/disabled depending on the null value checkbox status (checked|not checked)
				var a = new Array;
				a = document.getElementsByName(field_name);

				if (document.getElementById('dadabik_main_form').elements[i].checked == true){
					a[0].disabled = true;
				} // end if
				else{
					a[0].disabled = false;
				} // end else
			} // end else
		} // end if
	} // end for
} // end function

function enable_disable_input_box_search_form(field_name, select_type_select_suffix, year_field_suffix, month_field_suffix, day_field_suffix)
// goal: set the status (disabled|enabled) of an input element of the search form, depending on the status of the corresponding select_type_select field
// input: field_name, select_type_select_suffix, year_field_suffix, month_field_suffix, day_field_suffix
{
	
	// check if the field is a date field type

	var year_field_name = field_name + year_field_suffix;
		
	var a = new Array;
	a = document.getElementsByName(year_field_name);

	if (a[0]){ // if the relative year field exists
		field_type_is_date = 1;
	} // end if
	else {
		field_type_is_date = 0;
	} // end else

	if (field_type_is_date == 1){
		// get the name of the relative input controls

		var month_field_name = field_name + month_field_suffix;

		var day_field_name = field_name + day_field_suffix;

		// and set the relative input controls enabled/disabled depending on the null value checkbox status (checked|not checked)
		var a = new Array;
		a = document.getElementsByName(year_field_name);

		var b = new Array;
		b = document.getElementsByName(month_field_name);

		var c = new Array;
		c = document.getElementsByName(day_field_name);

		var d = new Array;
		d = document.getElementsByName(field_name+select_type_select_suffix);

		if (d[0].value == 'is_null'){
			a[0].disabled = true;
			b[0].disabled = true;
			c[0].disabled = true;
		} // end if
		else{
			a[0].disabled = false;
			b[0].disabled = false;
			c[0].disabled = false;
		} // end else
	} // end if
	else{
		// set the relative input control enabled/disabled depending on the null value checkbox status (checked|not checked)
		var a = new Array;
		a = document.getElementsByName(field_name);

		var b = new Array;
		b = document.getElementsByName(field_name+select_type_select_suffix);

		if (b[0].value == 'is_null' || b[0].value == 'is_empty'){
			a[0].disabled = true;
		} // end if
		else{
			a[0].disabled = false;
		} // end else
	} // end else

} // end function

</script>
</head>

<body 
<?php
if (isset($_GET["type_mailing"])){
	if ($_GET["type_mailing"] == "labels") {
		echo " leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" onload=\"javascript:alert('".$normal_messages_ar["print_warning"]."')\"";
	} // end if
} // end if
?>
onload="javascritp:enable_disable_input_box_insert_edit_form('<?php echo $null_checkbox_prefix.'\', \''.$year_field_suffix.'\', \''.$month_field_suffix.'\', \''.$day_field_suffix; ?>')">
<table class="main_table" cellpadding="10">
<tr>
<td valign="top">
<h1 class="onlyscreen" align="center">DaDaBIK</h1>