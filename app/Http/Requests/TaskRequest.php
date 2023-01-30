<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

// php artisan make:request TaskRequest
class TaskRequest extends FormRequest
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
        $rule_task_unique = Rule::unique('tasks', 'task');
        if($this->method() !== 'POST'){
            $rule_task_unique->ignore($this->route()->parameter('id'));
        }
        return [
            'task' => ['required', $rule_task_unique],
            'user' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian :attribute harus di isi',
            'user.required' => 'nama pengguna harus di isi'
        ];
    }
}
