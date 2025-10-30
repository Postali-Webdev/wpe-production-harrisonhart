<?php
/**
 * Template Name: Success Page
 *
 * @author Postali LLC
 */
$breadcrumbs = true;
get_header(); ?>

<section class="max-w-1920 mx-auto bg-darkgray text-white w-full relative">
    <div class="bg-right-top bg-no-repeat bg-cover w-full h-full relative" style="background-image:url('<?php  ?>');">
     
        <div class="max-w-1200 wrapper mx-auto text-center w-full pt-96 pb-20">
            <div class="max-w-768 mx-auto pb-64 text-white ">
                <div class="mt-64 icon-left icon-container text-cyan icon-logo-circle"></div>
                <h1 class="mb-24 text-60">Success</h1>
                <p class="text-cyan italic text-22 pb-12">Your response has been submitted.</p>
                <p class="pb-48">Someone from Harrison & Hart, LLC will be in touch with you. Thank you for your time.</p>
                <a href="/" class="mb-24 btn-outline-cyan">Go to the Homepage</a>
            </div>
        </div>
    </div>
</section>

<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>

<?php get_footer();
