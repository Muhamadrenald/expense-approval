<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApproverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ubah sesuai kebutuhan otorisasi
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:approvers,name',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama approver wajib diisi.',
            'name.string' => 'Nama approver harus berupa teks.',
            'name.max' => 'Nama approver tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama approver sudah terdaftar.',
        ];
    }
}
