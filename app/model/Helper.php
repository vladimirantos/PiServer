<?php
namespace App\Model;
use Nette\Object;
use Nette\StaticClassException;

/**
 * Class Helper
 * @package App\Model
 * @author Vladimír Antoš
 * @version 1.0
 */
class Helper extends Object{

    public function __construct() {
        throw new StaticClassException();
    }

    /**
     * @param float $lon
     * @param float $lat
     * @return string
     */
    public static function coordinates($lon, $lat){
        return sprintf("[%s, %s]", $lon, $lat);
    }

    /**
     * @param float $degree
     * @return string
     */
    public static function windDirection($degree){
        if (self::inRange($degree, 0, 11.25) || self::inRange($degree, 348.75, 360)) return "S";
        if(self::inRange($degree, 11.25, 56.25)) return "SV";
        if(self::inRange($degree, 56.25, 101.25)) return "V";
        if(self::inRange($degree, 101.25, 146.25)) return "JV";
        if(self::inRange($degree, 146.25, 191.25)) return "J";
        if(self::inRange($degree, 191.25, 213.25)) return "JZ";
        if(self::inRange($degree, 213.25, 258.75)) return "Z";
        if(self::inRange($degree, 258.75, 303.75)) return "SZ";
        return "X";
        //todo: chybné propočty
    }

    /**
     * @param float $value
     * @param float $min
     * @param float $max
     * @return bool
     */
    private static function inRange($value, $min, $max){
        return $value >= $min && $value <= $max;
    }
}