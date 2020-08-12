<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required|array',
            'address.id' => 'required',
            'address.street' => 'required|string',
            'address.city' => 'required|string',
            'address.country' => 'required|string',
            'address.postal_code' => 'required',
        ];
    }
}
