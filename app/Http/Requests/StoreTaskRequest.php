<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'name' => 'required|string',
            'project_id'=>'required|integer',
            'status' => 'required',
            'description' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'woy jangan kosong tasknya',
        ];
    }
}
