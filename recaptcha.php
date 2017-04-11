<?php
/**
 * Plugin Name:       Uber reCaptcha
 * Description:       Adds Googles' reCaptcha to WordPress forms.
 * Version:           1.1.0
 * Author:            Macho Themes
 * Author URI:        https://www.machothemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       uncr_translate
 * Domain Path:       /languages/
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


// Constants
define( 'UNCR__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'UNCR__PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'UNCR__PLUGIN_VERSION', '1.1.0' );

/**
 * The class responsible for orchestrating the core plugin.
 *
 * Holds the base class for our plugin; CSS / JS
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ncr-base.php';

/**
 * The class responsible for adding the admin notices when the plugin is first activated.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/helpers/class-ncr-admin-notices.php';

/**
 * The class responsible for generating and adding the required API mark-up on the WordPress login form.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ncr-captcha-on-login.php';

/**
 * The class responsible for generating and adding the required API mark-up on the WordPress register form.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ncr-captcha-on-register.php';

/**
 * The class responsible for generating and adding the required API mark-up on the WordPress comment form.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ncr-captcha-on-comment-form.php';

/**
 * The class responsible for generating and adding the required API mark-up on the WordPress lost password form.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/clas-ncr-captcha-recover-password-form.php';


/**
 * The class responsible for generating the mark-up for the fields
 * on the plugin back-end.
 *
 *
 * Current fields supported in this version:
 *
 * 1.   text
 * 2.   checkbox
 * 3.   radio
 * 4.   select
 *
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/helpers/class-ncr-render-engine.php';

/**
 * The class responsible for registering all the actions & generating the plugin admin panel
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/settings.php';


/**
 * The code that runs during plugin activation.
 * This action is documented in base-class.php, static method: uncr_plugin_install
 */
register_activation_hook( __FILE__, array( 'NCR_base_class', 'uncr_plugin_install' ) );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in base-class.php, static method: uncr_plugin_uninstall
 */
register_deactivation_hook( __FILE__, array( 'NCR_base_class', 'uncr_plugin_uninstall' ) );

/**
 * Begins execution of the plugin.
 *
 *
 * @since    1.0.0
 */
function uber_recaptcha_run() {

	new NCR_base_class();
}

uber_recaptcha_run();