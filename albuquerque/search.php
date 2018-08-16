
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
echo "<title>Albuquerque | New Mexico Yellowpages | Albuquerque $q</title>	\n"; 
echo "<meta name=\"keywords\" content=\"Albuquerque, albuquerque new mexico, albuquerque $q, albuquerque business, albuquerque yellowpages, new mexico yellowpages, Look2 yellowpages \">\n"; 
echo "<meta name=\"description\" content=\"Albuquerque New Mexico Business Search Results - $q\">  \n"; 
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
?>

<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>

<style fprolloverstyle>A:hover {color: #FF0000}
</style>


</head>
<body><center>
<div id="wrap">
<div id="header"><h1><strong>Albuquerque</strong><br>New Mexico Yellowpages</h1>
</div>
<div id="content">
<div align="center"> 

<p><font face="Verdana" size="2" color="#000000"><b>Albuquerque | Business Search</b>:</font></p>

<form style="margin: 0px" action="search.php" method=get> 
  
<input name="q" type="text" value="" size="31">
    
  
<INPUT TYPE=submit value="Search" class="current">
</form>
</div>



<div align="center">
  <table border="0" width="600" cellspacing="0" cellpadding="2">
  <tr>
  <td width="600px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; Albuquerque Category 
      Listings:&nbsp;&nbsp; </font>
      
      <a href="cat.php" style="background-color:#FFFFFF;">All Categories</a>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/" style="background-color:#FFFFFF">Home</a></b>
	  </td>
    </tr>
</table>
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
		echo "<a style=\"text-decoration: none\" href=\"search.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"text-decoration: none\" href=\"search.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Next</a></font>&nbsp;&nbsp;\n";
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

<div align="center" style="padding:3px; font-size:12px;">
      
<?php  
echo "   
  <a href=\"http://www.look2fortcollins.com/$q.htm\">$q in Fort Collins Colorado</a> |
  <a href=\"http://www.look2indianapolis.com/$q.htm\">$q in Indianapolis Indiana</a> |
  <a href=\"http://www.look2portland.com/$q.htm\">$q in Portland Oregon</a> |
  <a href=\"http://www.look2spokane.com/$q.htm\">$q in Spokane Washington</a> |
  <a href=\"http://www.look2lasvegas.com/$q.htm\">$q in Las Vegas Nevada</a> |
     
  <a href=\"http://www.look2mesa.com/$q.htm\">$q in Mesa Arizona</a> |
  <a href=\"http://www.look2chandler.com/$q.htm\">$q in Chandler Arizona</a> |
  <a href=\"http://www.look2tucson.com/$q.htm\">$q in Tucson Arizona</a> |
  <a href=\"http://www.look2albuquerque.com/$q.htm\">$q in Albuquerque New Mexico </a> |
  <a href=\"http://www.look2raleigh.com/$q.htm\">$q in Raleigh North Carolina </a> |
      
  <a href=\"http://www.look2henderson.com/$q.htm\">$q in Henderson Nevada</a> |
  <a href=\"http://www.look2oregon.com/$q.htm\">$q in Oregon</a> |
  <a href=\"http://www.look2newmexico.com/$q.htm\">$q in New Mexico</a> |
  <a href=\"http://www.look2utah.com/$q.htm\">$q in Utah</a> |
  <a href=\"http://www.look2washington.com/$q.htm\">$q in Washington State</a> |

  <a href=\"http://www.look2phoenix.com/$q.htm\">$q in Phoenix Arizona</a> |
  <a href=\"http://www.look2charlotte.net/$q.htm\">$q in Charlotte North Carolina</a> |
  <a href=\"http://www.look2omaha.com/$q.htm\">$q in Omaha Nebraska </a> |
  <a href=\"http://www.look2reno.com/$q.htm\">$q in Reno Nevada </a> |
  <a href=\"http://www.look2glendale.com/$q.htm\">$q in Glendale Arizona</a> 
\n";
?>

</div>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2303113; 
var sc_invisible=1; 
var sc_partition=21; 
var sc_security="b9fe3567"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c22.statcounter.com/counter.php?sc_project=2303113&amp;java=0&amp;security=b9fe3567&amp;invisible=1" alt="website hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
<div id="footer">Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://look2albuquerque.com/privacypolicy.html">Privacy Policy</a>
</div>
</div>
</div></center>
</body></html>




