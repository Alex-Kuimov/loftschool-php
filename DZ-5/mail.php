<?php
require_once 'init.php';


$transport = ( new Swift_SmtpTransport( 'smtp.timeweb.ru', 465, 'ssl' ) )
	->setUsername( 'test@cms3.ru' )
	->setPassword( '' );

$mailer = new Swift_Mailer( $transport );

$message = ( new Swift_Message( 'home work 5.1' ) )
	->setFrom( [ 'test@cms3.ru' => 'test@cms3.ru' ] )
	->setTo( [ 'spoot@bk.ru' ] )
	->setBody( 'Testing' );

$result = $mailer->send( $message );
if ( $result ) {
	echo 'Письмо успешно отправлено!';
}
