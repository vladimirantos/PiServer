<?php
namespace App\Model;
use Nette\Utils\Strings;

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
        b("Aktualizuju");
        $this->content = file_get_contents(str_replace("{CITY}", $city, $path));
        return $this;
    }

    /**
     * @param string $path
     */
    public function save($path) {
        b("Ukládám");
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
        file_put_contents(cityPath, $city);
    }

    /**
     * @return string
     */
    public function getCity(){
        return file_get_contents(cityPath);
    }

    /**
     * @param string $path
     * @return Resource\Weather
     */
    public function load($path) {
        return $this->parser->parse(file_get_contents($path));
    }
}