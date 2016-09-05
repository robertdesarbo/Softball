<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TeamRequest extends Request
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
            'name'          => 'required|string',
            'league_id'     => 'required|exists:leagues,league_id',
            'division_id'   => 'required|exists:divisions,division_id,league_id,'.$this->league_id,
            'session_id'    => 'required|exists:sessions,session_id,division_id,'.$this->division_id,
        ];
    }
}
