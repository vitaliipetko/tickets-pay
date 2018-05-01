<?php
	
	/**
	 * Data Base module.
	 *
	 * @link       vitaliipetko.info
	 * @since      1.0.1
	 *
	 * @package    tickets_pay
	 * @subpackage tickets_pay/module
	 */

	/**
	 *
	 * @package    tickets_pay
	 * @subpackage tickets_pay/module
	 * @author     Vitalii Petko <vitaliypetko@gmail.com>
	 */

	function tickets_pay_create_table() {

		global $wpdb;
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		$table_name = $wpdb->get_blog_prefix() . 'tickets_pay';
		$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";

		$sql = "CREATE TABLE {$table_name} (
		id  bigint(20) unsigned NOT NULL auto_increment,
		order varchar(255) NOT NULL default '',
		user_name varchar(255) NOT NULL default '',
		email varchar(255) NOT NULL default '',
		phone varchar(255) NOT NULL default '',
		data varchar(255) NOT NULL default '',
		signature varchar(255) NOT NULL default '',
		status varchar(255) NOT NULL default '',
		alert varchar(20) NOT NULL default '',
		PRIMARY KEY  (id),
		KEY alert (alert)
		)
		{$charset_collate};";

		dbDelta($sql);
	}

	function tickets_pay_delete_table() {

		global $wpdb;
		$table_name = $wpdb->get_blog_prefix() . 'tickets_pay';
		$wpdb->query("DROP TABLE $table_name");
	}

	function tickets_pay_order() {

		global $wpdb;
		$table_name = $wpdb->get_blog_prefix() . 'tickets_pay';
		$results = $wpdb->get_results("SELECT order FROM $table_name ORDER BY order DESC LIMIT 1", ARRAY_A);

		return $results;
	}

	function tickets_pay_update($id,$user_name,$imgs,$position,$thumb){

		global $wpdb;
		$table_name = $wpdb->get_blog_prefix() . 'tickets_pay';
		$wpdb->update( $table_name,
			array('user_name' => $user_name, 'imgs' => $imgs, 'position' => $position, 'thumb' => $thumb),
			array('ID' => $id)
		);
	}

	function tickets_pay_new($name,$order,$email,$tel,$data,$signature){

		global $wpdb;
		$table_name = $wpdb->get_blog_prefix() . 'tickets_pay';
		$wpdb->insert( $table_name,
			array('ID' => NULL, 'order' => $order,'user_name' => $name, 'email' => $email, 'phone' => $tel, 'data' => $data, 'signature' => $signature, 'status' => 'false')
		);
		return $wpdb->show_errors;
	}

	function tickets_pay_delete($id){

		global $wpdb;
		$table_name = $wpdb->get_blog_prefix() . 'tickets_pay';
		$wpdb->delete( $table_name, array('ID' => $id));
	}

?>