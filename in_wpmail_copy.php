<?php
/**
 * Plugin Name:     Inesta Send Mail Copy
 * Plugin URI:      https://webapplicatielatenmaken.nl
 * Description:     Sends a copy or BCC of every e-mail send via WordPress to an e-mail address.
 * Author:          Inesta
 * Author URI:      https://webapplicatielatenmaken.nl
 * Text Domain:     in_mc
 * Domain Path:     /languages
 * Version:         1.0.3
 *
 * @package         In_wpmail_copy
 */
define( 'IN_MC_DIR', __DIR__ );

require __DIR__ . '/vendor/autoload.php';

load_plugin_textdomain('in_mc', false, basename( dirname( __FILE__ ) ) . '/languages' );

function in_mc_init_admin() {
	if ( is_admin() ) {
		$admin = new \Inesta\MailCopy\Admin\Admin();

		add_action( 'admin_menu', [ $admin, 'register_menu' ] );
	}

}

add_action( 'init', 'in_mc_init_admin' );

add_filter( 'wp_mail', [ '\Inesta\MailCopy\MailHandler', 'update_recipients' ] );


