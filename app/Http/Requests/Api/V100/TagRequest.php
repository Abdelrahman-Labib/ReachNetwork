<?php

namespace App\Http\Requests\Api\V100;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'advertisement_id' => [
                'required',
                Rule::exists('advertisements', 'id')
            ],
            'name' => ['required', 'string', 'max:190']
        ];
    }
}
