=== Custom Sabbath Times ===
Contributors: carlosmontgomery
Tags: sabbath, sunset, widget, countdown, religious, calendar
Requires at least: 5.0
Tested up to: 6.2
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Custom Sabbath Times is a WordPress plugin that displays sunset times for the Sabbath based on the user's location.

== Description ==

The Custom Sabbath Times plugin allows you to display Sabbath sunset times for the current and next week. The plugin fetches sunset times based on the user's location and displays them in a clean and styled widget. It also provides a shortcode for embedding the sunset times on any page or post.

**Features:**
- Displays Sabbath start and end times for the current and next week.
- Fetches sunset times dynamically based on the user's location.
- Provides a customizable widget for sidebars or footers.
- Includes a shortcode `[sabbath_times]` for embedding on pages or posts.

== Installation ==

1. Upload the `sabbath-sunset-times` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to **Appearance > Widgets** and add the "Sabbath Sunset Times" widget to your desired sidebar or footer.
4. Alternatively, use the `[sabbath_times]` shortcode in any page or post to display the Sabbath times.

== Frequently Asked Questions ==

= How does the plugin fetch sunset times? =
The plugin uses the [Sunrise-Sunset API](https://sunrise-sunset.org/api) to fetch sunset times based on the latitude and longitude of the user's location.

= Can I customize the widget title? =
Yes, you can customize the widget title in the WordPress widget settings.

= Can I use the plugin on a page or post? =
Yes, you can use the `[sabbath_times]` shortcode to display the Sabbath times on any page or post.

== Screenshots ==

1. **Shortcode Example**: A screenshot of the Sabbath Sunset Times displayed on a page using the shortcode.
   <img width="1010" height="187" alt="Screenshot 2026-04-25 at 3 58 13 PM" src="https://github.com/user-attachments/assets/865b6a88-b8bb-4d91-bd2b-454f5ab8cf70" />
   <img width="758" height="311" alt="Screenshot 2026-04-25 at 3 57 48 PM" src="https://github.com/user-attachments/assets/c5e5d8d8-ed41-466e-a059-97620aa0c54c" />


== Changelog ==

= 1.0.0 =
* Initial release of the plugin.
* Added widget to display Sabbath sunset times.
* Added shortcode `[sabbath_times]` for embedding on pages or posts.

== License ==

This plugin is licensed under the GPLv2 or later. See the [GPLv2 License](https://www.gnu.org/licenses/gpl-2.0.html) for more details.
