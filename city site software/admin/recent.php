<?php

//defined actions /////////////////////////////////////////////
$ACTION_EDIT = 1;
$ACTION_DELETE = 2;
$ACTION_CREATE = 3;
$ACTION_EDITSAVE = 4;
$ACTION_CREATESAVE = 5;

function ActionSearch($searchtitle, $searchtitle_substring, $searchtitle_matches_limit)
{
    include 'db.php';
    global $ACTION_EDIT;
    global $ACTION_DELETE;
    global $ACTION_CREATE;
    global $ACTION_EDITSAVE;
    global $ACTION_CREATESAVE;
    global $PHP_SELF;

    //default:
    if ($searchtitle_matches_limit == "") {
        $searchtitle_matches_limit = "50";
    }
    //search form /////////////////////////////////////////////////////
    ?>

<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
function stopError() {
return true;
}
window.onerror=stopError;
// -->
</SCRIPT>
 <b>Recent Business Listings:</b>
    <?php
    {
        //query ///////////////////////////////////////////////////////////


	$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);

        $query =  "SELECT * ";
        $query .= "FROM List ";
        $query .= "WHERE 1 ";

		$query .= "ORDER BY `id` DESC ";
        $query .= "LIMIT 0 , 100  ";

            $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);






        if ($row) {
            echo "<hr><br>\n";
	    echo "<form name=resultsform method=post action='" . $PHP_SELF . "' onsubmit='javascript:return confirm(\"Hey! Are you sure that you want to delete this business?\");' >\n";
            ?>
            <button type=button onclick='javascript:selectAll(resultsform);'>Select All</button>
            <button type=reset>Clear Selection</button>
            <button type=submit value="2">Delete Selected</button><br>
		<input type=hidden name=searchtitle value="<?=$searchtitle?>">
		<input type=hidden name=searchtitle_substring value="<?=$searchtitle_substring?>">
		<input type=hidden name=searchtitle_matches_limit value="<?=$searchtitle_matches_limit?>">
 <input type=hidden name=action value=2>
            <?
            echo "<table border=0 cellpadding=0 cellpadding=0>\n";
            echo "<tr> <td><b>Last 100 Businesses Added:</td> <td><b>Del</b></td> </tr>\n";
            do {
                printf("<tr>\n");
                   ?>
                   <td>
                        <a href="<?
                            echo $PHP_SELF . "?";
                            echo "id=" . $row["id"];
                            echo "&searchtitle=" . $searchtitle;
                            echo "&search_title_substring=" . $searchtitle_substring;
                            echo "&search_matches_limit=" . $searchname_matches_limit;
                            echo "&action=" . $ACTION_EDIT;
			   ?>">
<?php
printf(" %s </a>\n", $row["name"]);
?>
                   </td>
                   <td onMouseOver=\"this.bgColor='#FFFFFF'\" onMouseOut=\"this.bgColor='#FFFFFF' \">
                       <input type=checkbox name="selected_id[]" value="<?=$row["Id"]?>">
                   </td>
                   <?php

                printf("</tr>\n");
            } while ($row = mysql_fetch_array($result));
            echo "</table>\n";
            echo "</form>\n";
        } else {
            if ($first == 0) {
                echo "<br><hr>\n";
                echo "No results found matching your query.\n";
            }
        }
    }
}



