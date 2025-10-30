<div class="flex flex-col 768:flex-row flex-nowrap justify-center items-center">
    <a href="<?php echo get_field('global_contact_form_link','option')['url'];?>" class="text-cyan text-18 768:text-22 py-18 768:px-64 font-bold"><?php echo get_field('global_contact_form_cta','option'); ?></a>
    <?php
        $tel_string = get_field('global_phone_number','option');
        $number = preg_replace('/\D+/', '', $tel_string);
    ?>
    <a class="btn-outline-cyan text-18 768:text-22" href="tel:<?php echo $number;?>">Call <?php echo get_field('global_phone_number','option'); ?></a>
</div>