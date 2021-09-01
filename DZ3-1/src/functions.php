<?php

//create user lists
function task1() {
	$users = [];
	$names = [ 'Вася', 'Петя', 'Саша', 'Рома', 'Юра' ];

	for ( $i = 0; $i < 50; $i++ ) {
		$user_id   = $i;
		$user_name = $names[ rand( 0, 4 ) ];
		$user_age  = rand( 18, 45 );

		$user = [
			'id'   => $user_id,
			'name' => $user_name,
			'age'  => $user_age,
		];

		array_push( $users, $user );
	}

	return $users;
}

//count names
function task2( $users ) {
	if ( ! is_array( $users ) && empty( $users ) ) {
		return false;
	}

	$names = [];

	foreach ( $users as $user ) {
		array_push( $names, $user['name'] );
	}

	return array_count_values( $names );
}

//middle age
function task3( $users ) {
	if ( ! is_array( $users ) && empty( $users ) ) {
		return false;
	}

	$cnt = count( $users );
	$sum = 0;

	foreach ( $users as $value ) {
		$age = (int) $value['age'];
		$sum = $sum + $age;
	}

	return round( $sum / $cnt );

}
