<?php
namespace App\Model\Resource;

/**
 * Data odesílaná klientovi.
 * @package App\Model\Resource
 * @author Vladimír Antoš
 * @version 1.0
 */
class Response extends Resource {

    /** @var int */
    private $httpCode = 200;

    /** @var string */
    private $message;

    /** @var Resource|array */
    private $data;

    /**
     * @param int $httpCode
     * @param string $message
     * @param Resource|array $data
     */
    public function __construct($httpCode, $message, $data = null) {
        $this->httpCode = $httpCode;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getHttpCode() {
        return $this->httpCode;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
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