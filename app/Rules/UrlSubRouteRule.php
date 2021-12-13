<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UrlSubRouteRule implements Rule
{

    private $name;
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $this->name = $attribute;
        return preg_match('/^(\w+\/)+\w+\.(png|jpe?g)$/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The validation $this->name error message.";
    }
}
