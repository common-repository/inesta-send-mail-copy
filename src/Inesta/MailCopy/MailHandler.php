<?php

namespace Inesta\MailCopy;


class MailHandler {

    public static function update_recipients( $args ) {
        $options = get_option( 'in_mc_option_bcc' );

        if ( empty( $options ) || empty( $options['bcc'] ) ) {
            return $args;
        }

        $email = $options['bcc'];
        $isBcc = ( isset( $options['bcc_use'] ) && $options['bcc_use'] == 1 ) ? true : false;

        // Controleer of 'headers' al een array is, anders maak je er een lege array van.
        if ( !is_array( $args['headers'] ) ) {
            $args['headers'] = [];
        }

        if ( $isBcc ) {
            $args['headers'][] = 'BCC: ' . $email;
        } else {
            // Als het e-mailadres al in de 'to' zit, niet opnieuw toevoegen.
            if ( is_array( $args['to'] ) ) {
                foreach ( $args['to'] as $to ) {
                    if ( self::check_string_contains_email( $to, $email ) ) {
                        return $args;
                    }
                }
            } else {
                if ( self::check_string_contains_email( $args['to'], $email ) ) {
                    return $args;
                }
            }

            wp_mail( $email, $args['subject'], $args['message'], $args['headers'], $args['attachments'] );
        }

        return $args;
    }

	private static function check_string_contains_email( $string, $email ) {
		if ( false !== stripos( $string, $email ) ) {
			return true;
		}

		return false;
	}


}
