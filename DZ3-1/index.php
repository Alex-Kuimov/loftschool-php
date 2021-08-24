<?php
require 'src/functions.php';

//create user lists
$users   = task1();
$file    = 'users.json';
$to_json = json_encode( $users );

//save to file
file_put_contents( $file, $to_json );

//read from file
$content   = file_get_contents( $file );
$from_json = json_decode( $content, true );

//show to screen
echo '<pre>';
print_r( $from_json );
echo '</pre>';

echo '<pre>';
print_r( task2( $users ) );
echo '</pre>';

echo '<pre>';
print_r( task3( $users ) );
echo '</pre>';
