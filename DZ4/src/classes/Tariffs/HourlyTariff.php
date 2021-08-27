<?php
namespace src\classes\Tariffs;

use src\traits\AdditionalServices;

class HourlyTariff extends Tariffs {

	protected $price_for_time = 200;

	public function calculate( $distance, $time, $age ): float {
		if ( ! $this->check_age( $age ) ) {
			return false;
		} else {
			$hours      = ceil( $time / 60 );
			$total_price = ( $hours * $this->price_for_time * $this->get_extra_charge_for_age( $age ) );

			if ( ! empty( $this->additional_services ) ) {

				foreach ( $this->additional_services as $service ) {
					$total_price += $this->$service( $time );
				}
			}

			return $total_price;
		}
	}
}
