<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieStoreRequest extends FormRequest
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
    {  //dd($this->all());
        return [
            'name' => 'required|max:255',
            'poster' => 'nullable|image|max:5000|dimensions:min_width=200,min_height=300',
            'genres' => 'required',
        ];
    }
}
