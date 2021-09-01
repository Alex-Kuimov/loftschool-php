<?php
require_once 'config.php';

try {
	$pdo = new PDO( 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD );

} catch ( PDOException $err ) {
	echo $err->getMessage();
	die;
}
