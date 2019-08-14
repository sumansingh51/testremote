<?php
echo "<pre>";

$deliveryDate = "8/12/2018 10:25:50 AM";
$day = 	strtotime($deliveryDate);
$dayNumber = date('N', $day);
$dayHour = date('H', $day);


$shipDate = '';
if($dayNumber >= 1 && $dayNumber <= 5) {
	/* Mon - Fir */
	if ($dayHour < 14) {
	   /* before 2pm */
		$shipDate = date('m/d/Y', $day);
	} else {
		$shipDate = date('m/d/Y', strtotime('+1 day', $day));
	}
} else if($dayNumber == 6) {
	/* Saturday */
	if ($dayHour < 11) {
	   /* before 11am */
	   $shipDate = date('m/d/Y', $day);
	} else {
		$shipDate = date('m/d/Y', strtotime('+2 day', $day));
	}
} else {
	$shipDate = '';
}

var_dump($shipDate);
die;
echo $testString = "2nd Day Delivers: 7/31/2018";
echo '<br />';
$testStringArr = explode(':', $testString);

$deliveryDate = trim($testStringArr[1]);
$deliveryType = strtolower(trim($testStringArr[0]));
 

$FEDEXMatrix =  array(
	"priority overnight"=> array(
								"Tuesday" => "Monday",
								"Wednesday" => "Tuesday",
								"Thursday" => "Wednesday",
								"Friday" => "Thursday",
								"Saturday" => "Friday",
								"Monday" => "Saturday"
							),
	"standard overnight"=> array(
								"Tuesday" => "Monday",
								"Wednesday" => "Tuesday",
								"Thursday" => "Wednesday",
								"Friday" => "Thursday",
								"Monday" => "Friday",
								"Monday" => "Saturday"
							),
	"2nd day"			=> array(
								"Wednesday" => "Monday",
								"Thursday" => "Tuesday",
								"Friday" => "Wednesday",
								"Saturday" => "Thursday",
								"Tuesday" => "Friday",
								"Tuesday" => "Saturday",
								"Monday" => "Thursday"
							),
	"express saver"		=> array(
								"Thursday" => "Monday",
								"Friday" => "Tuesday",
								"Monday" => "Wednesday",
								"Tuesday" => "Thursday",
								"Wednesday" => "Friday",
								"Wednesday" => "Saturday"
							)
	);


foreach ($FEDEXMatrix as $FEDEXMatrixKey => $FEDEXMatrixArr) {
	if (preg_match("/^$FEDEXMatrixKey/", $deliveryType)) {
    	
    	$nameOfDeliveryDay = date('l', strtotime($deliveryDate));
    	$nameOfShipDay = $FEDEXMatrixArr[$nameOfDeliveryDay];
    	echo 'DeliveryDay: '.$nameOfDeliveryDay.' and ShipDay: '. $nameOfShipDay;
    	echo '<br />';

    	//echo 'ShipDate: '. date('m/d/Y', strtotime("last Sunday", strtotime('09/01/2010')));

    	echo 'ShipDate: '. date('m/d/Y', strtotime("last ".$nameOfShipDay, strtotime($deliveryDate)));

	} else {
		echo '<br /> continue 2222222222222 ';
	}
}


?>


