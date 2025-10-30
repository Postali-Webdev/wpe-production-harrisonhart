<?php
/**
 * Template Name: Sitemap
 *
 * @package Postali Parent
 * @author Postali LLC
 */
$breadcrumbs = true;
get_header(); ?>

<section class="max-w-1920 mx-auto pt-96 bg-gray text-white w-full relative">
    <div class="max-w-1920 wrapper bg-darkgray">
        <div class="max-w-1400 py-96 768:flex justify-between">
            <h1 class="mb-80">Sitemap</h1>
        </div>
    </div>
    <div class="max-w-900 mx-auto py-96">
        <div class="sitemap">
            <p class="pb-40 text-red uppercase font-bold">pages</p>
            <ul>
            <?php
            // Add pages you'd like to exclude in the exclude here
            wp_list_pages(
            array(
                'exclude' => '',
                'title_li' => '',
            )
            );
            ?>
            </ul>
        </div>
        <div class="sitemap">
            <p class="pb-40 text-red uppercase font-bold">blog posts</p>
            <ul>
            <?php
            // Add categories you'd like to exclude in the exclude here
            $cats = get_categories('exclude=');
            foreach ($cats as $cat) {
            echo "<li><h3>".$cat->cat_name."</h3>";
            echo "<ul>";
            query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
            while(have_posts()) {
                the_post();
                $category = get_the_category();
                // Only display a post link once, even if it's in multiple categories
                if ($category[0]->cat_ID == $cat->cat_ID) {
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                }
            }
            echo "</ul>";
            echo "</li>";
            }
            ?>
            </ul>
        </div>
    </div>
</section>
<?php require dirname( __FILE__ ) . '/sections/contact-us.php'; ?>
<?php get_footer();?>