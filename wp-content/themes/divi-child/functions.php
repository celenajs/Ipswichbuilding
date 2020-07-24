<?php 
	 add_action( 'wp_enqueue_scripts', 'divi_child_enqueue_styles' );
	 function divi_child_enqueue_styles() {
		   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
		   wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/dist/css/theme-style.min.css' );
		   wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/dist/js/theme.js', array ( 'jquery' ), 1.0, true); 
	} 
	
 ?>