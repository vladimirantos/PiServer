<?php
namespace App\Model\Resource;

/**
 * Data odesílaná klientovi.
 * @package App\Model\Resource
 * @author Vladimír Antoš
 * @version 1.0
 */
class Response extends Resource {

    /** @var Resource|array */
    private $data;

    /**
     * @param Resource|array $data
     */
    public function __construct($data = null){
        $this->data = $data;
    }

    /**
     * @return Resource|array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @return array
     */
    public function toArray() {
        return get_object_vars($this);
    }
}