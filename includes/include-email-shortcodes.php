<?php namespace WSUWP\Plugin\Covid;

class Email_Shortcodes {


	public function init() {

	}


	public static function add_shortcodes() {

		add_shortcode( 'e_post_feed', __CLASS__ . '::do_shortcode_post_feed' );
		add_shortcode( 'e_has_posts', __CLASS__ . '::do_shortcode_has_posts' );
		add_shortcode( 'e_date', __CLASS__ . '::do_shortcode_date' );
		add_shortcode( 'e_date_month', __CLASS__ . '::do_shortcode_date' );
		add_shortcode( 'e_date_day', __CLASS__ . '::do_shortcode_date' );
		add_shortcode( 'e_date_day_name', __CLASS__ . '::do_shortcode_date' );

	}


	public static function add_post_shortcodes() {

		add_shortcode( 'e_post_title', __CLASS__ . '::do_shortcode_post_title' );
		add_shortcode( 'e_post_link', __CLASS__ . '::do_shortcode_post_link' );
		add_shortcode( 'e_post_content', __CLASS__ . '::do_shortcode_post_content' );
		add_shortcode( 'e_post_excerpt', __CLASS__ . '::do_shortcode_post_excerpt' );

	}


	public static function do_shortcode_post_title( $atts ) {

		return get_the_title();

	}

	public static function do_shortcode_post_link( $atts, $content ) {

		$default_atts = array(
			'classes' => 'wsu-c-email__link',
			'style' => '',
		);

		$atts = shortcode_atts( $default_atts, $atts );

		$link = get_the_permalink();

		$content = do_shortcode( $content );

		return '<a class="' . $atts['classes'] . '" href="' . $link . '" style="' . $atts['style'] . '">' . $content . '</a>';

	}

	public static function do_shortcode_post_content( $atts ) {

		ob_start();

		the_content();

		return ob_get_clean();

	}

	public static function do_shortcode_post_excerpt( $atts ) {

		$default_atts = array(
			'trim_words' => 35,
		);

		$atts = shortcode_atts( $default_atts, $atts );

		return wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), $atts['trim_words'] );

	}

	public static function do_shortcode_post_feed( $atts, $template ) {

		$content = '';

		$options = Email_Digest::get_options();

		$options_atts['empty_posts_text'] = $options['empty_posts'];

		if ( ! is_array( $atts ) ) {

			$atts = array();

		}

		$atts = array_merge( $options_atts, $atts );
		
		$query = self::get_query( $atts );

		$the_query = new \WP_Query( $query );

		self::add_post_shortcodes();

		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {

				ob_start();

				$the_query->the_post();

				$content .= do_shortcode( $template );

			}
		} else {

			$content .= '<p>' . $atts['empty_posts_text'] . '</p>';

		}

		wp_reset_postdata();

		return $content;

	}


	public static function do_shortcode_has_posts( $atts, $template ) {

		$content = ' ';
		
		$query = self::get_query( $atts );

		$the_query = new \WP_Query( $query );

		if ( $the_query->have_posts() ) {

			$content = do_shortcode( $template );

		}

		wp_reset_postdata();

		return $content;

	}


	public static function do_shortcode_date( $atts, $content, $tag ) {

		$default_atts = array(
			'format' => 'F',
		);

		switch ( $tag ) {
			case 'e_date_month':
				$default_atts['format'] = 'F';
				break;
			case 'e_date_day':
				$default_atts['format'] = 'j';
				break;
			case 'e_date_day_name':
				$default_atts['format'] = 'l';
				break;
		}

		$atts = shortcode_atts( $default_atts, $atts );

		return current_time( $atts['format'] );

	}


	protected static function get_query( $atts ) {

		$default_atts = array(
			'categories'         => '',
			'exclude_categories' => '',
			'orderby'            => 'date',
			'order'              => 'DESC',
			'count'              => '20',
			'by_time'            => '',
			'post_ids'           => '',
			'exclude_post_ids'   => '',
		);

		$atts = shortcode_atts( $default_atts, $atts );

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => '10',
			'orderby'        => $atts['orderby'],
			'order'          => $atts['order'],
			'posts_per_page' => $atts['count'],
		);

		if ( ! empty( $atts['post_ids'] ) ) {

			$args['post__in'] = explode( ',', $atts['post_ids'] );

		}

		if ( ! empty( $atts['exclude_post_ids'] ) ) {

			$args['post__not_in'] = explode( ',', $atts['exclude_post_ids'] );

		}

		if ( ! empty( $atts['by_time'] ) ) {

			$args['date_query'] = array(
				array(
					'after' => $atts['by_time'],
				),
			);

		}

		if ( ! empty( $atts['exclude_categories'] ) ) {

			$args['category__not_in'] = explode( ',', $atts['exclude_categories'] );

		}

		if ( ! empty( $atts['categories'] ) ) {

			$args['cat'] = $atts['categories'];

		}

		if ( ! empty( $_REQUEST['demo_content'] ) ) {

			unset( $args['cat'] );
			unset( $args['date_query'] );
			unset( $args['category__not_in'] );

			$args['posts_per_page'] = 3;

		}

		return $args;

	}

}

(new Email_Shortcodes )->init();
