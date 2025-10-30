<?php
/**
 * Template Name: Contact
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();
?>
<!-- #contact-page -->
<section class="hero contents mx-auto text-white w-full absolute top-0">
    <div class="max-w-1920 bg-darkgray w-full mx-auto relative py-96 1025:py-164">
        <div class="mx-auto wrapper w-full max-w-1460 flex flex-col 1025:flex-row items-start justify-center">
            <div class="1025:pr-24  w-full 1025:w-1/2">
                <?php echo get_field('contact_content');?>
                <div class="768:flex mb-32 mt-40">
                    <?php
                        $tel_string = get_field('global_phone_number','option');
                        $number = preg_replace('/\D+/', '', $tel_string);
                    ?>
                    <div class="w-100 768:w-1/2 mb-12">
                        <div class="mb-12">
                            Call <a class="text-cyan" href="tel:<?php echo $number;?>"><?php echo get_field('global_phone_number','option');?></a>
                        </div>
                        <div>
                            Email <a class="text-cyan" href="email:"><?php echo get_field('global_contact_email','option');?></a>
                        </div>
                    </div>
                    <div class="w-100 768:w-1/2 mb-12">
                        <p><?php echo get_field('global_address_line1','options');?><br/>
                        <?php echo get_field('global_address_line2','options');?></p>
                        <a class="text-cyan" href="<?php echo get_field('global_directions_link','options');?>" target="_blank">Get Directions</a>
                    </div>
                </div>
            </div>
            <div class="1025:pl-24 w-full 1025:w-1/2 map-container">
                <iframe src="<?php the_field('contact_map');?>" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
            </div>
        </div>
        
    </div>
    <div class="edge icon-on-page-nav-down-arrow"></div>
</section>


<section class="bg-background max-w-1920 mx-auto text-white w-full relative">
    <div class="wrapper mx-auto">
        <div class="contact-form max-w-1400 pt-96 1025:flex mx-auto text-white">
            <div class="1025:mr-10 1025:w-1/2">
                <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
            </div>
            <div class="image-container 1025:ml-10 1025:w-1/2">
                <img class="w-full" src="<?php echo esc_url(get_field('default_contact_image','option')['url']);?>" alt="<?php echo esc_attr(get_field('default_contact_image','option')['alt']);?>"/>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>