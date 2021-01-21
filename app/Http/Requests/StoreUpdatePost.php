<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
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
        $id = $this->segment(2);
        return [
            'title' =>
             ['required',
             'min:5,',
             'max:255',
             'unique:posts,title,{$id},id'
            ],
            'content' => ['required', 'min:50', 'max:10000'],
            'image' => ['required','image'],
        ];
    }
}
