<?php
    $max_width = get_sub_field('case_result_options_max_width');
    $bg_color =  get_sub_field('case_result_options_background_color');
    $text_align =  get_sub_field('case_result_options_text_align');

    $label_enabled = get_sub_field('case_result_label_enabled');
    $label = get_sub_field('case_result_label_content')?get_sub_field('case_result_label_content'):'';

    $pre = 'case_result_options_';
    $first = isset($args['first']) ? $args['first']:true;
?>
<section class="overflow-hidden case-results max-w-1920 mx-auto <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?> <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?> text-white w-full relative" style="<?php section_styling($pre);?>">
    <?php get_template_part('partials/section-label', null, array('enabled'=>$label_enabled,'label'=>$label, 'pre'=>$pre, 'first'=>$first) ) ;?>    
    <div class="768:max-w-1460 wrapper mx-auto text-<?php echo $text_align;?>">
        <div class="768:flex">
            <div class="768:w-1/2 768:mr-32 wysiwyg "><?php echo get_sub_field('case_result_content');?></div>
            <div class="768:w-1/2 768:ml-32 bg-darkgray p-24 text-center">
                <?php
                    $case = get_sub_field('case_result_case');
                    $amount = get_field('dollar_amount',$case);
                    $title = get_field('excerpt_title',$case);
                ?>
                <p class="case-result py-12 text-28 768:text-50 leading-115 font-lato font-900"><?php echo $amount;?></p>
                <p class="pb-24 text-30 font-times italic text-cyan"><?php echo $title;?></p>
                <p><?php echo get_post_field('post_content', $case);?></p>
                <a href="/case-results/">
                <div class="my-24 btn-outline-cyan text-22"><?php echo get_sub_field('case_result_cta');?></div>
                </a>
            </div>
        </div>
    </div>
</section>