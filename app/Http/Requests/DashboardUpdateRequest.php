<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'value' => ['decimal'],
            'description' => ['text', 'max:255'],
            'recurrence' => ['required', 'exists:t01_financial.recurrence'],
            'created_at' => ['date'],
        ];
    }
}
