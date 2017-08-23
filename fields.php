<?php
/**
 * Return values as key => value paired array based on specific field names
 *
 * Example: $fields = get_custom_fields(['field1', 'field2']);
 *
 * @version 1.0.0
 * @link https://www.advancedcustomfields.com/resources/get_field/
 * @author Jan Horecny <horecny@zonemedia.sk>
 * @todo add support for post IDs
 *
 * @param bool|array $fields
 * @param bool $includeBlank
 *
 * @return bool|array
 */
function get_custom_fields( $fields = false, $includeBlank = true ) {
	if ( ! is_array( $fields ) ) {
		return false;
	}

	$values = false;

	foreach ( $fields as $field ) {
		if ( get_field( $field ) ) {
			$values[ $field ] = get_field( $field );
		} elseif ( $includeBlank ) {
			$values[ $field ] = '';
		}
	}

	return $values;
}