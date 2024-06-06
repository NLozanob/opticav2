<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest{
   
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        if(request()->isMethod('POST')){
            return [
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'last_name'=> 'nullable',
                'email' => 'required',
                'phone_number'=> 'nullable',
                'address' => 'required|string',
            ];
            
        } elseif(request()->isMethod('PUT')){
            return [
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'last_name'=> 'nullable',
                'email' => 'required',
                'phone_number'=> 'nullable',
                'address' => 'required|string',
            ];
        }
    }
}
