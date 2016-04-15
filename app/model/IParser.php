<?php
namespace App\Model;
use App\Model\Resource\Weather;

/**
 * Interface IParser
 * @package App\Model
 * @author Vladimír Antoš
 * @version 1.0
 */
interface IParser {

    /**
     * @param string $text
     * @return Weather
     */
    function parse($text);
}