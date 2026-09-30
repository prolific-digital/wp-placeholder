# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.1.0] - 2026-09-29

### Changed
- Adopted the Prolific plugin standard. Updates now come from the Prolific Digital license server (`api.prolificdigital.io`). Set `PROLIFIC_LICENSE_KEY_WP_PLACEHOLDER` in `wp-config.php` (or use the `prolific_license_key` filter) to receive updates.
- Author is Prolific Digital.
- License is GPL-2.0-or-later (the bundled LICENSE file was GPL-3.0 text).
- Requires WordPress 6.5+ and PHP 8.4+.

### Added
- Translation loading from `languages/`, `readme.txt`, coding-standards config and CI/release workflows.

## [1.0.0] - 2022-05-25

### Added
- Initial release: on requests from 127.0.0.1, missing attachment URLs and srcset sources are replaced with picsum.photos placeholders.

[Unreleased]: https://github.com/prolific-digital/wp-placeholder/compare/v1.1.0...HEAD
[1.1.0]: https://github.com/prolific-digital/wp-placeholder/compare/74997ca...v1.1.0
[1.0.0]: https://github.com/prolific-digital/wp-placeholder/commit/74997ca
