<?php
require_once 'src/autoloader.php';

use src\classes\Tariffs\BaseTariff;
use src\classes\Tariffs\HourlyTariff;
use src\classes\Tariffs\DailyTariff;
use src\classes\Tariffs\StudentTariff;

echo '<b>Тариф «Базовый»</b><br><br>';
$base_tariff = new BaseTariff();
if ( $total_price = $base_tariff->calculate( 3, 30, 21 ) ) {
	echo 'Данные: 3 км, 30 минут, 20 лет. Итого за аренду по тарифу «Базовый»: ' . $total_price . '<br><br>';
}

echo '<br><br>';

echo '<b>Тариф «Почасовой»</b><br><br>';
$hourly_tariff = new HourlyTariff();
if ( $total_price = $hourly_tariff->calculate( 4, 42, 24 ) ) {
	echo 'Данные: 4 км, 42 минута, 24 лет. Итого за аренду по тарифу «Почасовой»: ' . $total_price . '<br><br>';
}

echo '<br><br>';

echo '<b>Тариф «Суточный»</b><br><br>';
$daily_tariff = new DailyTariff();
if ($total_price = $daily_tariff->calculate(5, 1469, 25)) {
	echo 'Данные: 5 км, 24 часа 29 минут, 25 лет. Итого за аренду по тарифу «Суточный»: ' . $total_price . '<br><br>';
}

echo '<br><br>';


echo '<b>Тариф «Студенческий»</b><br><br>';
$student_tariff = new StudentTariff();
if ( $total_price = $student_tariff->calculate( 7, 10, 22 ) ) {
	echo 'Данные: 7 км, 10 минут, 22 лет. Итого за аренду по тарифу «Студенческий»: ' . $total_price . '<br><br>';
}
