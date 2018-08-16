

<?php

$MATCHES_OVERRIDE = 5;    //set to -1 to disable override








function ReturnMatches($telephone, $geo, $s, $matches, $first)
{
          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'canada_canada';
	      $DATABASE_USER   = 'canada_dub';
	      $DATABASE_PASSWORD = 'gabe0810';


    global $MATCHES_OVERRIDE;

    if ($telephone) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 5;
        }

if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }


$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);

        $query =  "SELECT Yukon.* ";
        $query .= ",MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE)  ";
        $query .= "FROM Yukon ";
        $query .= "WHERE MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE) ";
		$query .= "ORDER BY `Name` ASC ";
        $query .= "LIMIT " . 0 . "," . 10;

            $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);





echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
printf("<title>%s %s | %s, Yukon Territory</title> \n", $row["Name"], $row["City"], $row["Keywords1"], $row["Province"]);
printf("<meta name=\"keywords\" content=\"%s, %s, %s, %s, %s, %s, yukon territory, %s %s, %s %s\">  \n",  $row["Name"], $row["Telephone"], $row["Address"], $row["Keywords1"], $row["City"], $row["Province"], $row["Keywords1"], $row["City"],  $row["Name"],  $row["City"]);
printf("<meta name=\"description\" content=\"%s, %s - %s, Yukon Territory\">  \n",  $row["Name"], $row["City"], $row["Keywords1"], $row["Province"]);
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
?>



<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAoIxEzse0hCAeXEJftW8hWhR20uQ0W5C3NC5AtBFgFgl2lXttwRSbxOqAynGzGwk6nct6iF6mfMtrAw"
        type="text/javascript">
</script>
<script type="text/javascript">
    //<![CDATA[

    var map = null;
    var geocoder = null;

    var icon = new GIcon("flag.png");
        icon.image = "flag.png";
        icon.shadow = "shadow-flag.png";
        icon.iconSize = new GSize(22, 20);
        icon.shadowSize = new GSize(22, 20);
        icon.iconAnchor = new GPoint(22, 20);
        icon.infoWindowAnchor = new GPoint(5, 1);

    function load() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
        map.setCenter(new GLatLng(63.084814, -135.32959), 6);
        geocoder = new GClientGeocoder();
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());

      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 14);
              var marker = new GMarker(point, icon);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address)
            }
          }
        );
      }
    }
    //]]>
    </script>



</head><body onLoad="load()" onUnload="GUnload()"><center>


<?php


echo "<div id=\"wrap\"> \n";
echo "<div id=\"header\"><img src=\"look2yellowpages1.jpg\" align=\"left\" alt=\"Yukon territory\"><br/><h1><strong>Yukon</strong></h1>
</div>\n";
echo "<div id=\"content\"> \n";




   




echo "<center>\n";

?>


<div align="right" valign="top">
<?php


echo "<table border=\"0\" width=\"350px\" align=\"left\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"350px\"><br />\n";

