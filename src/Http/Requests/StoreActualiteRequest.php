<?php

namespace Eburkina\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActualiteRequest extends FormRequest
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
            'titre'                 => 'required',
            // 'body'                  => 'required',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags'                  => 'required',
          
        ];
    }
}
