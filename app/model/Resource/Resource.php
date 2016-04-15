<?php
namespace App\Model\Resource;
use Nette\Object;

/**
 * @package App\Model\Resource
 * @author Vladimír Antoš
 * @version 1.0
 */
abstract class Resource extends Object implements \JsonSerializable {

    /**
     * @return string
     */
    public function toString() {
        return get_called_class();
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->toString();
    }

    public function jsonSerialize() {
        return $this->toArray();
    }

    abstract public function toArray();
}