<?php

//Replace drop-down select include_blank '---' with watermark/placeholder copy
//https://stackoverflow.com/questions/13178585/contact-form-7-watermark-for-select-menu
function my_wpcf7_form_elements($html) {
    $text = 'Are you a new client?*';
    $html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');


// Contact Form 7 Submission Page Redirect
add_action( 'wp_footer', 'add_contact_form_script_to_footer' );

function add_contact_form_script_to_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '/form-success/';
}, false );
</script>
<?php
}
?>