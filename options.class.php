<?php

/**
 * ACF Options class
 *
 * usage: Options::get('name_of_option');
 *
 * @version 1.0.0
 * @link https://www.advancedcustomfields.com/resources/options-page/
 * @author Jan Horecny <horecny@zonemedia.sk>
 */
Class Options {

	/**
	 * Returns Option value from given language
	 *
	 * @param bool|string $name option key name
	 * @param bool|string $language language, default is current WPML language
	 *
	 * @return mixed
	 */
	public static function get( $name = false, $language = false ) {
		if ( defined( 'ICL_LANGUAGE_CODE' ) && $language && $language !== ICL_LANGUAGE_CODE ) {
			return get_field( $name, 'options_' . $language );
		} else {
			return get_field( $name, 'option' );
		}
	}

	/**
	 * Returns Option value from default WPML language
	 *
	 * @param $name option key name
	 *
	 * @return mixed
	 */
	public static function get_default( $name ) {
		add_filter( 'acf/settings/current_language', 'options_acf_set_language', 100 );
		$option = get_field( $name, 'option' );
		remove_filter( 'acf/settings/current_language', 'options_acf_set_language', 100 );

		return $option;
	}

}

function options_acf_set_language() {
	return acf_get_setting( 'default_language' );
}
