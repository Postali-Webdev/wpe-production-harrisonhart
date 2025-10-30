<?php
/**
 * Template Name: Child Page
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();?>

<?php require dirname( __FILE__ ) . '/partials/breadcrumbs.php'; ?>  

<?php require dirname( __FILE__ ) . '/sections/hero-practice-area-child.php'; ?>

<?php get_template_part('templates/component', 'flex-content', array('first'=>true)); ?>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();?>