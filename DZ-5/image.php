<?php

require_once 'init.php';

use Intervention\Image\ImageManagerStatic as Image;

$original  = 'image.jpg';
$output    = 'image_new.jpg';
$watermark = 'watermark.png';

$image = Image::make( $original )->resize(
	200,
	null,
	function ( $constraint ) {
		$constraint->aspectRatio();
		$constraint->upsize();
	}
)->save( $output );

$image = Image::make( $output )->insert( $watermark, 'bottom' )->save( $output );

echo $image->response( 'jpg' );
