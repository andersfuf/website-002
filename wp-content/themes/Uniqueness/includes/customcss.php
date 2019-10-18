<?php

function _check_font( $font ) {
  if ( substr( $font, 0, 7 ) === 'google-' ) {
    wp_enqueue_style( $font, 'http://fonts.googleapis.com/css?family=' . substr( $font, 7 ) );
    return substr( $font, 7 );
  }
  return $font;
}

if (!function_exists('_custom_css')):
function _custom_css() {

    $fonts = array(
      'logo'       => get_theme_mod( 'typo_logo_font', 'google-Volkhov' ),
      'headline'   => get_theme_mod( 'typo_headline_font', 'google-Volkhov' ),
      'navigation' => get_theme_mod( 'typo_navigation_font', 'Arial, Helvetica, sans-serif' ),
      'body'       => get_theme_mod( 'typo_body_font', 'Arial, Helvetica, sans-serif' ),
    );

    $fonts = array_map( '_check_font', $fonts );

?>

<style>

h1.logo_h a { font-family: <?php echo $fonts['logo']; ?>; }
h1, h2, h3 { font-family: <?php echo $fonts['headline']; ?>; }
.sf-menu > li > a { font-family: <?php echo $fonts['navigation']; ?>; }
h4, h5, h6, #main { font-family: <?php echo $fonts['body']; ?>; }

</style>

<?php
}
endif;