<?php
    $max_width = get_sub_field('review_options_max_width');
    $bg_color =  get_sub_field('review_options_background_color');
    $text_align =  get_sub_field('review_options_text_align');
    $default = get_sub_field('review_default_image_enabled');
    $review_img = '';
    if($default){
        $review_img = get_field('default_review_image','option');
    } else {
        $review_img = get_sub_field('review_image');
    }
    $label_enabled = get_sub_field('review_label_enabled');
    $label = get_sub_field('review_label_content')?get_sub_field('review_label_content'):'';

    $pre = 'review_options_';
    $first = isset($args['first']) ? $args['first']:true;
?>
<section class="review max-w-1920 mx-auto text-white w-full relative <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?>" >
    <div class="overflow-hidden wrapper bg-center bg-no-repeat bg-cover w-full relative flex flex-col items-center justify-center" style="<?php section_styling($pre);?>">
        <div class="mx-auto text-center max-w-<?php echo $max_width;?> text-<?php echo $text_align;?>">
            <?php get_template_part('partials/section-label', null, array('enabled'=>$label_enabled,'label'=>$label, 'pre'=>$pre, 'first'=>$first) ) ;?>      
            <img class="mx-auto" src="<?php echo $review_img['url'];?>">
            <h2><?php echo get_sub_field('review_heading');?></h2>
            <p><?php echo get_sub_field('review_content');?></p>
            <div class="dashline"></div>
            <a href="/reviews/">
                <div class="my-24 btn-outline-cyan text-22"><?php echo get_sub_field('review_cta');?></div>
            </a>
        </div>
    </div>
</section>