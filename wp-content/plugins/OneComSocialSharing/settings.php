<?php

class OneComSocialSharingSettings {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( "plugin_action_links_OneComSocialSharing/OneComSocialSharing.php" , array( $this, 'settings_link' ) );
	}

	public function get_options() {
		return get_option( 'ocss_options', $this->defaultValues() );
	}

	public function shortcode() {
		return 'onecomsocialsharing';
	}

	public function defaultValues() {
		return array(
			'onposts' => 1,
			'onpages' => 0,

			'button_facebook' => 1,
			'button_twitter' => 1,
			'button_googlep' => 0,
		);
	}

	public function settings_link( $links ) {
		$links[] = '<a href="options-general.php?page=OneComSocialSharing">' . __('Settings', 'OneComSocialSharing') . '</a>';
		return $links;
	}

	public function admin_menu() {
		add_options_page( 'Social Sharing Buttons', 'Social Sharing', 'manage_options', 'OneComSocialSharing', array( $this, 'options_page' ) );
	}

	public function admin_init() {
		register_setting( 'ocss_options', 'ocss_options', array( $this, 'options_validate' ) );

		add_settings_section( 'ocss_options', '', '', 'ocss_options_page' );

		add_settings_field( 'ocss_options_buttons', __( 'Active buttons' , 'OneComSocialSharing'), array( $this, 'options_buttons' ), 'ocss_options_page', 'ocss_options' );
		add_settings_field( 'ocss_options_onposts', __( 'Placement' , 'OneComSocialSharing'),      array( $this, 'options_onposts' ), 'ocss_options_page', 'ocss_options' );
	}

	public function options_page() {
		/* LOCALIZE */
		echo '<div class="wrap">';

		screen_icon();

		echo '<h2>Social Sharing Buttons</h2>';

		echo '<p>'
		   . str_replace("\n\n",
		   				 '</p><p>',
						 sprintf(__("With this plugin you will be able to insert share buttons for various social networks. This will let your visitors quickly share your content with their friends. \n\nYou can insert the buttons automatically, or do it manually with the following shortcode: %s\n\nOnly the buttons that you select will be shown on your page.", 'OneComSocialSharing'),
								 '<code>[' . $this->shortcode() .  ']</code>'))
		   .'</p>';

		echo '<form action="options.php" method="post">';

		settings_fields( 'ocss_options' );

		do_settings_sections( 'ocss_options_page' );

		submit_button();

		echo '</form>'
		   . '</div>';
	}

	public function options_buttons() {
		$options = $this->get_options();

		$buttons = array(
			array( 'id' => 'ocss_buttons_facebook', 'name' => 'button_facebook', 'description' => 'Facebook' ),
			array( 'id' => 'ocss_buttons_twitter',  'name' => 'button_twitter',  'description' => 'Twitter' ),
			array( 'id' => 'ocss_buttons_googlep',  'name' => 'button_googlep',  'description' => 'Google Plus' ),
		);

		$i = 0;

		foreach ( $buttons as $args ) {
			$i++;
			echo '<label for="' . $args['id'] . '">'
			   . '<input id="' . $args['id'] . '" name="ocss_options[' . $args['name'] . ']" type="checkbox" value="1" '
			   . checked( 1, $options[$args['name']], false ) . '>'
			   . ' ' . $args['description'] . '</label><br>';
		}
	}

	public function options_onposts() {
		$options = $this->get_options();

		echo '<label for="ocss_options_onposts">'
		   . '<input id="ocss_options_onposts" name="ocss_options[onposts]" type="checkbox" value="1" '
		   . checked( 1, $options['onposts'], false ) . '> '
		   . __( 'Insert at the end of all single posts.' , 'OneComSocialSharing') . '</label><br>';

		echo '<label for="ocss_options_onpages">'
		   . '<input id="ocss_options_onpages" name="ocss_options[onpages]" type="checkbox" value="1" '
		   . checked( 1, $options['onpages'], false ) . '> '
		   . __( 'Insert at the end of all pages.' , 'OneComSocialSharing') . '</label><br>';

		echo '<p class="description">'
		   . __( 'Manual placement using the shortcode will work even if both of these options are disabled.' , 'OneComSocialSharing')
		   . '</p>';
	}

	public function options_validate( $newoptions ) {
		$options = $this->get_options();

		$options['onposts'] = ( ( isset( $newoptions['onposts'] ) ) && ( $newoptions['onposts'] === '1' ) ) ? 1 : 0;
		$options['onpages'] = ( ( isset( $newoptions['onpages'] ) ) && ( $newoptions['onpages'] === '1' ) ) ? 1 : 0;
		$options['button_facebook'] = ( ( isset( $newoptions['button_facebook'] ) ) && ( $newoptions['button_facebook'] === '1' ) ) ? 1 : 0;
		$options['button_twitter'] = ( ( isset( $newoptions['button_twitter'] ) ) && ( $newoptions['button_twitter'] === '1' ) ) ? 1 : 0;
		$options['button_googlep'] = ( ( isset( $newoptions['button_googlep'] ) ) && ( $newoptions['button_googlep'] === '1' ) ) ? 1 : 0;

		return $options;
	}
}
