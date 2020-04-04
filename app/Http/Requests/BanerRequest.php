<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BanerRequest extends Request
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
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'zip'=>'required',
            'price'=>'required|integer',
            'description'=>'required',
        ];
    }
}
