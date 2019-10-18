<?php
/*
Plugin Name: One.com Contact Form
Description: Simple Contact Form Plugin
Version: 1.0.0
Author: One.com
License: GPL2
Text Domain: OneComContactForm
Domain Path: /languages
*/

class OneComContactForm {
	public function __construct() {
    load_plugin_textdomain( 'OneComContactForm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		if ( $this->issetEmail() ) {
			add_shortcode( $this->contact_form_shortcode() , array( $this, 'shortcode' ) );
			add_filter( 'the_posts', array( $this, 'showConfirm' ) );
		}
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( "plugin_action_links_OneComContactForm/OneComContactForm.php" , array( $this, 'settings_link' ) );
	}

	public function admin_menu() {
		add_options_page( __('Contact Form', 'OneComContactForm'), __('Contact Form', 'OneComContactForm'), 'manage_options', 'OneComContactForm', array( $this, 'options_page' ) );
	}

	public function admin_init() {
		register_setting( 'occf_options', 'occf_options', array( $this, 'options_validate' ) );
		add_settings_section( 'occf_options_id', '', '', 'occf_options_page' );

		add_settings_field( 'occf_options_to', __('Send mails to', 'OneComContactForm'), array( $this, 'option_to' ), 'occf_options_page', 'occf_options_id' );
		add_settings_field( 'occf_options_subject', __('Subject', 'OneComContactForm'), array( $this, 'option_subject' ), 'occf_options_page', 'occf_options_id' );
		add_settings_field( 'occf_options_text', __('Confirmation Text', 'OneComContactForm'), array( $this, 'option_text' ), 'occf_options_page', 'occf_options_id' );
	}


	public function issetEmail() {
		$options = get_option( 'occf_options' );
		return ( ( isset( $options['to'] ) ) && ( '' !== $options['to'] ) );
	}

	public function domain() {
		preg_match('/([a-zA-Z0-9-]+\.(([a-z]{2,4})|co\.uk|me\.uk|org\.uk|priv\.no))$/', $_SERVER['SERVER_NAME'], $matches);
		return $matches[0];
	}

	public function contact_form_shortcode() {
		return 'onecomcontactform';
	}

	public function defaultConfirm() {
		return '<p>' . __('We will get back to you as soon as possible!', 'OneComContactForm') . '</p>';
	}

	public function defaultSubject() {
		return __('Message from', 'OneComContactForm') . ' ' . $_SERVER['HTTP_HOST'];
	}

	public function showConfirm ( $posts, $s = '' ) {

		if ((isset($_POST['occf_action'])) && ($_POST['occf_action'] === 'OneComContactForm')) {

			if ((1 === count($posts)) && (false !== strpos($posts[0]->post_content, $this->contact_form_shortcode()))) {
				$this->send($_POST['occf_message'], $_POST['occf_from'], $_POST['occf_name']);

				$options = get_option( 'occf_options' );

				$text = ( ( isset( $options['text'] ) ) && ( '' !== $options['text'] ) ) ? $options['text'] : $this->defaultConfirm();

				$page = new stdClass; // thar be dragons
				$page->post_title = $posts[0]->post_title;
				$page->post_content = $text;

				return array($page);
			}

		}

		return $posts;
	}

	public function settings_link( $links ) {
		$links[] = '<a href="options-general.php?page=OneComContactForm">' . __('Settings', 'OneComContactForm') . '</a>';
        return $links;
	}

