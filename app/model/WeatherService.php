<?php
namespace App\Model;

/**
 * Class WeatherService
 * @package App\Model
 * @author Vladimír Antoš
 * @version 1.0
 */
class WeatherService {

    /**
     * @var IParser
     */
    private $parser;

    /**
     * Stažená data.
     * @var string
     */
    private $content;

    /**
     * WeatherService constructor.
     * @param IParser $parser
     */
    public function __construct (IParser $parser) {
        $this->parser = $parser;
    }

    /**
     * @param string $path
     * @param string $city
     * @return WeatherService
     */
    public function download($path, $city) {
        $this->content = file_get_contents(str_replace("{CITY}", $city, $path));
        return $this;
    }

    /**
     * @param string $path
     */
    public function save($path) {
        if(file_exists($path))
            fopen($path, 'w');
        file_put_contents($path, $this->content);
        file_put_contents(infoFile, date("d.m.Y"));
    }

    /**
     * @return bool
     */
    public function needUpdate() {
        $date = date("d.m.Y", strtotime(file_get_contents(infoFile)));
        $now = date("d.m.Y");
        return $date < $now;
    }

    /**
     * @param string $city
     */
    public function saveCity($city) {
//        $cities =  explode(PHP_EOL, file_get_contents(cityPath));
//        $city = $city == null ? defaultCity : $city;
//        $result = null;
//        foreach ($cities as $c) {
//            $c = str_replace("*", "", $c);
//            if($city == $c)
//                $c = $c.'*';
//            $result .= $c . PHP_EOL;
//        }
//        $result = trim($result);
        file_put_contents(cityPath, $city);
    }

    /**
     * @return string
     */
    public function getCurrentCity(){
        return ($city = file_get_contents(cityPath)) == null ? defaultCity : $city;
//        $cities =  explode("\n", file_get_contents(cityPath));
//        foreach ($cities as $city)
//            if(Strings::contains($city, "*"))
//                return trim(str_replace("*", null, $city));
//        return defaultCity;
    }


    /**
     * @param string $path
     * @return Resource\Weather
     */
    public function load($path) {
        $weather = $this->parser->parse(file_get_contents($path));
        $weather->setCity($this->getCurrentCity());
        return $weather;
    }

    /**
     * @return array
     */
    public function getAllCities() {
        $cities = explode(PHP_EOL, file_get_contents(cityPath));
        $result = [];
        foreach ($cities as $city) {
            $result[] = str_replace("*", null, $city);
        }
        return $result;
    }
}