=== Inesta Send Mail Copy ===
Contributors: roelv
Tags: email, mail, bcc, email copy, wp_mail
Short description: Automatically send a copy or BCC of all outgoing emails to a designated email address.
Requires at least: 5.0
Tested up to: 6.6.2
Stable tag: 1.0.3
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
**Inesta Send Mail Copy** is a lightweight plugin designed to help you keep track of outgoing WordPress emails by automatically sending a copy (or a BCC) to a designated email address. Whether you're running a large-scale site and want to monitor outgoing notifications, or simply need a way to archive specific emails, this plugin provides a simple solution.

### Key Features
* Sends a copy or BCC of all outgoing emails to a specified email address.
* Optionally choose between sending a direct copy or BCC for privacy.
* Easy-to-use settings page for configuration.
* Works seamlessly with the native `wp_mail` function.
* Lightweight, ensuring no performance impact.

### Use Cases
1. **Email Archiving**: Keep a record of every email sent from your WordPress site.
2. **Monitoring Email Deliverability**: Verify that emails sent to users are being properly formatted and delivered.
3. **Quality Assurance**: Check content and formatting of outgoing emails.

### How It Works
Once activated, you can navigate to the plugin settings page to configure your email address and choose whether to send a direct copy or use BCC. The plugin then hooks into the `wp_mail` function and automatically updates the recipients according to your settings.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/inesta-send-mail-copy` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Navigate to **Settings > Mail Copy** to configure your email address.
4. Choose whether to send a direct copy or use BCC.

== Frequently Asked Questions ==

= What happens if I don't configure the email address? =
If no email address is specified, the plugin will not send any copies or BCCs. It only activates once you enter a valid address.

= Can I send copies to multiple email addresses? =
Currently, only one email address is supported for sending copies or BCC. We recommend using an email forwarder if you need to distribute copies to multiple addresses.

= Does this work with WooCommerce or other email plugins? =
Yes, as long as the plugin uses the native `wp_mail` function, Inesta Send Mail Copy will work seamlessly.

== Screenshots ==
1. **Settings Page**: Configure your BCC email address and copy options.
2. **Email Example**: A typical email with the BCC applied.
3. **Settings Overview**: A simple and intuitive interface.

== Changelog ==
= 1.0.3 =
* Improved compatibility with WordPress 6.3.
* Fixed issue with BCC field.

= 1.0.2 =
* Improved compatibility with WordPress 6.3.
* Added support for PHP 8.0.
* Minor UI enhancements.

= 1.0.1 =
* Bug fix for missing BCC field validation.
* Added more FAQs to the documentation.

= 1.0.0 =
* Initial release.

== Upgrade Notice ==
= 1.0.2 =
Ensure you have updated your PHP version to at least 7.2 to take advantage of the latest features.
