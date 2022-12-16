<?php

namespace DevRIFT\Exception;

// TODO: remove this check once we drop support for PHP 5
if (\interface_exists(\Throwable::class, false)) {
    /**
     * The base interface for all DevRIFT exceptions.
     */
    interface ExceptionInterface extends \Throwable
    {
    }
} else {
    /**
     * The base interface for all DevRIFT exceptions.
     */
    interface ExceptionInterface
    {
    }
}