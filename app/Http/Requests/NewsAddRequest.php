<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsAddRequest extends Request
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
            'sltCate'   => 'required',
            'txtTitle'  => 'required|unique:qt64_news,title',
            'txtAuthor' => 'required',
            'txtIntro'  => 'required',
            'txtFull'   => 'required',
            'newsImg'   => 'required|image|mimes:png,jpg,jpeg,bmp'
        ];
    }

    public function messages() {
        return [
             'sltCate.required'   => 'Please choose category',
             'txtTitle.required'  => 'Please enter title',
             'txtTitle.unique'    => 'Title is exists',
             'txtAuthor.required' => 'Please enter author',
             'txtIntro.required'  => 'Please enter intro',
             'txtFull.required'   => 'Please enter Full',
             'newsImg.required'   => 'Please upload image',
             'newsImg.image'      => 'file type is image',
             'newsImg.mimes'      => 'Image type is : png,jpg,jpeg,bmp'
        ];
    }
}
