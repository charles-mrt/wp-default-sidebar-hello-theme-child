<?php

/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
    wp_enqueue_style(
            'hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', [
        'hello-elementor-theme-style',
            ], '1.0.0'
    );
}

add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts' );




/*
 * Register sidebar
 *  */

function RegisterSideBar() {
    register_sidebar(
            array(
                'id' => 'sidebar',
                'name' => __( 'sidebar', 'textdomain' ),
                'description' => __( 'insert your widgets.', 'textdomain' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
    );
}

add_action( 'widgets_init', 'RegisterSideBar' );

/*

 * Request dynamic sidebar
 *  */

function DynamicSidebar() {

    if ( is_home() || is_single() || is_category() || is_tag() ) {
        echo '<div class = "custom sidebar">';
        dynamic_sidebar( 'sidebar' );
        echo'</div>';
    }
}
