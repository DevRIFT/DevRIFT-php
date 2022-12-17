<?php

namespace DevRIFT\Exception;

/**
 * DebugSuccessException Class
 */
class DebugSuccessException extends \Exception implements ExceptionInterface
{
    /**
     * Summary of __construct
     * @param mixed $message
     * @param mixed $code
     */
    public function __construct($message, $code = 0)
    {
        parent::__construct("DevRIFT Debug Success: " . $message, $code);
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
