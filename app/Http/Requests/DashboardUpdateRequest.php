<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DashboardUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'value'       => ['decimal'],
            'description' => ['text', 'max:255'],
            'recurrence'  => ['required', 'exists:t01_financial.recurrence'],
            'created_at'  => ['date'],
        ];
    }
}
