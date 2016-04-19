<?php
namespace App\Model;
use App\Model\Resource\Temperature;
use App\Model\Resource\Weather;

/**
 * Class Parser
 * @package App\Model
 * @author Vladimír Antoš
 * @version 1.0
 */
class Parser implements IParser {

    /**
     * @param string $text
     * @return Weather
     */
    public function parse($text) {
        $jsonData = json_decode($text);
        
        $coordinates = $jsonData->coord;
        $main = $jsonData->weather[0]->main;
        $description = $jsonData->weather[0]->description;
        $pressure = $jsonData->main->pressure;
        $humidity = $jsonData->main->humidity;
        $temperature  = new Temperature($jsonData->main->temp, $jsonData->main->temp_min, $jsonData->main->temp_max);
        $wind = $jsonData->wind->speed.'m/s '.Helper::windDirection($jsonData->wind->deg);
        
        return new Weather($coordinates, $main, $description, $pressure, $humidity, $temperature, $wind);
    }
}