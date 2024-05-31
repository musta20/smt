<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
            'title' => [
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
            'address' => [
                'nullable',
                'string',

            ],
            'location' => [
                'nullable',
                'string',

            ],
            'phone' => [
                'nullable',
                'string',

            ],
            'specialty' => [
                'string',

            ],
            'facebook' => [
                'nullable',

                'url',
            ],
            'instagram' => [
                'nullable',

                'url',
            ],
            'youtube' => [
                'nullable',

                'url',
            ],
            'x' => [
                'nullable',

                'url',
            ],
            'telegram' => [
                'nullable',

                'url',
            ],
            'snapchat' => [
                'nullable',

                'url',
            ],
            'whatsapp' => [
                'nullable',

                'url',
            ],

        ];
    }
}
