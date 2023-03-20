<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskPostRequest extends FormRequest
{
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        } else {
        return false;
        }
    }

    public function rules()
    {
        return [
            'title' => 'required | max:255',
            'body' => 'required | max:255',
            'status' => 'boolean'
        ];
    }
}
