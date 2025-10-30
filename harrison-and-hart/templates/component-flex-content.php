<?php
    $first = isset($args['first']) ? $args['first']:true;
    while (have_rows('page_builder')) : the_row(); 
        switch (get_row_layout()) :
            case 'flex_wysiwyg':
                get_template_part('templates/flex', 'wysiwyg', array('source'=>'flex', 'first'=>$first));
                break;
            case 'flex_case_result':
                get_template_part('templates/flex', 'case-result', array('source'=>'flex', 'first'=>$first));
                break;
            case 'flex_review':
                get_template_part('templates/flex', 'review', array('source'=>'flex', 'first'=>$first));
                break;
            case 'flex_meet_us':
                get_template_part('templates/flex', 'meet-us', array('source'=>'flex', 'first'=>$first));
                break;
            case 'flex_practice_areas':
                get_template_part('templates/flex', 'practice-areas', array('source'=>'flex', 'first'=>$first));
                break;

        endswitch;
        $first = false;
    endwhile;
?>