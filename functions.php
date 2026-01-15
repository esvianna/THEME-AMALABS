<?php
/**
 * AmaLabs functions and definitions
 */

function amalabs_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'amalabs' ),
    ) );

    // Custom Logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
add_action( 'after_setup_theme', 'amalabs_setup' );

/**
 * Enqueue scripts and styles.
 */
function amalabs_scripts() {
    // Google Fonts
    wp_enqueue_style( 'amalabs-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap', array(), null );

    // Main Stylesheet
    wp_enqueue_style( 'amalabs-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'amalabs_scripts' );
