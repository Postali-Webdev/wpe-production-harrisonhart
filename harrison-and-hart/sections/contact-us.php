
<section class="bg-background max-w-1920 mx-auto text-white w-full relative">
    <div class="wrapper mx-auto">
        <div class="contact-form max-w-1400 pt-72 mx-auto text-white">
            <?php get_template_part('partials/section-label', null, array('enabled'=>true,'label'=>'Contact Us', 'first'=>false, 'last'=>true,'fix_padding'=>'72') ) ;?>    
            <h2 class="mb-32">The Right Firm For Your Case</h2>
            <div class="1025:flex">
                <div class="1025:mr-32 1025:w-1/2">
                    <h4>We’re ready to help you get your life back on track.</h4>
                    <p class="mb-32">From our office in Albuquerque, Harrison & Hart, LLC serves clients throughout New Mexico. We are focused on getting you the best outcome possible in the harshest of situations.</p>
                    <div class="768:flex mb-44">
                        <?php
                            $tel_string = get_field('global_phone_number','option');
                            $number = preg_replace('/\D+/', '', $tel_string);
                        ?>
                        <div class="w-100 768:w-1/2 mb-12">
                            <div class="mb-12">
                                <p>Call <a class="text-cyan" href="tel:<?php echo $number;?>"><?php echo get_field('global_phone_number','option');?></a></p>
                            </div>
                            <div class="mb-12">
                                <p>Email <a class="text-cyan" href="email:"><?php echo get_field('global_contact_email','option');?></a></p>
                            </div>
                            <div>
                                <p><a class="text-cyan" target="_blank" href="<?php echo get_field('global_directions_link','option');?>">Directions</a></p>
                            </div>
                        </div>
                        <div class="w-100 768:w-1/2">
                            <a href="<?php echo get_field('gbp_link', 'options'); ?>" target="_blank">
                                <p><?php echo get_field('global_address_line1','options');?><br/>
                                <?php echo get_field('global_address_line2','options');?></p>
                            </a>
                        </div>
                    </div>
                    <img class="w-full mb-12" src="<?php echo esc_url(get_field('default_contact_image','option')['url']);?>" alt="<?php echo esc_attr(get_field('default_contact_image','option')['alt']);?>"/>
                </div>
                <div id="map-form" class="1025:ml-10 1025:w-1/2">
                    <div id="map-holder">
                        <iframe src="<?php echo get_field('mbp_map_embed', 'options'); ?>" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="mt-24">
                        <?php echo do_shortcode(get_field('global_contact_form_shortcode','options')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>