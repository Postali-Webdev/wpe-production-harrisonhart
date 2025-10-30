<section class="hero contents text-white w-full absolute top-0">
    <div class="hero__contents foo-hero--full-screen max-w-1920 mx-auto w-full bg-darkgray relative">
        <div class="hero--full-screen__container max-w-1460 mx-auto w-full relative flex flex-col 1025:flex-row items-center justify-center">
            <div class="hero__cta__content wysiwyg wrapper mx-auto w-full pt-96 pb-20">
                <p><?php echo get_field('attorney_hero');?></p>
            </div>
            <img class="self-auto 768:self-end mt-0 768:-mt-96 1025:mt-0" src="<?php echo esc_url(get_field('headshot',$attorney->ID)['url']);?>" alt="<?php echo esc_attr(get_field('headshot',$attorney->ID)['alt']);?>"/>
        </div>
        <div class="edge icon-on-page-nav-down-arrow"></div>
    </div>
</section>