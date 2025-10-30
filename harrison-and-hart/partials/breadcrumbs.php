<?php global $breadcrumbs; if($breadcrumbs):?>
<div class="absolute w-full z-10">
    <div class="max-w-1920 mx-auto wrapper mt-24">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');}; ?>
    </div>
</div>
<?php endif;?>
