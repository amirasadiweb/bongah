<?php

namespace App\Http\Requests;

use App\Baner;

class ChangeBanerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Baner::where([
            'zip'=>$this->zip,
            'street'=>$this->street,
            'user_id'=>auth()->user()->id
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo'=>'required|mimes:jpg,png,bmp,jpeg'
        ];
    }
}
