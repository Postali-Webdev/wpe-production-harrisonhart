<section class="hero contents text-white w-full absolute top-0 h-screen">
    <div class="hero__contents hero--full-screen max-w-1920 mx-auto bg-center bg-no-repeat bg-cover w-full relative flex flex-col items-center justify-center" style="background-image:url('<?php echo (get_field('homepage_hero_background_image')['url']); ?>');">
        <div class="wrapper mx-auto py-44">
            <div class="text-center max-w-<?php echo get_field('homepage_hero_max_width');?> mx-auto w-full">
                <h1 class="text-cyan italic font-400 font-times mb-12"><?php echo get_field('homepage_hero_heading');?></h1>
                <h2 class="text-white not-italic font-lato font-900"><?php echo get_field('homepage_hero_value_proposition');?></h2>
                <p class="max-w-768 mx-auto py-12 768:pb-48 768:pt-64"><?php echo get_field('homepage_hero_content');?></p>
                <div class="flex flex-col 768:flex-row flex-nowrap justify-center items-center">
                    <?php
                        $tel_string = get_field('global_phone_number','option');
                        $number = preg_replace('/\D+/', '', $tel_string);
                    ?>
                    <a href="#<?php echo get_field('homepage_hero_anchor_id');?>" class="text-cyan text-18 768:text-22 py-18 768:px-64 font-bold"><?php echo get_field('homepage_hero_cta'); ?></a>
                    <a class="btn-outline-cyan text-18 768:text-22" href="tel:<?php echo $number;?>">Call <?php echo get_field('global_phone_number','option'); ?></a>
                </div>
            </div>
        </div>
        <div class="edge icon-on-page-nav-down-arrow"></div>
    </div>
</section>