<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'picture' => 'image',
            'name' => 'required|string',
            'city' => '',
            'email' => 'required|email',
            'about_me' => '',
            'password' => 'sometimes|nullable|required_with:new_password|current_password',
            'new_password' => 'sometimes|nullable|required_with:password|confirmed|min:8',
        ];
    }
}
