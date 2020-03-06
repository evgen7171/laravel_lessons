<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hashtags implements Rule
{
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
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        preg_match_all('/#[a-z]+/', $value, $matches, PREG_OFFSET_CAPTURE);
        return count($matches[0]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Отсутствуют хэштеги.';
    }
}
