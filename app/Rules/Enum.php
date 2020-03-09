<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @property  array
 */
class Enum implements Rule
{
    private $array;
    private $attribute;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $this->array = $array;
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
        $this->attribute = $attribute;
        return array_search($value, $this->array);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Выбрано неверное поле ' . $this->attribute;
    }
}
