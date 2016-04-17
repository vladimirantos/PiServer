<?php
/**
 * Created by PhpStorm.
 * User: Jirka
 * Date: 16.04.2016
 * Time: 15:48
 */

$data = '{"coord":{"lon":16.37,"lat":48.21},"weather":[{"id":800,"main":"Clear",
"description":"clear sky","icon":"01d"}],"base":"stations","main":{"temp":16.59,"pressure":1008,"humidity":76,"temp_min":10,"temp_max":23.2},
"visibility":10000,"wind":{"speed":3.6,"deg":130},"clouds":{"all":0},"dt":1460790785,"sys":{"type":1,"id":5934,"message":0.0255,"country":"AT",
"sunrise":1460779305,"sunset":1460828849},"id":2761333,"name":"Politischer Bezirk Wien (Stadt)","cod":200}';


$jsonData = json_decode($data);

//var_dump($obj);
//var_dump($obj['coord']);

$coordinates = $jsonData->coord;
$main = $jsonData->weather[0]->main;
$description = $jsonData->weather[0]->description;
$pressure = $jsonData->main->pressure;
$humidity = $jsonData->main->humidity;
//$temperature  = new \App\Model\Resource\Temperature($jsonData->main->temp, $jsonData->main->temp_min, $jsonData->main->temp_max);
$wind = $jsonData->wind->deg;


//var_dump($temperature);
echo $wind;
