<?php
namespace Heddiyoussouf\SequentialAttributeGuard\Exceptions;
use Exception;

class InvalidSequentialAttributeValueException extends Exception
{
    public function __construct($attribute, $value, $expectedValues)
    {
        $expected = implode(', ', $expectedValues);
        $message = "The attribute '{$attribute}' cannot be set to '{$value}'. Expected previous value(s): {$expected}.";
        parent::__construct($message);
    }
}
