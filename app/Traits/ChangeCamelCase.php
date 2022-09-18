<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ChangeCamelCase
{

    /**
     * Get an attribute from the model.
     */
    public function getAttribute($key): mixed
    {
        if (array_key_exists($key, $this->relations)) {
            return parent::getAttribute($key);
        } else {
            return parent::getAttribute(Str::snake($key));
        }
    }

    /**
     * Set a given attribute on the model.
     */
    public function setAttribute($key, $value)
    {
        return parent::setAttribute(Str::snake($key), $value);
    }
}
