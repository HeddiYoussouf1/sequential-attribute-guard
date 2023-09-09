 # Sequential Attribute Guard

## Description:
The Sequential Attribute Guard is a Laravel package that provides a powerful and flexible way to manage sequential attributes and their rules for your Eloquent models. With this package, you can easily define multiple sequential attributes for your models, each having its own set of rules for attribute value ordering.

## Key Features:

    Define and manage multiple sequential attributes for your Eloquent models.
    Configure sequential attribute rules to control the allowed order of attribute values.
    Ensure data integrity and consistency by enforcing sequential rules during model creation and updates.
    Simplify complex data management scenarios by using a straightforward and expressive syntax.

## Installation:

To install the Sequential Attribute Guard package, follow these simple steps:

**Install the package via Composer:**

    bash

    composer require heddiyoussouf/sequential-attribute-guard

## Usage:

Define your Eloquent model and implement the ChecksSequentialAttributeOrder interface.

    php

    use Heddiyoussouf\SequentialAttributeGuard\Interfaces\ChecksSequentialAttributeOrder;
    use Heddiyoussouf\SequentialAttributeGuard\Traits\EnforcesSequentialAttributes;
    
    class YourModel extends Model implements ChecksSequentialAttributeOrder
    {
        use EnforcesSequentialAttributes;
    
        // Define your model attributes and their rules here.
    }

Define your sequential attributes and their rules within the model using the sequentialAttributes and attributeRules methods.

    php

    public static function sequentialAttributes(): array
    {
        return ['attribute1', 'attribute2'];
    }

    public static function attributeRules(): array
    {
        return [
            'attribute1' => [
                'value0" => null                         // value0 initial value of attribute1
                'value1' => ['value2', 'value3'],        // value1 comes only after value2 or value3
                'value2' => ['value1'],
                // Define rules for 'attribute1' here.
            ],
            'attribute2' => [
                // Define rules for 'attribute2' here.
            ],
        ];
    }

Now, your model is equipped with sequential attributes and their defined rules, ensuring that data adheres to the specified order when created or updated.

## Requirements:

    PHP >= 8.0
    Laravel >= 8.0

Explore the Sequential Attribute Guard package and take control of managing sequential attributes and their rules effortlessly in your Laravel applications.
