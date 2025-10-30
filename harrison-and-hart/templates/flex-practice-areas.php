<?php
    $max_width = get_sub_field('wysiwyg_options_max_width');
    $bg_color =  get_sub_field('wysiwyg_options_background_color');
    $text_align = get_sub_field('wysiwyg_options_text_align');

    
    $areas =  get_page_by_template('page-practice-area-parent.php');
    $label_enabled = get_sub_field('practice_areas_label_enabled');
    $label = get_sub_field('practice_areas_label_content')?get_sub_field('practice_areas_label_content'):'';
    $pre = 'practice_areas_options_';
    $first = isset($args['first']) ? $args['first']:true;
?>
<section class="overflow-hidden practice-areas max-w-1920 mx-auto <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?> text-white w-full relative"  style="<?php section_styling($pre);?>">
    <div class="wrapper mx-auto">
        <?php get_template_part('partials/section-label', null, array('enabled'=>$label_enabled,'label'=>$label, 'pre'=>$pre, 'first'=>$first) ) ;?>    
        <div class="pb-12 mx-auto max-w-900">
            <h2 class="pb-12"><?php echo get_sub_field('practice_areas_heading');?></h2>
            <h4><?php echo get_sub_field('practice_areas_subheading');?></h4>
            <?php echo get_sub_field('practice_areas_content');?>
        </div>
    </div>
    <div class="mx-auto wrapper w-full max-w-1460">
        <div class="card-container flex flex-wrap w-full">
            <?php if ( is_page('10')) : ?>
                <?php foreach($areas as $key => $area):?>
                    <?php $homepage = get_field('show_on_homepage',$area->ID);
                    if ($homepage != 'hide') { ?>
                        <div class="card bg-darkgray">
                            <a href="<?php echo get_permalink($area->ID);?>">
                                <div class="flex flex-nowrap items-center">
                                    <div class="icon-container text-cyan <?php echo get_field('parent_hero_icon',$area->ID);?>"></div>
                                    <p class="title"><?php echo get_field('practice_area_card_title',$area->ID);?></p>
                                </div>
                                <div class="desc 768:mt-24">
                                    <?php echo strip_links(get_field('practice_area_description',$area->ID));?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php endforeach;?>
            <?php else : ?>
                <?php foreach($areas as $key => $area):?>
                <div class="card bg-darkgray">
                    <a href="<?php echo get_permalink($area->ID);?>">
                        <div class="flex flex-nowrap items-center">
                            <div class="icon-container text-cyan <?php echo get_field('parent_hero_icon',$area->ID);?>"></div>
                            <p class="title"><?php echo get_field('practice_area_card_title',$area->ID);?></p>
                        </div>
                        <div class="desc 768:mt-24">
                            <?php echo strip_links(get_field('practice_area_description',$area->ID));?>
                        </div>
                    </a>
                </div>
                <?php endforeach;?>
            <?php endif; ?>
        </div>
    </div>
</section>