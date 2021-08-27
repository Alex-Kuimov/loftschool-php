<?php
namespace src\classes\Tariffs;

use src\traits\AdditionalServices;

class StudentTariff extends Tariffs {

	protected $price_for_time     = 1;
	protected $price_for_distance = 4;

	protected function check_age( int $age ) {
		if ( $age < 18 || $age > 25 ) {
			echo 'Недопустимый возраст для студента! Ваш возраст: ' . $age . '<br>';
			return false;
		} else {
			return true;
		}
	}

	public function calculate( $distance, $time, $age ): float {
		$total_price = parent::calculate( $distance, $time, $age );
		if ( ! empty( $this->additional_services ) ) {

			foreach ( $this->additional_services as $service ) {
				$total_price += $this->$service( $time );
			}
		}

		return $total_price;
	}
}
