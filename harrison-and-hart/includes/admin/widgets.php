<?php

// Add widget title as a class to the widget
if (! function_exists('widget_title_as_class')) {
    function widget_title_as_class($title)
    {
        return '<span class="widget-title ' . sanitize_title($title) . '">' . $title . '</span>';
    }
    add_filter('widget_title', 'widget_title_as_class');
}


// Register our sidebars and widgetized areas.
if (! function_exists('arphabet_widgets_init')) {
    function arphabet_widgets_init()
    {
        // This is a standard implementation of a new widget sidebar
        register_sidebar(array(
        'name'          => 'Default Widget',
        'id'            => 'default_widget',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ));
    }
    add_action('widgets_init', 'arphabet_widgets_init');
}