function ActionEdit($id, $searchtitle, $searchtitle_substring, $searchtitle_matches_limit)
{
    include 'db.php';
    global $ACTION_EDITSAVE;
    global $PHP_SELF;


    $db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
        or die("<br>Error connecting to database (the server might be down): <br><b>" . mysql_error() . "</b><br>\n");
    mysql_select_db($DATABASE_NAME, $db);
    $query = "SELECT List.* FROM List WHERE id=" . $id;
    $result = mysql_query($query, $db)
        or die("Error executing query: " . mysql_error());

    $row = mysql_fetch_array($result);
    if ($row) {
        ?>
        <form action="<?=$PHP_SELF?>" method=post>
            <input name="id" type=hidden value="<?=$row["id"]?>">









 <table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Business Name:&nbsp;  </b>
     </font></td>
     <td width="39%" bgcolor="#EDF2EC"><input name="name" size=57  value="<?=$row["name"]?>"> </td>
    </tr>

   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Contact Person:&nbsp;  </b>
     </font></td>
     <td width="39%" bgcolor="#EDF2EC"><input name="contact" size=57  value="<?=$row["contact"]?>"> </td>
    </tr>




   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Street Address:</b></font></td>
     <td width="39%" bgcolor="#EDF2EC"> <input name="address" size=57  maxlength=255 value="<?=$row["address"]?>"></td>
   </tr>





   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>City:</b></font></td>
     <td width="39%" bgcolor="#EDF2EC"> <input name="city" size=15  maxlength=255 value="<?=$row["city"]?>">
<font face="Verdana" size="2"><b>State:</b></font>
<input name="state" size=10  maxlength=255 value="<?=$row["state"]?>">
<font face="Verdana" size="2"><b>ZipCode:</b></font>
<input name="zip" size=7  maxlength=255 value="<?=$row["zip"]?>">
</td>
   </tr>


   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Telephone:</b></font></td>
     <td width="39%"> <input name="telephone" size=14  maxlength=255 value="<?=$row["telephone"]?>">

<font face="Verdana" size="2"><b>Fax:</b></font>
<input name="fax" size=14  maxlength=255 value="<?=$row["fax"]?>">

</td>
   </tr>




   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Web Site:</b></font></td>
     <td width="39%" bgcolor="#EDF2EC"> <input name="web" size=10  maxlength=255 value="<?=$row["web"]?>">
   </td>
   </tr>




   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Email:</b></font></td>
     <td width="39%"> <input name="email" size=20  maxlength=255 value="<?=$row["email"]?>"></td>
   </tr>




   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Category 1:</b></font></td>
     <td width="39%"> <input name="keywords1" size=60  maxlength=255 value="<?=$row["keywords1"]?>"></td>
   </tr>


   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Category 2:</b></font></td>
     <td width="39%"> <input name="keywords2" size=60  maxlength=255 value="<?=$row["keywords2"]?>"></td>
   </tr>



   <tr>
     <td width="22%" align="right" valign="top"><font face="Verdana" size="2"><b>Business Description:</b></font></td>
     <td width="78%" colspan="2"><textarea name="description" maxlength=20000 rows=7 cols=76><?=$row["description"]?></textarea></td>
   </tr>






   <tr>
     <td width="22%" align="right" valign="top"></td>
<td width="78%" colspan="2">


 <input type=hidden name=searchtitle value="<?=$searchtitle?>">
                        <input type=hidden name=searchtitle_substring value="<?=$searchtitle_substring?>">
                        <input type=hidden name=searchtitle_matches_limit value="<?=$searchtitle_matches_limit?>">
            <input type=hidden name=action value="<?=$ACTION_EDITSAVE?>">
            <input type=submit value="Save">
            <input type=submit value="Cancel"></form>
        <form action="<?=$PHP_SELF?>" method=post>
            <input type=hidden name=searchtitle value="<?=$searchtitle?>">
                        <input type=hidden name=searchtitle_substring value="<?=$searchtitle_substring?>">
                        <input type=hidden name=searchtitle_matches_limit value="<?=$searchtitle_matches_limit?>">
            &nbsp;</form>
</td>
   </tr>
 </table>



        <?
    } else {
        echo "No records found with id=" . $id . "<BR>";
    }
}



