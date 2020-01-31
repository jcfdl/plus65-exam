<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
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
      // return [
      //   'name'=>'required|alpha',
      //   'number1' => [
      //     'nullable',
      //     'regex:/[0-9]+/',
      //     'size:4',
      //     Rule::unique('draw_members')
      //     ->where(function ($query) {
      //         $query->where('draw_id', $this->draw_id);
      //     })
      //   ],
      //       'number2' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number1|unique:draw_members,number3|unique:draw_members,number4|unique:draw_members,number5|size:4',
      //       'number3' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number2|unique:draw_members,number1|unique:draw_members,number4|unique:draw_members,number5|size:4',
      //       'number4' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number2|unique:draw_members,number3|unique:draw_members,number1|unique:draw_members,number5|size:4',
      //       'number5' => 'nullable|regex:/[0-9]+/|unique:draw_members|unique:draw_members,number2|unique:draw_members,number3|unique:draw_members,number4|unique:draw_members,number1|size:4'
      //   ];

      return [
        'name'=>'required|alpha',
        'number1' => [
          'nullable',
          'regex:/[0-9]+/',
          'size:4',
          Rule::unique('draw_members')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number2')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number3')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number4')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number5')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          })
        ],
        'number2' => [
          'nullable',
          'regex:/[0-9]+/',
          'size:4',
          Rule::unique('draw_members')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number1')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number3')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number4')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number5')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          })
        ],
        'number3' => [
          'nullable',
          'regex:/[0-9]+/',
          'size:4',
          Rule::unique('draw_members')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number2')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number1')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number4')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number5')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          })
        ],
        'number4' => [
          'nullable',
          'regex:/[0-9]+/',
          'size:4',
          Rule::unique('draw_members')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number2')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number3')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number1')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number5')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          })
        ],
        'number5' => [
          'nullable',
          'regex:/[0-9]+/',
          'size:4',
          Rule::unique('draw_members')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number2')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number3')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number4')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          }),
          Rule::unique('draw_members', 'number1')
          ->where(function ($query) {
            return $query->where('draw_id', $this->draw_id);
          })
        ],
      ];
    }
}
