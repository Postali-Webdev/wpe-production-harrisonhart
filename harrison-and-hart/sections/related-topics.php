<?php
    // global $post;
    // $children = get_posts('post_parent='.$post->post_name.'&post_status=publish');
    $children = get_pages('child_of='.$post->ID.'&sort_column=menu_order');
    if(count($children)):
?>
<section class="overflow-hidden relative related-topics z-10 max-w-1920 mx-auto pt-48 bg-gray text-white w-full">
    <?php get_template_part('partials/section-label', null, array('enabled'=>true, 'fix_padding'=>'48') ) ;?>
    <div class="ml-auto wrapper pt-64 pb-96 w-full h-full 768:right-0 768:max-w-1460 bg-darkgray">
        <div class="1200:px-96">
            <h2 class="pb-24">Related Topics</h2>
            <ul class="ml-44 list">
            <?php wp_list_pages(array(
                'child_of' => $post->ID,
                'title_li' => ''
            ));?>
            </ul>
        </div>
    </div>
</section>
<?php endif;?>