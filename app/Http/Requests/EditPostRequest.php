<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
{

    /** * Determine if the user is authorized to make this request.
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
            'id'    => [
                'required',
                // user can only edit his posts
                Rule::exists('posts', '_id')->where('user_id', auth()->id()),
            ],
            'title' => 'required',
            'blog'  => 'required',
        ];
    }

}
