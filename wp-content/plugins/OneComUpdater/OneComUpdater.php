<?php 
/*
Plugin Name: One.com Updater
Description: This plugin will make sure that your One.com plugins and themes are up to date. 
Version: 1.0.0
Author: One.com
License: GPL2
Text Domain: OneComUpdater
Domain Path: /languages
*/

class OneComUpdater{

	public function __construct() {

		add_action('wp_login', array( $this, 'getThemes')); // Check for updated on login
		add_action('wp_login', array( $this, 'getPlugins')); // Check for updates on login
		add_action('load-update-core.php', array( $this, 'getThemes')); // Check for updates clicking on update
		add_action('load-update-core.php', array( $this, 'getPlugins')); // Check for updates clicking on update
		add_action('load-plugins.php', array( $this, 'checktransient')); // Check for updates clicking on update
		add_filter('plugins_api', array( $this, 'getRemotePluginDetails'));

	}

	/**
     * Check the update-plugins transient and fetch the plugins again if transient don't exist.
     *
     * @param string $needle
     * @param array $haystack
     * @return true or false
     */

	function checktransient(){

		$transient = get_site_transient('update_plugins');

		if($transient->response == array()){
			$this->getPlugins();
		}

	}

  	/**
     * Search recursively in multidimensional array
     *
     * @param string $needle
     * @param array $haystack
     * @return true or false
     */
	function search_array($needle, $haystack) {
		if(in_array($needle, $haystack)){
			return true;
		}
		foreach($haystack as $element) {
			if(is_array($element) && $this->search_array($needle, $element))
				return true;
		}
		return false;
	}

	/**
     * Get wp themes and check which One.com themes that are currently installed.
     *
     * @return Nothing.. Execute the function 'checkForThemeUpdates' whenever it 
     * finds a One.com installed One.com theme. 
     */
	function getThemes(){

		if(!current_user_can('install_themes'))
			return false;

		$themes = wp_get_themes();

		$oneComThemes = array(

			array("Name"=>"BookTheme Blue", "dir"=>"BookTheme"),
			array("Name"=>"BookTheme Green", "dir"=>"BookThemeGreen"),
			array("Name"=>"BookTheme Sand", "dir"=>"BookThemeSand"),
			array("Name"=>"HorseClub Green", "dir"=>"HorseClub"),
			array("Name"=>"HorseClub Blue", "dir"=>"HorseClubBlue"),
			array("Name"=>"HorseClub White", "dir"=>"HorseClubWhite"),
			array("Name"=>"MoonCat", "dir"=>"MoonCat"),
			array("Name"=>"MoonCat Bright", "dir"=>"MoonCatBright"),
			array("Name"=>"MoonCat Urban", "dir"=>"MoonCatUrban"),
			array("Name"=>"Uniqueness Red", "dir"=>"Uniqueness"),
			array("Name"=>"Uniqueness Blue", "dir"=>"UniquenessBlue"),
			array("Name"=>"Uniqueness Green", "dir"=>"UniquenessGreen")

		);

		$i = 0;

		foreach ($themes as $theme => $value) {

			if($this->search_array($value['Name'], $oneComThemes)) {
				// We have a One.com theme. 
				$this->checkForThemeUpdates($value['Name'], $value['Version'], $oneComThemes[$i]['dir']);
			} else {
				// Do nothing here..
			}
			$i++;
		}
	}

	/**
     * Checks current installed version agains the repository and add
     * a note to the transient 'update_themes' which will notify
     * the logged in user there is an update. 
     *
     * @return true on success and false if remote info could not be loaded.
     */
	function checkForThemeUpdates($theme_name, $theme_version, $theme_dir){

		global $wp_version;
		$update_check = "https://one-wp.com/themes/".$theme_dir."/version.txt";

		if ( defined( 'WP_INSTALLING' ) ) return false;
		$response = wp_remote_get($update_check); // File to check for updates
		// If wp_remote_get returns code 200 then proceed.. 
		if($response['response']['code'] == '200'){

			list($new_version, $url) = explode('|', $response['body']);
		

			if(!version_compare($theme_version, $new_version)){
				return false;
			}
			 // Check if there is a new version.
			$theme_transient = get_site_transient('update_themes');

			$a = array(
				'new_version' => $new_version,
				'package' => $url,
				'url' => 'https://one-wp.com/themes/'.$theme_name.'/info.php'
				// TODO : Add info.php to all theme repos. 
			);

			$theme_transient->response[$theme_dir] = $a;
			set_site_transient('update_themes', $theme_transient, 0);

			return true;

		} else {

			return false;

		}
	}

	/**
     * Get wp plugins and check which One.com plugins that are currently installed.
     *
     * @return Nothing.. Run the function 'checkForPluginUpdates' whenever it 
     * finds a One.com installed plugin. 
     */
	function getPlugins(){

		if(!current_user_can('install_plugins'))
			return false;

		if (!function_exists('get_plugins'))
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		$plugins = get_plugins();

		foreach ($plugins as $plugin => $value) {

			if($value['Author'] == 'One.com' or substr($value['TextDomain'], 0, 6)){
				$this->checkForPluginUpdates($value['TextDomain'], $value['Version']);
			} else {
				// Not a One.com plugin.. Do nothing! 
			}

		}
	}

	/**
     * Checks remote for info about the plugins
     *
     * @return the plugin info (Changelog etc) or false
     */
	function getRemotePluginDetails(){
		
		$update_check = "https://one-wp.com/dev/plugininfo.php";

		$cachefile = plugin_dir_path( __FILE__ ).'cache.txt';

		if(filemtime($cachefile)+900 < time()){

			$response = wp_remote_get($update_check);

			if($response['response']['code'] == '200'){

				$information = $response['body'];

				file_put_contents($cachefile, $information);

				return unserialize(file_get_contents($cachefile));

			} else {
				// Do nothing.
			}

		} else {
			// Do nothing..
		}

		return unserialize(file_get_contents($cachefile));
	}

	
	/**
     * Checks current installed version agains the repository and add
     * a note to the transient 'update_plugins' which will notify
     * the logged in user there is an update. 
     *
     * @return true on success and false if remote info could not be loaded.
     */
	function checkForPluginUpdates($plugin_name, $plugin_version){

		global $wp_version;

		if (defined('WP_INSTALLING')) return false;

		$update_check = "https://one-wp.com/plugins/".$plugin_name."/version.txt";
		$response = wp_remote_get($update_check);

		if($response['response']['code'] == '200'){
			
			list($new_version, $url) = explode('|', $response['body']);
		

			if(!version_compare($plugin_version, $new_version)){
				return false;
			}

			$plugin_transient = get_site_transient('update_plugins');

			$a = array(
				'slug' => $plugin_name,
				'new_version' => $new_version,
				'package' => $url
			);

			$o = (object) $a;
			$plugin_folder = $plugin_name;
			$plugin_file = $plugin_name.".php";
			$plugin_transient->response[$plugin_folder.'/'.$plugin_file] = $o;

			set_site_transient('update_plugins', $plugin_transient, 0);

			return true;

		} else {

			return false;
		
		}
	}

}
new OneComUpdater();
?>