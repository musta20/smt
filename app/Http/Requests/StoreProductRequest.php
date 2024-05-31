<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
                'min:3',
                'max:600',
            ],

            'description' => [
                'nullable',
                'string',
                'min:3',
                'max:600',
            ],
            'category' => [
                'required',
            ],
            'price' => [
                'required',
                'int',

            ],
            'order_url' => [
                'url',
                'required',
                'string',

            ],
            'discount' => [
                'nullable',
                'int',
            ],
            'older_price' => [
                'nullable',
                'int',
            ],

        ];
    }
}
