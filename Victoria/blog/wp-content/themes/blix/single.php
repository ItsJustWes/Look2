<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<?php /* This is the navigation for previous/next post. It's disabled by default. ?>
<p id="entrynavigation">
<?php previous_post('<span class="previous">%</span>','','yes') ?>
<?php next_post('<span class="next">%</span>','','yes') ?>
</p>
<?php */ ?>

<div class="entry single">

<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

<p class="info">
<?php if ($post->comment_status == "open") ?>
<em class="date">Posted by <?php the_author(); ?> on <?php the_time('F jS, Y') ?> at <?php the_time('h:ia')  ?></em>
<?php edit_post_link('Edit','<span class="editlink">','</span>'); ?>
</p>

<? include("adsense.php"); ?>
<div style="float:right; padding-bottom:10px;">
<script type="text/javascript"><!--
google_ad_client = "<?=$GoogleADID?>";
google_ad_width = 250;
google_ad_height = 250;
google_ad_format = "250x250_as";
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

<?php the_content();?>

<p class="info">
<em class="caty"><?php _e('Under'); ?> <?php the_category('+ ') ?></em>
</p>

</div>

<?php endwhile; ?>

<?php else : ?>

<h2>Not Found</h2>
<p>"Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

<?php comments_template(); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>