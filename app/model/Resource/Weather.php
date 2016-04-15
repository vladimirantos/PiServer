<?php
namespace App\Model\Resource;

/**
 * Class Weather
 * @package App\Model\Resource
 * @author Vladimír Antoš
 * @version 1.0
 */
class Weather extends Resource{

    /**
     * SOuřadnice ve tvaru [long, lat]
     * @var string
     */
    private $coordinates;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $main;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $pressure;

    /**
     * @var int
     */
    private $humidity;

    /**
     * @var Temperature
     */
    private $temperature;

    /**
     * Tvar: rychlost směr
     * @var string
     */
    private $wind;

    /**
     * @param string $coordinates
     * @param string $city
     * @param string $main
     * @param string $description
     * @param float $pressure
     * @param int $humidity
     * @param Temperature $temperature
     * @param string $wind
     */
    public function __construct($coordinates, $city, $main, $description, $pressure, $humidity, Temperature $temperature, $wind) {
        $this->coordinates = $coordinates;
        $this->city = $city;
        $this->main = $main;
        $this->description = $description;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
        $this->temperature = $temperature;
        $this->wind = $wind;
    }

    /**
     * @return string
     */
    public function getCoordinates() {
        return $this->coordinates;
    }

    /**
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getMain() {
        return $this->main;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPressure() {
        return $this->pressure;
    }

    /**
     * @return int
     */
    public function getHumidity() {
        return $this->humidity;
    }

    /**
     * @return Temperature
     */
    public function getTemperature() {
        return $this->temperature;
    }

    /**
     * @return string
     */
    public function getWind() {
        return $this->wind;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}

class Temperature extends Resource {

    /**
     * @var float
     */
    private $real;

    /**
     * @var float
     */
    private $min;

    /**
     * @var float
     */
    private $max;

    /**
     * Temperature constructor.
     * @param float $real
     * @param float $min
     * @param float $max
     */
    public function __construct($real, $min, $max) {
        $this->real = $real;
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return float
     */
    public function getReal() {
        return $this->real;
    }

    /**
     * @return float
     */
    public function getMin() {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getMax() {
        return $this->max;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}