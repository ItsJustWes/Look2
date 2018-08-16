<hr class="low" />
<? include("adsense.php"); ?>

<div id="subcontent">

<?php /**
* Pages navigation. Disabled by default because all new pages are added
* to the main navigation.
* If enabled: Blix default pages are excluded by default.
*
?>
<h4><em>Pages</em></h4>
<ul class="pages">
<?php
$excluded = BX_excluded_pages();
wp_list_pages('title_li=&sort_column=menu_order&exclude='.$excluded);
?>
</ul>

<?php */ ?>


<?php if (is_home()) { ?>

<?php
/**
* If a page called "about_short" has been set up its content will be put here.
* In case that a page called "about" has been set up, too, it'll be linked to via 'More'.
*/

$pages = BX_get_pages('with_content');
if ($pages) {
foreach ($pages as $page) {
$page_id = $page->ID;
$page_title = $page->post_title;
$page_name = $page->post_name;
$page_content = $page->post_content;

if ($page_name == "about") $more_url = '<a href="'.get_page_link($page_id).'" class="more">More</a>';
if ($page_name == "about_short") {
$about_title = $page_title;
$about_text = BX_remove_p($page_content);
}
}
if ($about_text != "") {
echo "<h4><em>".$about_title."</em></h4>\n";
echo "<p>".$about_text;
if ($more_url != "") echo " ".$more_url;
echo "</p>\n";
}
}
?>

<?php /** the calender creates a lot of code and anchor text which will damage a pages optimization, especially on single post pages so avoid using it. If you must use it, remove everything on this line and the star/ approx. 6 lines down (below the calendar() ). This will add the calendar to single post pages (my advice is don't do it).

<h4><em>Calendar</em></h4>

<?php get_calendar() 

*/

 ?>

<?php } ?>

<h4><em>Recent Blog Posts</em></h4>

<ul class="posts">
<?php BX_get_recent_posts($p,10); ?>
</ul>

<h4><em>Categories</em></h4>

<ul class="categories">
<?php wp_list_cats('sort_column=name&hide_empty=0'); ?> 
</ul>

<div style="padding-left:30px; padding-bottom:5px;">
<script type="text/javascript"><!--
google_ad_client = "<?=$GoogleADID?>";
google_ad_width = 160;
google_ad_height = 600;
google_ad_format = "160x600_as";
google_ad_type = "text_image";
google_ad_channel ="";
google_color_border = "<?=$Googleborder?>";
google_color_bg = "<?=$Googlebg?>";
google_color_link = "<?=$Googlelink?>";
google_color_url = "<?=$Googleurl?>";
google_color_text = "<?=$Googletext?>";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<h4><em>Posts by Month</em></h4>

<ul class="months">
<?php get_archives('monthly','','','<li>','</li>',''); ?>
</ul>

<h4><em>Blogroll</em></h4>

<ul class="links">
<?php get_links('-1', '<li>', '</li>', '', 0, 'name', 0, 0, -1, 0); ?>
</ul>

<?php if (is_home()) { ?>
<h4><em>RSS Feeds</em></h4>

<ul class="feeds">
<li><a href="<?php bloginfo_rss('rss2_url'); ?> ">Entries (RSS)</a></li>
<li><a href="<?php bloginfo_rss('comments_rss2_url'); ?> ">Comments (RSS)</a></li>
</ul>
<?php } ?>

</div>