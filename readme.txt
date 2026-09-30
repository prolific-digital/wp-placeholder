=== WP Placeholder ===
Contributors: prolificdigital
Tags: placeholder, images, development, local
Requires at least: 6.5
Tested up to: 7.1
Requires PHP: 8.4
Stable tag: 1.1.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Loads placeholder images for local development when local image files are missing.

== Description ==

For local development copies of a site whose uploads were not downloaded. On requests from `127.0.0.1`, attachment URLs and srcset sources whose files are not found are replaced with a random image from picsum.photos.

There are no settings and the plugin stores no data. Do not activate it on production sites.

== Installation ==

1. Upload the `wp-placeholder` folder to `/wp-content/plugins/` on your local site, or install the release zip from **Plugins > Add New > Upload Plugin**.
2. Activate the plugin.
3. To receive automatic updates, add your license key to `wp-config.php`:
   `define( 'PROLIFIC_LICENSE_KEY_WP_PLACEHOLDER', 'your-key' );`

== Changelog ==

= 1.1.0 =
* Updates now come from the Prolific Digital license server. Define `PROLIFIC_LICENSE_KEY_WP_PLACEHOLDER` to receive them.
* Author is Prolific Digital; license is GPL-2.0-or-later.
* Requires WordPress 6.5+ and PHP 8.4+.

= 1.0.0 =
* Initial release.
