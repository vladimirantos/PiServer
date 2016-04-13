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
     * @var Parser
     */
    private $parser;

    /**
     * Stažená data.
     * @var string
     */
    private $content;

    /**
     * WeatherService constructor.
     * @param Parser $parser
     */
    public function __construct ($parser) {
        $this->parser = $parser;
    }

    /**
     * @param string $path
     * @return WeatherService
     */
    public function download($path) {

    }

    /**
     * @param string $path
     */
    public function save($path) {

    }

    /**
     * Vrací parsovaná data.
     * @return string
     */
    private function parse() {

    }
}