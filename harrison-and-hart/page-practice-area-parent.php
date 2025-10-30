<?php
/**
 * Template Name: Practice Area Parent
 * @package Postali Child
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();?>

<?php require dirname( __FILE__ ) . '/partials/breadcrumbs.php'; ?>  

<?php require dirname( __FILE__ ) . '/sections/hero-practice-area.php'; ?>

<?php get_template_part('templates/component', 'flex-content', array('first'=>true)); ?>

<?php require dirname( __FILE__ ) . '/sections/related-topics.php'; ?>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>


<?php get_footer();?>