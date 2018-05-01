<?php
	
	/**
	 * Create module.
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

	add_action( 'wp_ajax_create_pay', 'create_pay_callback' );
	function create_pay_callback() {
		$data = [];
		$pay = new pay_data();
		$order = tickets_pay_order()[0]['order'] != '' ? tickets_pay_order()[0]['id']++ : '1';

		$name = $_POST['name'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$amount = $_POST['amount'];

		$data['data'] = $pay->get_data($amount,$order);
		$data['signature'] = $pay->get_signature($amount,$order);

		echo json_encode($data);
		tickets_pay_new($name, $order, $email, $tel, $data['data'],$data['signature']);

		// print_r($order);

		wp_die(); 
	}

	define('public_key', 'i76546826611');
	define('private_key', 'Eh93By4SeFyzmW9qZGOQwEdaYabxZEMnuCNI2267');

	class pay_data {
		function get_data($amount,$order){
			$data = array(
				'sandbox' => '1',
				'public_key' => public_key,
				'version' => '3',
				'action' => 'pay',
				'amount' => $amount,
				'currency' => 'UAH',
				'paytypes' => 'card, liqpay, privat24, masterpass, qr',
				'description' => 'Order #'.$order,
				'order_id' => $order
			);

			$data = base64_encode(json_encode($data));

			return $data;
		}

		function get_signature($amount,$order){
			$data = $this->get_data($amount,$order);
			$signature = private_key.$data.private_key;
			$signature = base64_encode(sha1($signature, 1));

			return $signature;
		}
	}

?>