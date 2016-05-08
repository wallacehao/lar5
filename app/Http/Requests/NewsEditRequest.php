<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsEditRequest extends Request
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

    
    public function rules()
    {
        return [
            'sltCate'   => 'required',
            'txtAuthor' => 'required',
            'txtIntro'  => 'required',
            'txtFull'   => 'required'
        ];
    }

    public function messages() 
    {
        return [
            'sltCate.required'   => 'Please choose category',
            'txtTitle.required'  => 'Please enter title',
            'txtAuthor.required' => 'Please enter author',
            'txtIntro.required'  => 'Please enter intro',
            'txtFull.required'   => 'Please enter Full'
        ];
    }
}
