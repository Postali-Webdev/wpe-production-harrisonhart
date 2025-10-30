<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<?php get_template_part('partials/progress-cirlce');?>
<footer class="max-w-1920 mx-auto bg-black relative">
    <div class="wrapper mx-auto w-full text-white">
        <div class="max-w-1460 mx-auto pb-64 w-full 1025:flex text-white">
            <div class="1025:w-1/2 pt-64 768:pr-96">
                <img calss="w-50" src="/wp-content/uploads/2023/04/logo-condensed-white.png">
                <p class="text-10 mt-24 leading-4"><?php echo get_field('global_footer_content','option');?></p>
                <?php if(is_page_template('front-page.php')) { ?>
                <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:30px 0 0 0;"></a>
                <?php } ?>
            </div>
            <div class="1025:w-1/2 pt-64 pl-24 1025:pl-0">
                <div class="w-full 768:flex">
                    <div class="768:w-1/2 list">
                    <?php
                        simple_menu('footer-nav');
                    ?>
                    </div>
                    <div class="768:w-1/2 list">
                        <?php
                            $areas =  get_page_by_template('page-practice-area-parent.php');
                            $label_enabled = get_sub_field('practice_areas_label_enabled');
                            $label = get_sub_field('practice_areas_label_content')?get_sub_field('practice_areas_label_content'):'';
                        ?>
                        <ul>
                        <?php foreach($areas as $key => $area):?>
                            <li><a href="<?php echo get_permalink($area->ID);?>"><?php echo get_field('practice_area_menu_title',$area->ID);?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="//cdn.callrail.com/companies/475403271/f5a583cfb25e892ec027/12/swap.js"></script>

<?php wp_footer(); ?>
</body>
</html>


