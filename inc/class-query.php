<?php

namespace Hand_Built;

class Query extends Controller {

	protected function setup_actions() {
		add_action( 'pre_get_posts', array( $this, 'action_pre_get_posts' ) );
	}

	public function action_pre_get_posts( $query ) {

		if ( $query->is_main_query() && $query->is_feed() ) {
			$query->set( 'post_type', array( 'post', 'tip' ) );
		}

	}

	/**
	 * Get a post object based on its ID
	 *
	 * @param int
	 * @return obj|false
	 */
	public static function get_post_by_id( $post_id ) {
		if ( ! $post_id ) {
			return false;
		}

		$post = get_post( $post_id );
		if ( ! $post ) {
			return false;
		}

		$class = '\Hand_Built\Objects\\' . ucwords( $post->post_type );
		if ( ! class_exists( $class ) ) {
			return false;
		}
		return new $class( $post );
	}

}
