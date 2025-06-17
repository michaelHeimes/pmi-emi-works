<?php
/**
 * Filters the next, previous and submit buttons.
 * Replaces the form's <input> buttons with <button> while maintaining attributes from original <input>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
 */
 add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
 add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
 add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
 function input_to_button( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
	$input = $dom->getElementsByTagName( 'input' )->item(0);
	$button_text = $input->getAttribute( 'value' );
 
 
	// Create a new button element
	$new_button = $dom->createElement( 'button' );
	$new_button->setAttribute( 'class', $input->getAttribute( 'class' ) . ' chev-link grid-x align-center' );
 
 
	// Create a span element to wrap the button text
	$span = $dom->createElement( 'span', $button_text );
 
	// Create an SVG element for the chevron icon
	$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="9" viewBox="0 0 12 19.433"><path d="M2.283 0 0 2.283l7.417 7.433L0 17.15l2.283 2.283L12 9.716Z" fill="#fff"/></svg>';
	$svg_element = $dom->createDocumentFragment();
	$svg_element->appendXML( $svg );
 
	// Append the span and SVG to the button
	$new_button->appendChild( $span );
	$new_button->appendChild( $svg_element );
 
	// Copy attributes from input to button
	foreach( $input->attributes as $attribute ) {
		$new_button->setAttribute( $attribute->name, $attribute->value );
	}
 
	// Ensure the class attribute includes the new classes
	$new_button->setAttribute( 'class', $input->getAttribute( 'class' ) . ' button chev-btn grid-x align-middle' );
 
	// Set button type to submit
	$new_button->setAttribute( 'type', 'submit' );
 
	// Replace the input with the new button
	$input->parentNode->replaceChild( $new_button, $input );
 
	return $dom->saveHTML( $new_button );
 }