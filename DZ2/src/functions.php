<?php
function task1( $array, $param ) {
	if ( $param === true ) {
		return implode( ', ', $array );
	}

	foreach ( $array as $str ) {
		echo '<p>' . $str . '</p>';
	}

}

function task2( $operation, ...$numbers ) {
	if ( $operation == '+' ) {

		$result = 0;

		foreach ( $numbers as $number ) {
			$result += $number;
		}

	} elseif ( $operation == '-' ) {

		$result = $numbers[0];

		for ( $i = 1; $i <= sizeof( $numbers ); $i++ ) {
			$result -= $numbers[ $i ];
		}

	} elseif ( $operation == '*' ) {

		$result = 1;

		foreach ( $numbers as $number ) {
			$result *= $number;
		}

	} elseif ( $operation == '/' ) {

		$result = $numbers[0];

		for ( $x = 1; $x <= sizeof( $numbers ); $x++ ) {
			$result /= $numbers[ $x ];
		}
	}

	echo $result;

}

function task3( $num1, $num2 ) {
	if ( is_int( $num1 ) && is_int( $num2 ) ) {
		echo '<table>';

		for ( $y = 1; $y <= $num1; $y++ ) {
			echo '<tr>';

			for ( $x = 1; $x <= $num2; $x++ ) {
				echo '<td>' . $y * $x . '</td>';
			}
		}
	} else {
		echo 'Введите целые числа';
	}
}

function task4() {
	$today     = date( 'd.m.y h:i' );
	$unix_time = date( 'd.m.y  h:i:s', time() );

	echo $today . '</br>';
	echo $unix_time . '</br>';
}

function task5() {
	$string1 = 'Карл у Клары украл Кораллы';
	$result1 = preg_replace( '/К/', '', $string1 );
	echo $result1;

	$string2 = 'Две бутылки лимонада';
	$result2 = str_replace( 'Две', 'Три', $string2 );
	echo $result2;
}

function task6() {
	$fp = fopen( 'test.txt', 'w' );
	fwrite( $fp, 'Hello again!' );
	fclose( $fp );
	readingFile( 'test.txt' );
}

function readingFile( $fileName ) {
	fopen( $fileName, 'r' );
	echo readfile( $fileName ) . '<br>';
}
