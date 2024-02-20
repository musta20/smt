<?php

namespace App\Http\Requests;

use App\Enums\Store\Status;
use App\Rules\Ownership;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateProductRequest extends FormRequest
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
            $this->route('product')->id => [
                new Ownership('App\Customer'),
            ],
            'name' => [
                'string',
                'required',
                'min:3',
                'max:600'
            ],

            'description' => [
                'nullable',
                'string',
                'min:3',
                'max:600'
            ],
            'category' => [
                'required',

            ],
            'price' => [
                'nullable',
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
