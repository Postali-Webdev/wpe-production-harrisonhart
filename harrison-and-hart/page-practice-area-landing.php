<?php
/**
 * Template Name: Practice Area Landing
 * @author Postali LLC
**/
$breadcrumbs = true;
get_header();?>

<?php require dirname( __FILE__ ) . '/partials/breadcrumbs.php'; ?>  

<?php require dirname( __FILE__ ) . '/sections/hero-generic.php'; ?>

<?php
    $max_width = get_sub_field('wysiwyg_options_max_width');
    $bg_color =  get_sub_field('wysiwyg_options_background_color');
    $text_align = get_sub_field('wysiwyg_options_text_align');

    
    $areas =  get_page_by_template('page-practice-area-parent.php');
    // $total = $areas->post_count;
    // $ares = 
?>
<section class="max-w-1920 pt-120 pb-96 mx-auto <?php echo (!empty($bg_color) && $bg_color)?'bg-'.$bg_color : 'bg-gray';?> text-white w-full relative">
    <?php get_template_part('partials/section-label', null, array('enabled'=>true,'label'=>'Practice Areas', 'first'=>true) ) ;?>
    <div class="mx-auto w-full wrapper max-w-1025">
        <?php foreach($areas as $key => $area):?>
            <div class="card relative mb-80 p-40 bg-darkgray">
                <div class="icon-container text-cyan <?php echo get_field('parent_hero_icon',$area->ID);?>"></div>
                <div class="1025:ml-96 flex flex-nowrap items-center">
                    <div class="pt-40 1025:pt-0">
                        <p class="title text-35 leading-35"><?php echo get_field('practice_area_card_title',$area->ID);?></p>
                        <a class="btn mt-24" href="<?php echo get_permalink($area->ID);?>"><?php echo get_field('practice_area_cta',$area->ID);?></a>
                    </div>
                </div>
                <div class="1025:ml-96 desc mt-24">
                    <?php echo get_field('practice_area_description',$area->ID);?>
                
                    <?php
                        $children = get_pages('child_of='.$area->ID.'&sort_column=menu_order');
                        if(count($children)):
                    ?>
                        <p class="pt-40">Related Topics</p>
                        <ul class="ml-44 list">
                        <?php wp_list_pages(array(
                            'child_of' => $area->ID,
                            'title_li' => ''
                        ));?>
                        </ul>
                    <?php endif;?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>

<?php get_template_part('templates/component', 'flex-content', array('first'=>true)); ?>


<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>


<?php get_footer();?>