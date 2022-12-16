<?php

namespace DevRIFT\Exception;

class HALTException extends \Exception implements ExceptionInterface
{
    public function __construct($message = "HALT has terminated this process. ", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message . " HALT Prevents potential exploitation of secure infrastructure. Something went wrong and HALT took action on it. We are sorry for any inconvenience caused.", $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}