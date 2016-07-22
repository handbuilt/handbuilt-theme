<?php

namespace Hand_Built;

class Assets extends Controller {

	protected function setup_actions() {
		add_action( 'admin_enqueue_scripts', array( $this, 'action_admin_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'action_wp_enqueue_scripts' ) );
	}

	public function action_admin_enqueue_scripts() {
		$time = filemtime( get_template_directory() . '/assets/css/admin.css' );
		wp_enqueue_style( 'handbuilt-admin', get_template_directory_uri() . '/assets/css/admin.css?r=' . (int) $time );
		// $time = filemtime( get_template_directory() . '/assets/js/admin.js' );
		// wp_enqueue_script( 'handbuilt-admin', get_stylesheet_directory_uri() . '/assets/js/admin.js?r=' . (int) $time, array( 'jquery' ) );
		// $time = filemtime( get_template_directory() . '/assets/css/editor.css' );
		// add_editor_style( get_stylesheet_directory_uri() . '/assets/css/editor.css?r=' . (int) $time );
	}

	public function action_wp_enqueue_scripts() {

		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700|Open+Sans:400italic,600italic,300,400,600' );

		$time = filemtime( get_template_directory() . '/assets/css/style.css' );
		wp_enqueue_style( 'handbuilt', get_template_directory_uri() . '/assets/css/style.css?r=' . (int) $time, array( 'google-fonts' ) );
	}

}
