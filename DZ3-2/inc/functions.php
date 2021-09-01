<?php
require_once 'inc/connection.php';

function createOrder( $args ) {
	global $pdo;

	$query = $pdo->prepare(
		'
		INSERT INTO orders 
		    (`street`, `house`,`building`, `flat`, `floor`, `client_id`)
		VALUES (:street, :house, :building, :flat, :floor, :client_id)'
	);

	$result = $query->execute(
		[
			':street'    => $args['street'],
			':house'     => $args['house'],
			':building'  => $args['building'],
			':flat'      => $args['flat'],
			':floor'     => $args['floor'],
			':client_id' => $args['client_id'],
		]
	);

	$order_id     = $pdo->lastInsertId();
	$orders_count = getOrdersCount( $args['client_id'] );

	return [
		'result' => $result,
		'id'     => $order_id,
		'count'  => $orders_count,
	];
}

function createClient( $email ) {
	global $pdo;
	$query  = $pdo->prepare( 'INSERT INTO clients (`email`) VALUES (:email)' );
	$result = $query->execute( [ ':email' => $email ] );

	if ( $result ) {
		$query = $pdo->prepare( 'SELECT id FROM clients WHERE `email` = :email ' );
		$query->execute( [ ':email' => $email ] );
		return $query->fetch( PDO::FETCH_ASSOC );
	}

	return false;
}

function getClientId( $email ) {
	$client = getClientByEmail( $email );
	return $client ? $client['id'] : createClient( $email );
}

function getClientByEmail( $email ) {
	global $pdo;
	$result = $pdo->prepare( 'SELECT * FROM clients WHERE `email` = :email ' );
	$result->execute( [ ':email' => $email ] );
	return $result->fetch( PDO::FETCH_ASSOC );
}

function getOrdersCount( $client_id ) {
	global $pdo;
	$query = $pdo->prepare( 'SELECT * FROM orders WHERE `client_id` = :clientId ' );
	$query->execute( [ ':clientId' => $client_id ] );
	$orders = $query->fetchAll( PDO::FETCH_ASSOC );
	return count( $orders );
}