	public function shortcode( $atts ) {
			$atts = extract( shortcode_atts( array( 'default'=>'values' ),$atts ) );

			wp_enqueue_script( 'occf-validation', plugins_url( 'occf.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );

			$result  = '<form id="occf" action="'.$_SERVER['REQUEST_URI'].'" method="post">';
			$result .= '<input type="hidden" name="occf_action" value="OneComContactForm">';
			$result .= apply_filters( 'occf_mail_form', '' );
			$result .= '<p><input type="text" name="occf_name" id="occf_name" value="" placeholder="' . __('Your Name', 'OneComContactForm') . '"></p>';
			$result .= '<p><input type="text" name="occf_from" id="occf_from" value="" placeholder="' . __('Your Email', 'OneComContactForm') . '"></p>';
			$result .= '<p><textarea name="occf_message" id="occf_message" style="width: 95%" rows="10" placeholder="' . __('Your Message', 'OneComContactForm') . '"></textarea></p>';
			$result .= '<p><input type="submit" name="occf_submit" value="' . __('Send', 'OneComContactForm') . '"></p>';
			$result .= '</form>';

			return ( is_page() ) ? $result : '';
	}

	public function send($message, $from, $from_name) {
		$options = get_option( 'occf_options' );

		apply_filters( 'occf_preprocess_mail', array('comment_content' => $message) );

		$headers = 'Reply-To: ' . $from_name . ' <'.$from.'>';

		$message = __('Sent by', 'OneComContactForm') . ': ' . $from_name . " <". $from .">\r\n"
		         . '--------------------------------------' . "\r\n"
		         . $message;

		$subject = ( isset( $options['subject'] ) && ( '' != $options['subject'] ) ) ? $options['subject'] : $this->defaultSubject();

		$to = $options['to'] . '@' . $this->domain();

		wp_mail( $to, $subject, $message, $headers );
	}

	public function options_page() {
		echo '<div class="wrap">';

		screen_icon();

		echo '<h2>' . __('Contact Form', 'OneComContactForm') . '</h2>';

		echo '<p>'
		   . str_replace("\n\n",
		   				 '</p><p>',
						 sprintf(__("Inserts a contact formular into any page on your Wordpress site. \n\nPlace this shortcode, where you want the contact formular: %s", 'OneComContactForm'),
								 '<code>[' . $this->contact_form_shortcode() . ']</code>'))
		   .'</p>';

		echo '<form action="options.php" method="post">';

		settings_fields( 'occf_options' );
		do_settings_sections( 'occf_options_page' );

		submit_button();

		echo '</form>'
		   . '</div>';
	}

	public function options_validate( $newoptions ) {
		/* TODO Validate and escape */
		$options = get_option( 'occf_options' );
		// validate local part of the email...
		if ( ! preg_match( '/^[A-Za-z0-9-._]{2,64}$/i', $newoptions['to'] ) ) {
			if ( '' !== $newoptions['to'] ) {
				$newoptions['to'] = $options['to']; // if not passing, set to old value, if not empty
			}
		}
		$options['to'] = $newoptions['to'];

		// Validate the subject
		$options['subject'] = $newoptions['subject'];

		// Validate the text
		$options['text'] = $newoptions['text'];


		return $options;
	}

	public function option_to() {
		$domain = $this->domain();
		$options = get_option( 'occf_options' );
		$to = ( isset( $options['to'] ) ) ? $options['to'] : '';
		echo '<div><input id="occf_options_to" name="occf_options[to]" size="20" type="text" value="' . $to . '">';
		echo '@' . $domain . '</div>';
		echo '<p class="description">'
		   . __( 'The address that will receive the emails sent from the contact formular.' , 'OneComContactForm')
		   . '</p>';
	}

	public function option_subject() {
		$options = get_option( 'occf_options' );
		$subject = ( isset( $options['subject'] ) && ( '' != $options['subject'] ) ) ? $options['subject'] : $this->defaultSubject();
		echo '<input id="occf_options_subject" name="occf_options[subject]" size="40" type="text" value="' . $subject . '">';
		echo '<p class="description">'
		   . __( 'This will be the subject of out going messages.' , 'OneComContactForm')
		   . '</p>';
	}

	public function option_text() {
		$options = get_option( 'occf_options' );
		$text = ( ( isset( $options['text'] ) ) && ( '' !== $options['text'] ) ) ? $options['text'] : $this->defaultConfirm();
		echo '<p class="description">'
		   . __( 'The following content will be displayed when a visitor has sent you a message.' , 'OneComContactForm')
		   . '</p>';
		wp_editor( $text, 'occf_options_text', array( 'textarea_name' => 'occf_options[text]' ) );
	}
}

new OneComContactForm;
