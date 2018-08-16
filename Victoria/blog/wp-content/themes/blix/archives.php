<?php
/*
Template Name: archives
*/
?>

<?php get_header(); ?>

<div id="content" class="archive">

<h2>Archive &ndash; All Entries</h2>

<?php if ($wp_query->current_post == 0) include("first-ad.php"); ?>

<?php BX_archive(); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>