function ActionCreate()
{
    include 'db.php';
    global $ACTION_EDIT;
    global $ACTION_DELETE;
    global $ACTION_CREATE;
    global $ACTION_EDITSAVE;
    global $ACTION_CREATESAVE;
    global $PHP_SELF;

        ?>
        <form action="<?=$PHP_SELF?>" method=post>

 <table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
     <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Business Name:&nbsp;  </b>
     </font></td>
     <td width="39%" bgcolor="#EDF2EC"><input name="name" size=57  value=""> </td>
    </tr>


     <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Contact Person:&nbsp;  </b>
     </font></td>
     <td width="39%" bgcolor="#EDF2EC"><input name="contact" size=57  value=""> </td>
    </tr>


   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Street Address:</b></font></td>
     <td width="39%" bgcolor="#EDF2EC"> <input name="address" size=57  maxlength=255 value=""></td>
   </tr>





   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>City:</b></font></td>
     <td width="39%" bgcolor="#EDF2EC"> <input name="city" size=15  maxlength=255 value="">
<font face="Verdana" size="2"><b>State:</b></font>
<input name="state" size=10  maxlength=255 value="List">
<font face="Verdana" size="2"><b>ZipCode:</b></font>
<input name="zip" size=7  maxlength=255 value="">
</td>
   </tr>


   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Telephone:</b></font></td>
     <td width="39%"> <input name="telephone" size=14  maxlength=255 value="">

<font face="Verdana" size="2"><b>Fax:</b></font>
<input name="fax" size=14  maxlength=255 value="">

</td>
   </tr>




   <tr>
     <td width="22%" align="right" bgcolor="#EDF2EC"><font face="Verdana" size="2"><b>Web Site:</b></font></td>
     <td width="39%" bgcolor="#EDF2EC"> <input name="web" size=10  maxlength=255 value="">
   </td>
   </tr>




   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Email:</b></font></td>
     <td width="39%"> <input name="email" size=20  maxlength=255 value=""></td>
   </tr>




   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Category 1:</b></font></td>
     <td width="39%"> <input name="keywords1" size=60  maxlength=255 value=""></td>
   </tr>


   <tr>
     <td width="22%" align="right"><font face="Verdana" size="2"><b>Category 2:</b></font></td>
     <td width="39%"> <input name="keywords2" size=60  maxlength=255 value=""></td>
   </tr>



   <tr>
     <td width="22%" align="right" valign="top"><font face="Verdana" size="2"><b>Business Description:</b></font></td>
     <td width="78%" colspan="2"><textarea name="description" maxlength=20000 rows=7 cols=76></textarea></td>
   </tr>








<tr>
     <td width="22%" align="right"> </td>
     <td width="78%" colspan="2"><input type=hidden name=action value="<?=$ACTION_CREATESAVE?>">
            <input type=submit value="Create"><input type=submit value="Cancel"></form>
        <form action="<?=$PHP_SELF?>">&nbsp;</form> </td>
   </tr>
 </table>

    <?php
}




function ActionCreateSave($name, $contact, $address, $city, $state, $zip, $telephone, $fax, $web, $email, $keywords1, $keywords2, $description)

{
    include 'db.php';
    global $ACTION_EDIT;
    global $ACTION_DELETE;
    global $ACTION_CREATE;
    global $ACTION_EDITSAVE;
    global $ACTION_CREATESAVE;
    global $PHP_SELF;

    $db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
        or die("<br>Error connecting to database (the server might be down): <br><b>" . mysql_error() . "</b><br>\n");
    mysql_select_db($DATABASE_NAME, $db);

    //Check if name already exists
    $query = "SELECT id FROM List WHERE id='$id'";
    $result = mysql_query($query, $db)
        or die("Error executing query: " . mysql_error());
    $row = mysql_fetch_array($result);
    if ($row) {
        echo "Error creating record. `$id` already exists in the database.<br>";
    } else {
        //Create record
        $query  = "INSERT INTO List (name, contact, address, city, state, zip, telephone, fax, web, email, keywords1, keywords2, description) ";
        $query .= "VALUES ('".$name."', '".$contact."', '".$address."', '".$city."', '".$state."', '".$zip."', '".$telephone."', '".$fax."', '".$web."', '".$email."', '".$keywords1."', '".$keywords2."', '".$description."')";
        $result = mysql_query($query, $db)
            or die("Error executing query: " . mysql_error());

        echo "Record succesfully created (id=" . mysql_insert_id() . ")<br>\n";
    }


    echo "<br>\n";
    echo "<a href=\"" . $PHP_SELF. "?\">Return to business selection</a>";
    echo "<br>\n";
}


function ActionDelete($selected_id, $searchname, $searchname_substring, $searchname_matches_limit)
{
    include 'db.php';
    global $PHP_SELF;

    if (!$selected_id) {
	echo "No records were selected for deletion..<br>\n";
    } else {

	    foreach ($selected_id as $id) {

		    $db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
			or die("<br>Error connecting to database (the server might be down): <br><b>" . mysql_error() . "</b><br>\n");
		    mysql_select_db($DATABASE_NAME, $db);
		    $query = "DELETE FROM List WHERE id=" . $id;
		    $result = mysql_query($query, $db)
			or die("Error executing query: " . mysql_error());

		    echo "Record succesfully deleted (id=" . $id . ")<br>\n";
		    echo "<br>\n";
	    }
    }
    echo "<a href=\"" . $PHP_SELF. "?searchtitle=".$searchtitle."&searchtitle_substring=".$searchtitle_substring."&searchtitle_matches_limit=".$searchtitle_matches_limit."\">Return to name selection</a>";
    echo "<br>\n";
}










