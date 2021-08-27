<?php
namespace src\classes\Tariffs;

use src\interfaces\CarSharingInterface;
use src\traits\AdditionalServices;

abstract class Tariffs implements CarSharingInterface {

	use AdditionalServices;

	protected $price_for_time;
	protected $price_for_distance;
	protected $additional_services;

	public function __construct( array $additional_services = [] ) {
		$this->additional_services = $additional_services;
	}

	protected function check_age( int $age ) {
		if ( $age < 18 || $age > 65 ) {
			echo 'Недопустимый возраст! Ваш возраст: ' . $age . '<br><br>';
			return false;
		} else {
			return true;
		}
	}

	protected function get_extra_charge_for_age( int $age ): float {
		return ( $age >= 18 && $age <= 21 ) ? 1.1 : 1;
	}

	public function calculate( $distance, $time, $age ): float {
		if ( ! $this->check_age( $age ) ) {
			return false;
		} else {
			return ( ( $time * $this->price_for_time ) + ( $distance * $this->price_for_distance ) ) * $this->get_extra_charge_for_age( $age );
		}
	}
}
