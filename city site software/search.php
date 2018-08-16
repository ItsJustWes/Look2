
<?php

$MATCHES_OVERRIDE = -1;    //set to -1 to disable override








function ReturnMatches($q, $city, $name, $matches, $first, $ads)
{

    global $MATCHES_OVERRIDE;

    if ($q) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 30;
        if (!$ads) {
            $ads = 0;
        }
        }

if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }

    
    include 'db.php';
   
$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);


        $query =  "SELECT List.* ";
        $query .= ",MATCH(keywords1, city, name) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(keywords1, city, name) AGAINST (' . $q . ' IN BOOLEAN MODE) HAVING Relevance > 0.03  ";

  $query .= "ORDER BY Relevance DESC ";
  $query .= "LIMIT " . $first . "," . $matches;








$result = mysql_query($query, $db)

            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n"; 
echo "<html>	\n"; 
echo "<head>	\n"; 
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n"; 	
echo "<title>Fort Collins Colorado Yellow Pages and Business Directory</title>	\n"; 
echo "<meta name=\"keywords\" content=\"Fort Collins yellowpages, Look2 yellowpages, fort collins yellow pages, business pages, directory, business directory, business yellow pages, fort collins business search \">\n"; 
echo "<meta name=\"description\" content=\"Fort Collins Colorado Yellow Pages and Business Directory\">  \n"; 
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
?>

<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>

<style fprolloverstyle>A:hover {color: #FF0000}
</style>


</head>
<body>

</div>
<div id="wrap">
<div id="header"><h1><strong>Fort Collins</strong><br>Colorado</h1>
</div>


<div id="content">
<div align="center"> 

<p><font face="Verdana" size="2" color="#000000"><b>Business Search</b>:</font></p>

<form style="margin: 0px" action="search.php" method=get> 
  
<input name="q" type="text" class="large" value="" size="31">
    
  
<INPUT TYPE=image class="current" id="img1" SRC="search.gif" alt="Search" width="175" height="21">
</form>
</div>



<div align="center">
  <table border="0" width="600" cellspacing="0" cellpadding="2">
  <tr>
  <td width="600px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; FORT COLLINS Category 
      Listings:&nbsp;&nbsp; </font>
      
      <a href="cat.php" style="background-color:#FFFF00;">All Categories</a>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" style="background-color:#FFFF00">Home</a></b>
	  </td>
    </tr>
</table>
</div>
</div>
</div>
<?PHP


    



echo "<table width=\"100%\" cellspacing=\"0\"><tr><td width=\"50%\">\n";

echo " <font face='Verdana' color='#000000' size='1'> &nbsp;&nbsp;<b>$q</b>\n";

echo " 	 <font color=\"#000000\" face=\"Verdana\" size=\"1\">Listings " . ($first+1) . "  to " . ($first+30) . "	\n"; 

echo "      </td>\n";

 

echo "<td width=\"50%\"><p align=\"right\"><b>\n";

	if ($first == 0) {
		echo "";
	} else {
		echo "<a style=\"text-decoration: none\" href=\"search.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"1\" color='#000040'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"text-decoration: none\" href=\"search.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"1\" color='#000040'>Next</a></font>&nbsp;&nbsp;\n";
	}

echo "</td><hr align=\"center\" width=\"100%\" size=\"1px\" color=\'#000000'></tr></table></b>&nbsp;&nbsp;\n";






echo "<table width=\"100%\" cellspacing=\"0\"><tr><td width=\"50%\" valign=\"top\"> \n";




    include 'google.php';







      if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {



echo "No More Results";




        } else {


    }



  $no_results = 0;
        if ($row) {
            do {





echo "<font face='verdana' size='2'>\n";
printf("<img src=\"clip.gif\"> <a href=\"businesspage.php?telephone=%s&geo=%s %s %s %s\" ><b>%s</b></a></font><br>  \n", $row["telephone"], $row["address"], $row["city"], $row["state"], $row["zip"], $row["name"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["address"]);
printf("  %s, %s %s</font><br>\n", $row["city"], $row["state"], $row["zip"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["telephone"], $row["fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s<br><br></font> \n", $row["keywords1"], $row["keywords2"]); 










            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {



            } else {
                echo "No more results found.<br>\n";

 
            }
        }

}
}

    ReturnMatches($q, $city, $name, $matches, $first, $ads);



     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {

 

echo "No More Results";



        } else {



    }








echo "</td></tr></table> \n";
?>



<hr align="center" width="800px" size="1px" color="#000000">

<div align="center">
      <table align="center" border="0" width="800" cellspacing="0" cellpadding="2">
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; More Look2 Yellowpages and Business Directories:&nbsp;&nbsp; </font></b>                        <font color="#FF0000">find what your looking for fast!</font></td>
  </tr>
  <tr>
    
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2fortcollins.com">Fort Collins Colorado</a> <br />
  <a href="http://www.look2indianapolis.com">Indianapolis Indiana</a><br />
  <a href="http://www.look2portland.com">Portland Oregon</a><br />
  <a href="http://www.look2spokane.com">Spokane Washington</a><br />
  <a href="http://www.look2lasvegas.com">Las Vegas Nevada</a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2mesa.com">Mesa Arizona</a><br />
  <a href="http://www.look2chandler.com">Chandler Arizona</a><br />
  <a href="http://www.look2tucson.com">Tucson Arizona</a><br />
  <a href="http://www.look2albuquerque.com">Albuquerque NM </a><br />
  <a href="http://www.look2raleigh.com">Raleigh NC </a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2henderson.com">Henderson Nevada</a><br />
  <a href="http://www.look2oregon.com">Oregon</a><br />
  <a href="http://www.look2newmexico.com">New Mexico</a><br />
  <a href="http://www.look2utah.com">Utah</a><br />
  <a href="http://www.look2washington.com">Washington State</a><br /></font>
        </td>
  <td width="200" valign="top"><font size="1">
  <a href="http://www.look2pheonix.com">Phoenix Arizona</a><br />
  <a href="http://www.look2charlotte.net">Charlotte NC</a><br /> 
  <a href="http://www.look2omaha.com">Omaha Nebraska </a><br />
  <a href="http://www.look2reno.com">Reno Nevada </a><br /> 
  <a href="http://www.look2glendale.com">Glendale Arizona</a><br /></font>
  </td>
  </tr>
</table>
</div>


<div id="footer">Copyright (c) 2006-2007 All Rights Reserved - Look2 Directory 
</div>

</body></html>




