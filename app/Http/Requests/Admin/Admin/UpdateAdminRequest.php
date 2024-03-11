<?php
namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'name' => 'required|max:50|min:5',
            'phone' => 'required|unique:users,phone,'. $this->user->id,
            'email' => 'required|email|unique:users,email,'. $this->user->id,
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'required_with:password',
        ];
    }
}
