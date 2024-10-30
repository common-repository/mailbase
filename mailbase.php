<?php

/*
Plugin Name: MailBase
Plugin URI: http://www.sitebase.be
Description: Use a custom mail server to send mails in WP. This way you can also send emails when testing on your local server.
Version: 0.9
Author: Sitebase
Author URI: http://www.sitebase.be
*/

// Include library
if(!class_exists('WpFramework_Base_0_6')) include "library/wp-framework/Base.php";
if(!class_exists('WpFramework_Vo_Form')) include_once "library/wp-framework/Vo/Form.php";

class MailBase extends WpFramework_Base_0_6 {
		
		const NAME = 'Mail Base';
		const NAME_SLUG = 'mailbase';
	
		/**
		 * Constructor
		 * 
		 * @return void
		 */
		public function __construct(){

			// Call parent constructor
			parent::__construct();

			// Define form handlers
			$this->load(array('Abstract', 'NotEmpty', 'Integer', 'Email'), 'WpFramework_Validators_');
			$validators['from_email'][] = new WpFramework_Validators_NotEmpty(__('This field is required'));
            $validators['from_email'][] = new WpFramework_Validators_Email(__('Fill in a valid email address'));
			$validators['from_name'][] = new WpFramework_Validators_NotEmpty(__('This field is required'));
			$validators['host'][] = new WpFramework_Validators_NotEmpty(__('This field is required.'));
            $validators['port'][] = new WpFramework_Validators_NotEmpty(__('This field is required.'));
			$validators['port'][] = new WpFramework_Validators_Integer(__('The port number must be numeric.'));
			$this->add_form_handler('save-settings', $validators, array(&$this, 'save_settings'));

            //
            add_action('phpmailer_init', array($this, 'init_mailer'));

		}
		
		/**
		 * Add item to admin menu
		 *
		 * @return void
		 */
		public function action_admin_menu(){
			$plugin_page = $this->add_options_page('Mail Base Options', 'MailBase', self::USER_LEVEL_SUBSCRIBER, self::NAME_SLUG, array(&$this, "admin_page_show"));
		}
		
		/**
		 * Load stylesheet
		 * 
		 * @return void
		 */
		public function action_admin_print_styles() {
			if(isset($_GET['page']) && $_GET['page'] == self::NAME_SLUG) {
				$this->enqueue_style('wpframeworktest-style',  $this->plugin_url . '/assets/css/wpf.css', null, '1.0');
			}
		}
		
		/**
		 * Load javascript
		 * 
		 * @return void
		 */
		public function action_admin_print_scripts() {
			if(isset($_GET['page']) && $_GET['page'] == self::NAME_SLUG) {
				$this->enqueue_script('jquery');
				$this->enqueue_script('wpframeworktest-style',  $this->plugin_url . '/assets/script.js', array("jquery"), '1.0'); 
			}
		}
		
		/**
		 * Load settings page & handle form submit
		 *
		 * @return void
		 */
		public function admin_page_show(){

            // include html helper
            include $this->plugin_path . '/library/HtmlHelper.php';

			// Add selected page
			// @todo In framework
			$data['page'] = isset($_GET['tab']) && in_array($_GET['tab'], array("settings", "help")) ? $_GET['tab'] : "settings";
            
			$data['options'] = $this->get_option( self::NAME_SLUG );

            // Update booleans
            if(count($_POST) > 0) {
                if(!isset($_POST['auth'])) $_POST['auth'] = false;
                if(!isset($_POST['secure'])) { $_POST['secure'] = false; }
            }

			// Validate fields and trigger form handler
			//$data['validation'] = $this->handle_form();
			$data['wpform'] = $this->auto_handle_forms($data['options']);

			// Make sure the data is secure to display
			$clean_data = $this->clean_display_array($data);

			// Load view
			// The tab to show is handled in the index.php view
			$this->load_view($this->plugin_path . "/views/plugin-index.php", $clean_data);
		}
		
		/**
		 * Handle save settings
		 *
		 * @param array $data
		 * @return void
		 */
		public function save_settings(&$form){
			$this->save_option(self::NAME_SLUG, $form->getFields());
		}

        /**
         * Configure mailer
         *
         * @return void
         */
	     public function init_mailer($phpmailer) {
            $options = $this->get_option( self::NAME_SLUG );
            $phpmailer->Mailer = 'smtp';
            $phpmailer->From = $options['from_email'];
            $phpmailer->FromName = $options['from_name'];
            $phpmailer->SMTPSecure = ($options['secure'] == "true") ? 'ssl' : 'none';
            $phpmailer->Host = $options['host'];
            $phpmailer->Port = $options['port'];
            if ($options['auth'] == "true") {
                $phpmailer->SMTPAuth = true;
                $phpmailer->Username = $options['username'];
                $phpmailer->Password = $options['password'];
            }
         }

		/**
		 * Delete option when the plugin is deactivated
		 * Clean up your garbage!
		 * 
		 * @return void
		 */
		public function deactivate() {
			$this->delete_option( self::NAME_SLUG );
		}

}
	
$_GLOBALS['mailbase'] = new MailBase();
    

