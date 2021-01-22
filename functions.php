<?php

	add_action('wp_enqueue_scripts', 'style_theme' );
	add_action('wp_footer', 'scripts_theme' );
	add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
	add_action('after_setup_theme', 'theme_register_nav_menu' ); 
	add_action('widgets_init', 'register_my_widgets'); 

	function register_my_widgets(){

	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => "left_sidebar",
		'description'   => 'description',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widgettitle">',
		'after_title'   => "</h5>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	) );
}

	function theme_register_nav_menu(){
		register_nav_menu( 'top', 'header_menu' );
		register_nav_menu( 'footer', 'footer_menu' );
	}

	function my_scripts_method() {
	// отменяем зарегистрированный jQuery
	// вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	}

	function style_theme()
	{
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css' );
		wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css' );
		wp_enqueue_style( 'media', get_template_directory_uri() . '/assets/css/media-queries.css' );
	}
	function scripts_theme(){
		wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js');
		wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js');
		wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js');
	}
