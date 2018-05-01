<?php

/**
 * Fired during plugin deactivation
 *
 * @link       vitaliipetko.info
 * @since      1.0.0
 *
 * @package    Tickets_pay
 * @subpackage Tickets_pay/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Tickets_pay
 * @subpackage Tickets_pay/includes
 * @author     Vitalii Petko <vitaliypetko@gmail.com>
 */
class Tickets_pay_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		// tickets_pay_delete_table();
	}

}
