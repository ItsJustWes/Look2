

<?php

$MATCHES_OVERRIDE = 5;    //set to -1 to disable override








function ReturnMatches($telephone, $geo, $s, $matches, $first)
{
    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   ='vic_vic';
    $DATABASE_USER   = 'vic_dub';
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

        $query =  "SELECT List.* ";
        $query .= ",MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE)  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE) ";
		$query .= "ORDER BY `name` ASC ";
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
echo "<title>$row[Name] | $row[City] $row[Keywords1]</title> \n";
echo "<meta name=\"keywords\" content=\"$row[Name], $telephone[Telephone], $row[Address], $row[Keywords1], $city[City]\"> \n";
echo "<meta name=\"description\" content=\"$row[Name] - $row[City] $row[Keywords1] Victoria business listing \"> \n";
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
?>

<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAoIxEzse0hCAeXEJftW8hWhQkz5XCi13-zdQvj1kwm_3xY-TP1BSO92zcqokPPS4zpFhe84yWzHuAew"
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
        map.setCenter(new GLatLng(48.53661318127801, -123.41903686523437), 12);
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

echo "<div id=\"header\"><img src=\"/look2yellowpages1.jpg\" align=\"left\" alt=\"Victoria business\"><h1><strong>Victoria</strong><br>Business Search</h1>
</div>\n";
echo "<div id=\"content\"> \n";
echo "<center>\n";
echo "<h2>Support your local<strong>\n";

printf("%s %s \n", $row["City"], $row["Keywords1"]);


echo "</strong></h2><br /> \n";







echo "<table border=\"0\" width=\"350px\" align=\"left\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"350px\">\n";


printf("<b><font face='verdana' size='3'>%s</b><br>  \n", $row["Name"]);
printf("<font face='verdana' size='2'>%s<br>  \n", $row["Address"]);
printf("<font face='verdana' size='2'>%s, British Columbia, %s<br> \n", $row["City"], $row["Province"], $row["Zip"]);
printf("<font face='verdana' size='2'>Telephone: %s   <br>Fax: %s <br>\n", $row["Telephone"], $row["Fax"]);
printf("<font face='verdana' size='2'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["Web"], $row["Web"]);
printf("<font face='verdana' size='2'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["Email"], $row["Email"]);
printf("<font face='verdana' size='2'>Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["Contact"], $row["Id"]);
?>
<br />
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



<?php





printf("<center><br />\n",  $row["Address"],  $row["City"],  $row["Province"],  $row["Zip"]);

echo "<font Size=\"3\" color=\"#800000\"><b>\n";

printf("%s %s \n", $row["City"], $row["Keywords1"]);


echo "</b></font><br /> \n";




printf("<font size=\"1\">If you are \"%s, %s, %s, British Columbia %s\" and would like to update your listing<br>email us at update@look2yellowpages.com.</font>\n", $row["Name"], $row["Address"],  $row["City"],  $row["Province"],  $row["Zip"]);


echo "</center>\n";




echo "    <table border=\"0\" width=\"600\"  align=\"center\">\n";
echo "      <tr>\n";
echo "        <td>\n";


printf("<font face='verdana' size='2'><b>Categories For \"%s\":</b></font><blockquote><font face='verdana' size='1'> \n",  $row["Name"]);





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




printf("%s %s, \n", $row["Keywords1"], $row["Keywords2"]);









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
echo "</td>\n";
echo "      </tr>\n";
echo "    </table></center>\n";

?>

<?php
   include 'bottom.php';
   ?>
