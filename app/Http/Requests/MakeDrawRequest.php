<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeDrawRequest extends FormRequest
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
        if($this->gen_number == 1) {
          return [
            'draw_id' => 'required',
            'draw_prize_id' => 'required',
          ];
        } else {
          return [
            'draw_id' => 'required',
            'draw_prize_id' => 'required',
            'number' => 'required|regex:/[0-9]+/|size:4'
          ];  
        }
    }
}
