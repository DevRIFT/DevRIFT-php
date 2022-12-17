<?php

namespace DevRIFT\Exception;

/**
 * InvalidArgumentException Class
 */
class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
    /**
     * Summary of __construct
     * @param mixed $message
     * @param mixed $code
     * @param \Exception|null $previous
     */
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Summary of __toString
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
