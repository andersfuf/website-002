/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	function set_font( font, selector ) {
		if (font.substr(0,7) === "google-") {
			font = font.substr(7);
			$('head').append(
				'<link rel="stylesheet" type="text/css" '
			  + 'href="http://fonts.googleapis.com/css?family='
			  + font
			  + '">');
		}
		console.log( font, selector );
		$( selector ).css({'font-family': font });
	}
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.logo a.logo_link' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.logo_tagline' ).text( to );
		} );
	} );
	wp.customize( 'typo_logo_font', function( value ) {
		value.bind( function( to ) { set_font( to, 'h1.logo_h a' ); } );
	} );
	wp.customize( 'typo_headline_font', function( value ) {
		value.bind( function( to ) { set_font( to, 'h1,h2,h3' ); } );
	} );
	wp.customize( 'typo_navigation_font', function( value ) {
		value.bind( function( to ) { set_font( to, '.sf-menu > li > a' ); } );
	} );
	wp.customize( 'typo_body_font', function( value ) {
		value.bind( function( to ) { set_font( to, 'h4,h5,h6,#main' ); } );
	} );
} )( jQuery );