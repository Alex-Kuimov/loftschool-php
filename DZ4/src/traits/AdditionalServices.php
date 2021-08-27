<?php
namespace src\traits;

trait AdditionalServices {
	public function gps( int $time ): int {
		return ceil( $time / self::SECONDS ) * self::GPS_PRICE;
	}

	public function driver() {
		$current_class = self::the_class();

		if ( $current_class !== 'src\classes\Tariffs\BaseTariff' && $current_class !== 'src\classes\Tariffs\StudentTariff' ) {
			return self::ADD_PRICE;
		}

		echo 'Услуга «Дополнительный водитель» недоступна в данном тарифе!<br>';
		return false;
	}

	public static function the_class() {
		return static::class;
	}
}
