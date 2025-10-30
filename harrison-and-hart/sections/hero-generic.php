<?php 
    if(isset($args)){
        $id = $args['post_id'];
    } else {
        $id = get_the_ID();
    }
?>
<section class="hero contents text-white w-full absolute top-0">
    <div class="hero__contents hero--full-screen max-w-1920 mx-auto bg-center bg-no-repeat bg-cover w-full relative flex flex-col items-center justify-center" style="background-image:url('<?php echo esc_url(get_field('background_image',$id)['url']); ?>');">
        <div class="hero__cta__content text-center max-w-<?php echo get_field('max_width',$id);?> wrapper mx-auto w-full pt-96 pb-96">
            <p><?php echo get_field('hero_content',$id);?></p>
        </div>
        <div class="edge icon-on-page-nav-down-arrow"></div>
    </div>
</section>