<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageStoreRequest extends FormRequest
{
    /**
     * Authorize the request.
     */
    public function authorize(): bool
    {
        // Gates can be used here to limit access
        return true;
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'message' => 'required|string|min:3'
        ];
    }
}
