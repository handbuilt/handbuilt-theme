<?php

namespace Hand_Built;

use League\CommonMark\CommonMarkConverter;

class Content_Model extends Controller {

	protected static $custom_post_types = array(
		'tip'
	);

	protected function setup_actions() {
		add_action( 'init', array( $this, 'action_init_register_post_types' ) );
		add_action( 'init', array( $this, 'action_init_register_taxonomies' ) );
	}

	protected function setup_filters() {

		$custom_post_types = self::$custom_post_types;
		add_filter( 'msm_sitemap_entry_post_type', function() use ( $custom_post_types ) {
			return array_merge( array( 'post', 'page' ), $custom_post_types );
		});

		add_filter( 'comments_open', '__return_false' );

		add_filter( 'register_post_type_args', function( $args, $post_type ) {
			global $wp_rewrite;
			if ( 'post' === $post_type ) {
				$archive_slug = 'blog';
				$args['has_archive'] = $archive_slug;
				$archive_slug = $wp_rewrite->root . $archive_slug;
				add_rewrite_rule( "{$archive_slug}/?$", "index.php?post_type=$post_type", 'top' );
				$feeds = '(' . trim( implode( '|', $wp_rewrite->feeds ) ) . ')';
				add_rewrite_rule( "{$archive_slug}/feed/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
				add_rewrite_rule( "{$archive_slug}/$feeds/?$", "index.php?post_type=$post_type" . '&feed=$matches[1]', 'top' );
				add_rewrite_rule( "{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type=$post_type" . '&paged=$matches[1]', 'top' );
			}
			return $args;
		}, 10, 2 );

		$markdown_convert = function( $string ) {
			$converter = new CommonMarkConverter;
			return $converter->convertToHtml( $string );
		};
		foreach( array( 'the_excerpt', 'the_content' ) as $filter ) {
			add_filter( $filter, $markdown_convert, 0 );
		}

	}

	public function action_init_register_post_types() {

		foreach( self::$custom_post_types as $post_type ) {
			$args = array(
				'hierarchical'            => false,
				'public'                  => true,
				'show_in_nav_menus'       => true,
				'show_ui'                 => true,
				'has_archive'             => true,
				'query_var'               => true,
				'rewrite'                 => array(
					'with_front'          => false,
				),
				'supports'                => array(
					'title',
					'excerpt',
					'editor',
					'thumbnail',
				)
			);
			switch ( $post_type ) {
				case 'tip':
					$singular = 'Tip';
					$plural = 'Tips';
					$args['description'] = 'Short articles on how to solve many different problems.';
					$args['menu_position'] = 7;
					$args['menu_icon'] = 'dashicons-info';
					$args['has_archive'] = 'tips';
					$args['rewrite']['slug'] = 'tip';
					break;
			}
			$args['labels'] = array(
				'name'                => $plural,
				'singular_name'       => $singular,
				'all_items'           => sprintf( 'All %s', $plural ),
				'new_item'            => sprintf( 'New %s', $singular ),
				'add_new'             => sprintf( 'Add New', $singular ),
				'add_new_item'        => sprintf( 'Add New %s', $singular ),
				'edit_item'           => sprintf( 'Edit %s', $singular ),
				'view_item'           => sprintf( 'View %s', $singular ),
				'search_items'        => sprintf( 'Search %s', $plural ),
				'not_found'           => sprintf( 'No %s found', $plural ),
				'not_found_in_trash'  => sprintf( 'No %s found in trash', $plural ),
				'parent_item_colon'   => sprintf( 'Parent %s', $singular ),
				'menu_name'           => $plural,
			);
			register_post_type( $post_type, $args );
		}
	}

	public function action_init_register_taxonomies() {

	}

	public function action_init_register_shortcodes() {

	}

	public static function get_post_types() {
		return self::$custom_post_types;
	}

	public static function get_content_post_types() {
		return array_merge( array( 'post', 'page' ), self::$custom_post_types );
	}

}
