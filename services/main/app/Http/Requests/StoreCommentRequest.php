<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'comment' => [
                'string',
                'required',
                'min:3',
                'max:600',
            ],

            'rating' => [
                'int',
                'between:1,5',

            ],
            'product_id' => [
                'required',
                'exists:products,id',
            ],

        ];
    }
}
