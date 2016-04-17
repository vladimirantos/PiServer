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
        return new Weather(null, null, null, null, null, new Temperature(10,10,10), null);
    }
}