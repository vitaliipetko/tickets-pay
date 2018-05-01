<?php

/**
 * Fired during plugin activation
 *
 * @link       vitaliipetko.info
 * @since      1.0.0
 *
 * @package    Tickets_pay
 * @subpackage Tickets_pay/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tickets_pay
 * @subpackage Tickets_pay/includes
 * @author     Vitalii Petko <vitaliypetko@gmail.com>
 */
class Tickets_pay_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		tickets_pay_create_table();
	}

}
