<?php
namespace src\classes\Tariffs;

use src\traits\AdditionalServices;

class BaseTariff extends Tariffs {
	protected $price_for_time     = 3;
	protected $price_for_distance = 10;

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
