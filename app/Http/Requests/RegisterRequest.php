<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name'=>'required|alpha',
            'number1' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number2|unique:draw_members,number3|unique:draw_members,number4|unique:draw_members,number5|size:4',
            'number2' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number1|unique:draw_members,number3|unique:draw_members,number4|unique:draw_members,number5|size:4',
            'number3' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number2|unique:draw_members,number1|unique:draw_members,number4|unique:draw_members,number5|size:4',
            'number4' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number2|unique:draw_members,number3|unique:draw_members,number1|unique:draw_members,number5|size:4',
            'number5' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number2|unique:draw_members,number3|unique:draw_members,number4|unique:draw_members,number1|size:4'
        ];
    }
}
