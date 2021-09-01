<?php
namespace src\classes\Tariffs;

use src\interfaces\CarSharingInterface;
use src\traits\AdditionalServices;

abstract class Tariffs implements CarSharingInterface {

	const MINUTES       = 1440;
	const SECONDS       = 60;
	const MAX_DAYS      = 30;
	const GPS_PRICE     = 15;
	const ADD_PRICE     = 100;
	const MIN_AGE       = 18;
	const MAX_AGE       = 25;
	const MAX_AGE_YOUNG = 21;
	const MAX_AGE_OLD   = 65;

	use AdditionalServices;

	protected $price_for_time;
	protected $price_for_distance;
	protected $additional_services;

	public function __construct( array $additional_services = [] ) {
		$this->additional_services = $additional_services;
	}

	protected function check_age( int $age ) {
		if ( $age < self::MIN_AGE || $age > self::MAX_AGE_OLD ) {
			echo 'Недопустимый возраст! Ваш возраст: ' . $age . '<br><br>';
			return false;
		} else {
			return true;
		}
	}

	protected function get_extra_charge_for_age( int $age ): float {
		return ( $age >= self::MIN_AGE && $age <= self::MAX_AGE_YOUNG ) ? 1.1 : 1;
	}

	public function calculate( $distance, $time, $age ): float {
		if ( ! $this->check_age( $age ) ) {
			return false;
		} else {
			return ( ( $time * $this->price_for_time ) + ( $distance * $this->price_for_distance ) ) * $this->get_extra_charge_for_age( $age );
		}
	}
}
