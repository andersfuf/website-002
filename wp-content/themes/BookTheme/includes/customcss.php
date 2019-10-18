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
    $defaults = _custom_css_defaults();

    $b = array(
        'tint1' => get_theme_mod('brand_tint1', $defaults['tint1']),
        'tint2' => get_theme_mod('brand_tint2', $defaults['tint2']),
        'tint3' => get_theme_mod('brand_tint3', $defaults['tint3']),
        'tint4' => get_theme_mod('brand_tint4', $defaults['tint4'])
    );

    $fonts = array(
      'logo'       => get_theme_mod( 'typo_logo_font', 'google-Cinzel' ),
      'headline'   => get_theme_mod( 'typo_headline_font', 'google-Cinzel' ),
      'navigation' => get_theme_mod( 'typo_navigation_font', 'Arial, Helvetica, sans-serif' ),
      'body'       => get_theme_mod( 'typo_body_font', 'Arial, Helvetica, sans-serif' ),
    );

    $fonts = array_map( '_check_font', $fonts );

?>

<style>

/* Brand color tint 1 */
.header,
.sf-menu ul,
.sf-menu > li > a:hover,
.sf-menu > li.sfHover > a,
.sf-menu > li.current-menu-item > a,
.sf-menu > li.current_page_item > a,
.content-holder { border-color: <?php echo $b['tint1']; ?>; }

.logo_h__txt,
#back-top a:hover span { background-color: <?php echo $b['tint1']; ?>; }

.sf-menu li li a, a { color: <?php echo $b['tint1']; ?>; }

.sf-menu > li > a:hover,
.sf-menu > li.sfHover > a,
.sf-menu > li.current-menu-item > a,
.sf-menu > li.current_page_item > a { border-color: <?php echo $b['tint1']; ?>; }

/* Brand color tint 2 */
.sf-menu li li > a:hover,
.sf-menu li li.sfHover > a,
.sf-menu li li.current-menu-item > a,
.sf-menu li li.current_page_item > a,
.post_meta i,
.error404-holder_num,
.btn-link:hover,
.btn-link:active,
.button,
button,
input[type="submit"],
input[type="reset"],
.button:hover,
button:hover,
input[type="submit"]:hover,
input[type="reset"]:hover { color: <?php echo $b['tint2']; ?>; }

.pagination ul > li > a:hover,
.pagination ul > .active > a,
.pagination ul > .active > span,
body { background-color: <?php echo $b['tint2']; ?>; }

textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {
  border-color: <?php echo $b['tint2']; ?>;
  -webkit-box-shadow: 0 0 3px <?php echo $b['tint2']; ?>;
  -moz-box-shadow: 0 0 3px <?php echo $b['tint2']; ?>;
  box-shadow: 0 0 3px <?php echo $b['tint2']; ?>;
}

/* Brand color tint 3 */
a:hover { color: <?php echo $b['tint3']; ?>; }

/* Brand color tint 4 */
.footer { color: <?php echo $b['tint4']; ?>; }
#back-top span,
.button:active,
button:active,
input[type="submit"]:active,
input[type="reset"]:active { background-color: <?php echo $b['tint4']; ?>; }

/* font */

h1.logo_h a { font-family: <?php echo $fonts['logo']; ?>; }
h1, h2, h3 { font-family: <?php echo $fonts['headline']; ?>; }
.sf-menu > li > a { font-family: <?php echo $fonts['navigation']; ?>; }
h4, h5, h6, #main { font-family: <?php echo $fonts['body']; ?>; }

</style>

<?php
}
endif;