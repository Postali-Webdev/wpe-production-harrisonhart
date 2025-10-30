<div class="edge section-label">
    <?php
    $first = isset($args['first']) ? $args['first']:false;
    if(!$first):
        if(isset($args['fix_padding'])){
            $mt = $args['fix_padding'];
            $h = $args['fix_padding'] - 20;
        } else {
            $mt = get_field('global_spacing_group', 'option')['padding_top_desktop'];
            $h = $mt - 20;
            if (isset($args['pre'])) {
                $padd_enabled = get_sub_field($args['pre'].'padding_enabled');
                if ($padd_enabled) {
                    $pt = get_sub_field($args['pre'].'spacing_group')['padding_top_desktop'];
                    if (is_numeric($pt)) {
                        $mt = $pt;
                        $h = $pt;
                    }
                }
            }
        };
        if($h > 0):?>
        <div class="filler" style="margin-top:-<?php echo $mt;?>px;height:<?php echo $h;?>px;"></div>
     <?php endif;
    endif;?>
    <?php if($args['enabled']):?>
        <?php if(isset($args['label'])):?>
        <div class="section-label__container">
            <div class="line"></div>
            <p class="text-22 font-bold m-0"><?php echo $args['label'];?></p>
        </div>
        <?php endif;?>
    <?php endif;?>
    <?php if(empty($args['last'])):?>
    <div class="background-line"></div>
    <?php endif;?>
</div>