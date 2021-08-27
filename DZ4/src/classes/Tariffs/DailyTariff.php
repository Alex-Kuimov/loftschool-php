<?php
namespace src\classes\Tariffs;

use src\traits\AdditionalServices;

class DailyTariff extends Tariffs {

	protected $price_for_time     = 1000;
	protected $price_for_distance = 1;

	public function calculate( $distance, $time, $age ): float {
		if ( ! $this->check_age( $age ) ) {
			return false;
		} else {
			$days   = $time / self::MINUTES;
			$modulo = $time % self::MINUTES;
			if ( $modulo > self::MAX_DAYS ) {
				$days++;
			}

			$total_price = ( ( (int) $days * $this->price_for_time ) + ( $distance * $this->price_for_distance ) ) * $this->get_extra_charge_for_age( $age );

			if ( ! empty( $this->additional_services ) ) {

				foreach ( $this->additional_services as $service ) {
					$total_price += $this->$service( $time );
				}
			}

			return $total_price;
		}
	}
}

