<?php
namespace App\Model;

/**
 * Interface IParser
 * @package App\Model
 * @author Vladimír Antoš
 * @version 1.0
 */
interface IParser {

    /**
     * @param string $text
     * @return string
     */
    function parse($text);
}