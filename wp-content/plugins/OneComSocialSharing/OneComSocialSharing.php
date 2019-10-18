<?php
/*
Plugin Name: One.com Social Sharing Buttons
Description: Adds sharing buttons for the most popular social networks.
Version: 1.0.0
Author: One.com
License: GPL2
Text Domain: OneComSocialSharing
Domain Path: /languages
*/

require( plugin_dir_path( __FILE__ ) . '/settings.php' );

new OneComSocialSharing;

class OneComSocialSharing {
    private $settings;
    private $options;
    private $compiled_buttons;
    private $permalink;
    private $title;

    public function __construct() {
        load_plugin_textdomain( 'OneComSocialSharing', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        $this->settings = new OneComSocialSharingSettings;
        $this->options = $this->settings->get_options();

        add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );

        add_shortcode( $this->settings->shortcode(), array( $this, 'build_buttons' ) );

        if ( $this->options['onpages'] ) add_action( 'the_content', array( $this, 'onpages' ), 1000 );
        if ( $this->options['onposts'] ) add_action( 'the_content', array( $this, 'onposts' ), 1000 );
    }

    public function register_scripts() {
        wp_register_script( 'OneComSocialSharing-socialite', plugins_url( 'socialite.min.js', __FILE__ ), array(), '2.0' );
    }

    public function enqueue_script() {
        wp_enqueue_script( 'OneComSocialSharing-socialite' );
    }

    public function onpages( $thecontent  ) {
        $buttons = ( is_page() ) ? $this->build_buttons() : '';
        return $thecontent . $buttons;
    }

    public function onposts( $thecontent  ) {
        $buttons = ( is_single() ) ? $this->build_buttons() : '';
        return $thecontent . $buttons;
    }

    public function build_buttons() {
        if ($this->compiled_buttons) return $this->compiled_buttons;

        $this->permalink = get_permalink(get_the_ID());
        $this->title = get_the_title();

        $buttons = '';

        $buttons .= $this->button_facebook();
        $buttons .= $this->button_twitter();
        $buttons .= $this->button_googlep();

        if ( $buttons ) $this->enqueue_script();

        $buttons = '<div id="socialite-buttons" style="margin: 1.5em 0;">' . $buttons . '</div>';

        $this->compiled_buttons = $buttons;
        return $buttons;
    }

    public function button_facebook() {
        if ( ! $this->options['button_facebook'] ) return '';

        return '<a class="socialite facebook-like" data-layout="button_count"></a>';
    }

    public function button_twitter() {
        if ( ! $this->options['button_twitter'] ) return '';

        return '<a class="socialite twitter-share"></a>';
    }

    public function button_googlep() {
        if ( ! $this->options['button_googlep'] ) return '';

        return '<a class="socialite googleplus-one"></a>';
    }
}
