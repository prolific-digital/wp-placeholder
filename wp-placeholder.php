<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://millertchris.com
 * @since             1.0.0
 * @package           Wp_Placeholder
 *
 * @wordpress-plugin
 * Plugin Name:       WP Placeholder
 * Plugin URI:        https://prolificdigital.com
 * Description:       Loads random images for local development if no local images are found.
 * Version:           1.0.0
 * Author:            Chris Miller
 * Author URI:        https://millertchris.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-placeholder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WP_PLACEHOLDER_VERSION', '1.0.0');

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