printf("<b><font face='verdana' size='3' color='#800000'>%s</b><br>  \n", $row["Name"]);
printf("<font face='verdana' size='2' color='#000000'>%s<br>  \n", $row["Address"]);
printf("<font face='verdana' size='2' color='#000000'>%s, %s %s<br> \n", $row["City"], $row["Province"], $row["Zip"]);
printf("<font face='verdana' size='2' color='#000000' >Telephone: %s   <br>Fax: %s <br>\n", $row["Telephone"], $row["Fax"]);
printf("<font face='verdana' size='2' color='#000000'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["Web"], $row["Web"]);
printf("<font face='verdana' size='2' color='#000000'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["Email"], $row["Email"]);
printf("<font face='verdana' size='2'color='#000000' >Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["Contact"], $row["Id"]);

printf("<br><font face='verdana' size='2' color='#000000'> \n",  $row["address"],  $row["city"],  $row["state"],  $row["zip"]);

?>

<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 336;
google_ad_height = 280;
google_ad_format = "336x280_as";
google_ad_type = "text";
//2007-02-27: look2#800000block
google_ad_channel = "8349406720";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "800000";
google_color_text = "000000";
google_color_url = "000000";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</td>  </tr></table>

<div align="right">
<form action="#" onSubmit="showAddress(this.address.value); return false">


	  <div align="center"><p>
<input type=text size=100 name=address value="<?echo $row["Address"],"&nbsp;",  $row["City"],"&nbsp;",  $row["Province"]?>"/>

        <input type="submit" value="Go there!" />
	  </p>
	  </div>


      <div id="map" style="width: 450px; height: 415px"></div>
  </form>
</div>
<br />

<div align=\"center\">
<?php

echo " <font face='verdana' size='3' color='#000000'>Support<b> \n";

printf("%s %s \n", $row["City"], $row["Keywords1"]);

echo "  </b></font> \n";
?>
</div>
<br />
<div align=justify>
<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "text";
//2007-02-27: look2#800000banner
google_ad_channel = "7041940911";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "800000";
google_color_text = "000000";
google_color_url = "000000";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><img src=\"/adblock728x90.gif\" width=\"728\" height=\"90\">
</div>

<?php
printf("<center><font face='verdana' size='2' color='#000000'><b>Internet Search for:</b> %s<br>\n", $row["Name"]);

printf("<b><a href=\"http://www.google.com/search?sourceid=navclient&ie=UTF-8&rls=GGLJ,GGLJ:2006-11,GGLJ:en&q=%s %s %s\">Google</a> |\n", $row["Name"], $row["City"], $row["Province"]);
printf("<a href=\"http://search.yahoo.com/search?&ei=UTF-8&p=%s %s %s\">Yahoo!</a> |\n", $row["Name"], $row["City"], $row["Province"]);
printf("<a href=\"http://www.live.com/?FORM=IE7&q=%s %s %s\">MSN Live</a><br></b>\n", $row["Name"], $row["City"], $row["Province"]);









printf("<font face='verdana' size='2'>%s<br><font size=\"1\">If you are <h1>%s</h1> and would like to update your listing - email us at update[@]look2yellowpages.com</font>\n", $row["Description"], $row["Name"]);
echo "</font></center> \n";

printf("<font face='verdana' size='2'>Categories for <b>\"%s %s\":</b></font><font face='verdana' size='1'> \n",  $row["Name"], $row["city"]);





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




printf("%s, %s<br>  \n", $row["Keywords1"], $row["City"]);









            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
                echo "\n";



            } else {
                echo "No more results found.<br>\n";
            }
        }



}
}

    ReturnMatches($telephone, $geo, $s, $matches, $first);



















     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {



echo "No More Results";



        } else {








    }
echo "<center><form name=\"form2\" action=\"javascript:window.print();\" method=\"post\">\n";
echo "<input type=\"submit\" name=\"Submit\" value=\"Print This Page\">\n";
echo "</form>  \n";
echo "</center>\n";


echo "    <br>\n";











?>

<div align="center">
      <table align="center" border="0" width="800" cellspacing="0" cellpadding="2">
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; More Look2 Business Directories:</font></b><br />
</td></tr>
<tr>
<td width="200" valign="top"><font size="1">
  
  <a href="http://www.look2vancouver.com">Vancouver BC</a><br />
  <a href="http://www.look2victoria.com">Victoria BC</a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2britishcolumbia.com">British Columbia</a> <br />
  <a href="http://www.look2alberta.com">Alberta</a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2novascotia.com">Nova Scotia</a><br />
  <a href="http://www.look2newbrunswick.com">New Brunswick</a><br /></font>
        </td>
  <td width="200" valign="top"><font size="1">
  <a href="http://www.look2newfoundland.com">Newfoundland</a><br />
  <a href="http://www.look2quebec.com">Quebec</a><br /></font>
  </td>
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
  <a href="http://www.look2phoenix.com">Phoenix Arizona</a><br />
  <a href="http://www.look2charlotte.net">Charlotte NC</a><br /> 
  <a href="http://www.look2omaha.com">Omaha Nebraska </a><br />
  <a href="http://www.look2reno.com">Reno Nevada </a><br /> 
  <a href="http://www.look2glendale.com">Glendale Arizona</a><br /></font>
  </td>
  </tr>
</table>
</div>


<!-- Start of StatCounter Code -->
<script type="text/javascript">
var sc_project=2792948; 
var sc_invisible=0; 
var sc_partition=28; 
var sc_security="fd0c484b"; 
</script>

<script type="text/javascript" src="http://www.statcounter.com/counter/counter_xhtml.js"></script><noscript><div class="statcounter"><a class="statcounter" href="http://www.statcounter.com/"><img class="statcounter" src="http://c29.statcounter.com/2792948/0/fd0c484b/0/" alt="blog stats" /></a></div></noscript>
<!-- End of StatCounter Code -->
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://www.look2yukon.com/privacypolicy.html">Privacy Policy 
</div>
</div></div>
</center>
</body></html>
