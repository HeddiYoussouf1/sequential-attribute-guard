<?php
namespace Heddiyoussouf\SequentialAttributeGuard\Traits;
use Heddiyoussouf\SequentialAttributeGuard\Exceptions\InvalidSequentialAttributeValueException;
use Heddiyoussouf\SequentialAttributeGuard\Interfaces\ChecksStatusOrder;
trait EnforcesSequentialAttributes
{

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {


            if ($model instanceof ChecksStatusOrder) {

                $sequentialAttrs = self::sequential_attribute();
                $rules =  self::attribute_rules();
                foreach ($sequentialAttrs as $attr) {
                    $newVal = $model->{$attr};
                    $currentVal = optional($model->fresh())->{$attr};
                    
                    if (isset($rules[$attr][$newVal]) && !in_array($currentVal, $rules[$attr][$newVal])) {
                        throw new InvalidSequentialAttributeValueException($attr, $newVal, $rules[$attr][$newVal]);
                    }
                }
             }
        });
    }
}
