<?php
/**
 * Plugin Name:       WP Placeholder
 * Plugin URI:        https://prolificdigital.com
 * Description:       Loads placeholder images for local development when local image files are missing.
 * Version:           1.1.0
 * Requires at least: 6.5
 * Requires PHP:      8.4
 * Author:            Prolific Digital
 * Author URI:        https://prolificdigital.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-placeholder
 * Domain Path:       /languages
 * Update URI:        https://api.prolificdigital.io/api/update?plugin=wp-placeholder
 *
 * @package WPPlaceholder
 */

defined( 'ABSPATH' ) || exit;

define( 'WP_PLACEHOLDER_VERSION', '1.1.0' );
define( 'WP_PLACEHOLDER_PLUGIN_FILE', __FILE__ );
define( 'WP_PLACEHOLDER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Composer dependencies (plugin-update-checker). Present in release zips;
// in a git checkout run `composer install` first.
if ( is_readable( WP_PLACEHOLDER_PLUGIN_DIR . 'vendor/autoload.php' ) ) {
	require_once WP_PLACEHOLDER_PLUGIN_DIR . 'vendor/autoload.php';
}

require_once WP_PLACEHOLDER_PLUGIN_DIR . 'includes/update-checker.php';

/**
 * Load bundled translations from /languages (the header's Domain Path).
 */
add_action(
	'init',
	static function () {
		load_plugin_textdomain( 'wp-placeholder', false, dirname( plugin_basename( WP_PLACEHOLDER_PLUGIN_FILE ) ) . '/languages' );
	}
);

if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1') {
	// Replace src paths
	add_filter('wp_get_attachment_url', function ($url) {
		if (file_exists($url)) {
			return $url;
		}
		// return str_replace(WP_HOME, 'https://www.some-production-site.com', $url);
		return 'https://picsum.photos/800/500';
	});

	// Replace srcset paths
	add_filter('wp_calculate_image_srcset', function ($sources) {
		foreach ($sources as &$source) {
			if (!file_exists($source['url'])) {

				// $source['url'] = str_replace(WP_HOME, 'https://www.some-production-site.com', $source['url']);
				$source['url'] = 'https://picsum.photos/800/500';
			}
		}
		return $sources;
	});
}
