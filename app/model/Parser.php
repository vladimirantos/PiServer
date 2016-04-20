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
        if($jsonData === null)
            return null;
        $coordinates = $jsonData->coord;
        $main = $jsonData->weather[0]->main;
        $description = $jsonData->weather[0]->description;
        $pressure = $jsonData->main->pressure;
        $humidity = $jsonData->main->humidity;
        $temperature  = new Temperature(round($jsonData->main->temp), round($jsonData->main->temp_min), round($jsonData->main->temp_max));
        $wind = $jsonData->wind->speed.'m/s '.(property_exists($jsonData->wind, "deg") ? Helper::windDirection($jsonData->wind->deg) : null);
        
        return new Weather($coordinates, $jsonData->weather[0]->icon, $main, $description, $pressure, $humidity, $temperature, $wind);
    }
}