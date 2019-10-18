<?php
/*
Plugin Name: One.com Google Analytics
Description: Simple Google Analytics plugin
Version: 1.0.0
Author: One.com
com: GPL2
Text Domain: OneComGoogleAnalytics
Domain Path: /languages
*/

class OneComGoogleAnalytics {
    public function __construct() {
        add_action( 'wp_footer', array( $this, 'tracking_code' ) );
        add_action( 'admin_init', array( $this, 'admin_init') );
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        add_action( "plugin_action_links_OneComGoogleAnalytics/OneComGoogleAnalytics.php" , array( $this, 'settings_link' ) );
        load_plugin_textdomain( 'OneComGoogleAnalytics', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    public function admin_menu() {
        $page_title = 'Google Analytics';
        $menu_title = 'Google Analytics';
        $capability = 'manage_options';
        $menu_slug = 'OneComGoogleAnalytics';
        $function = array( $this, 'options_page' );
        add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
    }

    public function admin_init() {
        register_setting( 'OneComGoogleAnalytics', 'OneComGoogleAnalytics', array( $this, 'check_tracking_id' ) );
        add_settings_section( 'OneComGoogleAnalytics', '', '', 'OneComGoogleAnalytics' );

        add_settings_field(
            'ga_tracking_id',
            __('Tracking ID', 'OneComGoogleAnalytics'),
            array( $this, 'tracking_id_field' ),
            'OneComGoogleAnalytics',
            'OneComGoogleAnalytics'
        );
    }

    function settings_link($links) {
        $links[] = '<a href="options-general.php?page=OneComGoogleAnalytics">' . __('Settings') . '</a>';
        return $links;
    }

    public function check_tracking_id($input){
        $tid = (isset($input['tracking_id'])) ? $input['tracking_id'] : '';
        if( ($tid === '') || ($this->isValidTrackingID( $tid )) ) {
            if( get_option('OneComGoogleAnalytics_tid') === FALSE ) {
                add_option('OneComGoogleAnalytics_tid', $tid);
            } else {
                update_option('OneComGoogleAnalytics_tid', $tid);
            }
            if ($tid === '') {
                add_settings_error(
                    'ga_tracking_id',
                    'settings_deleted',
                    __('The tracking ID is removed, and it is no longer in use on your page.', 'OneComGoogleAnalytics'),
                    'updated'
                );
            } else {
                add_settings_error(
                    'ga_tracking_id',
                    'settings_saved',
                    __('The tracking ID is saved, and it is already in use on your page.', 'OneComGoogleAnalytics'),
                    'updated'
                );
            }
        } else {
            $tid = '';
            add_settings_error(
                'ga_tracking_id',
                'settings_error',
                __('Invalid tracking ID.', 'OneComGoogleAnalytics'),
                'error'
            );
        }
        return ($tid);
    }

    public function tracking_id_field(){
        $value = get_option('OneComGoogleAnalytics_tid');
        echo '<input type="text" id="ga_tracking_id" name="OneComGoogleAnalytics[tracking_id]" value="'.$value.'" />';
    }

    public function options_page() {
        echo '<div class="wrap">' . PHP_EOL;

        screen_icon();

        echo '<h2>Google Analytics</h2>' . PHP_EOL;

        echo '<p>'
           . str_replace("\n\n",
                         '</p><p>',
                         sprintf(__("Google Analytics is a powerful tool for getting insight of how visitors use your website. To use Google Analytics, you need to sign up for an account at their website. It is free, and can be done by following the link below: \n\n%s\n\nOnce you have your Tracking ID, all your need to do, to start using Google Analytics, is to place your Tracking ID below.", 'OneComGoogleAnalytics'),
                                 '<a href="http://www.google.com/analytics/">Google Analytics</a>'))
           . '</p>';

        echo '<form method="post" action="options.php">' . PHP_EOL;

        settings_fields('OneComGoogleAnalytics');

        do_settings_sections('OneComGoogleAnalytics');

        submit_button();

        echo '</form>' . PHP_EOL;

        echo '</div>' . PHP_EOL;
    }

    public function tracking_code() {
        if ( $tracking_code = get_option('OneComGoogleAnalytics_tid') ) :
            echo <<<GATRACKING
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '$tracking_code']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
GATRACKING;
        endif;
    }

    /**
     * Regular Expression snippet to validate Google Analytics tracking code
     * see http://code.google.com/apis/analytics/docs/concepts/gaConceptsAccounts.html#webProperty
     *
     * @author  Faisalman <movedpixel@gmail.com>
     * @license http://www.opensource.org/licenses/mit-license.php
     * @link    http://gist.github.com/faisalman
     * @param   $str     string to be validated
     * @return  Boolean
     */
    private function isValidTrackingID( $str ) {
        return preg_match('/^ua-\d{4,9}-\d{1,4}$/i', strval($str)) ? true : false;
    }
}

new OneComGoogleAnalytics;