function ActionEditSave($id, $name, $contact, $address, $city, $state, $zip, $telephone, $fax, $web, $email, $keywords1, $keywords2, $description, $searchtitle, $searchtitle_substring, $searchtitle_matches_limit)
{
    include 'db.php';
    global $PHP_SELF;

    $db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
        or die("<br>Error connecting to database (the server might be down): <br><b>" . mysql_error() . "</b><br>\n");
    mysql_select_db($DATABASE_NAME, $db);

    //Check if name exists
    $query = "SELECT id FROM List WHERE name='$name' and id<>'$id'";
    $result = mysql_query($query, $db)
        or die("Error executing query: " . mysql_error());
    $row = mysql_fetch_array($result);
    if ($row) {
        echo "Error updating record. The name `$name` already exists in the database in a different record.<br>";
    } else {
        //update record
       $query  = "UPDATE List SET name='$name', contact='$contact', address='$address', city='$city', state='$state', zip='$zip', telephone='$telephone', fax='$fax', web='$web', email='$email', keywords1='$keywords1', keywords2='$keywords2', description='$description'";
       $query .= "WHERE id=" . $id;
        $result = mysql_query($query, $db)
            or die("Error executing query: " . mysql_error());

        echo "Record succesfully updated (id=" . $id . ")<br>\n";
    }
    echo "<br>\n";
    echo "<a href=\"" . $PHP_SELF. "?searchtitle=".$searchtitle."&searchtitle_substring=".$searchtitle_substring."&searchtitle_matches_limit=".$searchtitle_matches_limit."\">Return to Business selection</a>";
    echo "<br>\n";
}









function Counttitles()
{
    include 'db.php';
    global $PHP_SELF;

    $db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
        or die("<br>Error connecting to database (the server might be down): <br><b>" . mysql_error() . "</b><br>\n");
    mysql_select_db($DATABASE_NAME, $db);

    $query = "SELECT Count(*) as Numtitles FROM List";
    $result = mysql_query($query, $db)
        or die("Error executing query: " . mysql_error());
    $row = mysql_fetch_array($result);
    return $row["Numtitles"];
}



?>


<html>
<head>
<title>Admin</title>
<script language=javascript>
	function selectAll(formObj)
	{
	   for (var i=0;i < formObj.length;i++)
	   {
	      fldObj = formObj.elements[i];
	      if (fldObj.type == 'checkbox')
	      {
		  fldObj.checked = true;
	      }
	   }
	}
</script>
</head>
<body marginheight=0 marginwidth=8 topmargin=0 leftmargin=8 rightmargin=8>
<link rel=StyleSheet href="style.css" type="text/css" media="screen">
<center><a href="<?=$PHP_SELF."?action=".$ACTION_CREATE?>">Add Business</a> |
<a href="index.php">Search and Edit Entries</a> |




<a href="index.php">Access</a> | <a href="recent.php">RECENT</a>  | <a href="../">Home</a>

</center>
<?php
echo "Businesses in the database: " . Counttitles() . "<br>\n";
?>
<?php
    //don't let browsers cache administration pages
    session_cache_limiter('nocache');

    if (!$action) {
        ActionSearch($searchtitle, $searchtitle_substring, $searchtitle_matches_limit);
	if (!$searchtitle) {
	    echo "<br>\n";
            echo "Businesses in the database: " . Counttitles() . "<br>\n";
	}
    } else {

        if ($action == $ACTION_EDIT) {
            ActionEdit($id, $searchtitle, $searchtitle_substring, $searchtitle_matches_limit);
        } elseif ($action == $ACTION_DELETE) {
            ActionDelete($selected_id, $searchtitle, $searchtitle_substring, $searchtitle_matches_limit);
        } elseif ($action == $ACTION_CREATE) {
            ActionCreate();
        } elseif ($action == $ACTION_EDITSAVE) {
            ActionEditSave($id, $name, $contact, $address, $city, $state, $zip, $telephone, $fax, $web, $email, $keywords1, $keywords2, $description, $searchtitle, $searchtitle_substring, $searchtitle_matches_limit);
        } elseif ($action == $ACTION_CREATESAVE) {
            ActionCreateSave($name, $contact, $address, $city, $state, $zip, $telephone, $fax, $web, $email, $keywords1, $keywords2, $description);
        }
    }
?>





</body>
</html>