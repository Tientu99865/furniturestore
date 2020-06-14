<?php

namespace App\Http\Requests;

use App\Customers;
use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
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
            //
            'password' => 'required|min:6|max:32',
            're_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Bạn chưa nhập mật khẩu mới',
            'password.min'=>'Mật khẩu không thể nhỏ hơn 6 ký tự',
            'password.max'=>'Mật khẩu không thể lớn hơn 32 ký tự',
            're_password.same' => 'Mật khẩu không trùng nhau',
            're_password.required' => 'Bạn chưa nhập lại mật khẩu mới',
        ];
    }
}
