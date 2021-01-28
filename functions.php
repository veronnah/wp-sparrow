<?php

	add_action('wp_enqueue_scripts', 'style_theme' );
	add_action('wp_footer', 'scripts_theme' );
	add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
	add_action('after_setup_theme', 'theme_register_nav_menu' ); 
	add_action('widgets_init', 'register_my_widgets'); 
	add_filter( 'document_title_separator', 'my_sep' );
	add_filter('the_content', 'test_content');

	function test_content($content){
		$content.= 'Thanks for reading the article!';
		return $content; 
	}

	function my_sep( $sep ){
		$sep = ' | ';
		return $sep;
	}

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
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails', array('post'));
		add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
		add_image_size('post_thumb', 1300, 500, true);
		add_filter('excerpt_more', 'new_excerpt_more'); 
		add_filter( 'excerpt_more', 'new_excerpt_more' );
		function new_excerpt_more( $more ){
			global $post;
			return '<a href="'. get_permalink($post) . '"> Read more...</a>';
		}
		// удаляет H2 из шаблона пагинации
		add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
		function my_navigation_template( $template, $class ){
			/*
			Вид базового шаблона:
			<nav class="navigation %1$s" role="navigation">
				<h2 class="screen-reader-text">%2$s</h2>
				<div class="nav-links">%3$s</div>
			</nav>
			*/

			return '
			<nav class="navigation %1$s" role="navigation">
				<div class="nav-links">%3$s</div>
			</nav>    
			';
		}

		// выводим пагинацию
		the_posts_pagination( array(
			'end_size' => 2,
		) ); 
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
