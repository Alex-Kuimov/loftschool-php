<?php
header("Content-Type: text/plain; charset=utf-8");

if ( empty( $_POST ) ) {
	header( 'HTTP/1.0 404 Not Found' );
	exit;
}

require 'inc/functions.php';

$email    = htmlspecialchars( $_POST['email'] );
$street   = htmlspecialchars( $_POST['street'] );
$house    = htmlspecialchars( $_POST['home'] );
$building = htmlspecialchars( $_POST['part'] );
$flat     = htmlspecialchars( $_POST['appt'] );
$floor    = htmlspecialchars( $_POST['floor'] );

$client_id = get_client_id( $email );

$args = [
	'client_id' => $client_id,
	'street'    => $street,
	'house'     => $house,
	'building'  => $building,
	'flat'      => $flat,
	'floor'     => $floor,
];

$order = create_order( $args );

if ( $order['result'] ) {
	$order_id    = $order['id'];
	$order_count = $order['count'];

	echo "Спасибо, ваш заказ будет доставлен по адресу: ул. $street, д. $house, кор. $building, кв. $flat, э. $floor \r\n";
	echo "Номер вашего заказа: $order_id \r\n";
	echo "Это ваш $order_count - й заказ! \r\n";
}