<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'first_name'    => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'date_of_birth' => 'required:date',
            'address'       => 'required|string',
            'city'          => 'required|regex:/^[\pL\s\-]+$/u',
            'state'         => 'required|alpha',
            'zip'           => 'required|digits:5',
            'gender'        => 'required|in:M,F',
        ];
    }
}
