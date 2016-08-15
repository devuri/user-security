=== User Security ===
Contributors: jamesmorrison
Tags: user, security, login
Requires at least: 4.5
Tested up to: 4.5.3
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hides login errors, disables author archives (to hide usernames), changes author links to title => sitename / URL => homepage

== Description ==

Hides login errors, disables author archives (to hide usernames), changes author links to title => sitename / URL => homepage

Out the box, WordPress gives away the usernames with WP Admin access to the site; a brute force attack on the login page reveals whether a username was correct / incorrect.

Additionally, the author links also give away valid usernames.

This plugin stops that; login errors are not a generic message, the author archives are disabled, requests to `/?author={ID}` return a 404 (page not found) header and template.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Done

== Frequently Asked Questions ==

= Why would I use this? =

To help stop brute force attacks by hiding information that would be useful to a potential hacker.


== Changelog ==

= 1.0.0 =
* Initial release
