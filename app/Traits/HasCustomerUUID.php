<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasCustomerUUID
{
    /**
     * Boot the trait and generate UUID for the customer.
     */
    protected static function bootHasCustomerUUID()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid(); // Generate a UUID
            }
        });
    }
}
