# WP Placeholder

A WordPress plugin for local development: when a site's uploads are missing locally, it serves random placeholder images from [picsum.photos](https://picsum.photos) instead of broken images.

| | |
|---|---|
| Requires | WordPress 6.5+, PHP 8.4+ |
| Text domain | `wp-placeholder` |
| License | GPL-2.0-or-later |

## How it works

Only when the request comes from `127.0.0.1` (`$_SERVER['REMOTE_ADDR']`), the plugin filters:

- `wp_get_attachment_url`: returns `https://picsum.photos/800/500` when the file is not found.
- `wp_calculate_image_srcset`: replaces each missing source with the same placeholder URL.

It has no settings and stores no data. Do not activate it on production sites.

## Installation

Install the `wp-placeholder.zip` attached to a [GitHub release](https://github.com/prolific-digital/wp-placeholder/releases) on your local site, then activate it.

## Updates

Updates are served by the Prolific Digital license server. Add the site's license key to `wp-config.php`:

```php
define( 'PROLIFIC_LICENSE_KEY_WP_PLACEHOLDER', 'your-key' );
```

You can also supply the key with the `prolific_license_key` filter, which receives `( $key, 'wp-placeholder' )`.

## Development

The dev site is the DDEV sandbox at `https://wp-sandbox.ddev.site`. Run commands in the container:

```sh
ddev exec -d /var/www/html/wp-content/plugins/wp-placeholder composer install
ddev exec -d /var/www/html/wp-content/plugins/wp-placeholder composer lint    # php -l on every file
ddev exec -d /var/www/html/wp-content/plugins/wp-placeholder composer phpcs   # WordPress-Extra + PHPCompatibilityWP
```

`vendor/` is not committed. A git checkout needs `composer install` before the updater loads. The plugin itself still runs without it.

## Releasing

1. Bump the version in the plugin header, `WP_PLACEHOLDER_VERSION` and `readme.txt` `Stable tag`.
2. Add a `## [x.y.z] - YYYY-MM-DD` section to `CHANGELOG.md` and a `= x.y.z =` entry to `readme.txt`.
3. Merge to `main`, then push a `vx.y.z` tag. The release workflow builds `wp-placeholder.zip` (with `composer install --no-dev`, honoring `.distignore`) and attaches it to a GitHub Release.

CI and release logic live in the shared workflows in [`prolific-digital/.github`](https://github.com/prolific-digital/.github).
