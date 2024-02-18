<?php

namespace App\Http\Requests;

use App\Enums\Store\Status;
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
            'name' => [
                'string',
                'required',
                'min:3',
                'max:600'
            ],
            'status' => [
                'string',
                'required',
                new Enum(
                    type: Status::class
                )
            ],
            'description' => [
                'nullable',
                'string',
                'min:3',
                'max:600'
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
                'int',
            ],
            'older_price' => [
                'int',
            ],
            'CanReview' => [
                'required',
                'boolean'
            ],
            'CanComment' => [
                'required',
                'boolean',
            ]
        ];
    }
}
