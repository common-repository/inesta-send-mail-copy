<?php

namespace Inesta\MailCopy\Admin;


class Admin {

	public function __construct() {
	}

	public function register_menu() {
		$this->main();
		add_options_page( __( 'Mail Copy', 'in_mc' ), __( 'Mail Copy', 'in_mc' ), 'manage_options', 'in_mc', [
				&$this,
				'create_admin_page'
			]
		);
	}

	public function main() {

		register_setting(
			'in_mc_option_group', // Option group
			'in_mc_option_bcc', // Option name
			[ $this, 'sanitize' ] // Sanitize
		);

		register_setting(
			'in_mc_option_group', // Option group
			'in_mc_option_bcc', // Option name
			[ $this, 'sanitize' ] // Sanitize
		);

		add_settings_section(
			'setting_section_id', // ID
			__( 'Mail Copy Settings', 'in_mc' ), // Title
			[ $this, 'print_section_info' ], // Callback
			'in-mc-setting-admin' // Page
		);

		add_settings_field(
			'bcc',
			__( 'Set an e-mail address', 'in_mc' ),
			[ $this, 'bcc_callback' ],
			'in-mc-setting-admin',
			'setting_section_id'
		);

		add_settings_field(
			'bcc_use',
			__( 'Use BCC instead of copy', 'in_mc' ),
			[ $this, 'bcc_use_callback' ],
			'in-mc-setting-admin',
			'setting_section_id'
		);

	}


	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		// Set class property
		$this->options = get_option( 'in_mc_option_bcc' );

		?>
		<div class="wrap">
			<h1><?php _e( 'Inesta Mail Copy', 'in_mc' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields
				settings_fields( 'in_mc_option_group' );
				do_settings_sections( 'in-mc-setting-admin' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 *
	 * @return array $new_input
	 */
	public function sanitize(
		$input
	) {

		$new_input = array();
		if ( isset( $input['bcc'] ) ) {
			$new_input['bcc'] = sanitize_text_field( $input['bcc'] );
		}
		if ( isset( $input['bcc_use'] ) ) {
			$new_input['bcc_use'] = sanitize_text_field( $input['bcc_use'] );
		}

		return $new_input;
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info() {
		_e( 'Enter your settings below:', 'in_cp' );
	}


	/**
	 * Get the settings option array and print one of its values
	 */
	public function bcc_callback() {

		printf(
			'<input type="text" id="bcc" name="in_mc_option_bcc[bcc]" value="%s" />
			<div class="description">%s</div> ',
			isset( $this->options['bcc'] ) ? esc_attr( $this->options['bcc'] ) : '',
			__( 'Set one e-mail address like "demo@example.com" currently multiple e-mail addresses are not supported.', 'in_mc' )
		);


	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function bcc_use_callback() {
		printf(
			'<input type="hidden" id="bcc_use" name="in_mc_option_bcc[bcc_use]" value="0" ' . ( ( isset( $this->options['bcc_use'] ) && $this->options['bcc_use'] == 0 ) ? 'checked' : '' ) . '/>
			<input type="checkbox" id="bcc_use" name="in_mc_option_bcc[bcc_use]" value="1" ' . ( ( isset( $this->options['bcc_use'] ) && $this->options['bcc_use'] == 1 ) ? 'checked' : '' ) . '/>
			<div class="description">%s</div> ',
			__( 'Default behavior is sending a copy of the mail. If this box is checked we will the email above to the BCC instead.</br> The main 
			benefit is that you can see the original form address.', 'in_mc' )
		);


	}
}