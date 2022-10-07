<?php

function register_my_menus() {
    register_nav_menus(
        array(
            'header' => __( 'Header' ),
            'other' => __( 'Other' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

function nd_dosth_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'nd_dosth_theme_setup');

function register_js_css(){

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style('style');	

	wp_register_script( 'bundle-js', get_template_directory_uri() . '/js/bundle.js');
	wp_enqueue_script('bundle-js');
}

add_action( 'wp_enqueue_scripts', 'register_js_css' );

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    
    // Remove from TinyMCE
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Add column with template name
 */
add_filter( 'manage_pages_columns', 'codismo_table_columns', 10, 1 );
add_action( 'manage_pages_custom_column', 'codismo_table_column', 10, 2 );

function codismo_table_columns( $columns ) {

    $custom_columns = array(
        'codismo_template' => 'Template'
    );

    $columns = array_merge( $columns, $custom_columns );

    return $columns;

}

function codismo_table_column( $column, $post_id ) {

    if ( $column == 'codismo_template' ) {
        echo basename( get_page_template() );
    }

}