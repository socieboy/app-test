<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeviceRequest extends Request
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
            '_uid'  => 'required',
            'ip'    => 'required|ip|between:7,15',
            'port'  => 'required|numeric|digits_between:1,4',
            'lat'   => 'required',
            'lng'   => 'required',
        ];
    }
}
