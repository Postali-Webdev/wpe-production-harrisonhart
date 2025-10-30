<?php
    $wysiwyg_content = get_sub_field('wysiwyg_content');
    
    $pre = 'wysiwyg_options_';
    $max_width = get_sub_field($pre.'max_width');
    $bg_color =  get_sub_field($pre.'background_color');
    $text_align =  get_sub_field($pre.'text_align');
    $bg_img_enabled = get_sub_field($pre.'background_image_enabled');

    $padd_enabled = get_sub_field($pre.'padding_enabled');

    $side_image_enabled = get_sub_field('wysiwyg_image_group')['enabled'];
    
    $icon_enabled = get_sub_field('wysiwyg_icon_group')['enabled'];
    $label_enabled = get_sub_field('wysiwyg_label_enabled');
    $label = get_sub_field('wysiwyg_label_content')?get_sub_field('wysiwyg_label_content'):'';

    $first = isset($args['first']) ? $args['first']:true;
?>
<section class="wysiwyg max-w-1920 mx-auto <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?> text-white w-full">
    <div class="overflow-hidden w-full relative flex flex-col items-center justify-center<?php if($bg_img_enabled){ echo ' bg-center bg-no-repeat bg-cover'; }; ?>" style="<?php section_styling($pre);?>"> 
        <div class="<?php if($side_image_enabled):?>side-image <?php echo 'shift-'.get_sub_field('wysiwyg_image_group')['image_position']; else:?>wrapper mx-auto<?php endif;?>">
        <?php get_template_part('partials/section-label', null, array('enabled'=>$label_enabled, 'label'=>$label, 'pre'=>$pre, 'first'=>$first) ) ;?>
            <div class="wysiwyg__content pb-12 mx-auto w-full max-w-<?php echo $max_width;?> text-<?php echo $text_align;?>">
                <?php if($icon_enabled): $icon = get_sub_field('wysiwyg_icon_group')['icon']; $icon_position = get_sub_field('wysiwyg_icon_group')['icon_position'];?>
                    <div class="icon-<?php echo $icon_position;?> icon-container text-cyan <?php echo $icon;?>"></div>
                <?php endif;?>
                <?php echo $wysiwyg_content;?>
            </div>
            <?php if($side_image_enabled):?>
            <div class="wysiwyg__image">
                <img src="<?php echo esc_url(get_sub_field('wysiwyg_image_group')['image']['url']);?>" alt="<?php echo esc_attr(get_sub_field('wysiwyg_image_group')['image']['alt']);?>"/>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>