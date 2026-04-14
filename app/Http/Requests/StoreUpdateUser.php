<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUser extends FormRequest
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

        $rules = [
            'name' => 'required|min:3|max:255|unique:forums',
            'email' => 'required|email|max:255|unique:forums',
            'password' => 'required|min:6|max:255',
        ];

        if($this->method() === 'PUT' || $this->method() === 'PATCH'){
            $rules['name'] = [
                'required',
                'min:3',
                'max:255',
            ];

            Rule::unique('users')->ignore($this->user ?? $this->id);
        }

        return $rules;
    }
}
