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
if ($show_record_numbers_change_table !== 0) {
?>

<hr class="onlyscreen">
<table width="100%" class="onlyscreen">
<tr>
	<td align="left"><a class="home" href="<?php echo $dadabik_main_file; ?>?table_name=<?php echo urlencode($table_name); ?>"><?php echo $normal_messages_ar["home"]; ?></a>
<?php
if ($enable_insert == "1"){
?>
	 | <a class="bottom_menu" href="<?php $dadabik_main_file; ?>?function=show_insert_form&table_name=<?php echo urlencode($table_name); ?>"><?php echo $submit_buttons_ar["insert_short"]; ?></a>
<?php
}
?>
 
 | <a class="bottom_menu" href="<?php $dadabik_main_file; ?>?function=show_search_form&table_name=<?php echo urlencode($table_name); ?>"><?php echo $submit_buttons_ar["search_short"]; ?></a> | <a class="bottom_menu" href="<?php $dadabik_main_file; ?>?function=search&table_name=<?php echo urlencode($table_name); ?>"><?php echo $normal_messages_ar["last_search_results"]; ?></a> | <a class="bottom_menu" href="<?php $dadabik_main_file; ?>?function=search&empty_search_variables=1&table_name=<?php echo urlencode($table_name); ?>"><?php echo $normal_messages_ar["show_all"]; ?></a>
<?php
if ( $table_name === $users_table_name && ($function === 'edit' || $function === 'show_insert_form' || $function === 'insert')){
?>
 | <a class="bottom_menu" href="javascript:void(generic_js_popup('pwd.php','',400,300))"><?php echo $login_messages_ar['pwd_gen_link']; ?></a>
 <?php
}
?>
<?php
if ($enable_authentication === 1){
?>
	 | <a class="bottom_menu" href="<?php echo $dadabik_login_file; ?>?function=logout"><?php echo $normal_messages_ar["logout"]; ?></a>
<?php
}
if ($current_user_is_administrator === 1) {
?>
 | <a class="bottom_menu" href="admin.php"><?php echo $normal_messages_ar["administration"]; ?></a>
 <?php
} // end if
?>
 | <a class="bottom_menu" href="#"><?php echo $normal_messages_ar["top"]; ?></a>
 
</td>
</tr>
</table>


<?php
}
?>
<div align="center"><font size="1">Powered by: <a href="http://www.dadabik.org/">DaDaBIK</a></font></div>
</td>
</tr>
</table>

</body>
</html>