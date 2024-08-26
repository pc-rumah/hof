<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'tentang' => 'nullable|string|max:1000',
            'pekerjaan' => 'nullable|string|max:255',
            'negara' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'notelp' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ];
    }
}
