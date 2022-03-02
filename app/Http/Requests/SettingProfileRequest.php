<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SettingProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules = [
                'name'    => 'required|string',
                'no_hp'   => 'required|numeric',
                'rt'      => 'required|string',
                'rw'      => 'required|string',
                'address' => 'required|string',
                'avatar'  => 'file|image|mimes:jpeg,png,jpg|max:5120',
            ];
        } else {
            $rules = [
                'name'                  => 'required|string',
                'username'              => 'required|string|unique:users',
                'password'              => 'required|string|min:5|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/',
                'password_confirmation' => 'required|same:password',
                'no_hp'                 => 'required|numeric',
                'rt'                    => 'required|string',
                'rw'                    => 'required|string',
                'address'               => 'required|string',
                'role'                  => 'required|string',
                'avatar'                => 'file|image|mimes:jpeg,png,jpg|max:5120',
            ];
        }

        return $rules;
    }
}
