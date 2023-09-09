<?php
namespace Heddiyoussouf\SequentialAttributeGuard\Interfaces;
interface ChecksStatusOrder{
    public static function sequential_attribute() : array ;
    public static function attribute_rules(): array ;
}
