<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOperatorRequest extends FormRequest
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
            'details.name' => [
                'required',
                'string',
                Rule::unique('operators', 'name')->where('deleted_at', null)->ignore($this->operator)
            ],
            'rows.*.code' => 'required|numeric',
        ];
    }
}
