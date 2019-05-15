<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->request->get('id');
        return [
//            'name'=>'required|min:3|max|30|unique:users,name,'. $id . ',id',
            'email'=>'required|email|max:30|unique:users,email,'. $id . ',id',
            'password'=>'required|max:30',
        ];
    }
    public function messages()
    {
        return [
//            'name.required' => 'name  empty',
//            'name.min' => 'need to be more than 3 characters',
//            'name.max' => 'need to be less than 30 characters',
//            'email.required' => 'email empty',
//            'email.email' => 'incorrect email format',
//            'email.max' => 'no more than 30 characters',
//            'password.required' => 'password empty',
//            'password.max' => 'no more than 30 characters',
//            'phone.numeric' => 'only number',

        ];
            }
}
