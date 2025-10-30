<?php
/**
 * Template Name: 404 Page
 *
 * @package Postali Parent
 * @author Postali LLC
 */
$breadcrumbs = true;
get_header(); ?>
<!-- 404.php -->
<section class="max-w-1920 mx-auto bg-darkgray text-white w-full relative">
    <div class="bg-right-top bg-no-repeat bg-cover w-full h-full relative" style="background-image:url('<?php  ?>');">
     
        <div class="max-w-1200 wrapper mx-auto text-center w-full pt-96 pb-20">
            <div class="max-w-768 mx-auto pb-64 text-white ">
                <div class="mt-64 icon-left icon-container text-cyan icon-logo-circle"></div>
                <h1 class="mb-24 text-60">404 Error</h1>
                <p class="text-cyan italic text-22 pb-12">Oops! The you’re looking for isn’t here.</p>
                <p class="pb-48">This might be because you typed the address wrong, or the page you’re looking for has been moved or deleted.</p>
                <a href="<?php home_url();?>" class="mb-24 btn-outline-cyan">Go to the Homepage</a>
            </div>
        </div>
    </div>
</section>
<?php get_footer();
