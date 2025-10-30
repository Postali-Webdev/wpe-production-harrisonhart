<?php

function custom_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'custom_social', array(
        'title'      => __( 'Social', 'custom' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'custom_social_linkedin_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_social_linkedin_control', array(
        'label'        => __( 'LinkedIn', 'custom' ),
        'section'    => 'custom_social',
        'settings'   => 'custom_social_linkedin_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_social_facebook_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_social_facebook_control', array(
        'label'        => __( 'Facebook', 'custom' ),
        'section'    => 'custom_social',
        'settings'   => 'custom_social_facebook_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_social_twitter_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_social_twitter_control', array(
        'label'        => __( 'Twitter', 'custom' ),
        'section'    => 'custom_social',
        'settings'   => 'custom_social_twitter_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_social_youtube_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_social_youtube_control', array(
        'label'        => __( 'YouTube', 'custom' ),
        'section'    => 'custom_social',
        'settings'   => 'custom_social_youtube_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_social_houzz_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_social_houzz_control', array(
        'label'        => __( 'Houzz', 'custom' ),
        'section'    => 'custom_social',
        'settings'   => 'custom_social_houzz_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_social_pinterest_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_social_pinterest_control', array(
        'label'        => __( 'Pinterest', 'custom' ),
        'section'    => 'custom_social',
        'settings'   => 'custom_social_pinterest_setting',
    ) ) );

     $wp_customize->add_setting( 'custom_social_instagram_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_social_instagram_control', array(
        'label'        => __( 'Instagram', 'custom' ),
        'section'    => 'custom_social',
        'settings'   => 'custom_social_instagram_setting',
    ) ) );

    $wp_customize->add_section( 'custom_address', array(
        'title'      => __( 'Contact Information  (Address, Email, Phone)', 'custom' ),
        'priority'   => 31,
    ) );

    $wp_customize->add_setting( 'custom_address_line_one_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_address_line_one_control', array(
        'label'        => __( 'Address Line 1', 'custom' ),
        'section'    => 'custom_address',
        'settings'   => 'custom_address_line_one_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_address_line_two_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_address_line_two_control', array(
        'label'        => __( 'Address Line 2', 'custom' ),
        'section'    => 'custom_address',
        'settings'   => 'custom_address_line_two_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_address_line_three_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_address_line_three_control', array(
        'label'        => __( 'Address Line 3', 'custom' ),
        'section'    => 'custom_address',
        'settings'   => 'custom_address_line_three_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_address_email_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_address_email_control', array(
        'label'        => __( 'Email', 'custom' ),
        'section'    => 'custom_address',
        'settings'   => 'custom_address_email_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_address_cell_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_address_cell_control', array(
        'label'        => __( 'Cell', 'custom' ),
        'section'    => 'custom_address',
        'settings'   => 'custom_address_cell_setting',
    ) ) );

    $wp_customize->add_setting( 'custom_address_fax_setting' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_address_fax_control', array(
        'label'        => __( 'Fax', 'custom' ),
        'section'    => 'custom_address',
        'settings'   => 'custom_address_fax_setting',
    ) ) );

}
add_action( 'customize_register', 'custom_customize_register' );



if( class_exists( 'WP_Customize_Control' ) ):
    class WP_Customize_Page_Control extends WP_Customize_Control {
        public $type = 'page_dropdown';

        public function render_content() {

            $latest = new WP_Query( array(
                'post_type'   => 'page',
                'post_status' => 'publish',
                'orderby'     => 'date',
                'order'       => 'DESC',
                'posts_per_page' => '-1'
            ));

            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <select <?php $this->link(); ?>>
                    <?php
                    while( $latest->have_posts() ) {
                        $latest->the_post();
                        echo "<option " . selected( $this->value(), get_the_ID() ) . " value='" . get_the_ID() . "'>" . the_title( '', '', false ) . "</option>";
                    }
                    ?>
                </select>
            </label>
            <?php
        }
    }
endif;
