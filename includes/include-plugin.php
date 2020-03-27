<?php namespace WSUWP\Plugin\Covid;


class Plugin {

	public function init() {

		add_action( 'after_setup_theme', array( $this, 'after_setup' ) );

	}


	public function after_setup() {

		require_once __DIR__ . '/include-email-shortcodes.php';

		require_once __DIR__ . '/include-email-digest.php';

	}

	public static function get_plugin_dir() {

		return plugin_dir_path( dirname( __FILE__ ) );

	}

}

(new Plugin)->init();
