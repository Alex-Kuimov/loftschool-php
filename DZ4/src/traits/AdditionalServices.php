<?php
namespace src\traits;

trait AdditionalServices {

	public function gps( int $time ): int {
		return ceil( $time / 60 ) * 15;
	}

	public function driver() {
		$current_class = self::the_class();
		if ( $current_class != 'src\classes\Tariffs\BaseTariff' && $current_class != 'src\classes\Tariffs\StudentTariff' ) {
			return 100;
		} else {
			echo 'Услуга «Дополнительный водитель» недоступна в данном тарифе!<br>';
			return 0;
		}
	}

	public static function the_class() {
		return static::class;
	}
}
