<?php
    
    $harrison_img = get_field('headshot',145)['url'];
    $hart_img = get_field('headshot',148)['url'];

    $harrison = get_field('first_name',145).' '.get_field('middle_initial',145).' '.get_field('last_name',145).' '.get_field('suffix',145);
    $hart = get_field('first_name',148).' '.get_field('middle_initial',148).' '.get_field('last_name',148).' '.get_field('suffix',148);

    $label_enabled = get_sub_field('meet_us_label_enabled');
    $label = get_sub_field('meet_us_label_content')?get_sub_field('meet_us_label_content'):'';

    $pre = 'meet_us_options_';
    $first = isset($args['first']) ? $args['first']:true;
?>
<section class="overflow-hidden meet-us relative z-10 max-w-1920 mx-auto bg-gray text-white w-full" style="<?php section_styling($pre);?>">
    <?php get_template_part('partials/section-label', null, array('enabled'=>$label_enabled,'label'=>$label, 'pre'=>$pre, 'first'=>$first)) ;?>    
    <div class="bar ml-auto w-full 768:right-0">
        <div class="mb-24 mx-auto w-full flex flex-col flex-nowrap justify-center items-center">
            <div class="w-full flex flex-nowrap justify-center items-center">
                <button data-attorney="145" class="name-btn mr-12 active">Harrison</button>
                <div class="ampersand bg-cover bg-no-repeat"></div>
                <button data-attorney="148" class="name-btn ml-12">Hart</button>
            </div>
        </div>

        <div rel="attorney-145" class="meet-us__card active relative w-full 1025:bg-darkgray justify-center">
            <div class="headshot pointer-events-none">
                <img src="<?php echo $harrison_img;?>"/>
            </div>
            <div class="copy-container bg-darkgray">
                <h2><?php echo $harrison;?></h2>
                <h4><?php echo get_field('title',145);?></h4>
                <div class="mt-44 btn-cyan text-18 768:text-22">
                <a href="<?php echo get_field('link_to_bio_page',145);?>"><?php echo get_field('cta',145);?></a>
                </div>
            </div>
        </div>


        <div rel="attorney-148" class="meet-us__card relative w-full 1025:bg-darkgray justify-center">
            <div class="headshot pointer-events-none">
                <img src="<?php echo $hart_img;?>"/>
            </div>
            <div class="copy-container bg-darkgray">
                <h2><?php echo $hart;?></h2>
                <h4><?php echo get_field('title',148);?></h4>
                <div class="mt-44 btn-cyan text-18 768:text-22">
                <a href="<?php echo get_field('link_to_bio_page',148);?>"><?php echo get_field('cta',148);?></a>
                </div>
            </div>
        </div>

    </div>
</section>