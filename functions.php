<?php

global $content_width;
$content_width = 1200;



// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'mcluhan-style','mcluhan-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 20 );

// END ENQUEUE PARENT ACTION
function ru_footer_widget_area() {
    register_sidebar(
        array (
            'name' => __( 'Footer Area', 'your-theme-domain' ),
            'id' => 'footer-bar',
            'description' => __( 'Widget-Area im Seitenfuß'),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'ru_footer_widget_area' );

function s2fwp_suche( $qvars ) {
    if(isset($_REQUEST['s'])){
		
		wp_redirect( home_url('/blog') . '?fwp_suche=' . $_REQUEST['s'] );
		
		
	}
}
add_action( 'wp', 's2fwp_suche' );

//rich_text_editor in Werkzeug formular
add_filter( 'gform_rich_text_editor_options', 'ru_tools_use_rich_text_editor', 10, 4 );
function ru_tools_use_rich_text_editor( $editor_settings, $field_object, $form, $entry ) {
    $editor_settings['editor_height'] = 400;
	$editor_settings['media_buttons'] = true;
    return $editor_settings;
}

//Voreinstellungen für das einbetten von videos
function ru_embed_defaults($embed_size){
	$embed_size['width'] = 1200;
	$embed_size['height'] = 600;
	return $embed_size;
}
//add_filter('embed_defaults', 'ru_embed_defaults');

function include_dashicons_font(){
    //Lade Dashicons font
    wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'include_dashicons_font', 100 );
