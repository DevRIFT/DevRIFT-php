<?php

namespace DevRIFT\Exception;

class DebugSuccessException extends \Exception implements ExceptionInterface
{
    public function __construct($message, $code = 0)
    {
        parent::__construct("DevRIFT Debug Success: " . $message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
