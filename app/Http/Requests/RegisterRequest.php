<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function attributes(){
        return [
            'name' => 'Tên đăng nhập',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu nhập lại',
            'email' => 'Email',
            'birthday' => 'Ngày sinh',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',

        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được ít hơn :min ký tự',
            'max' => ':attribute không được quá :max ký tự', 
            'confirmed' => 'Xác nhận mật khẩu không khớp',
            'email' => 'Địa chỉ email không hợp lệ',
            'unique' => ':attribute đã tồn tại',
            'date_format' => 'Ngày sinh không đúng định dạng',
            'before' => ':attribute không được lớn hơn ngày hiện tại',
            'after' => ':attribute không được nhỏ hơn 01/01/1900',
            'numeric' => ':attribute phải là số',
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:255',
            'email' => 'required|min:6|max:255|email|unique:customers',
            'phone' => 'required|numeric|min:10',
            'birthday' => 'required|before:tomorrow|after:01/01/1900',
            'address' => 'required|min:6|max:255',    
            'password' => 'required|min:6|max:12|confirmed',
            'password_confirmation'=> 'required|min:6|max:12',
            
            
        ];
    }
}
