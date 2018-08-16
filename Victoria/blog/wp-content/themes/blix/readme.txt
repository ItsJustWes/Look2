WordPress Theme Blix with AdSense Ads included and SEO Improvements

Creator: David Law (aka SEO Dave)
Latest Version of theme: http://www.morearnings.com/2006/08/13/wordpress-theme-blix-with-google-adsense/
This Version: 02
Based on original Blix Theme: http://www.kingcosmonaut.de/blix/ Author: Sebastian Schmieg

This version of Blix includes 3 blended AdSense ad units per page, optimised for maximum ad revenue. It also includes code changes so your blog is more likely to rank highly in the major search engines (especially Google).

For example the archive calendar has been removed since it created duplicate pages. Headers are better used, the original used H2 for the menu heading, this version uses H4 giving them less relevance to the search engines. For further search engine optimization information go to http://www.seo-gold.com/tutorial/ and http://www.morearnings.com/category/seo/

If you'd rather not use the SEO version of this theme go to http://www.morearnings.com/2006/08/13/wordpress-theme-blix-with-google-adsense/ and download the non SEO version.

Installation
------------

To install unzip and add the /blix-adsense-seo-02/ folder to your themes directory (like installing any other theme). Select it via the Presentation options in WordPress admin (like any other theme) and you are almost there.

Since I don't know your Google AdSense code (so you get the ad revenue) we need to pass it to WordPress somehow. I found the easiest way is to reference it within a new template file called adsense.php.

Open the file adsense.php (found in the folder /blix-adsense-seo-02/ either with a text editor (notepad for example) or if you've set write permission within the WordPress theme editor.

You will see this-


$GoogleADID = "pub-8325072546567078";


Now replace my Google AdSense code (that's mine - pub-8325072546567078) with yours.

You can get this code from any Google AdSense ad unit you've created in the past (or future). If you aren't sure what this is log in to AdSense and create a new content ad unit (any will do) you'll get a box with this sort of info within it-


<script type="text/javascript"><!--
google_ad_client = "pub-8325072546567078";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "text_image";
google_ad_channel ="";
google_color_border = "224466";
google_color_bg = "FFFFFF";
google_color_link = "335588";
google_color_text = "000000";
google_color_url = "335588";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

This bit google_ad_client = "pub-################"; is unique for every AdSense user.

Copy your version of pub-################ over mine.

If you leave mine by mistake I'll get your AdSense income (feel free if you like, I won't mind :-))

When you have the right code save the file and upload to the server (FTP probably).

In the first version of my WordPress AdSense themes that was the end of the AdSense settings editing, in version 2 and higher you can also change the ad unit colours globally (for the whole blog) just by changing a few colour codes located within the adsense.php file. I added this option initially to save my time when creating new themes, but it also lends itself to anyone wanting to change the colour scheme of their ads.

This is completely optionally, since if you downloaded this theme from http://www.morearnings.com/ the default colours are blended to match the current theme. That said if you want different colours read on-

All ad units use this format for the colour settings of the ad.

google_color_border = "E0EAEA";
google_color_bg = "FFFFFF";
google_color_link = "59708C";
google_color_text = "59708C";
google_color_url = "000000";

You will find corresponding variables within the adsense.php file that you can edit with a text editor or the WordPress theme editor, they look like this-

$Googleborder = "E0EAEA";
$Googlebg = "FFFFFF";
$Googlelink = "59708C";
$Googleurl = "59708C";
$Googletext = "000000";

Just change to valid colour values like you find at http://www.webreference.com/html/reference/color/websafe.html and similar places, save and upload.

If you use this theme please make a quick comment at http://www.morearnings.com/2006/08/13/wordpress-theme-blix-with-google-adsense/ I don't ask for any payment or donations (it's completely free) but I'd love to know you are using it and what you think (any problems installing, suggestions etc...).

Looking to hire a competent SEO expert see http://www.seo-gold.com/ (I work there as an SEO consultant). Also check out http://www.morearnings.com/category/wordpress-themes/ for more WordPress themes and http://www.morearnings.com/category/adsense/ for AdSense tips.

Note: Version 01 was not released.

This is the first in a series of planned Theme improvements.

Blix - http://www.morearnings.com/2006/08/13/wordpress-theme-blix-with-google-adsense/ (SEO and non SEO version available)
Connections - http://www.morearnings.com/2006/08/15/wordpress-theme-connections-with-google-adsense/
Almost Spring - http://www.morearnings.com/2006/08/30/wordpress-theme-almost-spring-with-google-adsense/
Ocadia - http://www.morearnings.com/2006/09/12/wordpress-theme-ocadia-with-google-adsense/

David