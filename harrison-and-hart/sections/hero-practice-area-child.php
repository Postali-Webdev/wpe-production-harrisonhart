<?php
    $bg_color = get_field('child_hero__background_color');
    $bg_img_enabled = get_field('child_hero__background_image_enabled');
    $bg_img = get_field('child_hero__background_image');
?>
<section class="hero relative max-w-1920 mx-auto text-white w-full">
    <div class="hero__contents wrapper hero--full-screen <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?> w-full relative flex flex-col items-center justify-center <?php if($bg_img_enabled){ echo ' bg-center bg-no-repeat bg-cover'; }; ?>" style="<?php if($bg_img_enabled){ echo 'background-image:url('.$bg_img['url'].');'; };?>">
        <div class="breadcrumb-spacer"></div>    
        <div class="mt-64 pb-24 768:pb-44 relative text-center max-w-<?php echo get_field('child_hero__max_width');?> mx-auto w-full">
            <?php $icon = get_field('child_hero_icon'); if($icon):?>
            <div class="absolute icon-container text-cyan <?php echo $icon;?>"></div>
            <?php endif;?>
            <h1 class="mt-72 mb-24"><?php echo get_field('child_hero_heading');?></h1>
            <h4 class=""><?php echo get_field('child_hero_subheading');?></h4>
            <div class="max-w-768 mx-auto pb-48"><?php echo get_field('child_hero_content');?></div>
            <?php get_template_part('partials/contact-cta') ;?>
        </div>
        <div class="edge icon-on-page-nav-down-arrow"></div>
    </div>
</section>