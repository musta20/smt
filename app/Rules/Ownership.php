<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Ownership implements ValidationRule
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $object = is_object($value) ? $value : (new $this->model)->findOrFail($value);

        $object->tenant_id != tenant('id') ? $fail('this object dose not bleong to this tenant') : '';
    }
}
